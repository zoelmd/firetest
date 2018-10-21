<?php

namespace App\Http\Controllers;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menus = Menu::all();
         $page_title = 'Menu Manage';
        return view('backend.interface.menus.menu', compact('menus','page_title'));
    }

    public function create()
    {
         $page_title = 'Menu Create';
        return view('backend.interface.menus.createmenu',compact('page_title'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'order' => 'required|unique:menus',
                'content' => 'required'
            ]);

        $page['name'] = $request->name;
        $page['order'] = $request->order;
        $page['content'] = $request->content;


        Menu::create($page);

        return back()->with('success', 'New Menu Created Successfully!');
    }


    public function edit($id)
    {
        $page = Menu::find($id);
        $page_title = 'Menu Edit';
        return view('backend.interface.menus.editmenu', compact('page','page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Menu::find($id);

        $this->validate($request,
            [
                'name' => 'required',
                'order' => 'required|unique:menus,order,'. $page->id,
                'content' => 'required'
            ]);

        $page['name'] = $request->name;
        $page['order'] = $request->order;
        $page['content'] = $request->content;


        $page->save();

        return back()->with('success', 'Menu Updated Successfully!');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return back()->with('success', 'Deleted Successfully!');
    }
}
