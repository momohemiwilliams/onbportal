<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index(Request $request)
    {
        $groups = Group::all();
        return view('participants.index', compact('groups'));
    }



    public function participant()
    {
       
        return view('participants.participant');
    }


    public function participantform()
    {
       
        return view('participants.depositoryparticipantform');
    }


   

    public function participantformSubmit()
    {
        return "am here";
       
        return view('participants.participantform');
    }




    


    
}
