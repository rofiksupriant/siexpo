<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Processor;
use Illuminate\Http\Request;

class ProcessorController extends Controller
{
    protected $route = "admin/master_data/processor";

    public function index()
    {
        $processors = Processor::with('brand')->paginate(10);
        $parentMenu = "Master Data";
        $menu = "Processor";
        $brands = Processor::brandDropdown();

        return view('pages.admin.processor', compact('processors', 'menu', 'brands', 'parentMenu'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'  => 'required|string',
            'price' => 'required|numeric',
            'brand_id' => 'required|numeric'
        ]);

        $processor = new Processor();
        $processor->name = $request->name;
        $processor->price = $request->price;
        $processor->brand_id = $request->brand_id;
        $processor->save();

        return redirect()->route($this->route);
    }

    public function edit($id)
    {
        $processor = Processor::findOrFail($id);

        return $processor;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string',
            'price' => 'required|numeric',
            'brand_id' => 'required|numeric'
        ]);

        $processor = Processor::findOrFail($id);

        $processor->name = $request->name;
        $processor->price = $request->price;
        $processor->brand_id = $request->brand_id;

        $processor->save();

        return redirect()->route($this->route);
    }

    public function delete($id)
    {
        Processor::findOrFail($id)->delete();

        return redirect()->route($this->route);
    }
}
