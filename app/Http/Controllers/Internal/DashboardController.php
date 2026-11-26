<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\MemberOnboarding;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the role-specific internal dashboard and application metrics.
     */
    public function index()
    {
        $roleView = Auth::user()->internalGroupCode();
        $onboarding = MemberOnboarding::forInternalRole($roleView)
            ->orderBy('created_at', 'desc')
            ->get();
        $metrics = MemberOnboarding::metricsForRole($roleView);

        return view('internal.dashboard', compact('onboarding', 'metrics', 'roleView'));
    }
}
