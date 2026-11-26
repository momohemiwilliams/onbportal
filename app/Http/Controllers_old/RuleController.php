<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RuleController extends Controller
{
    public function index(Request $request)
    {
         $data = Rule::all();
       
        return view('alert.rules', compact('data'));
    }


    public function store(Request $request)
        {
            $this->validate($request, [
                'name' => 'required',
                
            ]);

            $new_rule = new Rule();
            $new_rule->name = $request['name'];
            $new_rule->slug = $request['name'];
            $new_rule->save();   
                     
           return Redirect::back()->with('success', 'Market created successfully.');
        }


        public function updateRule(Request $request, $id)
        {
            $this->validate($request, [
                'name' => 'required'
            ]);
        
            $rule_update = Rule::find($id);
            $rule_update->name = $request->input('name');
            $rule_update->save();
        
         
        
            return Redirect::back()->with('success', 'Market Update successfully.');
        }



        public function deleteRule($id)
        {
            $user = Rule::where('id', $id)->first();
            $user->delete();

            return Redirect::back()->with('success', 'Rule deleted successfully.');
        }
}
