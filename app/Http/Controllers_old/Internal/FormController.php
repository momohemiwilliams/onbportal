<?php

namespace App\Http\Controllers\Internal;

use App\Models\RejectlDocs;
use App\Models\ApprovalDocs;
use Illuminate\Http\Request;
use App\Models\MemberOnboarding;
use App\Models\ApplicationStatus;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function participants()
    {
       
         $eligibilityforms = MemberOnboarding::all();

        return view('applications.participants', compact('eligibilityforms'));
    }




    public function participant($app_code)
    {

  
       $eligibilityform = MemberOnboarding::all()->where('app_code', $app_code)->first();
       $eligibility_type = trim($eligibilityform->eligibility_type);
       if($eligibility_type == 'Non-Capital Market Operator - Corporate')
       {
          

            $formstatus =ApplicationStatus::orderBy('created_at', 'desc')->where('app_code', $app_code)->first();
            $meg_approval = ApprovalDocs::where('app_code', $app_code)->first();
            $meg_reject = RejectlDocs::where('app_code', $app_code)->first();
              
            
              return view('applications.corporate_account', compact('eligibilityform','formstatus', 'meg_approval','meg_reject'));
       }

       if($eligibilityform->eligibility_type == 'Capital Market Operator')
       {
            //return 'Capital Market Operator';

            $formstatus =ApplicationStatus::orderBy('created_at', 'desc')->where('app_code', $app_code)->first();
            $meg_approval = ApprovalDocs::where('app_code', $app_code)->first();
            $meg_reject = RejectlDocs::where('app_code', $app_code)->first();
              
            
              return view('applications.participant', compact('eligibilityform','formstatus', 'meg_approval','meg_reject'));
       }



       if($eligibilityform->eligibility_type == 'Private Account')
       {
            //return 'Private Account';


            $formstatus =ApplicationStatus::orderBy('created_at', 'desc')->where('app_code', $app_code)->first();
            $meg_approval = ApprovalDocs::where('app_code', $app_code)->first();
            $meg_reject = RejectlDocs::where('app_code', $app_code)->first();
              
            
              return view('applications.private_account', compact('eligibilityform','formstatus', 'meg_approval','meg_reject'));
       }


       if($eligibilityform->eligibility_type == 'Settlement Banks')
       {
            //return 'Settlement Banks';
          

            $formstatus =ApplicationStatus::orderBy('created_at', 'desc')->where('app_code', $app_code)->first();
            $meg_approval = ApprovalDocs::where('app_code', $app_code)->first();
            $meg_reject = RejectlDocs::where('app_code', $app_code)->first();
              
            
              return view('applications.settlement_bank', compact('eligibilityform','formstatus', 'meg_approval','meg_reject'));
       }
      
    
    }
}
