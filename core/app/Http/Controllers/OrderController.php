<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public  function getOrders(){
        $data['orders'] = Order::orderBy('id','desc')->get();
        $data['page_title'] = 'Recharge Request List';
        return view('order.orders',$data);
    }

    public function updateOrder(Request $request){

        $date = Carbon::createFromFormat('d-m-Y', $request->date)->startOfDay();
        if($request->update_type=="recharge"){
    		
    		if($request->status==0){
    			$status = 1;
    		}else{
    			$status = 0;
    		}

    		Order::whereId($request->order_id)->update([
    			'recharge_status'    =>$status,
                'recharge_date'      => $date
    		]);

    	}elseif($request->update_type=="payment"){
    		Order::whereId($request->order_id)->update([
    			'bit_tx_id'          => $request->status,
                'payment_date'       => $date
    		]);
    	}else{
    		return 'update not done!';
    	}
    	
    	return $request;
    }

    public  function getTranstions(){
        $data['orders'] = Order::orderBy('id','desc')->where('bit_tx_id','>','0')->get();
        $data['page_title'] = 'Transtions List';
        return view('order.transtions',$data);
    }

    public function deleteOrder(Request $request){

        
        $order = Order::destroy($request->delete_id);
        return $order;
    }

}
