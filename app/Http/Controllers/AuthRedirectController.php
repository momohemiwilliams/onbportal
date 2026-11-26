<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;

class AuthRedirectController extends Controller
{
    
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function onb_validate(Request $request)
    {
        //$request;
        $app_name = $request->email;
        $jwt =  $request->e;




        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://10.10.14.70/FMDQ-Api/api/userProfile/validate-token?appCode='.$app_name,
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_MAXREDIRS => 10, 
        //     CURLOPT_HTTPHEADER  => array("Content-Length: 0"),
        //     CURLOPT_POSTFIELDS => array(),
        //     CURLOPT_SSL_VERIFYHOST =>  0,
        //     CURLOPT_SSL_VERIFYPEER => 0,
        //     CURLOPT_TIMEOUT => 30,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST', 
        //     CURLOPT_HTTPHEADER => array(
        //     "Authorization: Bearer ".$jwt,
        //     "Cache-Control: no-cache",
        //     "Content-Type: application/json; charset=UTF-8",
        //     "Accept: application/json" 
        //     ),
        // ));

        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        // curl_close($curl);
        // $response;
        // $result =  json_decode($response, true);
        //  $result;
        // $result = [
        //     'HasError' => false,
        //     'Data' => [
        //         "Email" => "emmall@gmail.com"
        //     ]
        // ];

        if($request == '')
        {
            return view('errors.redirecterro');
        }
    

        if($request != ''){
            $user = User::where('email', $request->email)->first();
            if(!$user){
                return redirect()->away('https://10.10.14.70/FMDQWeb/dashboard/');
            } else {
                $request->request->add(['email' => $request->email]);
                $request->request->add(['password' => '123456']);
                // return $request;
                if(Auth::attempt($request->only('email', 'password'))){
                    return Redirect::to('/home');
                }
            }
        }
        
       
        // return $result;
        // return 'APPCODE ='. $request->x. '  --  '. 'JWT'. $request->e. '-- '. $result;
       //return view('welcom', compact('appCode','jwt'));
    }



}




