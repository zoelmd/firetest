<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\SliderText;

class SliderController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
        $data['page_title'] = 'Slider Setting';
        $data['sliders'] = Slider::all();
        return view('backend.interface.slider.slider',$data);
    }


   
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

         if($request->hasFile('image'))
        {
            $slider['image'] = uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('assets/images/slider',$slider['image']);
            $a = Slider::create($slider);
              return back()->withMsg('New Slide Image Created Successfully!');
        }else{
             return back()->withDelms('Something Wrong!');
        }

      
    }


    public function update(Request $request, $id)
    {
        $slide = Slider::find($id);

        $this->validate($request,
            [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

       if($request->hasFile('image'))
        {
            $slide['image'] = uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('assets/images/slider',$slide['image']);
            $a = $slide->save();
             return back()->with('success', 'Slide Image Updated Successfully!');
        }else{
             return back()->withDelms('Something Wrong!');
        }
       
    }


    public function destroy(Slider $slider)
    {
        $slider->delete();

        return back()->withDelmsg('Slider Image Deleted Successfully!');
    }

    public function updateSliderText(Request $request){

        if($request->id==1){

           $this->validate($request,
            [
                'text' => 'required|max:50',
            ]);

            SliderText::whereId(SliderText::all()->first()->id)
                        ->update([
                            'text_1'=> $request->text
                            ]);

        }elseif($request->id==2) {
             
              $this->validate($request,
            [
                'text' => 'required|max:60',
            ]);

             SliderText::whereId(SliderText::all()->first()->id)
                        ->update([
                            'text_2'=> $request->text
                            ]);
        }else{

            return 'Something Wrong!';
        }
    }

}
