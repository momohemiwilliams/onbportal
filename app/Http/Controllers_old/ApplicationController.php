<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\AppMonitor;
use App\Models\RejectlDocs;
use Illuminate\Support\Str;
use App\Models\ApprovalDocs;
use Illuminate\Http\Request;
use App\Models\MemberOnboarding;
use App\Models\ApplicationStatus;
use Illuminate\Support\Facades\DB;
use App\Models\PrivateAccountOnform;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ApplicationController extends Controller
{




    public function allapplications()

    {
        $app = MemberOnboarding::orderBy('created_at', 'desc')->get();
        return view('applications.index', compact('app'));
    }


    public function applications($status)

    {

        $app = MemberOnboarding::where('approval_status', $status)->get();
        return view('applications.index', compact('app'));
    }


    public function application_report()
    {
        $app = MemberOnboarding::orderBy('created_at', 'desc')->get();

        return view('applications.reports', compact('app'));
    }



    public function dodstatus(Request $request)
    {
        //return $request;

        if ($request['status'] == 9) {
            $this->validate($request, [
                'note' => 'required',
            ]);
        }



        if ($request['status'] == 7) {
            $this->validate($request, [
                'document' => 'required',
            ]);
        }


        if ($request['status'] == 8) {
            $this->validate($request, [
                'Partner_bpid' => 'required',
                'Client_bpid' => 'required',
            ]);
        }


        // return $request;


        $new_appStatus = new ApplicationStatus();
        $new_appStatus->status = $request['status'];
        $new_appStatus->note = $request['note'];
        $new_appStatus->app_code = $request['app_code'];
        $new_appStatus->user_id = $request['user_id'];
        $new_appStatus->save();

        $status = $new_appStatus->status;
        $app_code = $new_appStatus->app_code;
        $user_id = $new_appStatus->user_id;


        $app_status = MemberOnboarding::where('app_code', $app_code)->first();
        $app_status->approval_status = $status;
        $app_status->save();




        $user_email =  $app_status->user_email;
        $user_name = $app_status->user_name;
        $institution =  $app_status->institution_name;




        $group = DB::table('users')
            ->join('groups', 'users.group_id', '=', 'groups.id')
            ->where('users.id', $user_id)
            ->first();

        if ($group->name == 'DSD') {

            $update_app_momitor = AppMonitor::where('app_code', $app_code)->first();
            $update_app_momitor->dsd_status =  $status;
            $update_app_momitor->dsd_user_time = date('d-m-Y  H:i:s');
            $update_app_momitor->dsd_user_id = $request['user_id'];
            $update_app_momitor->dsd_user_name = $request['user_name'];
            $update_app_momitor->save();


            if ($status == 9) {
                //UPDATE ONBOARDING FORM STATUS
                $reject_status = 1;
                $new_app_status = MemberOnboarding::where('app_code', $app_code)->first();
                $app_status->approval_status = $reject_status;
                $app_status->save();


                $approval_doc = new RejectlDocs();

                if ($request['document'] != "") {
                    $fileExt = $request['document']->getClientOriginalExtension();
                    $regdate =  $app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
                    $logoName = '/rejection_documents/' . $regdate;
                    $request['document']->move(public_path('rejection_documents'), $logoName);
                    $approval_doc->document = $logoName;

                    $approval_doc->app_code = $request['app_code'];
                    $approval_doc->user_id = $request['user_id'];
                    $approval_doc->save();

                    $files = public_path('/' . $approval_doc->document);


                    $note = $new_appStatus->note;
                    $email_data = array(
                        //'email' =>'aboajah.emmanuel@fmdqgroup.com',
                        'user_email' => $user_email,
                        'user_name' => $user_name,
                        'institution' => $institution,
                        'note' => $note
                    );

                    Mail::send('emails.dsdapp_notify_reject', $email_data, function ($message) use ($email_data, $files) {
                        $message->to($email_data['user_email'])
                            ->subject('Account Opening')
                            ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');

                        $message->attach($files);
                    });

                    return Redirect::back()->with('info', 'Application Rejected');
                }



                $note = $new_appStatus->note;
                $email_data = array(
                    //'email' =>'aboajah.emmanuel@fmdqgroup.com',
                    'user_email' => $user_email,
                    'user_name' => $user_name,
                    'institution' => $institution,
                    'note' => $note
                );

                Mail::send('emails.dsdapp_notify_reject', $email_data, function ($message) use ($email_data) {
                    $message->to($email_data['user_email'])
                        ->subject('Account Opening')
                        ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');
                });

                return Redirect::back()->with('info', 'Application Rejected');
            } else {



                $group =  Group::where('name', '=', 'MEG')->first();
                $email_data = array(
                    'email' =>
                    $group->email,
                    'institution' => $institution,
                );

                Mail::send('emails.dsdapp_notify', $email_data, function ($message) use ($email_data) {
                    $message->to($email_data['email'], $email_data['institution'])
                        ->subject('Account Opening')
                        ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');
                });

                return Redirect::back()->with('success', 'Application Approved');
            }




            // DSD email data

            // else{
            //     $email_data = array(
            //         'email' =>'aboajah.emmanuel@fmdqgroup.com',
            //         'institution' =>$institution->name,
            //         );

            //         Mail::send('emails.dsdapp_notify', $email_data, function ($message) use ($email_data) {
            //         $message->to($email_data['email'],$email_data['institution'])
            //         ->subject('Account Opening')
            //         ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');
            //         });
            // }



        }




        if ($group->name == 'MEG') {

            $update_app_momitor = AppMonitor::where('app_code', $app_code)->first();
            $update_app_momitor->meg_status =  $status;
            $update_app_momitor->meg_user_time = date('d-m-Y  H:i:s');
            $update_app_momitor->meg_user_id = $request['user_id'];
            $update_app_momitor->meg_user_name = $request['user_name'];
            $update_app_momitor->save();



            $approval_doc = new ApprovalDocs();

            if ($request['document'] != "") {
                $fileExt = $request['document']->getClientOriginalExtension();
                $regdate =  $app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
                $logoName = '/approval_documents/' . $regdate;
                $request['document']->move(public_path('approval_documents'), $logoName);
                $approval_doc->document = $logoName;

                $approval_doc->app_code = $request['app_code'];
                $approval_doc->user_id = $request['user_id'];
                $approval_doc->save();

                //$new_onboard_id = $new_onboard_step_three->id;

            }



            // email data
            $group =  Group::where('name', '=', 'DOD')->first();
            $email_data = array(
                'email' => $group->email,
                'institution' => $institution,
            );

            Mail::send('emails.megapp_notify', $email_data, function ($message) use ($email_data) {
                $message->to($email_data['email'])
                    ->subject('Account Opening')
                    ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');
            });

            return Redirect::back()->with('success', 'Application Approved.');
        }




        // if($group->name == 'DOD')
        // {

        //     $update_app_momitor = AppMonitor::where('app_code', $app_code)->first();
        //     $update_app_momitor->dod_status =  $status;
        //     $update_app_momitor->dod_user_time = date('d-m-Y  H:i:s');
        //     $update_app_momitor->dod_user_id = $request['user_id'];
        //     $update_app_momitor->dod_user_name = $request['user_name'];
        //     $update_app_momitor->save();



        //     $partner_update = MemberOnboarding::where('app_code', $app_code)->first();
        //     $partner_update->Partner_BPID = $request['Partner_bpid'];
        //     $partner_update->Client_BPID = $request['Client_bpid'];
        //     $app_status->save();





        //             $pat_id = MemberOnboarding::where('app_code', $app_code)->first();

        //             $part_details = DB::table('users')
        //             ->join('OnboardingFormsTemp', 'users.id', '=', 'OnboardingFormsTemp.user_id')
        //             ->where('users.id','=',  $pat_id->user_id)
        //             ->first();

        //         // email data
        //         $email_data = array(
        //             'email' => $pat_id->user_email,
        //             'name' => $pat_id->user_name,
        //               'institution' => $pat_id->institution_name,
        //             'Partner_BPID' => $partner_update->Partner_BPID,
        //             'Client_BPID' =>  $partner_update->Client_BPID ,
        //             );

        //             Mail::send('emails.applictioncomplete', $email_data, function ($message) use ($email_data) {
        //             $message->to($email_data['email'])
        //             ->subject('Account Opening - Completed')
        //             ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');
        //             });






        //     // MEG email data
        //     $email_data = array(
        //         'institution' => $pat_id->institution_name,
        //         'email' => 'aboajah.emmanuel@fmdqgroup.com',
        //         'Partner_BPID' => $partner_update->Partner_BPID,
        //         'Client_BPID' =>  $partner_update->Client_BPID ,
        //         );

        //         Mail::send('emails.applictioncompleteinternal', $email_data, function ($message) use ($email_data) {
        //         $message->to($email_data['email'])
        //         ->cc(['e3techngltd@gmail.com', 'bisalluremartng@gmail.com', 'goddadyemail2019@gmail.com'])
        //         ->subject('Account Opening - Completed')
        //         ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');
        //         });






        //     return Redirect::back()->with('success', 'Application Approved.');
        // }



        if ($group->name == 'ICG') {

            $update_app_momitor = AppMonitor::where('app_code', $app_code)->first();
            $update_app_momitor->icg_status =  $status;
            $update_app_momitor->icg_user_time = date('d-m-Y  H:i:s');
            $update_app_momitor->icg_user_id = $request['user_id'];
            $update_app_momitor->icg_user_name = $request['user_name'];
            $update_app_momitor->save();
        }




        return Redirect::back()->with('success', 'Application Approved.');
    }



    public function megstatus(Request $request)
    {
        $app_code = $request['app_code'];
        $note = $request['note'];
        $status = $request['status'];



        if ($request['status'] ==  5) {


            $this->validate($request, [
                'note' => 'required',
                'document' => 'required',
            ]);

            $update_app_momitor = AppMonitor::where('app_code', $app_code)->first();
            $update_app_momitor->meg_status =  $request['status'];
            $update_app_momitor->meg_user_time = date('d-m-Y  H:i:s');
            $update_app_momitor->meg_user_id = $request['user_id'];
            $update_app_momitor->meg_user_name = $request['user_name'];
            $update_app_momitor->save();


            $app_status = MemberOnboarding::where('app_code', $app_code)->first();
            $app_status->approval_status = $request['status'];
            $app_status->save();


            $new_appStatus = new ApplicationStatus();
            $new_appStatus->status = $request['status'];
            $new_appStatus->note = $request['note'];
            $new_appStatus->app_code = $request['app_code'];
            $new_appStatus->user_id = $request['user_id'];
            $new_appStatus->save();


            $approval_doc = new RejectlDocs();

            if ($request['document'] != "") {
                $fileExt = $request['document']->getClientOriginalExtension();
                $regdate =  $app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
                $logoName = '/rejection_documents/' . $regdate;
                $request['document']->move(public_path('rejection_documents'), $logoName);
                $approval_doc->document = $logoName;

                $approval_doc->app_code = $request['app_code'];
                $approval_doc->user_id = $request['user_id'];
                $approval_doc->save();

                $files = public_path('/' . $approval_doc->document);
            }



            // email data 
            $institution = $app_status->institution_name;
            $group =  Group::where('name', '=', 'DSD')->first();
            $email_data = array(
                'email' => $group->email,
                'note' => $note,
                'institution' => $institution,
            );

            Mail::send('emails.megapp_notify_reject', $email_data, function ($message) use ($email_data, $files) {
                $message->to($email_data['email'])
                    ->subject('Account Opening')
                    ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');

                $message->attach($files);
            });

            return Redirect::back()->with('info', 'Application Rejected');
        }



        if ($request['status'] ==  7) {

            $this->validate($request, [

                'document' => 'required',
            ]);

            $update_app_momitor = AppMonitor::where('app_code', $app_code)->first();
            $update_app_momitor->dod_status =  $status;
            $update_app_momitor->dod_user_time = date('d-m-Y  H:i:s');
            $update_app_momitor->dod_user_id = $request['user_id'];
            $update_app_momitor->dod_user_name = $request['user_name'];
            $update_app_momitor->save();


            $app_status = MemberOnboarding::where('app_code', $app_code)->first();
            $app_status->approval_status = $status;
            $app_status->save();



            $new_appStatus = new ApplicationStatus();
            $new_appStatus->status = $request['status'];
            $new_appStatus->note = $request['note'];
            $new_appStatus->app_code = $request['app_code'];
            $new_appStatus->user_id = $request['user_id'];
            $new_appStatus->save();



            $approval_doc = new ApprovalDocs();
            if ($request['document'] != "") {
                $fileExt = $request['document']->getClientOriginalExtension();
                $regdate =  $app_code . '_' . date("Y-m-d") . '_' . time() . '.' . $fileExt;
                $logoName = '/approval_documents/' . $regdate;
                $request['document']->move(public_path('approval_documents'), $logoName);
                $approval_doc->document = $logoName;

                $approval_doc->app_code = $request['app_code'];
                $approval_doc->user_id = $request['user_id'];
                $approval_doc->save();

                //$new_onboard_id = $new_onboard_step_three->id;

            }



            // email data
            $institution = $app_status->institution_name;
            $group =  Group::where('name', '=', 'DOD')->first();
            $email_data = array(
                'email' => $group->email,
                'institution' => $institution,
            );

            Mail::send('emails.megapp_notify', $email_data, function ($message) use ($email_data) {
                $message->to($email_data['email'])
                    ->subject('Account Opening')
                    ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');
            });


            $this->validate($request, [
                'note' => 'required',
            ]);
        }
    }










    public function dod_status(Request $request)
    {
        $app_code = $request['app_code'];
        $status = $request['status'];
        $note = $request['note'];

        if ($request['status'] == 8) {


            $this->validate($request, [
                'Partner_bpid' => 'required',
                'Client_bpid' => 'required',
            ]);


            $update_app_momitor = AppMonitor::where('app_code', $app_code)->first();
            $update_app_momitor->dod_status =  $status;
            $update_app_momitor->dod_user_time = date('d-m-Y  H:i:s');
            $update_app_momitor->dod_user_id = $request['user_id'];
            $update_app_momitor->dod_user_name = $request['user_name'];
            $update_app_momitor->save();



            $partner_update = MemberOnboarding::where('app_code', $app_code)->first();
            $partner_update->Partner_BPID = $request['Partner_bpid'];
            $partner_update->Client_BPID = $request['Client_bpid'];
            $partner_update->approval_status = $status;
            $partner_update->save();

            $new_appStatus = new ApplicationStatus();
            $new_appStatus->status = $request['status'];
            $new_appStatus->app_code = $request['app_code'];
            $new_appStatus->user_id = $request['user_id'];
            $new_appStatus->save();



            $pat_id = MemberOnboarding::where('app_code', $app_code)->first();

            $part_details = DB::table('users')
                ->join('OnboardingFormsTemp', 'users.id', '=', 'OnboardingFormsTemp.user_id')
                ->where('users.id', '=',  $pat_id->user_id)
                ->first();

            // email data
            $group =  Group::where('name', '=', 'ICG')->first();
            $email_data = array(
                'email' => $group->email,
                'institution' => $pat_id->institution_name,
                'Partner_BPID' => $partner_update->Partner_BPID,
                'Client_BPID' =>  $partner_update->Client_BPID,
            );

            Mail::send('emails.dod_notify', $email_data, function ($message) use ($email_data) {
                $message->to($email_data['email'])
                    ->subject('Account Opening')
                    ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');
            });



            $pat_id =  MemberOnboarding::where('app_code', '=', $app_code)->first();

            $email = $pat_id->user_email;
            $user_name = $pat_id->user_name;
            $institution_name = $pat_id->institution_name;
            $Partner_BPID = $pat_id->Partner_BPID;
            $Client_BPID = $pat_id->Client_BPID;

            // email data
            $email_data = array(
                'email' => $email,
                'name' => $user_name,
                'institution' => $institution_name,
                'Partner_BPID' => $Partner_BPID,
                'Client_BPID' =>  $Client_BPID,
            );

            Mail::send('emails.applictioncomplete', $email_data, function ($message) use ($email_data) {
                $message->to($email_data['email'])
                    ->subject('Account Opening - Completed')
                    ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');
            });



            return Redirect::back()->with('success', 'Application Approved');
        }




        if ($request['status'] == 6) {

            $this->validate($request, [

                'note' => 'required',

            ]);

            $update_app_momitor = AppMonitor::where('app_code', $app_code)->first();
            $update_app_momitor->dod_status =  $status;
            $update_app_momitor->dod_user_time = date('d-m-Y  H:i:s');
            $update_app_momitor->dod_user_id = $request['user_id'];
            $update_app_momitor->dod_user_name = $request['user_name'];
            $update_app_momitor->save();



            $partner_update = MemberOnboarding::where('app_code', $app_code)->first();
            $partner_update->approval_status = $status;
            $partner_update->save();


            $new_appStatus = new ApplicationStatus();
            $new_appStatus->status = $request['status'];
            $new_appStatus->note = $request['note'];
            $new_appStatus->app_code = $request['app_code'];
            $new_appStatus->user_id = $request['user_id'];
            $new_appStatus->save();



            $pat_id = MemberOnboarding::where('app_code', $app_code)->first();


            $part_details = DB::table('users')
                ->join('OnboardingFormsTemp', 'users.id', '=', 'OnboardingFormsTemp.user_id')
                ->where('users.id', '=',  $pat_id->user_id)
                ->first();

            // email data
            $group =  Group::where('name', '=', 'MEG')->first();
            $email_data = array(
                'email' => $group->email,
                'institution' => $pat_id->institution_name,
                'note' => $note,

            );

            Mail::send('emails.dodapp_notify_reject', $email_data, function ($message) use ($email_data) {
                $message->to($email_data['email'])
                    ->subject('Account Reject')
                    ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');
            });



            return Redirect::back()->with('info', 'Application Rejected');
        }
    }






    public function icgstatus(Request $request)
    {
        $app_code = $request['app_code'];
        $note = $request['note'];
        $status = $request['status'];

        if ($request['status'] ==  7) {

            $this->validate($request, [
                'note' => 'required',
            ]);

            $update_app_momitor = AppMonitor::where('app_code', $app_code)->first();
            $update_app_momitor->icg_status =  $request['status'];
            $update_app_momitor->icg_user_time = date('d-m-Y  H:i:s');
            $update_app_momitor->icg_user_id = $request['user_id'];
            $update_app_momitor->icg_user_name = $request['user_name'];
            $update_app_momitor->save();


            $app_status = MemberOnboarding::where('app_code', $app_code)->first();
            $app_status->approval_status = $request['status'];
            $app_status->save();


            $new_appStatus = new ApplicationStatus();
            $new_appStatus->status = $request['status'];
            $new_appStatus->note = $request['note'];
            $new_appStatus->app_code = $request['app_code'];
            $new_appStatus->user_id = $request['user_id'];
            $new_appStatus->save();






            // email data 
            $institution = $app_status->institution_name;
            $group =  Group::where('name', '=', 'DOD')->first();
            $email_data = array(
                'email' => $group->email,
                'note' => $note,
                'institution' => $institution,
            );

            Mail::send('emails.icgapp_notify_reject', $email_data, function ($message) use ($email_data) {
                $message->to($email_data['email'])
                    ->subject('Account Rejected')
                    ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');
            });

            return Redirect::back()->with('info', 'Application Rejected');
        }



        if ($request['status'] ==  10) {



            $app_status = MemberOnboarding::where('app_code', $app_code)->first();
            $app_status->approval_status = $request['status'];
            $app_status->save();


            $update_app_momitor = AppMonitor::where('app_code', $app_code)->first();
            $update_app_momitor->icg_status =  $status;
            $update_app_momitor->icg_user_time = date('d-m-Y  H:i:s');
            $update_app_momitor->icg_user_id = $request['user_id'];
            $update_app_momitor->icg_user_name = $request['user_name'];
            $update_app_momitor->save();









            $pat_id =  MemberOnboarding::where('app_code', '=', $app_code)->first();

            $email = $pat_id->user_email;
            $user_name = $pat_id->user_name;
            $institution_name = $pat_id->institution_name;
            $Partner_BPID = $pat_id->Partner_BPID;
            $Client_BPID = $pat_id->Client_BPID;
            //   return    $part_details = DB::table('users')
            //     ->join('OnboardingFormsTemp', 'users.id', '=', 'OnboardingFormsTemp.user_id')
            //     ->where('users.id','=',  $pat_id->user_id)
            //     ->first();

            // email data
            // $email_data = array(
            //     'email' => $email,
            //     'name' => $user_name,
            //     'institution' => $institution_name,
            //     'Partner_BPID' => $Partner_BPID,
            //     'Client_BPID' =>  $Client_BPID,
            // );

            // Mail::send('emails.applictioncomplete', $email_data, function ($message) use ($email_data) {
            //     $message->to($email_data['email'])
            //         ->subject('Account Opening - Completed')
            //         ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');
            // });








            // MEG email data



            $group_email = Group::pluck('email')->toArray();
            $data = array(
                'institution' => $pat_id->institution_name,
                'Partner_BPID' => $pat_id->Partner_BPID,
                'Client_BPID' =>  $pat_id->Client_BPID,
            );
            Mail::send('emails.applictioncompleteinternal', $data, function ($message) use ($group_email) {
                $message->to($group_email)
                    ->subject('Account Opening - Completed')
                    ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');
            });




            // Mail::send('emails.applictioncompleteinternal', $email_data, function ($message) use ($email_data) {
            //     $message->to($email_data['email'])
            //         ->cc(['adeoluwa.owolabi@fmdqgroup.com', 'juliet.iwuji@fmdqgroup.com', 'peter.ejeomo@fmdqgroup.com'])
            //         ->subject('Account Opening - Completed')
            //         ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');
            // });






            return Redirect::back()->with('success', 'Application Approved.');
        }
    }




    public function uploadinvoice(Request $request)
    {
        //return $request;
        $app_code = $request['app_code'];
        $invoice_doc = $request['invoice_doc'];

        $this->validate($request, [

            'invoice_doc' => 'required',
        ]);

        $invoice_upload = MemberOnboarding::where('app_code', '=', $app_code)->first();



        if ($request->hasFile('invoice_doc') && $request->file('invoice_doc')->isValid()) {

            $invoice_upload = MemberOnboarding::where('app_code', '=', $app_code)->first();
            $invoice_upload_doc = $request->file('invoice_doc');
            $name = Str::slug($request->app_code) . '.' . $invoice_upload_doc->getClientOriginalExtension();
            $destinationPath = public_path('invoice');
            $invoice_upload_doc->move($destinationPath, time() . '-' . $name);
            $db_file = time() . '-' . $name;


            $invoice_upload->invoice_doc = $db_file;
            $invoice_upload->save();

            $files = public_path('invoice/' . $db_file);


            // email data 
            $institution = $invoice_upload->institution_name;
            $email = $invoice_upload->user_email;
            $email_data = array(
                'email' => $email,
                'institution' => $institution,
            );

            Mail::send('emails.invoiceemail', $email_data, function ($message) use ($email_data, $files) {
                $message->to($email_data['email'])
                    ->subject('Eligibility Fee Invoice')
                    ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');


                $message->attach($files);
            });


            return Redirect::back()->with('success', 'Invoice Uploaded');
        }
    }




    public function uploadreceipt(Request $request)
    {
        //return $request;
        $app_code = $request['app_code'];
        $receipt_doc = $request['receipt_doc'];

        $this->validate($request, [

            'receipt_doc' => 'required',
        ]);

        $receipt_upload = MemberOnboarding::where('app_code', '=', $app_code)->first();



        if ($request->hasFile('receipt_doc') && $request->file('receipt_doc')->isValid()) {

            $receipt_upload = MemberOnboarding::where('app_code', '=', $app_code)->first();
            $receipt_upload_doc = $request->file('receipt_doc');
            $name = Str::slug($request->app_code) . '.' . $receipt_upload_doc->getClientOriginalExtension();
            $destinationPath = public_path('receipt');
            $receipt_upload_doc->move($destinationPath, time() . '-' . $name);
            $db_file = time() . '-' . $name;


            $receipt_upload->receipt_doc = $db_file;
            $receipt_upload->save();

            $files = public_path('receipt/' . $db_file);


            // email data 
            $institution = $receipt_upload->institution_name;
            $email = $receipt_upload->user_email;
            $group =  Group::where('name', '=', 'DSD')->first();


            $email_data = array(
                'email' =>  $group->email,
                'institution' => $institution,
            );

            Mail::send('emails.receiptemail', $email_data, function ($message) use ($email_data, $files) {
                $message->to($email_data['email'])
                    ->subject('Payment Receipt')
                    ->from('no-reply@fmdqgroup.com', 'FMDQ Participant Onboarding Portal');


                $message->attach($files);
            });


            return Redirect::back()->with('success', 'Payment Receipt Uploaded');
        }
    }
}
