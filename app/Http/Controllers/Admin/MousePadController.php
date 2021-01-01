<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MousePad;
use Illuminate\Http\Request;

class MousePadController extends Controller
{
    protected $route = "mousePad";

    public function index()
    {
        $mousePads  = MousePad::with('brand')->orderBy('created_at','desc')->paginate(10);
        $parentMenu = "Master Data";
        $menu       = "Mouse Pad";
        $brands     = MousePad::brandDropdown();

        return view('pages.admin.mousepad', compact('mousePads', 'menu', 'brands', 'parentMenu'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'brand_id' => 'nullable|exists:brands,id'
        ]);

        $mouse = new MousePad();
        $mouse->name = $request->name;
        $mouse->price = $request->price;
        $mouse->brand_id = $request->brand_id;
        $mouse->save();

        return redirect()->route($this->route);
    }

    public function edit($id)
    {
        $mouse = MousePad::findOrFail($id);

        return $mouse;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'brand_id' => 'nullable|numeric|exists:brands,id'
        ]);

        $mouse = MousePad::findOrFail($request->id);

        $mouse->name = $request->name;
        $mouse->price = $request->price;
        $mouse->brand_id = $request->brand_id;

        $mouse->save();

        return redirect()->route($this->route);
    }

    public function delete($id)
    {
        MousePad::findOrFail($id)->delete();

        return redirect()->route($this->route);
    }
}
