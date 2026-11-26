<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\ApplicationStatus;
use App\Models\ApprovalDocs;
use App\Models\MemberOnboarding;
use App\Models\RejectlDocs;

class FormController extends Controller
{
    public function participants()
    {
        $eligibilityforms = MemberOnboarding::orderBy('created_at', 'desc')->get();
        return view('applications.participants', compact('eligibilityforms'));
    }

    public function participant($app_code)
    {
        $eligibilityform = MemberOnboarding::where('app_code', $app_code)->firstOrFail();
        $formstatus = ApplicationStatus::where('app_code', $app_code)->orderBy('created_at', 'desc')->first();
        $meg_approval = ApprovalDocs::where('app_code', $app_code)->latest('id')->first();
        $meg_reject = RejectlDocs::where('app_code', $app_code)->latest('id')->first();

        return view('applications.participant', compact('eligibilityform', 'formstatus', 'meg_approval', 'meg_reject'));
    }
}
