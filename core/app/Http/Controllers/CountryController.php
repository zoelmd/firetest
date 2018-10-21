<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use Validator;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCountries(){
        $data['countries'] = Country::all();
        $data['page_title'] = 'Country List Manage';
        return view('country.countries',$data);
    }

    public function createCountry(Request $request){

        $request->validate([
            'country_name'  => 'required',
            'dial_code'     => 'required|numeric',
            'currency_code'  => 'required',
            'exchange_rate'     => 'required',
        ]);
      $data = Country::create([
                            'country_name'  => $request->country_name,
                            'dial_code'     => $request->dial_code,
                            'currency_code' => $request->currency_code,
                            'exchange_rate' => $request->exchange_rate
                            ]);
      return response()->json($data);
    }

    public function editCountry(Request $request){

        $country = Country::find($request->client_id);
        return $country;
    }

    public function updateCountry(Request $request){
         
         $this->validate($request,[
            'currency_code' => 'required',
            'exchange_rate' => 'required',
        ]);

        $data = Country::whereId($request->country_id)->update(['currency_code'=> $request->currency_code ,'exchange_rate'=> $request->exchange_rate,'status'=> $request->status_id]);
        return response()->json($data);
        //return view('country.countries',compact('countries'));
    }

    
}
