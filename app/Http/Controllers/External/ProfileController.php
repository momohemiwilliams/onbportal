<?php

namespace App\Http\Controllers\External;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }


    public function index()
    {
        return view('external.profile');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
        ]);

        $user = Auth::user();
        $user->name = trim($validated['name']);
        $user->phone = trim($validated['phone']);
        $user->save();

        return redirect()->back()->with('success', 'Personal information updated successfully.');
    }

    public function profilepasssword()
    {
        return view('external.profile_password');
    }

    public function userpasswordupdate(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string'],
            'new_password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
            ],
        ], [
            'new_password.confirmed' => 'New password and confirmation do not match.',
            'new_password.regex' => 'New password must include uppercase, lowercase, and a number.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Your current password does not match.');
        }

        if (strcmp($request->password, $request->new_password) === 0) {
            return redirect()->back()->with('error', 'New password cannot be the same as your current password.');
        }

        $user->password = Hash::make($request->new_password);
        $user->password_changed_at = now();
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}
