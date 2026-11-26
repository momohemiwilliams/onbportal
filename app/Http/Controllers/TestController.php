<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use Mail;
use Carbon\Carbon;
use App\Models\User;
use App\Models\LoginCount;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function forgetpassword()
    {
        return view('auth.forgetPassword');
    }


    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $user_details = User::where('email', $request->email)->first();



        // email data
        $email_data = array(
            'token' => $token,
            'email' => $request->email,
            'user_name' => $user_details->name

        );


        Mail::send('emails.forgetpassword', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'])
                ->subject('Reset Password')
                ->from(config('mail.from.address'), config('mail.from.name'));
        });


        return back()->with('message', 'We have e-mailed your password reset link!');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token)
    {
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    // public function submitResetPasswordForm(Request $request)

    // {


    //     $request->validate([
    //         'email' => 'required|email|exists:users',
    //         'password' => [
    //             'required',
    //             'string',
    //             'confirmed',
    //             'min:8',             // must be at least 10 characters in length
    //             'regex:/[a-z]/',      // must contain at least one lowercase letter
    //             'regex:/[A-Z]/',      // must contain at least one uppercase letter
    //              'regex:/[0-9]/',      // must contain at least one digit
    //             // 'regex:/[@$!%*#?&]/', // must contain a special character
    //         ],
    //         // 'password' => 'required|string|min:6|confirmed',
    //         'password_confirmation' => 'required'
    //     ]);

    //     $updatePassword = DB::table('password_resets')
    //                         ->where([
    //                           'email' => $request->email, 
    //                           'token' => $request->token
    //                         ])
    //                         ->first();

    //     if(!$updatePassword){
    //         return back()->withInput()->with('error', 'Invalid token!');
    //     }



    //     $user = User::where('email', $request->email)
    //                 ->update(['password' => Hash::make($request->password)]);

    //     DB::table('password_resets')->where(['email'=> $request->email])->delete();

    //     // email data
    //     // $email_data = array(

    //     //     'email' => $request->email

    //     //     );


    //     //     Mail::send('emails.passwordresetsuccess', $email_data, function ($message) use ($email_data) {
    //     //     $message->to($email_data['email'])
    //     //     ->subject('Reset Password')
    //     //     ->from('no-reply@fmdqgroup.com', 'FMDQ Depository Participant Onboarding Portal');
    //     //     });

    //     return redirect('/login')->with('success', 'Your password has been changed!');
    // }



    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'password' => [
                'required',
                'string',
                'confirmed',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@.$!%*#?&]/',
            ],
            'password_confirmation' => 'required'
        ], [
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a string.',
            'password.confirmed' => 'The passwords do not match.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.regex' => 'The password must include uppercase, lowercase, numeric, and special characters.',
            'password_confirmation.required' => 'Please confirm your password.'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where('token', $request->token)
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->withErrors('Invalid or expired reset token.');
        }

        $email = $updatePassword->email;
        $user = User::where('email', $email)->first();
        if (!$user) {
            return back()->withInput()->withErrors('User not found.');
        }

        // Check if the new password is in any of the last 10 used passwords
        $loginCount =  LoginCount::orderby('id', 'DESC')->first();
        $pastPasswords = $user->passwordHistories()->latest()->take($loginCount->login_history_count)->pluck('password');
        foreach ($pastPasswords as $pastPassword) {
            if (Hash::check($request->password, $pastPassword)) {
                return back()->withErrors(['password' => 'You cannot reuse the password.']);
            }
        }

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->password_changed_at = now();
        // Reset lockout info
        $user->lockout_time = null;  // Assuming this is the column to track lockout time
        $user->failed_logins = 0;    // Reset failed login attempt count
        $user->save();

        // Add the new password to the history
        $user->passwordHistories()->create(['password' => $user->password]);

        // Delete the password reset record
        DB::table('password_resets')->where(['email' => $email])->delete();

        return redirect('/login')->with('success', 'Password changed successfully.');
    }

    public function newlog()
    {
        return view('auth.newlog');
    }
}
