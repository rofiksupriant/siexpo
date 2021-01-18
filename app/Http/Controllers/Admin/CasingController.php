<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Casing;
use Illuminate\Http\Request;

class CasingController extends Controller
{
    protected $route = "casing";

    public function index()
    {
        $casings    = Casing::with('brand')->orderBy('created_at', 'desc')->paginate(10);
        $parentMenu = "Master Data";
        $menu       = "Casing";
        $brands     = Casing::brandDropdown();

        return view('pages.admin.casing', compact('casings', 'menu', 'brands', 'parentMenu'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'brand_id' => 'nullable|exists:brands,id'
        ]);

        $casing = new Casing();
        
        $casing->name     = $request->name;
        $casing->price    = $request->price;
        $casing->brand_id = $request->brand_id;
        $casing->save();

        return redirect()->route($this->route);
    }

    public function edit($id)
    {
        $casing = Casing::findOrFail($id);

        return $casing;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'brand_id' => 'nullable|numeric|exists:brands,id'
        ]);

        $casing = Casing::findOrFail($request->id);

        $casing->name     = $request->name;
        $casing->price    = $request->price;
        $casing->brand_id = $request->brand_id;

        $casing->save();

        return redirect()->route($this->route);
    }

    public function delete($id)
    {
        Casing::findOrFail($id)->delete();

        return redirect()->route($this->route);
    }
}
