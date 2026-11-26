<?php
namespace App\Http\Controllers;

use Auth;

use \Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AuthController extends Controller
{
    public function userLogin(Request $request){


        $logged = auth()->attempt(
            ['email' => $request['email'], 
             'password' => $request['password']
            ]);
  
      if($logged) {
          return "yes";
      }
      else{
          return "NO";
      }



        
        // $this->validate($request,[
        //     'email' => 'required|email',
        //     'password' => 'required' 
        //     ]);
    
        // $user = User::where('email', '=', $request['email'])->where('password' ,'=', Hash::make($request['password'])); 
        
        // return $user;
        
//         $user = User::where('email', '=' $request['email'])->where('role','=','user')->first();
// if(Hash::check($request['password'],$user->password)){
//     Auth::login($user);
//     return  'success';
// }   
    
        if($user){
            Auth::login($user); 
            return $next($request);
        }
        else{
            return redirect()->back();
        }
    
    
    }
}
