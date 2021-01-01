<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RandomAccessMemory;
use Illuminate\Http\Request;

class RamController extends Controller
{
    protected $route = "ram";

    public function index()
    {
        $rams = RandomAccessMemory::with('brand')->orderBy('created_at','desc')->paginate(10);
        $parentMenu = "Master Data";
        $menu = "RAM";
        $brands = RandomAccessMemory::brandDropdown();

        return view('pages.admin.ram', compact('rams', 'menu', 'brands', 'parentMenu'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'size'     => 'required|numeric',
            'brand_id' => 'nullable|exists:brands,id'
        ]);

        $ram = new RandomAccessMemory();

        $ram->name     = $request->name;
        $ram->price    = $request->price;
        $ram->size     = $request->size;
        $ram->brand_id = $request->brand_id;
        $ram->save();

        return redirect()->route($this->route);
    }

    public function edit($id)
    {
        $ram = RandomAccessMemory::findOrFail($id);

        return $ram;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'size'     => 'required|numeric',
            'brand_id' => 'nullable|numeric|exists:brands,id'
        ]);

        $ram = RandomAccessMemory::findOrFail($request->id);

        $ram->name     = $request->name;
        $ram->price    = $request->price;
        $ram->size     = $request->size;
        $ram->brand_id = $request->brand_id;

        $ram->save();

        return redirect()->route($this->route);
    }

    public function delete($id)
    {
        RandomAccessMemory::findOrFail($id)->delete();

        return redirect()->route($this->route);
    }
}
