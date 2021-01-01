<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mouse;
use Illuminate\Http\Request;

class MouseController extends Controller
{
    protected $route = "mouse";

    public function index()
    {
        $mouses     = Mouse::with('brand')->orderBy('created_at','desc')->paginate(10);
        $parentMenu = "Master Data";
        $menu       = "Mouse";
        $brands     = Mouse::brandDropdown();

        return view('pages.admin.mouse', compact('mouses', 'menu', 'brands', 'parentMenu'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'brand_id' => 'nullable|numeric'
        ]);

        $mouse = new Mouse();

        $mouse->name     = $request->name;
        $mouse->price    = $request->price;
        $mouse->brand_id = $request->brand_id;
        $mouse->save();

        return redirect()->route($this->route);
    }

    public function edit($id)
    {
        $mouse = Mouse::findOrFail($id);

        return $mouse;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'brand_id' => 'nullable|numeric|exists:brands,id'
        ]);

        $mouse = Mouse::findOrFail($request->id);

        $mouse->name = $request->name;
        $mouse->price = $request->price;
        $mouse->brand_id = $request->brand_id;

        $mouse->save();

        return redirect()->route($this->route);
    }

    public function delete($id)
    {
        Mouse::findOrFail($id)->delete();

        return redirect()->route($this->route);
    }
}