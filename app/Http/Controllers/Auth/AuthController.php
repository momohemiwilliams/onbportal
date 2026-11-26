<?php

namespace App\Http\Controllers\Auth;



use Hash;

use Session;

use Carbon\Carbon;

use App\Models\User;

use App\Mail\VerifyEmail;

use App\Models\LoginCount;
use App\Models\VerifyUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MemberOnboarding;
use App\Http\Controllers\Controller;
use App\Models\PrivateAccountOnform;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Services\OtpService;



class AuthController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */

    protected $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function login()
    {
        return view('auth.login');
    }

    // public function validateLogin(Request $request)
    // {


    //     //return $request;
    //     $this->validate($request, [
    //         'email' => ['required'],
    //         'password' => ['required'],



    //     ]);


    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //         if (Auth::user()->email_verified_at == null && Auth::user()->usertype == 'external') {
    //             Auth::logout();
    //             return \redirect(route('login'))->with('error', 'Please verify your email to continue');
    //         }
    //         $usertype = Auth::user()->usertype;
    //         switch ($usertype) {
    //             case 'internal':
    //                 // return  "here"; //redirect(route('internal.dashboard')); 
    //                 return  redirect(route('internal.dashboard'));
    //                 break;
    //             case 'external':


    //                 return   redirect(route('external.dashboard'));
    //                 break;

    //             default:
    //                 return redirect(route('internal.dashboard'));
    //                 break;
    //         }
    //         //Auth::user()->usertype;

    //         //return \redirect(route('home'))->with('success', 'Logged In Successfully');
    //     } else {
    //         return redirect()->back()->with('error', 'Incorrect email or password');
    //     }
    // }











    public function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Invalid email or password.');
        }

        // Check if the user's email is not verified
        if ($user->usertype === 'external' && $user->email_verified_at === null) {
            return redirect(route('login'))
                ->withInput($request->only('email'))
                ->with('unverified_email', $user->email)
                ->with('error', 'Please verify your email to continue.');
        }

        // Check if the account is locked out
        if ($user->lockout_time) {
            return back()->with('error', 'Your account has been locked. Please reset your password.');
        }

        if (Hash::check($request->password, $user->password)) {
            // Check if the password needs to be changed due to expiration
            $loginCount = LoginCount::orderby('id', 'DESC')->first();
            if ($user->password_changed_at && now()->diffInDays($user->password_changed_at) >= $loginCount->password_age) {
                session(['user_email_for_password_change' => $user->email]);
                return redirect(route('auth.password.change.form'))->with('error', 'Your password has expired, kindly reset your password.');
            }

            // Auth::login($user);

            if (env('OTP_ENABLED', true)) {
                // Generate OTP
                $otpResponse = $this->otpService->generateOtp($user);

                // Log the response for debugging (can be removed later)
                \Log::info('AuthController OTP Response: ', $otpResponse);

                // Check for success based on the actual API response structure: {"success":true, "status":"generated", ...}
                if ((isset($otpResponse['success']) && $otpResponse['success'] == true) || 
                    (isset($otpResponse['status']) && $otpResponse['status'] === 'generated')) {
                     session(['otp_user_id' => $user->id]);
                     return redirect()->route('auth.otp.verify.form');
                } else {
                     return back()->with('error', 'Failed to generate OTP. Please try again.');
                }
            } else {
                Auth::login($user);
                
                // Redirect based on user type
                switch ($user->usertype) {
                    case 'internal':
                        return redirect(route('internal.dashboard'));
                    case 'external':
                        return redirect(route('external.dashboard'));
                    default:
                        return redirect(route('internal.dashboard')); // Fallback if usertype isn't recognized
                }
            }
        } else {
            // Increment failed login attempts
            $user->failed_logins += 1;
            $loginCount = LoginCount::orderby('id', 'DESC')->first();

            if ($user->failed_logins >= $loginCount->login_count) {
                // Lock the account
                $user->lockout_time = now();
                $user->save();
                session(['user_email_for_password_change' => $user->email]);
                return back()->with('error', 'Your account has been locked. Please reset your password.');
            }

            $user->save();
            return back()->with('error', 'Incorrect email or password.');
        }
    }








    public function home()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegistration(Request $request)
    {
        //return $request;
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => ['required', 'string', 'min:6'],
            'phone' => ['required'],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@.$!%*#?&]/',
            ],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'institution_id' => $request->institution_id,
            'usertype' => $request->usertype,
            'password' => bcrypt($request->password),
        ]);



        VerifyUser::create([
            'token' => Str::random(60),
            'user_id' => $user->id,
        ]);

        try {
            Mail::to($user->email)->send(new VerifyEmail($user));
        } catch (\Throwable $e) {
            \Log::warning('Verification email failed on registration: ' . $e->getMessage());
            return \redirect()->route('login')
                ->with('unverified_email', $user->email)
                ->with('warning', 'Account created, but we could not send the verification email. You can resend it below.');
        }

        return \redirect()->route('login')->with('success', 'Please click on the link sent to your email');
    }

    public function verifyEmail($token)
    {
        $verifiedUser = VerifyUser::where('token', $token)->first();
        if (isset($verifiedUser)) {
            $user = $verifiedUser->user;
            if (!$user->email_verified_at) {
                $user->email_verified_at = Carbon::now();
                $user->save();
                return \redirect(route('login'))->with('success', 'Your email has been verified');
            } else {
                Auth::logout();
                return \redirect(route('login'))->with('success', 'Your email has already been verified. Login to contine');

                //return \redirect()->back()->with('info', 'Your email has already been verified');
            }
        } else {
            return \redirect(route('login'))->with('error', 'Something went wrong!!');
        }
    }

    public function resendVerificationEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'No account found with that email address.');
        }

        if ($user->email_verified_at !== null) {
            return redirect()->route('login')->with('info', 'Your email is already verified. Please sign in.');
        }

        VerifyUser::updateOrCreate(
            ['user_id' => $user->id],
            ['token' => Str::random(60)]
        );

        try {
            Mail::to($user->email)->send(new VerifyEmail($user));
        } catch (\Throwable $e) {
            \Log::warning('Resend verification email failed: ' . $e->getMessage());
            return redirect()->route('login')
                ->withInput(['email' => $user->email])
                ->with('unverified_email', $user->email)
                ->with('error', 'Failed to send verification email. Please try again later.');
        }

        return redirect()->route('login')
            ->withInput(['email' => $user->email])
            ->with('success', 'A new verification link has been sent to your email address.');
    }

    public function showOtpForm()
    {
        if (!session()->has('otp_user_id')) {
            return redirect()->route('login');
        }
        return view('auth.otp-verify');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required',
        ]);

        if (!session()->has('otp_user_id')) {
            return redirect()->route('login');
        }

        $userId = session('otp_user_id');
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found.');
        }

        $verificationResponse = $this->otpService->verifyOtp($user, $request->otp);
        
        \Log::info('AuthController Verification Response: ', $verificationResponse);

        // Check for various success indicators
        if ($verificationResponse && (
            (isset($verificationResponse['success']) && $verificationResponse['success'] == true) ||
            (isset($verificationResponse['responseCode']) && $verificationResponse['responseCode'] == '00') || 
            (isset($verificationResponse['message']) && stripos($verificationResponse['message'], 'Success') !== false) ||
            isset($verificationResponse['data'])
        )) {
            Auth::login($user);
            session()->forget('otp_user_id');

            // Standard redirect logic
             switch ($user->usertype) {
                case 'internal':
                    return redirect(route('internal.dashboard'));
                case 'external':
                    return redirect(route('external.dashboard'));
                default:
                    return redirect(route('internal.dashboard')); 
            }
        }

        return back()->with('error', 'Invalid OTP. Please try again.');
    }

    public function resendOtp()
    {
        if (!session()->has('otp_user_id')) {
            return redirect()->route('login');
        }

        $userId = session('otp_user_id');
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found.');
        }

        // Generate OTP
        $otpResponse = $this->otpService->generateOtp($user);

        // Check for success
        if ((isset($otpResponse['success']) && $otpResponse['success'] == true) || 
            (isset($otpResponse['status']) && $otpResponse['status'] === 'generated')) {
             return back()->with('success', 'OTP has been resent to your email.');
        } else {
             return back()->with('error', 'Failed to resend OTP. Please try again.');
        }
    }
}
