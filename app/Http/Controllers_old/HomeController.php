<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\MemberOnboarding;
use App\Models\ApplicationStatus;
use App\Models\AppMonitor;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {

    //return "here";

    // $date = date('Y-m-d');

    // $date = Carbon::createFromFormat('m/d/Y', $date)->addMonth();

    // $newDate = $date->format('m/d/Y');

    // dd($newDate);


    // $users = User::where('isSignupCompleted', false)->get();

    // foeach($users as $user){
    //     $signupDate = Carbon::parse($user->created_at);
    //     $now = Carbon::now();
    //     $diff = $signupDate->diffInDays($now);

    //     if($diff == 30){
    //         // Send mail
    //     }
    // }




    //  $notcomplete = MemberOnboarding::where('approval_status','<', 5)->get();

    // foreach($notcomplete as $notcom){
    //     $signupDate = Carbon::parse($notcom->created_at);
    //     $now = Carbon::now();
    //      $diff = $signupDate->diffInDays($now);

    //     $note = 'Not Completed';
    //     if($diff % 30){
    //       $email_data = array(
    //         //'email' =>'kenneth.ichenwo@fmdqgroup.com',
    //         'user_email' => $notcom->user_email,
    //         'user_name' => $notcom->user_name,
    //         'institution' =>$notcom->institution_name,
    //         'note' =>$note
    //         );

    //         Mail::send('emails.dsdapp_notify_reject', $email_data, function ($message) use ($email_data) {
    //         $message->to($email_data['user_email'])
    //         ->subject('Account Opening')
    //         ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');
    //         });
    //     }
    // }






    $usertype =  Auth::user()->usertype;

    if ($usertype =  Auth::user()->usertype == 'external') {
      return redirect(route('external.dashboard'));
    }

    $onboarding = MemberOnboarding::orderBy('created_at', 'desc')->get();

    $countall = MemberOnboarding::all()->count();

    $completeapp = MemberOnboarding::select("*")->where('approval_status', 5)->select('approval_status')->first();
    $countsubmission = MemberOnboarding::all()->where('approval_status', 5)->count();


    $dsdapproval = MemberOnboarding::select("*")->where('approval_status', 6)->select('approval_status')->first();
    $countdsdapproval = MemberOnboarding::all()->where('approval_status', 6)->count();


    $megapproval = MemberOnboarding::select("*")->where('approval_status', 7)->select('approval_status')->first();
    $countmegapproval = MemberOnboarding::all()->where('approval_status', 7)->count();



    $dodapproval = MemberOnboarding::select("*")->where('approval_status', 8)->select('approval_status')->first();
    $dodapprovalcoount = MemberOnboarding::all()->where('approval_status', 8)->count();


    $verifiedapplication = MemberOnboarding::select('approval_status')->where('approval_status', '=', 10)->first();
    $verifiedapplicationcoount = MemberOnboarding::all()->where('approval_status', '=', 10)->count();




    // $product = MemberOnboarding::select("*")->where('approval_status', 5)->select('approval_status')->first();
    // return $countsubmission = MemberOnboarding::all()->where('approval_status', 5)->count();

    // return $wordCount = $product->count();




    // $wordlist = MemberOnboarding::where('approval_status', '5')->get();   
    // return $wordCount = $wordlist->count();


    //$dsdapproval = MemberOnboarding::all()->where('approval_status', 6)->count();
    //$megapproval = MemberOnboarding::all()->where('approval_status', 7)->count();
    //$dodapproval= MemberOnboarding::all()->where('approval_status', 8)->count();
    //$verifiedapplication= MemberOnboarding::all()->where('approval_status', '=>', 8)->count();

    //$formstatus = ApplicationStatus::select('*')->distinct()->get();
    $formstatus = AppMonitor::select('*')->distinct()->limit(10)->get();


    //    $formstatus =ApplicationStatus::orderBy('created_at', 'desc')

    //  ->distinct()->get();


    // return  $tradedsecurities =  DB::connection('sqlsrv')->table('ApplicationStatus')
    //  ->join('OnboardingFormsTemp', 'ApplicationStatus.app_code', '=', 'OnboardingFormsTemp.app_code')
    //  ->select('ApplicationStatus.app_code','ApplicationStatus.status', 'OnboardingFormsTemp.app_code')
    // //  ->selectRaw("SUM(tblTransaction.FaceValue) as Value")
    // //  ->selectRaw("COUNT(*) as count")
    // //  ->orderBy('count', 'desc')
    //  ->groupBy('ApplicationStatus.app_code', 'ApplicationStatus.status','OnboardingFormsTemp.app_code')
    // //  ->limit($topsecurityCount)
    // //  ->whereBetween('tblTransaction.DealDate', [$datefrom,$dateto])
    //  ->get();



    //return view('internal.dashboard');
    return view('home', compact('onboarding', 'countall', 'completeapp', 'countsubmission', 'countdsdapproval', 'countmegapproval', 'dsdapproval', 'megapproval', 'dodapproval', 'dodapprovalcoount', 'verifiedapplication', 'formstatus', 'verifiedapplicationcoount'));
  }
}
