<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HardDiskDrive;
use App\Models\Processor;
use Illuminate\Http\Request;

class HddController extends Controller
{
    protected $route = "admin/processor";

    public function index()
    {
        $hardDisks = HardDiskDrive::paginate(10);

        $parentMenu = "Master Data";
        $menu = "Processor";

        return view('pages.admin.processor', compact('hardDisks', 'menu', 'parentMenu'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'  => 'required|string',
            'price' => 'required|numeric',
        ]);

        $hardDisk = new HardDiskDrive();
        $hardDisk->name = $request->name;
        $hardDisk->price = $request->price;
        $hardDisk->save();

        return redirect($this->route);
    }

    public function edit($id)
    {
        $hardDisk = HardDiskDrive::findOrFail($id);

        return $hardDisk;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required|string',
            'price' => 'required|numeric',
        ]);

        $hardDisk = HardDiskDrive::findOrFail($request->id);

        $hardDisk->name = $request->name;
        $hardDisk->price = $request->price;

        $hardDisk->save();

        return redirect($this->route);
    }

    public function delete($id)
    {
        HardDiskDrive::findOrFail($id)->delete();

        return redirect($this->route);
    }
}
