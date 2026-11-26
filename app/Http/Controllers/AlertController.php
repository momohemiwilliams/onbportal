<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\Alert;
use App\Models\Market;
use App\Models\TransactionPendealer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AlertController extends Controller
{
    public function index(Request $request)
    {
         $data = Alert::all();
         $rules = Rule::all();
         $markets = Market::all();
        return view('alert.alerts', compact('data','rules','markets'));
    }


    public function store(Request $request)
        {
            $this->validate($request, [
                'name' => 'required',
                
            ]);

            $new_rule = new Alert();
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
        
            $rule_update = Alert::find($id);
            $rule_update->name = $request->input('name');
            $rule_update->save();
        
         
        
            return Redirect::back()->with('success', 'Market Update successfully.');
        }



        public function deleteRule($id)
        {
            $user = Alert::where('id', $id)->first();
            $user->delete();

            return Redirect::back()->with('success', 'Rule deleted successfully.');
        }


        public function checkrule()
        {

            $alerts = TransactionPendealer::get();

            $user = TransactionPendealer::where('username', 'bobbyiliev')->get();

            $alerts->FaceValue; 

            return Redirect::back()->with('success', 'Rule deleted successfully.');
        }
}
