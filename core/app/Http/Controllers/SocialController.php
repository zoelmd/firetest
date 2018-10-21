<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Social;
class SocialController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['page_title'] = "Social Icon & Link Manage";
        $data['socials'] = Social::all();
        return view('backend.interface.social.socials', $data);
    }

    public function store(Request $request)
    {
        
        Social::create([
        	'facode'=>$request->facode,
        	'faurl' =>$request->faurl
        ]);

        $this->validate($request, [
            'facode' => 'required',
            'faurl' => 'required'
        ]);

        return response()->json($request);
    }

     public function update(Request $request,$id)
    {
        Social::whereId($id)->update([
        	'facode'=>$request->facode,
        	'faurl' =>$request->faurl,
        	'status' =>$request->status
        ]);

        $this->validate($request, [
            'facode' => 'required',
            'faurl' => 'required'
        ]);

        return response()->json($request);
    }


}
