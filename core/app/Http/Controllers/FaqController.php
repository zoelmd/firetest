<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use App\GeneralSetting;
class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getFAQs()
    
    {
    	$data['page_title'] = 'Frequently asked questions manage';
    	$data['faqs'] 		= Faq::All();
    	return view('backend.interface.faqs.faqs',$data);
    }

     public function index()
    {
        $data['page_title'] = "Frequently Asked Questions";
        $data['faqs'] = FAQ::all();
        return view('backend.interface.faqs.faqs', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $faq = new FAQ();
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->status = $request->status;
        $faq->save();

        return response()->json($faq);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $faq = FAQ::findOrFail($id);
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->status = $request->status;
        $faq->save();

        return response()->json($faq);
    }

    public function updateVedioLink(Request $request)
    {
    	$general_settings = GeneralSetting::orderBy('id', 'DESC')->first()->id;
    	GeneralSetting::whereId($general_settings)->update([
    		'vedio_link'=> $request->vedio_link
    	]);

    	return $general_settings;
   
        return response()->json($request->vedio_link);
    }


}
