<?php

namespace App\Http\Controllers;

use App\Gateway;
use Illuminate\Http\Request;
use App\GeneralSetting;
use Image;
use App\Menu;
use App\Http\helpers;
use App\Subscribe;
use Auth;
use App\User;
use Hash;
use Session;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $data['page_title'] = 'Admin Dashboard';
        return view('backend.dashboard',$data);
    }
    
    public function editGeneralSetting(){
        $data['page_title'] = 'Edit General Setting';
        $data['general_settings'] =  GeneralSetting::orderBy('id', 'DESC')->first();
      	return view('backend.gsettings.gsetting',$data);
    }

     public function updateGeneralSetting(Request $request, $general_settings){

        
       $this->validate($request, [
            'title' => 'required',
            'decimal_point' => 'numeric',
        ]);

        $general_settings = GeneralSetting::find($general_settings);
        $str = $request->color;
        $color = ltrim($str, '#');
        $general_settings->title = $request->title;
        $general_settings->color =  $color;
        $general_settings->google_map = $request->google_map;
        $general_settings->base_currency = $request->base_currency;
        $general_settings->base_currency_symbol = $request->base_currency_symbol;
        $general_settings->decimal_point = $request->decimal_point;
        $general_settings->save();

        return redirect()->back()->withMsg('General settings successfully updated!');
    }

    public function changeLogoIcon(){
    	$data['page_title'] = 'Change Logo & Icon';
        $data['general_settings'] =  GeneralSetting::orderBy('id', 'DESC')->first(['id','icon','logo']);
      	//return $data;
      	return view('backend.interface.logo.edit',$data);
    }

    public function updateLogoIcon(Request $request, $general_settings){
    	 
    	 $general_settings = GeneralSetting::find($general_settings);
    	if ($request->hasFile('icon_image')) {
            if (file_exists('assets/images/uploads/'.$general_settings->icon)) {
                unlink('assets/images/uploads/'.$general_settings->icon);
            }

            $image = $request->file('icon_image');
            $filename = 'icon'.'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/uploads/' . $filename;
            Image::make($image)->save($location);

            $general_settings->icon = $filename;
            $general_settings->save();
        }else if($request->hasFile('logo_image')){
        	  if (file_exists('assets/images/uploads/'.$general_settings->logo)) {
                unlink('assets/images/uploads/'.$general_settings->logo);
            }

            $image = $request->file('logo_image');
            $filename = 'logo'.'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/uploads/' . $filename;
            Image::make($image)->save($location);

            $general_settings->logo = $filename;
            $general_settings->save();
        }else{

        	 return redirect()->back()->withdelmsg('Logo or Icon not uploaded!');
        }
         
         return redirect()->back()->withMsg('Logo or Icon uplod successfully!');
        
    }


    public function changeBGImage(){
        $data['page_title'] = 'BG Image Change';
        $data['general_settings'] =  GeneralSetting::orderBy('id', 'DESC')->first(['id','icon','logo']);
        //return $data;
        return view('backend.interface.bg-image.bg-image',$data);
    }

    public function bgImageUpdate(Request $request){

        if($request->hasFile('recharge_serction_image') && $request->hasFile('country_serction_image')) {
            $image = $request->file('recharge_serction_image');
            $filename = 'recharge-section-img.png';
            $location = 'assets/images/uploads/' . $filename;
            Image::make($image)->save($location);

            $image_b = $request->file('country_serction_image');
            $filename_b = 'countries-section-bg.png';
            $location_b = 'assets/images/uploads/' . $filename_b;
            Image::make($image_b)->save($location_b);
        }else if($request->hasFile('recharge_serction_image')) {
            $image = $request->file('recharge_serction_image');
            $filename = 'recharge-section-img.png';
            $location = 'assets/images/uploads/' . $filename;
          
        }else if($request->hasFile('country_serction_image')){
            
            $image = $request->file('country_serction_image');
            $filename = 'countries-section-bg.png';
            $location = 'assets/images/uploads/' . $filename;
            Image::make($image)->save($location);
        }else{

             return redirect()->back()->withdelmsg('Image not uploaded!');
        }
         
         return redirect()->back()->withMsg('Image upload successfully!');
        
    }

    public  function editGateway(){

        $data['page_title'] = 'Bitcoin Account Setting';
        $data['gateway']= Gateway::orderBy('id','asc')->first();
        return view('backend.interface.gateway.edit',$data);
    }

    public  function updateGateway(Request $request,$id){

        $request->validate([
            'val1'  => 'required',
            'val2'     => 'required',
        ]);

        Gateway::whereId($id)->update([
            'val1' => $request->val1,
            'val2' => $request->val2
        ]);

        $data['page_title'] = 'Bitcoin Account Setting';
        $data['gateway']= Gateway::orderBy('id','asc')->first();
        return redirect()->back()->withMsg('Update Successfully!');
    }


    public function feedbackContactList(){

        $data['feedback_contacts'] = Subscribe::all();
        $data['page_title'] = 'Feedback & Contact Message';
        return view('feedbackcontact.fedcon',$data);
    }

    public function deleteContactMessage(Request $request){

        $sub = Subscribe::destroy($request->id);
        return $sub;
    }

    public function resetPassword(){
         $data['page_title'] = 'Change Password';
        return view('auth.passwords.reset', $data);
    }

    public function saveResetPassword(Request $request){

       $this->validate($request, [
           'current_password' =>'required',
           'password' => 'required|min:5|confirmed'
       ]);

       try {
           $c_password = Auth::User()->password;
           $c_id = Auth::User()->id;
           //return  $c_password;

           $user = User::findOrFail($c_id);

           if(Hash::check($request->current_password, $c_password)){

               $password = Hash::make($request->password);
               $user->password = $password;
               $user->save();
               return redirect()->back()->withMsg('Password Changes Successfully.');
           }else{
               return redirect()->back()->withDelmsg('Password Not Match!');;
           }

       } catch (\PDOException $e) {
           return redirect()->back()->withDelmsg('Some Problem Occurs, Please Try Again!');
       }
    }

    public function chnageRechargeHour(Request $request){

        $this->validate($request, [
           'hour' => 'required|numeric'
       ]);
        $hour = GeneralSetting::whereId(Gateway::orderBy('id','asc')->first()->id)
                    ->update([
                            'recharge_hour' =>  $request->hour
                        ]);
        
        return $request->hour;
    }
    
}
