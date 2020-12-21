<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Processor;
use Illuminate\Http\Request;

class SsdController extends Controller
{
    protected $route = "admin/processor";

    public function index()
    {
        $processors = Processor::paginate(15);
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
            'brand' => 'required|numeric'
        ]);

        $processor = new Processor();
        $processor->name = $request->name;
        $processor->price = $request->price;
        $processor->brand = $request->brand;
        $processor->save();

        return redirect($this->route);
    }

    public function edit($id)
    {
        $processor = Processor::findOrFail($id);

        $processor->brand_text = $processor->brandText();

        return $processor;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required|string',
            'price' => 'required|numeric',
            'brand' => 'required|numeric'
        ]);

        $processor = Processor::findOrFail($request->id);

        $processor->name = $request->name;
        $processor->price = $request->price;
        $processor->brand = $request->brand;

        $processor->save();

        return redirect('admin/processor');
    }

    public function delete($id)
    {
        Processor::findOrFail($id)->delete();

        return redirect('admin/processor');
    }
}
