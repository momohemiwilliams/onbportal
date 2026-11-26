<?php

namespace App\Http\Controllers\External;

use App\Http\Controllers\Controller;
use App\Models\AppMonitor;
use App\Models\ApplicationStatus;
use App\Models\Group;
use App\Models\MemberOnboarding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Start onboarding from Eligibility Type modal.
     */
    public function startOnboarding(Request $request)
    {
        $rules = [
            'eligibility_type' => 'required|string|max:255',
        ];

        if ($request->eligibility_type === 'Capital Market Operator') {
            $rules['eligibility_sub_type'] = 'required|string|max:255';
            if ($request->eligibility_sub_type === 'Others (Please indicate)') {
                $rules['eligibility_other'] = 'required|string|max:1000';
            }
        }

        $request->validate($rules);

        $user = Auth::user();
        $user->eligibility_type = $request->eligibility_type;
        $user->eligibility_sub_type = $request->eligibility_type === 'Capital Market Operator' ? $request->eligibility_sub_type : null;
        $user->eligibility_other = ($request->eligibility_type === 'Capital Market Operator' && $request->eligibility_sub_type === 'Others (Please indicate)')
            ? $request->eligibility_other
            : null;
        $user->save();

        session([
            'onboarding_eligibility_type' => $user->eligibility_type,
            'onboarding_eligibility_sub_type' => $user->eligibility_sub_type,
            'onboarding_eligibility_other' => $user->eligibility_other,
        ]);

        $existing = MemberOnboarding::where('user_id', $user->id)->latest('id')->first();
        if ($existing) {
            return redirect()->route('external.onboarding.step1.edit', $existing->id);
        }

        return redirect()->route('external.onboarding.step1.create');
    }

    /**
     * Backward-compatible redirect helper for legacy eligibility URLs.
     */
    public function redirectToUrl($selectedValue)
    {
        $map = [
            'Capital-Market-Operator' => 'Capital Market Operator',
            'Non-Capital-Market-Operator–Corporate' => 'Non-Capital Market Operator – Corporate',
            'Private-account-Corporate-and-Individual' => 'Private Account - Corporate and Individual',
            'Settlement-Banks' => 'Settlement Banks',
        ];

        $user = Auth::user();
        $user->eligibility_type = $map[$selectedValue] ?? str_replace('-', ' ', $selectedValue);
        $user->save();

        return redirect()->route('external.onboarding.step1.create');
    }

    /**
     * Ensure the authenticated user owns the application, can edit it, and has completed prior steps.
     */
    protected function loadEditableApplication($id, int $requiredStep): MemberOnboarding
    {
        $app = MemberOnboarding::findOrFail($id);

        if ((int) $app->user_id !== (int) Auth::id()) {
            abort(403, 'Unauthorized access to application.');
        }

        $editableStatuses = [
            MemberOnboarding::STATUS_STEP1,
            MemberOnboarding::STATUS_STEP2,
            MemberOnboarding::STATUS_STEP3,
            MemberOnboarding::STATUS_STEP4,
            MemberOnboarding::STATUS_STEP5,
            MemberOnboarding::STATUS_REJECTED,
        ];

        if (!in_array((int) $app->approval_status, $editableStatuses, true)) {
            abort(redirect()->route('external.application.show', $app->id)->with('info', 'Submitted applications are read-only.'));
        }

        $maxCompleted = (int) ($app->max_step_completed ?? 0);
        if ($requiredStep > 1 && $maxCompleted < ($requiredStep - 1)) {
            abort(redirect()->route($this->stepRouteName($maxCompleted + 1), $app->id)
                ->with('error', 'Please complete the previous step before proceeding.'));
        }

        return $app;
    }

    protected function stepRouteName(int $step): string
    {
        switch ($step) {
            case 1: return 'external.onboarding.step1.edit';
            case 2: return 'external.onboarding.step2.edit';
            case 3: return 'external.onboarding.step3.edit';
            case 4: return 'external.onboarding.step4.edit';
            case 5: return 'external.onboarding.step5.edit';
            case 6: return 'external.onboarding.step6.edit';
            default: return 'external.onboarding.step1.edit';
        }
    }

    protected function displayEligibilityForUserOrApp(?MemberOnboarding $app = null): string
    {
        if ($app) {
            return $app->displayEligibilityType();
        }

        $user = Auth::user();
        $type = session('onboarding_eligibility_type', $user->eligibility_type ?: 'Participant');
        $sub = session('onboarding_eligibility_sub_type', $user->eligibility_sub_type);
        $other = session('onboarding_eligibility_other', $user->eligibility_other);

        if ($type === 'Capital Market Operator' && !empty($sub)) {
            if ($sub === 'Others (Please indicate)' && !empty($other)) {
                return 'Capital Market Operator - ' . $other;
            }
            return $sub;
        }

        return $type;
    }

    /**
     * Validate and store PDF files (max 5MB).
     */
    protected function storePdfUploads(Request $request, MemberOnboarding $app, array $fields): void
    {
        foreach ($fields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $ext = strtolower($file->getClientOriginalExtension() ?: 'pdf');
                $filename = $app->app_code . '_' . date('Y-m-d') . '_' . time() . '_' . $field . '.' . $ext;
                $dest = public_path($field);
                if (!is_dir($dest)) {
                    mkdir($dest, 0777, true);
                }
                $file->move($dest, $filename);
                $app->$field = '/' . $field . '/' . $filename;
            }
        }
    }

    // ==================== STEP 1: PARTICIPANT DETAILS ====================

    public function form_one()
    {
        $user = Auth::user();
        $existing = MemberOnboarding::where('user_id', $user->id)->latest('id')->first();
        if ($existing) {
            return redirect()->route('external.onboarding.step1.edit', $existing->id);
        }

        $displayEligibility = $this->displayEligibilityForUserOrApp(null);
        $eligibilityType = session('onboarding_eligibility_type', $user->eligibility_type ?: 'Capital Market Operator');
        $eligibilitySubType = session('onboarding_eligibility_sub_type', $user->eligibility_sub_type);
        $eligibilityOther = session('onboarding_eligibility_other', $user->eligibility_other);
        $activeStep = 1;
        $maxStepCompleted = 0;
        $application = null;

        return view('external.form1', compact(
            'displayEligibility',
            'eligibilityType',
            'eligibilitySubType',
            'eligibilityOther',
            'activeStep',
            'maxStepCompleted',
            'application'
        ));
    }

    public function form_step_one(Request $request)
    {
        $request->validate([
            'institution_name' => 'required|string|max:255',
            'company_address' => 'required|string|max:255',
            'direct_line' => 'required|string|max:50',
            'company_email' => 'required|email|max:255',
            'company_tax_number' => 'required|string|max:255',
            'company_reg_number' => 'required|string|max:255',
            'company_reg_date' => 'required|string|max:50',
            'settlement_bank' => 'required|string|max:255',
            'settlement_bank_account_number' => 'required|string|max:50',
            'lei_code' => 'nullable|string|max:255',
            'switt_code' => 'nullable|string|max:255',
        ], [
            'institution_name.required' => 'Name of Participant is required.',
            'company_address.required' => 'Office Address is required.',
            'direct_line.required' => 'Mobile Number/Direct Line is required.',
            'company_email.required' => 'Company Email Address is required.',
            'company_tax_number.required' => 'Company Tax Identification Number is required.',
            'company_reg_number.required' => 'Company Registration (RC) Number is required.',
            'company_reg_date.required' => 'Company Registration Date is required.',
            'settlement_bank.required' => 'Name of Settlement Bank is required.',
            'settlement_bank_account_number.required' => 'Settlement Bank Account No is required.',
        ]);

        $user = Auth::user();
        $app = MemberOnboarding::where('user_id', $user->id)->latest('id')->first();
        if (!$app) {
            $app = new MemberOnboarding();
            $app->app_code = (string) rand(100000, 999999);
            $app->user_id = $user->id;
            $app->approval_status = MemberOnboarding::STATUS_STEP1;
        }

        $app->eligibility_type = $request->input('eligibility_type', $user->eligibility_type ?: 'Capital Market Operator');
        $app->eligibility_sub_type = $request->input('eligibility_sub_type', $user->eligibility_sub_type);
        $app->eligibility_other = $request->input('eligibility_other', $user->eligibility_other);
        $app->user_name = $user->name;
        $app->user_email = $user->email;
        $app->user_phone = $user->phone ?? '';
        $app->institution_name = $request->institution_name;
        $app->company_address = $request->company_address;
        $app->direct_line = $request->direct_line;
        $app->company_email = $request->company_email;
        $app->company_tax_number = $request->company_tax_number;
        $app->company_reg_number = $request->company_reg_number;
        $app->company_reg_date = $request->company_reg_date;
        $app->settlement_bank = $request->settlement_bank;
        $app->settlement_bank_account_number = $request->settlement_bank_account_number;
        $app->lei_code = $request->lei_code;
        $app->switt_code = $request->switt_code;
        $app->max_step_completed = max((int) ($app->max_step_completed ?? 0), 1);
        $app->save();

        return redirect()->route('external.onboarding.step2.edit', $app->id)
            ->with('success', 'Participant Details saved successfully.');
    }

    public function form_one_edit($id)
    {
        $application = $this->loadEditableApplication($id, 1);
        $displayEligibility = $this->displayEligibilityForUserOrApp($application);
        $activeStep = 1;
        $maxStepCompleted = (int) ($application->max_step_completed ?? 1);
        $form_1_edit = $application;

        return view('external.form1_edit', compact(
            'form_1_edit',
            'application',
            'displayEligibility',
            'activeStep',
            'maxStepCompleted'
        ));
    }

    public function form_step_one_update(Request $request, $id)
    {
        $app = $this->loadEditableApplication($id, 1);

        $request->validate([
            'institution_name' => 'required|string|max:255',
            'company_address' => 'required|string|max:255',
            'direct_line' => 'required|string|max:50',
            'company_email' => 'required|email|max:255',
            'company_tax_number' => 'required|string|max:255',
            'company_reg_number' => 'required|string|max:255',
            'company_reg_date' => 'required|string|max:50',
            'settlement_bank' => 'required|string|max:255',
            'settlement_bank_account_number' => 'required|string|max:50',
            'lei_code' => 'nullable|string|max:255',
            'switt_code' => 'nullable|string|max:255',
        ]);

        $app->institution_name = $request->institution_name;
        $app->company_address = $request->company_address;
        $app->direct_line = $request->direct_line;
        $app->company_email = $request->company_email;
        $app->company_tax_number = $request->company_tax_number;
        $app->company_reg_number = $request->company_reg_number;
        $app->company_reg_date = $request->company_reg_date;
        $app->settlement_bank = $request->settlement_bank;
        $app->settlement_bank_account_number = $request->settlement_bank_account_number;
        $app->lei_code = $request->lei_code;
        $app->switt_code = $request->switt_code;
        $app->max_step_completed = max((int) ($app->max_step_completed ?? 0), 1);
        $app->save();

        return redirect()->route('external.onboarding.step2.edit', $app->id);
    }

    // ==================== STEP 2: PRINCIPAL OFFICER(S) DETAILS ====================

    public function form_two_edit($id)
    {
        $application = $this->loadEditableApplication($id, 2);
        $displayEligibility = $this->displayEligibilityForUserOrApp($application);
        $activeStep = 2;
        $maxStepCompleted = (int) ($application->max_step_completed ?? 1);
        $form_2_edit = $application;

        return view('external.form2_edit', compact(
            'form_2_edit',
            'application',
            'displayEligibility',
            'activeStep',
            'maxStepCompleted'
        ));
    }

    public function form_step_two(Request $request, $id)
    {
        $app = $this->loadEditableApplication($id, 2);

        $rules = [
            // Principal Officer 1 (Required)
            'managing_director_name' => 'required|string|max:255',
            'managing_director_phone' => 'required|string|max:50',
            'managing_director_email' => 'required|email|max:255',
            'managing_director_bvn' => 'required|string|max:50',
            'managing_director_nin' => 'required|string|max:50',
            'means_of_identification1' => ($app->means_of_identification1 ? 'nullable' : 'required') . '|file|mimes:pdf|max:5120',
            'nin_slip1' => ($app->nin_slip1 ? 'nullable' : 'required') . '|file|mimes:pdf|max:5120',
            'data_consent1' => ($app->data_consent1 ? 'nullable' : 'required') . '|file|mimes:pdf|max:5120',

            // Principal Officer 2 (Required)
            'principal_director_name1' => 'required|string|max:255',
            'principal_director_designation1' => 'required|string|max:255',
            'principal_director_phone1' => 'required|string|max:50',
            'principal_director_email1' => 'required|email|max:255',
            'principal_director_bvn1' => 'required|string|max:50',
            'principal_director_nin1' => 'required|string|max:50',
            'means_of_identification2' => ($app->means_of_identification2 ? 'nullable' : 'required') . '|file|mimes:pdf|max:5120',
            'nin_slip2' => ($app->nin_slip2 ? 'nullable' : 'required') . '|file|mimes:pdf|max:5120',
            'data_consent2' => ($app->data_consent2 ? 'nullable' : 'required') . '|file|mimes:pdf|max:5120',

            // Principal Officer 3 (Optional)
            'principal_director_name2' => 'nullable|string|max:255',
            'principal_director_designation2' => 'nullable|string|max:255',
            'principal_director_phone2' => 'nullable|string|max:50',
            'principal_director_email2' => 'nullable|email|max:255',
            'principal_director_bvn2' => 'nullable|string|max:50',
            'principal_director_nin2' => 'nullable|string|max:50',
            'means_of_identification3' => 'nullable|file|mimes:pdf|max:5120',
            'nin_slip3' => 'nullable|file|mimes:pdf|max:5120',
            'data_consent3' => 'nullable|file|mimes:pdf|max:5120',

            // Principal Officer 4 / Compliance Officer (Required)
            'compliance_director_name' => 'required|string|max:255',
            'compliance_director_phone' => 'required|string|max:50',
            'compliance_director_email' => 'required|email|max:255',
            'compliance_director_bvn' => 'required|string|max:50',
            'compliance_director_nin' => 'required|string|max:50',
            'means_of_identification4' => ($app->means_of_identification4 ? 'nullable' : 'required') . '|file|mimes:pdf|max:5120',
            'nin_slip4' => ($app->nin_slip4 ? 'nullable' : 'required') . '|file|mimes:pdf|max:5120',
            'data_consent4' => ($app->data_consent4 ? 'nullable' : 'required') . '|file|mimes:pdf|max:5120',
        ];

        $request->validate($rules);

        $app->managing_director_name = $request->managing_director_name;
        $app->managing_director_phone = $request->managing_director_phone;
        $app->managing_director_email = $request->managing_director_email;
        $app->managing_director_bvn = $request->managing_director_bvn;
        $app->managing_director_nin = $request->managing_director_nin;

        $app->principal_director_name1 = $request->principal_director_name1;
        $app->principal_director_designation1 = $request->principal_director_designation1;
        $app->principal_director_phone1 = $request->principal_director_phone1;
        $app->principal_director_email1 = $request->principal_director_email1;
        $app->principal_director_bvn1 = $request->principal_director_bvn1;
        $app->principal_director_nin1 = $request->principal_director_nin1;

        $app->principal_director_name2 = $request->principal_director_name2;
        $app->principal_director_designation2 = $request->principal_director_designation2;
        $app->principal_director_phone2 = $request->principal_director_phone2;
        $app->principal_director_email2 = $request->principal_director_email2;
        $app->principal_director_bvn2 = $request->principal_director_bvn2;
        $app->principal_director_nin2 = $request->principal_director_nin2;

        $app->compliance_director_name = $request->compliance_director_name;
        $app->compliance_director_phone = $request->compliance_director_phone;
        $app->compliance_director_email = $request->compliance_director_email;
        $app->compliance_director_bvn = $request->compliance_director_bvn;
        $app->compliance_director_nin = $request->compliance_director_nin;

        $this->storePdfUploads($request, $app, [
            'means_of_identification1', 'nin_slip1', 'data_consent1',
            'means_of_identification2', 'nin_slip2', 'data_consent2',
            'means_of_identification3', 'nin_slip3', 'data_consent3',
            'means_of_identification4', 'nin_slip4', 'data_consent4',
        ]);

        if ((int) $app->approval_status < MemberOnboarding::STATUS_STEP2) {
            $app->approval_status = MemberOnboarding::STATUS_STEP2;
        }
        $app->max_step_completed = max((int) ($app->max_step_completed ?? 0), 2);
        $app->save();

        return redirect()->route('external.onboarding.step3.edit', $app->id);
    }

    // ==================== STEP 3: CORRESPONDENCE EMAIL ADDRESS ====================

    public function form_cores_edit($id)
    {
        $application = $this->loadEditableApplication($id, 3);
        $displayEligibility = $this->displayEligibilityForUserOrApp($application);
        $activeStep = 3;
        $maxStepCompleted = (int) ($application->max_step_completed ?? 2);
        $cosemail = $application;

        return view('external.formcosemail_edit', compact(
            'cosemail',
            'application',
            'displayEligibility',
            'activeStep',
            'maxStepCompleted'
        ));
    }

    public function form_cores_post(Request $request, $id)
    {
        $app = $this->loadEditableApplication($id, 3);

        $validator = Validator::make($request->all(), [
            'general_correspondence_email' => 'required|string',
            'operations_team_email' => 'required|string',
            'other_groups_email' => 'required|string',
        ]);

        $validator->after(function ($v) use ($request) {
            $fields = [
                'general_correspondence_email' => 'General Correspondence',
                'operations_team_email' => 'Operations Team/Group',
                'other_groups_email' => 'Other Groups',
            ];
            foreach ($fields as $key => $label) {
                $raw = trim((string) $request->input($key));
                if ($raw === '') {
                    continue;
                }
                $emails = array_filter(array_map('trim', explode(',', $raw)), function ($e) {
                    return $e !== '';
                });
                if (empty($emails)) {
                    $v->errors()->add($key, "Please provide at least one valid email address for {$label}.");
                    continue;
                }
                foreach ($emails as $email) {
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $v->errors()->add($key, "Invalid email address '{$email}' in {$label}. Separate multiple emails with commas.");
                    }
                }
            }
        });

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $app->general_correspondence_email = $request->general_correspondence_email;
        $app->operations_team_email = $request->operations_team_email;
        $app->other_groups_email = $request->other_groups_email;

        if ((int) $app->approval_status < MemberOnboarding::STATUS_STEP3) {
            $app->approval_status = MemberOnboarding::STATUS_STEP3;
        }
        $app->max_step_completed = max((int) ($app->max_step_completed ?? 0), 3);
        $app->save();

        return redirect()->route('external.onboarding.step4.edit', $app->id);
    }

    // ==================== STEP 4: COMPANY DOCUMENTS ====================

    public function form_three_edit($id)
    {
        $application = $this->loadEditableApplication($id, 4);
        $displayEligibility = $this->displayEligibilityForUserOrApp($application);
        $activeStep = 4;
        $maxStepCompleted = (int) ($application->max_step_completed ?? 3);
        $form_3 = $application;

        return view('external.form3_edit', compact(
            'form_3',
            'application',
            'displayEligibility',
            'activeStep',
            'maxStepCompleted'
        ));
    }

    public function form_step_three(Request $request, $id)
    {
        $app = $this->loadEditableApplication($id, 4);

        $request->validate([
            'memorandumand_articles_of_association' => ($app->memorandumand_articles_of_association ? 'nullable' : 'required') . '|file|mimes:pdf|max:5120',
            'board_resolution' => ($app->board_resolution ? 'nullable' : 'required') . '|file|mimes:pdf|max:5120',
            'certificate_of_incorporation' => ($app->certificate_of_incorporation ? 'nullable' : 'required') . '|file|mimes:pdf|max:5120',
            'particulars_of_directors' => ($app->particulars_of_directors ? 'nullable' : 'required') . '|file|mimes:pdf|max:5120',
            'particulars_of_shareholders' => 'nullable|file|mimes:pdf|max:5120',
            'evidence_of_securities_and_exchange_commission' => ($app->evidence_of_securities_and_exchange_commission ? 'nullable' : 'required') . '|file|mimes:pdf|max:5120',
            'evidence_of_sec_renewal' => ($app->evidence_of_sec_renewal ? 'nullable' : 'required') . '|file|mimes:pdf|max:5120',
            'evidence_of_trading_exchange_license' => 'nullable|file|mimes:pdf|max:5120',
            'evidence_of_registration_from_regulatory' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $this->storePdfUploads($request, $app, [
            'memorandumand_articles_of_association',
            'board_resolution',
            'certificate_of_incorporation',
            'particulars_of_directors',
            'particulars_of_shareholders',
            'evidence_of_securities_and_exchange_commission',
            'evidence_of_sec_renewal',
            'evidence_of_trading_exchange_license',
            'evidence_of_registration_from_regulatory',
        ]);

        if ((int) $app->approval_status < MemberOnboarding::STATUS_STEP4) {
            $app->approval_status = MemberOnboarding::STATUS_STEP4;
        }
        $app->max_step_completed = max((int) ($app->max_step_completed ?? 0), 4);
        $app->save();

        return redirect()->route('external.onboarding.step5.edit', $app->id);
    }

    // ==================== STEP 5: SIGNATURE MANDATE AND DECLARATION ====================

    public function form_four($id)
    {
        $application = $this->loadEditableApplication($id, 5);
        $displayEligibility = $this->displayEligibilityForUserOrApp($application);
        $activeStep = 5;
        $maxStepCompleted = (int) ($application->max_step_completed ?? 4);
        $form_4 = $application;

        return view('external.form4', compact(
            'form_4',
            'application',
            'displayEligibility',
            'activeStep',
            'maxStepCompleted'
        ));
    }

    public function form_step_four(Request $request, $id)
    {
        $app = $this->loadEditableApplication($id, 5);

        $request->validate([
            'signature_mandate_form' => ($app->signature_mandate_form ? 'nullable' : 'required') . '|file|mimes:pdf|max:5120',
            'declaration_form' => ($app->declaration_form ? 'nullable' : 'required') . '|file|mimes:pdf|max:5120',
        ]);

        $this->storePdfUploads($request, $app, [
            'signature_mandate_form',
            'declaration_form',
        ]);

        if ((int) $app->approval_status < MemberOnboarding::STATUS_STEP5 && (int) $app->approval_status !== MemberOnboarding::STATUS_REJECTED) {
            $app->approval_status = MemberOnboarding::STATUS_STEP5;
        }
        $app->max_step_completed = max((int) ($app->max_step_completed ?? 0), 5);
        $app->save();

        return redirect()->route('external.onboarding.step6.edit', $app->id);
    }

    // ==================== STEP 6: DEFERRAL REQUEST & FINAL SUBMIT ====================

    public function form_six($id)
    {
        $application = $this->loadEditableApplication($id, 6);
        $displayEligibility = $this->displayEligibilityForUserOrApp($application);
        $activeStep = 6;
        $maxStepCompleted = (int) ($application->max_step_completed ?? 5);

        return view('external.form6', compact(
            'application',
            'displayEligibility',
            'activeStep',
            'maxStepCompleted'
        ));
    }

    public function form_step_six(Request $request, $id)
    {
        $app = $this->loadEditableApplication($id, 6);

        $request->validate([
            'deferral_request_doc' => 'nullable|file|mimes:pdf|max:5120',
            'certified_correct' => 'accepted',
        ], [
            'certified_correct.accepted' => 'You must certify that all information entered is correct before submitting.',
        ]);

        $this->storePdfUploads($request, $app, ['deferral_request_doc']);

        $isMegResubmission = ($app->rejected_by_role === 'MEG');

        $app->certified_correct = true;
        $app->submitted_at = now()->format('Y-m-d H:i:s');
        $app->max_step_completed = 6;
        $app->approval_status = $isMegResubmission
            ? MemberOnboarding::STATUS_DSD_APPROVED
            : MemberOnboarding::STATUS_SUBMITTED;
        $app->rejected_by_role = null;
        $app->save();

        $monitor = AppMonitor::where('app_code', $app->app_code)->first();
        if (!$monitor) {
            $monitor = new AppMonitor();
            $monitor->app_code = $app->app_code;
        }
        $monitor->app_status = (string) $app->approval_status;
        $monitor->app_time = now()->format('d-m-Y H:i:s');
        $monitor->save();

        $appStatus = new ApplicationStatus();
        $appStatus->status = (string) $app->approval_status;
        $appStatus->app_code = $app->app_code;
        $appStatus->user_id = (string) Auth::id();
        $appStatus->note = $isMegResubmission ? 'Resubmitted to MEG after update' : 'Application submitted by participant';
        $appStatus->save();

        // Send notifications safely (never crash submission if SMTP isn't reachable locally)
        try {
            $targetGroupName = $isMegResubmission ? 'MEG' : 'DSD';
            $group = Group::where('name', $targetGroupName)->first();
            if ($group && $group->email) {
                Mail::send('emails.dsdapp_notify', [
                    'email' => $group->email,
                    'institution' => $app->institution_name,
                    'subject' => 'Account Opening - ' . $app->institution_name,
                ], function ($message) use ($group, $app) {
                    $message->to($group->email, $app->institution_name)
                        ->subject('Account Opening - ' . $app->institution_name)
                        ->from(config('mail.from.address'), config('mail.from.name'));
                });
            }

            if ($app->user_email) {
                Mail::send('emails.submission_confirmation', [
                    'name' => $app->user_name,
                    'institution' => $app->institution_name,
                    'app_code' => $app->app_code,
                    'view_url' => route('external.application.show', $app->id),
                ], function ($message) use ($app) {
                    $message->to($app->user_email)
                        ->subject('Application Submitted - ' . $app->institution_name)
                        ->from(config('mail.from.address'), config('mail.from.name'));
                });
            }
        } catch (\Throwable $e) {
            \Log::warning('Notification email failed on submission: ' . $e->getMessage());
        }

        return redirect()->route('external.application.show', $app->id)
            ->with('show_submission_modal', true)
            ->with('success', 'Your application has been submitted and is under review.');
    }

    // ==================== READ-ONLY VIEW OF SUBMITTED APPLICATION ====================

    public function viewApplication($id)
    {
        $application = MemberOnboarding::findOrFail($id);
        if ((int) $application->user_id !== (int) Auth::id()) {
            abort(403, 'Unauthorized access to application.');
        }
        $displayEligibility = $this->displayEligibilityForUserOrApp($application);

        return view('external.application_view', compact('application', 'displayEligibility'));
    }
}
