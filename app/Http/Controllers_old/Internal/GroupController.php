<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GroupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required|unique:groups,name'
        ]);

        $group = Group::create(['name' => $request->input('name')]);
        return Redirect::back()->with('success', 'Group created successfully.');
    }



    public function edit(Request $request, $id)

    {
        return $request;
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:groups,email'

        ]);

        $group = Group::find($id);
        $group->name = $request->input('name');
        $group->email = $request->input('email');
        $group->save();



        return Redirect::back()->with('success', 'Group Update successfully.');
    }



    public function delete($id)
    {
        $group = Group::where('id', $id)->first();
        $group->delete();

        return Redirect::back()->with('success', 'Group deleted successfully.');
    }
}
