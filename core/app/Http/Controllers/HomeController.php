<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Location;
use App\Country;
use App\Operator;
use App\Menu;
use App\Subscribe;
use Session;
class HomeController extends Controller
{
    public function index()
    {
    	
        return view('recharge.newindex');
    }

    public function contactUs()
    {

        return view('recharge.contact');
    }

    public function requestRecharge(Request $request)
    {
    	
        $position = Location::get();
    	
       	$a = Country::whereDial_code($request->country_dial_code)->first();
       	if ($a=="") {
    	return redirect()->back()->withDelmsg('Operator Not Found');	
       	}
        $operators = Operator::whereCountry_id($a->id)->get();
    	
    	foreach ($operators as $key => $operator) {
    			  
    			  if($operator->operator_code[0]==0){
    			  		$operator_code_new = substr($operator->operator_code,1);
	    			  }else{
	    			  	$operator_code_new = $operator->operator_code;
	    			  }

	    		 if($request->cell_number[0]==0){

    					$cell_number = substr($request->cell_number,1);

    					$user_cell_code = substr($cell_number,0,strlen($operator_code_new));
	    		  }else{

	    		  		$user_cell_code = substr($request->cell_number,0,strlen($operator_code_new));
	    		  }
	    			  	 
	    		if($user_cell_code==$operator_code_new){
    			 $data['operator'] = $operator;
    			 $data['country'] = $a;
    			 	if($request->cell_number[0]==0){
    			 		$data['cell_number'] = substr($request->cell_number,1);
    			 	}else{

    			 		$data['cell_number'] = $request->cell_number;
    			 	}

    			 return view('recharge.rechargerequest',$data);

    			 }
    	}

    	return redirect()->back()->withDelmsg('Operator Not Found');		  

      
    }

    public function page($menu_id){
        $menu = Menu::findOrfail($menu_id);
        return view('recharge.page',compact('menu'));
    }

    public function postSubscriber(Request $request){

        $request->validate([
            'email'     => 'required|email|unique:subscribes,email'
        ]);

        Subscribe::create([

                'name'  => $request->name,
                'email' => $request->email,
                'message' => $request->message
        ]);
	}
	
	public function getUSDPrice(Request $request)
    {
        $stream_opts = [
            "ssl" => [
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ]
        ];  
      
      $all = file_get_contents("https://blockchain.info/ticker",false, stream_context_create($stream_opts));
      $res = json_decode($all);
      $currentRate =($request->amount/$request->exchange_rate) * (1/($res->USD->last));
      $data['display_btc_rate']= number_format($currentRate,8);
      $data['calculate_btc_rate']= number_format($currentRate,16);
      return response()->json($data);
    }

    public function confirmPayment(Request $request)
    {
        $order_id =$request->country_id.uniqid();
        $data['operator_url']       = $request->operator_url;
        $data['country_name']       = $request->country_name;
        $data['country_id']         = $request->country_id;
        $data['operator_id']        = $request->operator_id;
        $data['currency_code']      = $request->currency_code;
        $data['operator_name']      = $request->operator_name;
        $data['cell_number']        = $request->cell_number;
        $data['customer_email']     = $request->customer_email;
        $data['recharge_amount']    = $request->recharge_amount;
        $data['btc_amount']         = $request->btc_amount;
        $data['order_id']           = $order_id;

        $order = Order::create([
            'country_id'        =>$request->country_id,
            'operator_id'       =>$request->operator_id,
            'order_id'          =>$order_id,
            'cell_number'       =>$request->cell_number,
            'customer_email'    =>$request->customer_email,
            'recharge_amount'   =>$request->recharge_amount,
            'btc_amount'        =>$request->btc_amount
        ]);
        Session::put('Track', $order->id);
        return view('recharge.confirmpayment',$data);
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

    public  function orderChecking(){
        return view('recharge.rechargestatus');
    }

    public  function orderCheckingAjax(Request $request){

        $order = Order::whereOrder_id($request->order_id)->with('operator')->with('country')->first();
        if($order==''){
            $order =0;
            return response()->json($order);
        }else{
            return response()->json($order);
        }

    }

    public function error(){

        return view('error');
    }

}
