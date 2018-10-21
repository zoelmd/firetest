<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RechargeStep;

class RechargeStepController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getRechargeStep()
    {
    	$data['page_title'] = 'Recharge Step Manage';
    	$data['steps'] 		= RechargeStep::orderBy('order','asc')->get();
    	return view('backend.interface.rechargestep.steps',$data);
    }

     public function createRechareStep()
    {
    	$data['page_title'] = 'Recharge Step Manage';
    	return view('backend.interface.rechargestep.create',$data);
    }

    public function saveRechareStep(Request $request)
    {
    	 $this->validate($request,
            [
                'title' => 'required',
                'icon' => 'required',
                'description' => 'required|max:500'
            ]);

    	
    	RechargeStep::create([
    				'name'=>$request->title,
    				'order'=>$request->order_id,
    				'icon'=>$request->icon,
    				'content'=>$request->description,
    				'status'=>$request->status
    	]);
    	return redirect()->back()->withMsg('Step Create Successfully!');
    }

    public function statusRechareStep(Request $request)
    {
    	$a = RechargeStep::whereId($request->step_id)->Update([
    				'status'=>$request->status_id
    	]);
    	return $a;
    }

    public function editRechareStep($step_id)
    {
    	$data['page_title'] = 'Edit Recharge Step';
    	$data['step'] = RechargeStep::findOrFail($step_id);
    	$data['steps'] = RechargeStep::orderBy('order','asc')->get();
		return view('backend.interface.rechargestep.edit',$data);
    }

    public function updateRechareStep(Request $request, $step_id)
    {
    	
    	$this->validate($request,
            [
               'title' => 'required',
                'icon' => 'required',
                'description' => 'required|min:150'
            ]);

    	if(!$request->status=='on'){
    		$status = 1;
    	}else{
    		$status = 0;
    	}
    	
    	RechargeStep::whereId($request->step_id)->Update([
    				'name'=>$request->title,
    				'order'=>$request->order_id,
    				'icon'=>$request->icon,
    				'content'=>$request->description,
    				'status'=>$status
    	]);

    	if(!$request->previous_step_id==null){
    		RechargeStep::whereId($request->previous_step_id)->Update([
    				'order'=>$request->previous_order_id
    	]);

    	}	
    	return redirect()->back()->withMsg('Step Update Successfully!');
    }

    public function deleteRechareStep($step_id)
    {
    	RechargeStep::whereId($step_id)->delete();
		return redirect()->back()->withDelmsg('Deleted Successfully!');
    }

}
