<?php

namespace App\Http\Controllers;

use App\Models\AppMonitor;
use App\Models\ApplicationStatus;
use App\Models\ApprovalDocs;
use App\Models\Group;
use App\Models\MemberOnboarding;
use App\Models\RejectlDocs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allapplications()
    {
        $role = Auth::user()->internalGroupCode();
        $app = MemberOnboarding::forInternalRole($role)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('applications.index', compact('app'));
    }

    public function applications($status)
    {
        $app = MemberOnboarding::where('approval_status', $status)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('applications.index', compact('app'));
    }

    public function application_report()
    {
        $app = MemberOnboarding::orderBy('created_at', 'desc')->get();
        return view('applications.reports', compact('app'));
    }

    /**
     * DSD Approval / Rejection & Payment Confirmation.
     */
    public function dodstatus(Request $request)
    {
        $appCode = $request->input('app_code');
        $status = (int) $request->input('status');
        $app = MemberOnboarding::where('app_code', $appCode)->firstOrFail();

        if ($status === MemberOnboarding::STATUS_REJECTED) {
            $request->validate([
                'note' => 'required_without:document|nullable|string',
                'document' => 'required_without:note|nullable|file|max:5120',
            ], [
                'note.required_without' => 'Please provide a reason for rejection or upload a rejection document.',
                'document.required_without' => 'Please provide a reason for rejection or upload a rejection document.',
                'document.max' => 'Rejection document must not exceed 5MB.',
            ]);

            $app->approval_status = MemberOnboarding::STATUS_REJECTED;
            $app->rejected_by_role = 'DSD';
            $app->rejection_reason = $request->input('note');
            $app->save();

            $docPath = $this->storeDocument($request, 'document', 'rejection_documents', $appCode, RejectlDocs::class);
            $this->recordStageTransition($appCode, 'dsd', $status, $request->input('note'));

            $this->safeMail('emails.dsdapp_notify_reject', [
                'user_email' => $app->user_email,
                'user_name' => $app->user_name,
                'institution' => $app->institution_name,
                'note' => $request->input('note'),
                'subject' => 'Account Opening - ' . $app->institution_name,
            ], $app->user_email, 'Account Opening - ' . $app->institution_name, $docPath ? public_path($docPath) : null);

            return redirect()->back()->with('info', 'Application Rejected and Participant Notified.');
        }

        $app->payment_confirmed = true;
        $app->approval_status = MemberOnboarding::STATUS_DSD_APPROVED;
        $app->save();

        $this->recordStageTransition(
            $appCode,
            'dsd',
            MemberOnboarding::STATUS_DSD_APPROVED,
            $request->input('note', 'Payment confirmed and approved by DSD')
        );

        $this->notifyGroup('MEG', 'emails.dsdapp_notify', [
            'institution' => $app->institution_name,
            'subject' => 'Account Opening - ' . $app->institution_name,
        ]);

        return redirect()->back()->with('success', 'Payment confirmed and application forwarded to MEG Admin.');
    }

    /**
     * MEG Review: Approve (Application Report required) or Reject (Reason or DRC -> Participant).
     */
    public function megstatus(Request $request)
    {
        $appCode = $request->input('app_code');
        $status = (int) $request->input('status');
        $app = MemberOnboarding::where('app_code', $appCode)->firstOrFail();

        if ($status === MemberOnboarding::STATUS_REJECTED || $status === 5) {
            $request->validate([
                'note' => 'required_without:document|nullable|string',
                'document' => 'required_without:note|nullable|file|max:5120',
            ], [
                'note.required_without' => 'Please enter a rejection reason or upload a Document Requirements Checklist (DRC).',
                'document.required_without' => 'Please enter a rejection reason or upload a Document Requirements Checklist (DRC).',
                'document.max' => 'DRC document must not exceed 5MB.',
            ]);

            $docPath = $this->storeDocument($request, 'document', 'rejection_documents', $appCode, RejectlDocs::class);
            if ($docPath) {
                $app->drc_doc = $docPath;
            }
            $app->approval_status = MemberOnboarding::STATUS_REJECTED;
            $app->rejected_by_role = 'MEG';
            $app->rejection_reason = $request->input('note');
            $app->save();

            $this->recordStageTransition($appCode, 'meg', MemberOnboarding::STATUS_REJECTED, $request->input('note'));

            $this->safeMail('emails.dsdapp_notify_reject', [
                'user_email' => $app->user_email,
                'user_name' => $app->user_name,
                'institution' => $app->institution_name,
                'note' => $request->input('note'),
                'subject' => 'Application Returned by MEG - ' . $app->institution_name,
            ], $app->user_email, 'Application Returned by MEG - ' . $app->institution_name, $docPath ? public_path($docPath) : null);

            return redirect()->back()->with('info', 'Application Rejected and Participant Notified.');
        }

        $request->validate([
            'document' => 'required|file|max:5120',
        ], [
            'document.required' => 'An Application Report is required to approve.',
            'document.max' => 'Application Report must not exceed 5MB.',
        ]);

        $docPath = $this->storeDocument($request, 'document', 'approval_documents', $appCode, ApprovalDocs::class);
        if ($docPath) {
            $app->application_report_doc = $docPath;
        }
        $app->approval_status = MemberOnboarding::STATUS_MEG_APPROVED;
        $app->save();

        $this->recordStageTransition(
            $appCode,
            'meg',
            MemberOnboarding::STATUS_MEG_APPROVED,
            $request->input('note', 'Approved by MEG')
        );

        $this->notifyGroup('DOD', 'emails.megapp_notify', [
            'institution' => $app->institution_name,
            'subject' => 'Account Opening - ' . $app->institution_name,
        ]);

        return redirect()->back()->with('success', 'Application Approved and Forwarded to DOD.');
    }

    /**
     * DOD Account Creation & Approval / Rejection.
     */
    public function dod_status(Request $request)
    {
        $appCode = $request->input('app_code');
        $status = (int) $request->input('status');
        $app = MemberOnboarding::where('app_code', $appCode)->firstOrFail();

        if ($status === MemberOnboarding::STATUS_DOD_APPROVED) {
            $request->validate([
                'Partner_bpid' => 'required|string|max:255',
                'Client_bpid' => 'required|string|max:255',
            ]);

            $app->Partner_BPID = $request->input('Partner_bpid');
            $app->Client_BPID = $request->input('Client_bpid');
            $app->approval_status = MemberOnboarding::STATUS_DOD_APPROVED;
            $app->save();

            $this->recordStageTransition($appCode, 'dod', MemberOnboarding::STATUS_DOD_APPROVED);

            $this->safeMail('emails.applictioncomplete', [
                'email' => $app->user_email,
                'name' => $app->user_name,
                'institution' => $app->institution_name,
                'Partner_BPID' => $app->Partner_BPID,
                'Client_BPID' => $app->Client_BPID,
            ], $app->user_email, 'Account Created - ' . $app->institution_name);

            $this->notifyGroup('ICG', 'emails.dod_notify', [
                'institution' => $app->institution_name,
                'Partner_BPID' => $app->Partner_BPID,
                'Client_BPID' => $app->Client_BPID,
                'subject' => 'Account Opening - ' . $app->institution_name,
            ]);

            return redirect()->back()->with('success', 'Account created, participant notified of account details, and application completed.');
        }

        if ($status === MemberOnboarding::STATUS_DOD_REJECTED) {
            $request->validate(['note' => 'required|string']);

            $app->approval_status = MemberOnboarding::STATUS_DOD_REJECTED;
            $app->save();

            $this->recordStageTransition($appCode, 'dod', MemberOnboarding::STATUS_DOD_REJECTED, $request->input('note'));

            $this->notifyGroup('MEG', 'emails.dodapp_notify_reject', [
                'institution' => $app->institution_name,
                'note' => $request->input('note'),
                'subject' => 'Account Opening - ' . $app->institution_name,
            ]);

            return redirect()->back()->with('info', 'Application Returned to MEG.');
        }

        return redirect()->back();
    }

    /**
     * ICG Verification.
     */
    public function icgstatus(Request $request)
    {
        $appCode = $request->input('app_code');
        $status = (int) $request->input('status');
        $app = MemberOnboarding::where('app_code', $appCode)->firstOrFail();

        if ($status === 7) {
            $request->validate(['note' => 'required|string']);

            $app->approval_status = MemberOnboarding::STATUS_MEG_APPROVED;
            $app->save();

            $this->recordStageTransition($appCode, 'icg', 7, $request->input('note'));

            $this->notifyGroup('DOD', 'emails.icgapp_notify_reject', [
                'note' => $request->input('note'),
                'institution' => $app->institution_name,
                'subject' => 'Account Opening - ' . $app->institution_name,
            ]);

            return redirect()->back()->with('info', 'Application Returned to DOD.');
        }

        if ($status === MemberOnboarding::STATUS_ICG_VERIFIED) {
            $app->approval_status = MemberOnboarding::STATUS_ICG_VERIFIED;
            $app->save();

            $this->recordStageTransition($appCode, 'icg', MemberOnboarding::STATUS_ICG_VERIFIED);

            $this->safeMail('emails.applictioncomplete', [
                'email' => $app->user_email,
                'name' => $app->user_name,
                'institution' => $app->institution_name,
                'Partner_BPID' => $app->Partner_BPID,
                'Client_BPID' => $app->Client_BPID,
            ], $app->user_email, 'Account Opening - ' . $app->institution_name . ' - Completed');

            return redirect()->back()->with('success', 'Application Verified and Completed.');
        }

        return redirect()->back();
    }

    /**
     * DSD Upload Invoice (any file type, max 5MB) -> Notifies Participant.
     */
    public function uploadinvoice(Request $request)
    {
        $request->validate([
            'app_code' => 'required',
            'invoice_doc' => 'required|file|max:5120',
        ], [
            'invoice_doc.max' => 'Invoice document must not exceed 5MB.',
        ]);

        $appCode = $request->input('app_code');
        $app = MemberOnboarding::where('app_code', $appCode)->firstOrFail();

        $file = $request->file('invoice_doc');
        $filename = time() . '-' . Str::slug($appCode) . '.' . $file->getClientOriginalExtension();
        $dest = public_path('invoice');
        if (!is_dir($dest)) {
            mkdir($dest, 0777, true);
        }
        $file->move($dest, $filename);

        $app->invoice_doc = $filename;
        $app->save();

        $this->safeMail('emails.invoiceemail', [
            'email' => $app->user_email,
            'institution' => $app->institution_name,
            'subject' => 'Application Fee Invoice - ' . $app->institution_name,
            'upload_url' => route('external.dashboard'),
        ], $app->user_email, 'Application Fee Invoice - ' . $app->institution_name, public_path('invoice/' . $filename));

        return redirect()->back()->with('success', 'Invoice Uploaded and Sent to Participant.');
    }

    /**
     * Participant Upload Payment Receipt (max 5MB) -> Notifies DSD.
     */
    public function uploadreceipt(Request $request)
    {
        $request->validate([
            'app_code' => 'required',
            'receipt_doc' => 'required|file|max:5120',
        ]);

        $appCode = $request->input('app_code');
        $app = MemberOnboarding::where('app_code', $appCode)->firstOrFail();

        $file = $request->file('receipt_doc');
        $filename = time() . '-' . Str::slug($appCode) . '.' . $file->getClientOriginalExtension();
        $dest = public_path('receipt');
        if (!is_dir($dest)) {
            mkdir($dest, 0777, true);
        }
        $file->move($dest, $filename);

        $app->receipt_doc = $filename;
        $app->save();

        $this->notifyGroup('DSD', 'emails.receiptemail', [
            'institution' => $app->institution_name,
            'subject' => 'Eligibility Fee Payment Receipt - ' . $app->institution_name,
        ], public_path('receipt/' . $filename));

        return redirect()->back()->with('success', 'Payment Receipt Uploaded.');
    }

    // ==================== HELPERS ====================

    protected function storeDocument(Request $request, string $field, string $folder, string $appCode, string $modelClass): ?string
    {
        if (!$request->hasFile($field) || !$request->file($field)->isValid()) {
            return null;
        }

        $file = $request->file($field);
        $filename = $appCode . '_' . date('Y-m-d') . '_' . time() . '.' . $file->getClientOriginalExtension();
        $dest = public_path($folder);
        if (!is_dir($dest)) {
            mkdir($dest, 0777, true);
        }
        $file->move($dest, $filename);

        $path = '/' . $folder . '/' . $filename;
        $modelClass::create([
            'app_code' => $appCode,
            'user_id' => (string) Auth::id(),
            'document' => $path,
        ]);

        return $path;
    }

    protected function recordStageTransition(string $appCode, string $stage, int $status, ?string $note = null): void
    {
        $monitor = AppMonitor::where('app_code', $appCode)->first();
        if ($monitor) {
            $monitor->{"{$stage}_status"} = (string) $status;
            $monitor->{"{$stage}_user_time"} = now()->format('d-m-Y H:i:s');
            $monitor->{"{$stage}_user_id"} = (string) Auth::id();
            $monitor->{"{$stage}_user_name"} = Auth::user()->name;
            $monitor->save();
        }

        ApplicationStatus::create([
            'status' => (string) $status,
            'note' => $note,
            'app_code' => $appCode,
            'user_id' => (string) Auth::id(),
        ]);
    }

    protected function notifyGroup(string $groupName, string $view, array $data, ?string $attachmentPath = null): void
    {
        $group = Group::where('name', $groupName)->first();
        if ($group && $group->email) {
            $data['email'] = $group->email;
            $this->safeMail($view, $data, $group->email, $data['subject'] ?? 'Q-Depository Onboarding Portal', $attachmentPath);
        }
    }

    protected function safeMail(string $view, array $data, $to, string $subject, ?string $attachmentPath = null): void
    {
        if (empty($to)) {
            return;
        }
        try {
            Mail::send($view, $data, function ($message) use ($to, $subject, $attachmentPath) {
                $message->to($to)
                    ->subject($subject)
                    ->from(config('mail.from.address'), config('mail.from.name'));
                if ($attachmentPath && file_exists($attachmentPath)) {
                    $message->attach($attachmentPath);
                }
            });
        } catch (\Throwable $e) {
            \Log::warning('Mail send failed: ' . $e->getMessage());
        }
    }
}
