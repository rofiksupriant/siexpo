<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motherboard;
use App\Models\Processor;
use Illuminate\Http\Request;

class MotherboardController extends Controller
{
    protected $route = "motherboard";

    public function index()
    {
        $motherboards    = Motherboard::with('processorBrand', 'brand')->orderBy('created_at', 'desc')->paginate(10);
        $parentMenu      = "Master Data";
        $menu            = "Motherboard";
        $brands          = Motherboard::brandDropdown();
        $processorBrands = Processor::brandDropdown();

        return view('pages.admin.motherboard', compact('motherboards', 'menu', 'parentMenu', 'brands','processorBrands'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'               => 'required|string',
            'price'              => 'required|numeric',
            'brand_id'           => 'nullable|numeric',
            'processor_brand_id' => 'required|numeric'
        ]);

        $motherboard = new Motherboard();
        $motherboard->name               = $request->name;
        $motherboard->price              = $request->price;
        $motherboard->brand_id           = $request->brand_id??null;
        $motherboard->processor_brand_id = $request->processor_brand_id ?? null;
        $motherboard->save();

        return redirect()->route($this->route);
    }

    public function edit($id)
    {
        $motherboard = Motherboard::findOrFail($id);

        return $motherboard;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'               => 'required|string',
            'price'              => 'required|numeric',
            'brand_id'           => 'nullable|numeric',
            'processor_brand_id' => 'required|numeric'
        ]);

        $motherboard = Motherboard::findOrFail($request->id);

        $motherboard->name               = $request->name;
        $motherboard->price              = $request->price;
        $motherboard->brand_id           = $request->brand_id;
        $motherboard->processor_brand_id = $request->processor_brand_id;

        $motherboard->save();

        return redirect()->route($this->route);
    }

    public function delete($id)
    {
        Motherboard::findOrFail($id)->delete();

        return redirect()->route($this->route);
    }
}
