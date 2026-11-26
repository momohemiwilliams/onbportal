<?php

namespace App\Http\Controllers\Internal;
use App\Http\Controllers\Controller;
use App\Models\MemberOnboarding;
use Illuminate\Http\Request;

class DashboardController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }

  public function index() {
    return  $onboarding = MemberOnboarding::all();
      $countall = MemberOnboarding::all()->count();
      $countpending = MemberOnboarding::all()->where('approval_status', 0)->count();
      $countsubmission = MemberOnboarding::all()->where('approval_status', 1)->count();
      $countawaitingapproval = MemberOnboarding::all()->where('approval_status', 2)->count();
      $countverified = MemberOnboarding::all()->where('approval_status', 5)->count();
      $countrejected= MemberOnboarding::all()->where('approval_status', 6)->count();

    //return view('internal.dashboard');
    return view('internal.dashboard', compact('onboarding','countall','countpending','countsubmission','countawaitingapproval','countverified', 'countrejected'));
  }
}








