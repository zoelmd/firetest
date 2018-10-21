<?php

namespace App\Http\Controllers;

use App\Operator;
use Illuminate\Http\Request;
use App\Country;

class OperatorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getOperators(){

        $data['operators'] = Operator::all();
        $data['countries'] = Country::all();
        $data['page_title'] = 'Operator List Manage';
        return view('operator.operators',$data);
    }

     public function operatorUniqueCheck(Request $request){

     	//return $request->operator_name; 
     	$raw = Operator::whereCountry_id($request->country_id)->whereOperator_name($request->operator_name)->get()->count();
     	if($raw==1){
     		return 1;
     	}else{
     		return 0;
     	}

    }

    public function operatorCreate(Request $request){

    		
             $this->validate($request,[
		            'operator_name' => 'required',
		            'operator_logo' => 'mimes:jpeg,png|max:500',
		            'country_id' => 'required',
		            'operator_code' => 'required',
                    'min_recharge' => 'numeric',
                    'max_recharge' => 'numeric'
        		]);
             
    		if ($request->hasFile('operator_logo')) {
				 $filename = time().'.'.request()->operator_logo->getClientOriginalExtension();
				request()->operator_logo->move(public_path('/../../assets/images/operatorlogo/'), $filename);
				}
    		$operator = Operator::create([
    						'operator_name'=> $request->operator_name,
    						'operator_logo'=>$filename,
    						'country_id'=>$request->country_id,
    						'operator_code'=>$request->operator_code,
    						'min_recharge'=>$request->min_recharge,
    						'max_recharge'=>$request->max_recharge
    						]);

    		return redirect()->back()->withMsg('Operator Create Successfully!');
    }

    public function editOperator(Request $request){
    		
    		
            $operator = Operator::find($request->operator_id);
    		return $operator;
    }

    public function updateOperator(Request $request){

           
             $this->validate($request,[
                    'edit_operator_name' => 'required',
                    'edit_country_id' => 'required',
                    'edit_operator_code' => 'required',
                    'edit_min_recharge' => 'numeric',
                    'edit_max_recharge' => 'numeric'
                ]);

             if ($request->hasFile('operator_logo')) {
                 $filename = time().'.'.request()->operator_logo->getClientOriginalExtension();
                request()->operator_logo->move(public_path('/../../assets/images/operatorlogo/'), $filename);
                }else{
                    $filename = Operator::findOrFail($request->edit_operator_id)->operator_logo;
                }
    		
    		$operator = Operator::whereId($request->edit_operator_id)
                                    ->update([
                                        'operator_name'=> $request->edit_operator_name,
                                        'operator_logo'=>$filename,
                                        'country_id'=>$request->edit_country_id,
                                        'operator_code'=>$request->edit_operator_code,
                                        'min_recharge'=>$request->edit_min_recharge,
                                        'max_recharge'=>$request->edit_max_recharge
                                    ]);
    		return redirect()->back()->withMsg('Operator Update Successfully!');
    }

    public function operatorByCountry(Request $request){

       $country_id = Country::whereDial_code($request->country_code)->first()->id;
       $operators = Operator::whereCountry_id($country_id)->get();
       
       $operator = '';
       foreach ($operators as $key => $value) {
         $link = url('/assets/images/operatorlogo/');
           $operator.= '<a href="#" class="item item-hover vertical-center">
                                    <div class="item-image-wrapper">
                                        <figure class="item-image-container">
                                            <img alt="Top up Airtel with Bitcoin" class="img-responsive" src="'.$link.'/'.$value->operator_logo.'" sizes="180px" width="200" height="40" srcset="">
                                        </figure>
                                    </div>
                                    <div class="item-meta-container">
                                        <h3 class="item-name">'.$value->operator_name.'</h3>
                                    </div>
                                </a>';
       }
       
        $data['operator'] = $operator;
        $data['country_name'] = Country::whereDial_code($request->country_code)->first()->country_name;

        return response()->json($data);
    }

    public function deleteOperator(Request $request){
            
            $operator = Operator::destroy($request->operator_id);
            return $operator;
    }
}
