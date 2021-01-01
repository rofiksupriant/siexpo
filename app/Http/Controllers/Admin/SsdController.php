<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SolidStateDrive;
use Illuminate\Http\Request;

class SsdController extends Controller
{
    protected $route = "ssd";

    public function index()
    {
        $ssds       = SolidStateDrive::with('brand')->orderBy('created_at','desc')->paginate(10);
        $parentMenu = "Master Data";
        $menu       = "SSD";
        $brands     = SolidStateDrive::brandDropdown();

        return view('pages.admin.ssd', compact('ssds', 'menu', 'brands', 'parentMenu'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'capacity' => 'required|numeric',
            'brand_id' => 'nullable|exists:brands,id'
        ]);

        $ssd = new SolidStateDrive();

        $ssd->name     = $request->name;
        $ssd->price    = $request->price;
        $ssd->capacity = $request->capacity;
        $ssd->brand_id = $request->brand_id;
        $ssd->save();

        return redirect()->route($this->route);
    }

    public function edit($id)
    {
        $ssd = SolidStateDrive::findOrFail($id);

        return $ssd;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'capacity' => 'required|numeric',
            'brand_id' => 'nullable|numeric|exists:brands,id'
        ]);

        $ssd = SolidStateDrive::findOrFail($request->id);

        $ssd->name     = $request->name;
        $ssd->price    = $request->price;
        $ssd->capacity = $request->capacity;
        $ssd->brand_id = $request->brand_id;

        $ssd->save();

        return redirect()->route($this->route);
    }

    public function delete($id)
    {
        SolidStateDrive::findOrFail($id)->delete();

        return redirect()->route($this->route);
    }
}
