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

class NonCapitalFormController extends Controller
{
    public function form_one()
    {

        return view('NonCapital.form1');
    }

    public function  form_one_edit($id)
    {
        $form_1_edit = MemberOnboarding::find($id);

        if ($form_1_edit->approval_status == 5) {
            return redirect('/users/dashboard');
        }
        return view('NonCapital.form1_edit', compact('form_1_edit'));
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

        //$institution_id = 1;
        $new_onboard = new MemberOnboarding();
        $new_onboard->eligibility_type = $request['eligibility_type'];
        $new_onboard->user_id = $request['user_id'];
        $new_onboard->user_name = $request['user_name'];
        $new_onboard->user_email = $request['user_email'];
        $new_onboard->user_phone = $request['user_phone'];
        $new_onboard->institution_name = $request['institution_name'];
        $new_onboard->app_code = $app_code;
        $new_onboard->company_address = $request['company_address'];
        $new_onboard->direct_line = $request['direct_line'];
        $new_onboard->company_email = $request['company_email'];
        $new_onboard->company_reg_number = $request['company_reg_number'];
        $new_onboard->company_reg_date = $request['company_reg_date'];
        $new_onboard->settlement_bank = $request['settlement_bank'];
        $new_onboard->settlement_bank_account_number = $request['settlement_bank_account_number'];
        $new_onboard->lei_code = $request['lei_code'];
        $new_onboard->purpose_for_securities = $request['purpose_for_securities'];
        $new_onboard->beneficial = $request['beneficial'];
        $new_onboard->source_of_fund = $request['source_of_fund'];
        $new_onboard->company_tax_number = $request['company_tax_number'];

        $new_onboard->approval_status = $approval_status;


        $new_onboard->save();






        $new_onboard->save();
        $new_onboard_id = $new_onboard->id;





        $update_user = User::all()->where('id', $user_id)->first();

        $update_user->eligibility_type = $eligibility_type;
        $update_user->save();

        return Redirect::to('/Corporate-Account/form-step-two/' . $new_onboard_id)->with('success', 'Market created successfully.');

        //return Redirect::back()->with('success', 'Market created successfully.');
    }



    public function form_step_one_update(Request $request, $id)
    {

        $new_onboard_update = MemberOnboarding::find($id);
        //$new_onboard_update = new MemberOnboarding();
        $new_onboard_update->institution_name = $request['institution_name'];
        $new_onboard_update->company_address = $request['company_address'];
        $new_onboard_update->direct_line = $request['direct_line'];
        $new_onboard_update->company_email = $request['company_email'];
        $new_onboard_update->company_tax_number = $request['company_tax_number'];
        $new_onboard_update->company_reg_number = $request['company_reg_number'];
        $new_onboard_update->company_reg_date = $request['company_reg_date'];
        $new_onboard_update->settlement_bank = $request['settlement_bank'];
        $new_onboard_update->settlement_bank_account_number = $request['settlement_bank_account_number'];
        $new_onboard_update->lei_code = $request['lei_code'];
        $new_onboard_update->purpose_for_securities = $request['purpose_for_securities'];
        $new_onboard_update->beneficial = $request['beneficial'];
        $new_onboard_update->source_of_fund = $request['source_of_fund'];




        $new_onboard_update->save();
        $new_onboard_id = $new_onboard_update->id;

        return Redirect::to('/Corporate-Account/form-step-two/' . $new_onboard_id);

        //return Redirect::back()->with('success', 'Market created successfully.');
    }








    public function form_two($new_onboard_id)
    {
        return $form_2 = MemberOnboarding::find($new_onboard_id);
        //return view('products.create-step-two',compact('product'));
        return view('NonCapital.form2', compact('form_2'));
    }



    public function form_step_two(Request $request, $id)
    {

        // return $request;
        $new_onboard_step_two = MemberOnboarding::find($id);
        $approval_status = 2;
        $new_onboard_step_two->managing_director_name = $request['managing_director_name'];
        $new_onboard_step_two->managing_director_email = $request['managing_director_email'];
        $new_onboard_step_two->managing_director_phone = $request['managing_director_phone'];
        $new_onboard_step_two->managing_director_bvn = $request['managing_director_bvn'];
        $new_onboard_step_two->managing_director_nin = $request['managing_director_nin'];
        $new_onboard_step_two->managing_director_nationality = $request['managing_director_nationality'];

        $new_onboard_step_two->principal_director_name1 = $request['principal_director_name1'];
        $new_onboard_step_two->principal_director_phone1 = $request['principal_director_phone1'];
        $new_onboard_step_two->principal_director_email1 = $request['principal_director_email1'];
        $new_onboard_step_two->principal_director_bvn1 = $request['principal_director_bvn1'];
        $new_onboard_step_two->principal_director_nin1 = $request['principal_director_nin1'];
        $new_onboard_step_two->principal_director_designation1 = $request['principal_director_designation1'];
        $new_onboard_step_two->principal_director_nationality1 = $request['principal_director_nationality1'];

        $new_onboard_step_two->principal_director_name2 = $request['principal_director_name2'];
        $new_onboard_step_two->principal_director_phone2 = $request['principal_director_phone2'];
        $new_onboard_step_two->principal_director_email2 = $request['principal_director_email2'];
        $new_onboard_step_two->principal_director_bvn2 = $request['principal_director_bvn2'];
        $new_onboard_step_two->principal_director_nin2 = $request['principal_director_nin2'];
        $new_onboard_step_two->principal_director_designation2 = $request['principal_director_designation2'];
        $new_onboard_step_two->principal_director_nationality2 = $request['principal_director_nationality2'];



        $new_onboard_step_two->approval_status = $approval_status;

        $new_onboard_step_two->save();
        $new_onboard_id = $new_onboard_step_two->id;

        return Redirect::to('/Corporate-Account/form-step-three/' . $new_onboard_id);

        //return Redirect::back()->with('success', 'Market created successfully.');
    }

    public function  form_two_edit($id)
    {
        $form_2_edit = MemberOnboarding::find($id);

        if ($form_2_edit->approval_status == 5) {
            return redirect('/users/dashboard');
        }


        return view('NonCapital.form2_edit', compact('form_2_edit'));
    }



    public function  form_cores_edit($id)
    {
        $cosemail = MemberOnboarding::find($id);

        if ($cosemail->approval_status == 5) {
            return redirect('/users/dashboard');
        }
        return view('NonCapital.formcosemail_edit', compact('cosemail'));
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
        return view('NonCapital.form3', compact('form_3'));
    }




    public function form_step_three(Request $request, $id)
    {

        //return $request;
        $new_onboard_step_three = MemberOnboarding::find($id);
        $approval_status = 4;
        if ($request['memorandumand_articles_of_association'] != "") {


            // $this->validate($request, [
            //     'file' => 'max:5120',


            // ]);




            $fileExt = $request['memorandumand_articles_of_association']->getClientOriginalExtension();
            $regdate =  $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
            $logoName = '/memorandumand_articles/' . $regdate;
            $request['memorandumand_articles_of_association']->move(public_path('memorandumand_articles'), $logoName);
            $new_onboard_step_three->memorandumand_articles_of_association = $logoName;

            $new_onboard_step_three->save();

            //$new_onboard_id = $new_onboard_step_three->id;

        }

        if ($request['board_resolution'] != "") {
            $fileExt = $request['board_resolution']->getClientOriginalExtension();
            $regdate =  $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
            $logoName = '/board_resolution/' . $regdate;
            $request['board_resolution']->move(public_path('board_resolution'), $logoName);
            $new_onboard_step_three->board_resolution = $logoName;
            $new_onboard_step_three->save();

            //$new_onboard_id = $new_onboard_step_three->id;

        }


        if ($request['signature_mandate_form'] != "") {
            $fileExt = $request['signature_mandate_form']->getClientOriginalExtension();
            $regdate =  $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
            $logoName = '/signature_mandate_form/' . $regdate;
            $request['signature_mandate_form']->move(public_path('signature_mandate_form'), $logoName);
            $new_onboard_step_three->signature_mandate_form = $logoName;
            $new_onboard_step_three->save();

            //$new_onboard_id = $new_onboard_step_three->id;

        }



        if ($request['evidence_of_securities_and_exchange_commission'] != "") {
            $fileExt = $request['evidence_of_securities_and_exchange_commission']->getClientOriginalExtension();
            $regdate =  $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
            $logoName = '/evidence_of_securities_and_exchange_commission/' . $regdate;
            $request['evidence_of_securities_and_exchange_commission']->move(public_path('evidence_of_securities_and_exchange_commission'), $logoName);
            $new_onboard_step_three->evidence_of_securities_and_exchange_commission = $logoName;
            $new_onboard_step_three->save();

            //$new_onboard_id = $new_onboard_step_three->id;

        }



        if ($request['evidence_of_trading_exchange_license'] != "") {
            $fileExt = $request['evidence_of_trading_exchange_license']->getClientOriginalExtension();
            $regdate =  $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
            $logoName = '/evidence_of_trading_exchange_license/' . $regdate;
            $request['evidence_of_trading_exchange_license']->move(public_path('evidence_of_trading_exchange_license'), $logoName);
            $new_onboard_step_three->evidence_of_trading_exchange_license = $logoName;
            $new_onboard_step_three->save();

            //$new_onboard_id = $new_onboard_step_three->id;

        }



        if ($request['certificate_of_incorporation'] != "") {
            $fileExt = $request['certificate_of_incorporation']->getClientOriginalExtension();
            $regdate =  $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
            $logoName = '/certificate_of_incorporation/' . $regdate;
            $request['certificate_of_incorporation']->move(public_path('certificate_of_incorporation'), $logoName);
            $new_onboard_step_three->certificate_of_incorporation = $logoName;
            $new_onboard_step_three->save();

            //$new_onboard_id = $new_onboard_step_three->id;

        }




        if ($request['particulars_of_directors'] != "") {
            $fileExt = $request['particulars_of_directors']->getClientOriginalExtension();
            $regdate =  $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
            $logoName = '/particulars_of_directors/' . $regdate;
            $request['particulars_of_directors']->move(public_path('particulars_of_directors'), $logoName);
            $new_onboard_step_three->particulars_of_directors = $logoName;
            $new_onboard_step_three->save();

            //$new_onboard_id = $new_onboard_step_three->id;

        }


        if ($request['particulars_of_shareholders'] != "") {
            $fileExt = $request['particulars_of_shareholders']->getClientOriginalExtension();
            $regdate =  $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
            $logoName = '/particulars_of_shareholders/' . $regdate;
            $request['particulars_of_shareholders']->move(public_path('particulars_of_shareholders'), $logoName);
            $new_onboard_step_three->particulars_of_shareholders = $logoName;
            $new_onboard_step_three->save();
        }




        if ($request['means_of_identification1'] != "") {
            // return $request['means_of_identification1'];
            $fileExt = $request['means_of_identification1']->getClientOriginalExtension();
            $regdate =  $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
            $logoName = '/means_of_identification/' . $regdate;
            $request['means_of_identification1']->move(public_path('means_of_identification'), $logoName);
            $new_onboard_step_three->means_of_identification1 = $logoName;
            $new_onboard_step_three->save();

            //$new_onboard_id = $new_onboard_step_three->id;

        }



        if ($request['means_of_identification2'] != "") {
            $fileExt = $request['means_of_identification2']->getClientOriginalExtension();
            $regdate =  $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
            $logoName = '/means_of_identification2/' . $regdate;
            $request['means_of_identification2']->move(public_path('means_of_identification2'), $logoName);
            $new_onboard_step_three->means_of_identification2 = $logoName;
            $new_onboard_step_three->save();

            //$new_onboard_id = $new_onboard_step_three->id;

        }


        if ($request['means_of_identification3'] != "") {
            // return $request['means_of_identification1'];
            $fileExt = $request['means_of_identification3']->getClientOriginalExtension();
            $regdate =  $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
            $logoName = '/means_of_identification3/' . $regdate;
            $request['means_of_identification3']->move(public_path('means_of_identification3'), $logoName);
            $new_onboard_step_three->means_of_identification3 = $logoName;
            $new_onboard_step_three->save();

            //$new_onboard_id = $new_onboard_step_three->id;

        }








        $new_onboard_step_three->approval_status = $approval_status;
        $new_onboard_step_three->save();
        $new_onboard_id = $new_onboard_step_three->id;


        return Redirect::to('/Corporate-Account/form-step-four/' . $new_onboard_id);

        //return Redirect::back()->with('success', 'Market created successfully.');
    }

    public function  form_three_edit($id)
    {
        $form_3_edit = MemberOnboarding::find($id);
        if ($form_3_edit->approval_status == 5) {
            return redirect('/users/dashboard');
        }
        return view('NonCapital.form3_edit', compact('form_3_edit'));
    }






    public function form_four($new_onboard_id)
    {

        $form_4 = MemberOnboarding::find($new_onboard_id);

        if ($form_4->approval_status == 5) {
            return redirect('/users/dashboard');
        }
        return view('NonCapital.form4', compact('form_4'));
    }


    public function form_step_four(Request $request, $id)
    {

        //return $request;
        // $request->validate([
        //     'file' => 'required|mimes:png,jpg,jpeg|max:2048'
        // ]);

        $this->validate($request, [
            'signature_mandate_form' => 'required',
            'declaration_form' => 'required',
            'certified_check_box' => 'accepted',


        ]);



        $new_onboard_step_three = MemberOnboarding::find($id);
        $new_onboard_step_three->user_email;
        $new_onboard_step_three->institution_name;
        $new_onboard_step_three->app_code;
        $approval_status = 5;




        if ($request['signature_mandate_form'] != "") {
            $fileExt = $request['signature_mandate_form']->getClientOriginalExtension();
            $regdate =  $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
            $logoName = '/signature_mandate_form/' . $regdate;
            $request['signature_mandate_form']->move(public_path('signature_mandate_form'), $logoName);
            $new_onboard_step_three->signature_mandate_form = $logoName;
            $new_onboard_step_three->approval_status = $approval_status;
            $new_onboard_step_three->save();
        }


        if ($request['declaration_form'] != "") {
            $fileExt = $request['declaration_form']->getClientOriginalExtension();
            $regdate =  $new_onboard_step_three->app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
            $logoName = '/declaration_form/' . $regdate;
            $request['declaration_form']->move(public_path('declaration_form'), $logoName);
            $new_onboard_step_three->declaration_form = $logoName;

            $new_onboard_step_three->save();
        }
        $new_onboard_step_three->approval_status = $approval_status;
        $new_onboard_step_three->save();


        $new_app_momitor = new AppMonitor();
        $new_app_momitor->app_code = $new_onboard_step_three->app_code;
        $new_app_momitor->app_status =  $approval_status;
        $new_app_momitor->app_time = date('d-m-Y  H:i:s');
        $new_app_momitor->save();

        // FOR DSD USERS

        $group =  Group::where('name', '=', 'DSD')->first();

        $group->email;
        $email_data = array(
            'email' =>
            $group->email,
            'institution' =>
            $new_onboard_step_three->institution_name,
        );
        Mail::send('emails.formsubmit_notify', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'],)
                ->subject('Account Opening')
                ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');
        });


        // FOR Participants
        $email_data = array(
            'name' => $new_onboard_step_three->user_name,
            'email' => $new_onboard_step_three->user_email,
            'app_id' => $new_onboard_step_three->id,
            'institution' => $new_onboard_step_three->institution_name,
        );
        Mail::send('emails.formsubmitparticipant_notify', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'], $email_data['app_id'], $email_data['name'],)
                ->subject('Account Opening')
                ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');
        });



        return Redirect::to('users/dashboard');

        //return Redirect::back()->with('success', 'Market created successfully.');
    }






    public function form_one_view($new_onboard_id)
    {
        $form_1 = MemberOnboarding::find($new_onboard_id);
        return view('NonCapital.form1_view', compact('form_1'));
    }

    public function form_two_view($new_onboard_id)
    {
        $form_2 = MemberOnboarding::find($new_onboard_id);
        return view('NonCapital.form2_view', compact('form_2'));
    }
    public function form_cores_view($new_onboard_id)
    {
        $form_cores_view = MemberOnboarding::find($new_onboard_id);
        return view('NonCapital.formcosemail_view', compact('form_cores_view'));
    }

    public function form_three_view($new_onboard_id)
    {
        $form_3 = MemberOnboarding::find($new_onboard_id);
        return view('NonCapital.form3_view', compact('form_3'));
    }
    public function form_four_view($new_onboard_id)
    {
        $form_4 = MemberOnboarding::find($new_onboard_id);
        return view('NonCapital.form4_view', compact('form_4'));
    }


    public function redirectToUrl($selectedValue)
    {

        //return $selectedValue;

        //  $entities = Entity::all();
        //  $categories = Category::all();
        //  $alpha =  \DB::table('alpha')->get();
        //  $years =  \DB::table('years')->get();
        //  $months =  \DB::table('months')->get();

        if ($selectedValue == 'Settlement-Banks') {
            return view('SettlementBanks.form1', compact('selectedValue'));

            //["Settlement-Banks", "Private-account-Corporate-and-Individual","Capital-Market-Operator"];
        }



        if ($selectedValue == 'Corporate-and-Individual') {
            return view('Corporate.form1', compact('selectedValue'));

            //["Settlement-Banks", "Private-account-Corporate-and-Individual","Capital-Market-Operator"];
        }


        if ($selectedValue == 'Private-account-Corporate-and-Individual') {

            return view('PrivateAccount.form1', compact('selectedValue'));

            //["Settlement-Banks", "Private-account-Corporate-and-Individual","Capital-Market-Operator"];
        }



        if ($selectedValue == 'Capital-Market-Operator') {
            return view('NonCapital.form1', compact('selectedValue'));

            //["Settlement-Banks", "Private-account-Corporate-and-Individual","Capital-Market-Operator"];
        }







        // return view('regulations.add_new', [
        //     'selectedValue' => $selectedValue,'entities' => $entities,'categories' => $categories,'alpha' => $alpha,'years' => $years,'months' => $months
        // ]);
    }
}
