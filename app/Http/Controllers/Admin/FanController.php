<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fan;
use Illuminate\Http\Request;

class FanController extends Controller
{
    protected $route = "fan";

    public function index()
    {
        $fans       = Fan::with('brand')->orderBy('created_at', 'desc')->paginate(10);
        $parentMenu = "Master Data";
        $menu       = "Fan";
        $brands     = Fan::brandDropdown();

        return view('pages.admin.fan', compact('fans', 'menu', 'brands', 'parentMenu'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'brand_id' => 'nullable|exists:brands,id'
        ]);

        $fan = new Fan();
        
        $fan->name     = $request->name;
        $fan->price    = $request->price;
        $fan->brand_id = $request->brand_id;
        $fan->save();

        return redirect()->route($this->route);
    }

    public function edit($id)
    {
        $fan = Fan::findOrFail($id);

        return $fan;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'brand_id' => 'nullable|numeric|exists:brands,id'
        ]);

        $fan = Fan::findOrFail($request->id);

        $fan->name     = $request->name;
        $fan->price    = $request->price;
        $fan->brand_id = $request->brand_id;

        $fan->save();

        return redirect()->route($this->route);
    }

    public function delete($id)
    {
        Fan::findOrFail($id)->delete();

        return redirect()->route($this->route);
    }
}
