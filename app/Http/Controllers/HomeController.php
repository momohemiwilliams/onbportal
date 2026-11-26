<?php

namespace App\Http\Controllers;

use App\Models\MemberOnboarding;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Redirect authenticated users to their respective dashboard.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->isExternal()) {
            return redirect()->route('external.dashboard');
        }

        return redirect()->route('internal.dashboard');
    }
}
