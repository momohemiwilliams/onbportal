<?php

namespace App\Http\Controllers\External;

use App\Http\Controllers\Controller;
use App\Models\MemberOnboarding;
use App\Models\RejectlDocs;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::user()->id;
        $user = Auth::user();
        $eligibility_type = trim((string) $user->eligibility_type);
        $application = MemberOnboarding::where('user_id', $id)->latest('id')->first();
        $rejectionDoc = $application ? RejectlDocs::where('app_code', $application->app_code)->latest('id')->first() : null;

        return view('external.dashboard', compact('eligibility_type', 'id', 'user', 'application', 'rejectionDoc'));
    }
}
