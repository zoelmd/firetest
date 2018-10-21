<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
        $data['page_title'] = "Edit Contact Information";
        $data['contacts'] = Contact::orderBy('id','asc')->first();
        if(!$data['contacts']){

        	$data['contacts'] = Contact::create(Contact::getDefaults());
        }
        return view('backend.interface.contact.edit', $data);
    }

     public function update(Request $request, $id)
    {
    	 $request->validate([
            'about' 		 => 'required|max:120',
            'cell_number'    => 'required',
            'email' 		 => 'required|email',
            'address'    	 => 'required',
        ]);

    	Contact::whereid($id)->update([

    		'about'  		 => $request->about,
            'cell_number'    => $request->cell_number,
            'email'  		 => $request->email,
            'address' 		 => $request->address

    	]);
       
        return redirect()->back()->withMsg('Contact info update successfully!');
    }
}
