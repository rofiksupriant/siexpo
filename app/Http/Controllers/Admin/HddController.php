<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HardDiskDrive;
use Illuminate\Http\Request;

class HddController extends Controller
{
    protected $route = "hdd";

    public function index()
    {
        $hardDisks  = HardDiskDrive::with('brand')->orderBy('created_at','desc')->paginate(10);
        $parentMenu = "Master Data";
        $menu       = "HDD";
        $brands     = HardDiskDrive::brandDropdown();

        return view('pages.admin.hdd', compact('hardDisks', 'menu', 'brands', 'parentMenu'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'capacity' => 'required|numeric',
            'price'    => 'required|numeric',
            'brand_id' => 'nullable|exists:brands,id'
        ]);

        $hardDisk = new HardDiskDrive();

        $hardDisk->name     = $request->name;
        $hardDisk->capacity = $request->capacity;
        $hardDisk->price    = $request->price;
        $hardDisk->brand_id = $request->brand_id;
        $hardDisk->save();

        return redirect()->route($this->route);
    }

    public function edit($id)
    {
        $hardDisk = HardDiskDrive::findOrFail($id);

        return $hardDisk;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'capacity' => 'required|numeric',
            'price'    => 'required|numeric',
            'brand_id' => 'nullable|numeric|exists:brands,id'
        ]);

        $hardDisk = HardDiskDrive::findOrFail($request->id);

        $hardDisk->name     = $request->name;
        $hardDisk->capacity = $request->capacity;
        $hardDisk->price    = $request->price;
        $hardDisk->brand_id = $request->brand_id;

        $hardDisk->save();

        return redirect()->route($this->route);
    }

    public function delete($id)
    {
        HardDiskDrive::findOrFail($id)->delete();

        return redirect()->route($this->route);
    }
}
