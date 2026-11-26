<?php

namespace App\Http\Controllers\External;

use App\Models\User;
use App\Models\Group;
use App\Models\AppMonitor;
use Illuminate\Http\Request;
use App\Models\MemberOnboarding;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class FormPrivateAccountController extends Controller
{
    public function form_one()
    {
        return view('external.form1');
    }

    public function  form_one_edit($id)
    {
        $form_1_edit = MemberOnboarding::find($id);

        if ($form_1_edit->approval_status == 5) {
            return redirect('/users/dashboard');
        }
        return view('PrivateAccount.form1_edit', compact('form_1_edit'));
    }


    public function form_step_one(Request $request)
    {
        //return $request;
        $this->validate($request, [
            'user_name' => 'required',

        ]);

        //return $request;

        $app_code = (rand(1, 1000000));
        $approval_status = 1;

        $eligibility_type = $request['eligibility_type'];
        $user_id = $request['user_id'];

        $new_onboard = new MemberOnboarding();
        $new_onboard->eligibility_type = $request['eligibility_type'];
        $new_onboard->user_id = $request['user_id'];
        $new_onboard->user_name = $request['user_name'];
        $new_onboard->user_email = $request['user_email'];
        $new_onboard->user_phone = $request['user_phone'];

        $new_onboard->institution_name = $request['institution_name'];
        $new_onboard->home_address = $request['home_address'];
        $new_onboard->app_code = $app_code;
        $new_onboard->email_address = $request['email_address'];
        $new_onboard->mobile_number = $request['mobile_number'];
        $new_onboard->settlement_bank = $request['settlement_bank'];
        $new_onboard->settlement_bank_account_number = $request['settlement_bank_account_number'];
        $new_onboard->bvn = $request['bvn'];
        $new_onboard->nim = $request['nim'];
        $new_onboard->company_tax_number = $request['company_tax_number'];
        $new_onboard->nationality = $request['nationality'];
        $new_onboard->approval_status = $approval_status;


        $new_onboard->save();
        $new_onboard_id = $new_onboard->id;

        $update_user = User::all()->where('id', $user_id)->first();

        $update_user->eligibility_type = $eligibility_type;
        $update_user->save();

        return Redirect::to('/Private-Account/form-step-two/' . $new_onboard_id);
    }



    public function form_step_one_update(Request $request, $id)
    {
        //return $request;

        $new_onboard_update = MemberOnboarding::find($id);
        //$new_onboard_update = new MemberOnboarding();

        $new_onboard_update->institution_name = $request['institution_name'];
        $new_onboard_update->home_address = $request['home_address'];
        $new_onboard_update->email_address = $request['email_address'];
        $new_onboard_update->mobile_number = $request['mobile_number'];
        $new_onboard_update->settlement_bank = $request['settlement_bank'];
        $new_onboard_update->settlement_bank_account_number = $request['settlement_bank_account_number'];
        $new_onboard_update->bvn = $request['bvn'];
        $new_onboard_update->nim = $request['nim'];
        $new_onboard_update->company_tax_number = $request['company_tax_number'];
        $new_onboard_update->nationality = $request['nationality'];





        $new_onboard_update->save();
        $new_onboard_id = $new_onboard_update->id;

        return Redirect::to('/Private-Account/form-step-two/' . $new_onboard_id);

        //return Redirect::back()->with('success', 'Market created successfully.');
    }








    public function form_two($new_onboard_id)
    {
        return $form_2 = MemberOnboarding::find($new_onboard_id);
        //return view('products.create-step-two',compact('product'));
        return view('external.form2', compact('form_2'));
    }



    public function form_step_two(Request $request, $id)
    {

        //return $request;
        $new_onboard_step_two = MemberOnboarding::find($id);
        $approval_status = 2;


        $new_onboard_step_two->purpose_for_securities = $request['purpose_for_securities'];
        $new_onboard_step_two->beneficial = $request['beneficial'];
        $new_onboard_step_two->source_of_fund = $request['source_of_fund'];
        $new_onboard_step_two->company_address = $request['company_address'];
        $new_onboard_step_two->occupation = $request['occupation'];
        $new_onboard_step_two->current_position = $request['current_position'];
        $new_onboard_step_two->approval_status = $approval_status;

        $new_onboard_step_two->save();
        $new_onboard_id = $new_onboard_step_two->id;

        return Redirect::to('/Private-Account/form-step-three/' . $new_onboard_id);

        //return Redirect::back()->with('success', 'Market created successfully.');
    }

    public function  form_two_edit($id)
    {
        $form_2_edit = MemberOnboarding::find($id);

        if ($form_2_edit->approval_status == 5) {
            return redirect('/users/dashboard');
        }

        return view('PrivateAccount.form2_edit', compact('form_2_edit'));
    }



    public function  form_cores_edit($id)
    {
        $cosemail = MemberOnboarding::find($id);

        if ($cosemail->approval_status == 5) {
            return redirect('/users/dashboard');
        }
        return view('external.formcosemail_edit', compact('cosemail'));
    }




    public function form_cores_post(Request $request, $id)
    {

        //return $request;
        $new_onboard_step_post = MemberOnboarding::find($id);
        $approval_status = 3;

        $new_onboard_step_post->general_correspondence_email = $request['general_correspondence_email'];
        $new_onboard_step_post->operations_team_email = $request['operations_team_email'];
        $new_onboard_step_post->other_groups_email = $request['other_groups_email'];




        $new_onboard_step_post->approval_status = $approval_status;

        $new_onboard_step_post->save();
        $new_onboard_id = $new_onboard_step_post->id;

        return Redirect::to('/users/partipante-form-step-three-edit/' . $new_onboard_id);

        //return Redirect::back()->with('success', 'Market created successfully.');
    }




    public function form_three($new_onboard_id)
    {
        $form_3 = MemberOnboarding::find($new_onboard_id);

        if ($form_3->approval_status == 5) {
            return redirect('/users/dashboard');
        }
        return view('external.form3', compact('form_3'));
    }




    // public function form_step_three(Request $request, $id)
    // {
    //     //return $request;
    //     $new_onboard_step_three = MemberOnboarding::find($id);
    //     $approval_status = 4;






    //     if ($request['means_of_identification1'] != "") {
    //         $fileExt = $request['means_of_identification1']->getClientOriginalExtension();
    //         $regdate =  $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
    //         $logoName = '/means_of_identification1/' . $regdate;
    //         $request['means_of_identification1']->move(public_path('means_of_identification1'), $logoName);
    //         $new_onboard_step_three->means_of_identification1 = $logoName;
    //         $new_onboard_step_three->save();

    //         //$new_onboard_id = $new_onboard_step_three->id;

    //     }





    //     $new_onboard_step_three->approval_status = $approval_status;
    //     $new_onboard_step_three->save();
    //     $new_onboard_id = $new_onboard_step_three->id;


    //     return Redirect::to('/Private-Account/form-step-four/' . $new_onboard_id);


    // }




    public function form_step_three(Request $request, $id)
    {
        // Find the onboarding record
        $new_onboard_step_three = MemberOnboarding::find($id);

        if (!$new_onboard_step_three) {
            return redirect()->back()->withErrors(['error' => 'Onboarding record not found']);
        }

        $approval_status = 4;
        $maxFileSize = 5 * 1024 * 1024; // 5MB in bytes
        $fileFields = [
            'means_of_identification1',
        ];

        // Validate file types and sizes
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);

                // Check if the file is a PDF
                if ($file->getClientOriginalExtension() !== 'pdf') {
                    return redirect()->back()->withErrors(['error' => "The file $field must be a PDF."]);
                }

                // Validate file size (e.g., 5MB maximum)
                if ($file->getSize() > $maxFileSize) {
                    return redirect()->back()->withErrors(['error' => "The file $field exceeds the maximum allowed size of 5MB."]);
                }
            }
        }

        // Process files if valid
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                try {
                    $fileExt = $file->getClientOriginalExtension();
                    $regdate = $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
                    $logoName = "$field/$regdate";
                    $file->move(public_path($field), $logoName);
                    $new_onboard_step_three->$field = $logoName;
                } catch (\Exception $e) {
                    return redirect()->back()->withErrors(['error' => 'File upload failed: ' . $e->getMessage()]);
                }
            }
        }

        // Update the approval status
        $new_onboard_step_three->approval_status = $approval_status;
        $new_onboard_step_three->save();

        $new_onboard_id = $new_onboard_step_three->id;

        return Redirect::to('/Private-Account/form-step-four/' . $new_onboard_id);
    }







    public function  form_three_edit($id)
    {
        $form_3_edit = MemberOnboarding::find($id);
        if ($form_3_edit->approval_status == 5) {
            return redirect('/users/dashboard');
        }
        return view('PrivateAccount.form3_edit', compact('form_3_edit'));
    }






    public function form_four($new_onboard_id)
    {

        $form_4 = MemberOnboarding::find($new_onboard_id);

        if ($form_4->approval_status == 5) {
            return redirect('/users/dashboard');
        }
        return view('PrivateAccount.form4', compact('form_4'));
    }





    // public function form_step_three(Request $request, $id)
    // {
    //     // Find the onboarding record
    //     $new_onboard_step_three = MemberOnboarding::find($id);

    //     if (!$new_onboard_step_three) {
    //         return redirect()->back()->withErrors(['error' => 'Onboarding record not found']);
    //     }

    //     $approval_status = 4;
    //     $maxFileSize = 5 * 1024 * 1024; // 5MB in bytes
    //     $fileFields = [

    //         'signature_mandate_form',
    //         'declaration_form',

    //     ];


    //     $this->validate($request, [
    //         'signature_mandate_form' => 'required',
    //         'declaration_form' => 'required',
    //         'certified_check_box' => 'accepted',


    //     ]);

    //     // Validate file sizes
    //     foreach ($fileFields as $field) {
    //         if ($request->hasFile($field)) {
    //             $file = $request->file($field);
    //             if ($file->getSize() > $maxFileSize) {
    //                 return redirect()->back()->withErrors(['error' => "The file $field exceeds the maximum allowed size of 5MB."]);
    //             }
    //         }
    //     }

    //     // Process files if sizes are valid
    //     foreach ($fileFields as $field) {
    //         if ($request->hasFile($field)) {
    //             $file = $request->file($field);
    //             try {
    //                 $fileExt = $file->getClientOriginalExtension();
    //                 $regdate = $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
    //                 $logoName = "$field/$regdate";
    //                 $file->move(public_path($field), $logoName);
    //                 $new_onboard_step_three->$field = $logoName;
    //             } catch (\Exception $e) {
    //                 return redirect()->back()->withErrors(['error' => 'File upload failed: ' . $e->getMessage()]);
    //             }
    //         }
    //     }

    //     $new_onboard_step_three->approval_status = $approval_status;
    //     $new_onboard_step_three->save();

    //     $new_onboard_id = $new_onboard_step_three->id;

    //     return Redirect::to('/Private-Account/form-step-four/' . $new_onboard_id);
    // }



    // public function form_step_four(Request $request, $id)
    // {

    //     //return $request;
    //     // $request->validate([
    //     //     'file' => 'required|mimes:png,jpg,jpeg|max:2048'
    //     // ]);

    //     $this->validate($request, [
    //         'signature_mandate_form' => 'required',
    //         'declaration_form' => 'required',
    //         'certified_check_box' => 'accepted',


    //     ]);



    //     $new_onboard_step_three = MemberOnboarding::find($id);
    //     $new_onboard_step_three->user_email;
    //     $new_onboard_step_three->institution_name;
    //     $new_onboard_step_three->app_code;
    //     $approval_status = 5;




    //     if ($request['signature_mandate_form'] != "") {
    //         $fileExt = $request['signature_mandate_form']->getClientOriginalExtension();
    //         $regdate =  $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
    //         $logoName = '/signature_mandate_form/' . $regdate;
    //         $request['signature_mandate_form']->move(public_path('signature_mandate_form'), $logoName);
    //         $new_onboard_step_three->signature_mandate_form = $logoName;
    //         $new_onboard_step_three->approval_status = $approval_status;
    //         $new_onboard_step_three->save();
    //     }


    //     if ($request['declaration_form'] != "") {
    //         $fileExt = $request['declaration_form']->getClientOriginalExtension();
    //         $regdate =  $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
    //         $logoName = '/declaration_form/' . $regdate;
    //         $request['declaration_form']->move(public_path('declaration_form'), $logoName);
    //         $new_onboard_step_three->declaration_form = $logoName;

    //         $new_onboard_step_three->save();
    //     }
    //     $new_onboard_step_three->approval_status = $approval_status;
    //     $new_onboard_step_three->save();


    //     $new_app_momitor = new AppMonitor();
    //     $new_app_momitor->app_code = $new_onboard_step_three->app_code;
    //     $new_app_momitor->app_status =  $approval_status;
    //     $new_app_momitor->app_time = date('d-m-Y  H:i:s');
    //     $new_app_momitor->save();

    //     // FOR DSD USERS
    //     $group =  Group::where('name', '=', 'DSD')->first();

    //     $group->email;
    //     $email_data = array(
    //         'email' =>
    //         $group->email,
    //         'institution' =>
    //         $new_onboard_step_three->institution_name,
    //         'subject' =>
    //         'Account Opening - ' . $new_onboard_step_three->institution_name . '',
    //     );
    //     Mail::send(
    //         'emails.formsubmit_notify',
    //         $email_data,
    //         function ($message) use ($email_data) {
    //             $message->to($email_data['email'],)
    //                 ->subject($email_data['subject'])
    //                 ->from('no-reply@fmdqgroup.com', 'Q-Depository Onboarding Portal');
    //         }
    //     );

    //     //  $subject => 


    //     // FOR Participants
    //     $email_data = array(
    //         'name' => $new_onboard_step_three->user_name,
    //         'email' => $new_onboard_step_three->user_email,
    //         'app_id' => $new_onboard_step_three->id,
    //         'institution' => $new_onboard_step_three->institution_name,
    //         'subject' =>
    //         'Account Opening - ' . $new_onboard_step_three->institution_name . '',
    //     );
    //     Mail::send('emails.formsubmitparticipant_notify', $email_data, function ($message) use ($email_data) {
    //         $message->to($email_data['email'], $email_data['app_id'], $email_data['name'],)
    //             ->subject($email_data['subject'])
    //             ->from('no-reply@fmdqgroup.com', 'Q-Depository Onboarding Portal');
    //     });



    //     return Redirect::to('users/dashboard');

    //     //return Redirect::back()->with('success', 'Market created successfully.');
    // }




    public function form_step_four(Request $request, $id)
    {
        // Validate the form inputs
        $this->validate($request, [
            'signature_mandate_form' => 'required|file|max:5120|mimes:pdf', // Ensure PDF and max 5MB
            'declaration_form' => 'required|file|max:5120|mimes:pdf',       // Ensure PDF and max 5MB
            'certified_check_box' => 'accepted',
        ]);

        // Find the onboarding record
        $new_onboard_step_three = MemberOnboarding::find($id);

        if (!$new_onboard_step_three) {
            return redirect()->back()->withErrors(['error' => 'Onboarding record not found']);
        }

        $approval_status = 5;

        try {
            // Handle signature mandate form
            if ($request->hasFile('signature_mandate_form')) {
                $file = $request->file('signature_mandate_form');
                $fileExt = $file->getClientOriginalExtension();
                $regdate = $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
                $logoName = 'signature_mandate_form/' . $regdate;
                $file->move(public_path('signature_mandate_form'), $logoName);
                $new_onboard_step_three->signature_mandate_form = $logoName;
                $new_onboard_step_three->approval_status = $approval_status;
                $new_onboard_step_three->submitted_at = date('d-m-Y H:i:s');
                $new_onboard_step_three->save();
            }

            // Handle declaration form
            if ($request->hasFile('declaration_form')) {
                $file = $request->file('declaration_form');
                $fileExt = $file->getClientOriginalExtension();
                $regdate = $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
                $logoName = 'declaration_form/' . $regdate;
                $file->move(public_path('declaration_form'), $logoName);
                $new_onboard_step_three->declaration_form = $logoName;
                $new_onboard_step_three->save();
            }

            // Update the approval status
            $new_onboard_step_three->approval_status = $approval_status;
            $new_onboard_step_three->save();

            // Create a new app monitor record
            $new_app_momitor = new AppMonitor();
            $new_app_momitor->app_code = $new_onboard_step_three->app_code;
            $new_app_momitor->app_status = $approval_status;
            $new_app_momitor->app_time = date('d-m-Y H:i:s');
            $new_app_momitor->save();

            // Notify DSD users
            $group = Group::where('name', '=', 'DSD')->first();

            if ($group) {
                $email_data = [
                    'email' => $group->email,
                    'institution' => $new_onboard_step_three->institution_name,
                    'subject' => 'Account Opening - ' . $new_onboard_step_three->institution_name,
                ];
                Mail::send('emails.formsubmit_notify', $email_data, function ($message) use ($email_data) {
                    $message->to($email_data['email'])
                        ->subject($email_data['subject'])
                        ->from('no-reply@fmdqgroup.com', 'Q-Depository Onboarding Portal');
                });
            }

            // Notify participants
            $email_data = [
                'name' => $new_onboard_step_three->user_name,
                'email' => $new_onboard_step_three->user_email,
                'app_id' => $new_onboard_step_three->id,
                'institution' => $new_onboard_step_three->institution_name,
                'subject' => 'Account Opening - ' . $new_onboard_step_three->institution_name,
            ];
            Mail::send('emails.formsubmitparticipant_notify', $email_data, function ($message) use ($email_data) {
                $message->to($email_data['email'], $email_data['app_id'], $email_data['name'])
                    ->subject($email_data['subject'])
                    ->from('no-reply@fmdqgroup.com', 'Q-Depository Onboarding Portal');
            });

            return redirect('users/dashboard');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }




    public function form_one_view($new_onboard_id)
    {
        $form_1 = MemberOnboarding::find($new_onboard_id);
        return view('PrivateAccount.form1_view', compact('form_1'));
    }

    public function form_two_view($new_onboard_id)
    {
        $form_2 = MemberOnboarding::find($new_onboard_id);
        return view('PrivateAccount.form2_view', compact('form_2'));
    }


    public function form_three_view($new_onboard_id)
    {
        $form_3 = MemberOnboarding::find($new_onboard_id);
        return view('PrivateAccount.form3_view', compact('form_3'));
    }
    public function form_four_view($new_onboard_id)
    {
        $form_4 = MemberOnboarding::find($new_onboard_id);
        return view('PrivateAccount.form4_view', compact('form_4'));
    }


    public function redirectToUrl($selectedValue)
    {


        if ($selectedValue == 'Private-Account') {
            return view('PrivateAccount.form1', compact('selectedValue'));
        }
    }
}
