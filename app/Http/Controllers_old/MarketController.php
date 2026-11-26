<?php

namespace App\Http\Controllers;

use App\Models\Market;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MarketController extends Controller
{

        public function index(Request $request)
        {
             $data = Market::all();
           
            return view('alert.markets', compact('data'));
        }


        public function store(Request $request)
            {
                $this->validate($request, [
                    'name' => 'required',
                    'code' => 'required',
                ]);

                $new_markrt = new Market();
                $new_markrt->name = $request['name'];
                $new_markrt->code = $request['code'];
                $new_markrt->save();   
                         
               return Redirect::back()->with('success', 'Market created successfully.');
            }


            public function updateMarket(Request $request, $id)
            {
                $this->validate($request, [
                    'name' => 'required',
                    'code' => 'required',
                ]);
            
                $market_update = Market::find($id);
                $market_update->name = $request->input('name');
                $market_update->code = $request->input('code');
                $market_update->save();
            
             
            
                return Redirect::back()->with('success', 'Market Update successfully.');
            }



            public function deleteMarket($id)
            {
                $user = Market::where('id', $id)->first();
                $user->delete();

                return Redirect::back()->with('success', 'Market deleted successfully.');
            }
    


    

}
