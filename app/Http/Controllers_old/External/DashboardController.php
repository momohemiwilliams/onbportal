<?php

namespace App\Http\Controllers\External;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MemberOnboarding;
use App\Http\Controllers\Controller;
use App\Models\PrivateAccountOnform;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }
  public function index() {
       $id = Auth::User()->id;
       $userdata = User::all()->where('id', $id)->first();
    

    
       $eligibility_type = trim($userdata->eligibility_type);
      
      if($eligibility_type == 'Private Account'){

          $eligibility_type;
        return view('PrivateAccount.dashboard',compact('eligibility_type','id') );

      }if($eligibility_type == 'Settlement Banks'){

        $eligibility_type;
        return view('SettlementBanks.dashboard',compact('eligibility_type','id') );

      }


      if($eligibility_type == 'Non-Capital Market Operator - Corporate'){

        
  
    

      // return $userdda = MemberOnboarding::where('eligibility_type', $eligibility_type)->where('user_id', $id)->first();
   
   

      //  return $eligibility_type;
        return view('NonCapital.dashboard',compact('eligibility_type','id') );

      }


      if($eligibility_type == 'Capital Market Operator'){

        $eligibility_type;
        return view('external.dashboard',compact('eligibility_type','id') );

      }


      

        //return $user_info;
        return view('external.dashboard',compact('eligibility_type','id'));
      }
}







