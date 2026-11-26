<?php

namespace App\Http\Controllers\Crons;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\MemberOnboarding;
use App\Http\Controllers\Controller;
use App\Models\ApplicationReminder;
use Illuminate\Support\Facades\Mail;

class ReminderController extends Controller
{
    public function applicationremider()
    {
        

      $remider = ApplicationReminder::where('id',1)->first();

       if($remider->status == 1)
       {
         //return $remider->rate;
         $applicationnotcomplete = MemberOnboarding::where('approval_status','<', 5)->get();
        foreach($applicationnotcomplete as $appnotcomplete){

          
          

            $signupDate = Carbon::parse($appnotcomplete->created_at);
            $now = Carbon::now();
                $diff = $signupDate->diffInDays($now);
             // $diff % $remider->rate;
             if($diff == $remider->rate){
            //$note = 'Not Completed';
       
              $email_data = array(
                //'email' =>'kenneth.ichenwo@fmdqgroup.com',
                'user_email' => $appnotcomplete->user_email,
                'user_name' => $appnotcomplete->user_name,
                'institution' =>$appnotcomplete->institution_name,
                );

                Mail::send('emails.application_reminder', $email_data, function ($message) use ($email_data) {
                $message->to($email_data['user_email'])
                ->subject('Account Opening')
                ->from(config('mail.from.address'), config('mail.from.name'));
                });
           }
        }

       }
        
    }




    
}
