<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Monitor;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    protected $route = "monitor";

    public function index()
    {
        $monitors   = Monitor::with('brand')->orderBy('created_at','desc')->paginate(10);
        $parentMenu = "Master Data";
        $menu       = "Monitor";
        $brands     = Monitor::brandDropdown();

        return view('pages.admin.monitor', compact('monitors', 'menu', 'brands', 'parentMenu'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'brand_id' => 'nullable|exists:brands,id'
        ]);

        $monitor = new Monitor();

        $monitor->name     = $request->name;
        $monitor->price    = $request->price;
        $monitor->brand_id = $request->brand_id;
        $monitor->save();

        return redirect()->route($this->route);
    }

    public function edit($id)
    {
        $monitor = Monitor::findOrFail($id);

        return $monitor;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'brand_id' => 'nullable|numeric|exists:brands,id'
        ]);

        $monitor = Monitor::findOrFail($request->id);

        $monitor->name     = $request->name;
        $monitor->price    = $request->price;
        $monitor->brand_id = $request->brand_id;

        $monitor->save();

        return redirect()->route($this->route);
    }

    public function delete($id)
    {
        Monitor::findOrFail($id)->delete();

        return redirect()->route($this->route);
    }
}
