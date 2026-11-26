<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Institution;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required'],
            'institution_id' => ['required'],
            'password' => [
                'required',
                'string',
                'min:10',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                 'regex:/[0-9]/',      // must contain at least one digit
                // 'regex:/[@$!%*#?&]/', // must contain a special character
            ],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */


    // protected function create(array $data)
    // {
    //   $user = new User();
    //   $user->name = $data['name'];
    //   $user->email = $data['email'];
    //   $user->phone = $data['phone'];
    //   $user->institution_id = $data['institution_id'];
    //   $user->usertype = $data['usertype'];
    //   $user->password =Hash::make($data['password']);
    //   $user->save();
    
    // //   return $user->id;
    //  }





    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'institution_id' => $data['institution_id'],
            'usertype' => $data['usertype'],
            'password' => Hash::make($data['password']),
        ]);


      
        if($data['institution_id'] =="others")
     
       {

         $institution =  Institution::create([
            'name' => $data['institution_name'],
        ]);

       $institution_id =  $institution->id;

        $user = User::where('email',  $data['email'])->first();
        $user->institution_id =  $institution_id;
        $user->save();
       }
      
        

           
    }


     
   
   
     

        
 


    
    protected function redirectTo()
    {
        if (auth()->user()->usertype == 'external') {
            return '/external_dashboard';
        }
    // return '/home';
    }
}
