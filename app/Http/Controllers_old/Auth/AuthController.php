<?php

namespace App\Http\Controllers\Auth;



use Hash;

use Session;

use Carbon\Carbon;

use App\Models\User;

use App\Mail\VerifyEmail;

use App\Models\VerifyUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MemberOnboarding;
use App\Http\Controllers\Controller;
use App\Models\PrivateAccountOnform;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;



class AuthController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function login()
    {
        return view('auth.login');
    }

    public function validateLogin(Request $request)
    {


        //return $request;
        $this->validate($request, [
            'email' => ['required'],
            'password' => ['required'],



        ]);


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->email_verified_at == null && Auth::user()->usertype == 'external') {
                Auth::logout();
                return \redirect(route('login'))->with('error', 'Please verify your email to continue');
            }
            $usertype = Auth::user()->usertype;
            switch ($usertype) {
                case 'internal':
                    // return  "here"; //redirect(route('internal.dashboard')); 
                    return  redirect(route('internal.dashboard'));
                    break;
                case 'external':


                    return   redirect(route('external.dashboard'));
                    break;

                default:
                    return redirect(route('internal.dashboard'));
                    break;
            }
            //Auth::user()->usertype;

            //return \redirect(route('home'))->with('success', 'Logged In Successfully');
        } else {
            return redirect()->back()->with('error', 'Incorrect email or password');
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
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                // 'regex:/[@$!%*#?&]/', // must contain a special character
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

        Mail::to($user->email)->send(new VerifyEmail($user));
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
}
