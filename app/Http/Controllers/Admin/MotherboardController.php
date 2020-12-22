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
        $motherboards = Motherboard::with('processor')->paginate(10);
        $parentMenu   = "Master Data";
        $menu         = "Motherboard";
        $brands       = Processor::brandDropdown();

        return view('pages.admin.motherboard', compact('motherboards', 'menu', 'parentMenu', 'brands'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'            => 'required|string',
            'price'           => 'required|numeric',
            'processor_brand' => 'required|numeric'
        ]);

        $motherboard = new Motherboard();
        $motherboard->name            = $request->name;
        $motherboard->price           = $request->price;
        $motherboard->processor_brand = $request->processor_brand;
        $motherboard->save();

        return redirect($this->route);
    }

    public function edit($id)
    {
        $motherboard = Motherboard::findOrFail($id);

        $motherboard->processor_brand_text = $motherboard->processorBrandText();

        return $motherboard;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'            => 'required|string',
            'price'           => 'required|numeric',
            'processor_brand' => 'required|numeric'
        ]);

        $motherboard = Motherboard::findOrFail($request->id);

        $motherboard->name            = $request->name;
        $motherboard->price           = $request->price;
        $motherboard->processor_brand = $request->processor_brand;

        $motherboard->save();

        return redirect($this->route);
    }

    public function delete($id)
    {
        Motherboard::findOrFail($id)->delete();

        return redirect($this->route);
    }
}
