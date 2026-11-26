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


      public function profilepasssword()
      {
        return view('external.profile_password');
      }



      public function userpasswordupdate(Request $request)
      {
         $user = Auth::user();
  
  
         if($request['password'] !=""){
             if(!(Hash::check($request['password'], Auth::user()->password))){
                 return redirect()->back()->with('error', 'Your current Password does not match');
             }
  
             if(strcmp($request['password'], $request['new_password']) == 0){
                 return redirect()->back()->with('error', 'New password cannot be the same as current password');
             }
  
             $validation = $request->validate([
                 'password' => 'required',
                 'new_password' => [
                    'required',
                    'string',
                    'min:8',             // must be at least 10 characters in length
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                     'regex:/[0-9]/',      // must contain at least one digit
                    // 'regex:/[@$!%*#?&]/', // must contain a special character
                ],
             ]);
  
             $user->password = bcrypt($request['new_password']);
             $user->save();
  
  
         }
         return redirect()->back()->with('success', 'Password Updated');
  
      }
}
