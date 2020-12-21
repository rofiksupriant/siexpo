<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motherboard;
use Illuminate\Http\Request;

class MotherboardController extends Controller
{
    protected $route = "motherboard";

    public function index()
    {
        $motherboards = Motherboard::with('processor')->paginate(10);
        $parentMenu = "Master Data";
        $menu = "Motherboard";

        return view('pages.admin.motherboard', compact('motherboard', 'menu', 'parentMenu'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'  => 'required|string',
            'price' => 'required|numeric',
            'brand' => 'required|numeric'
        ]);

        $motherboard = new Motherboard();
        $motherboard->name = $request->name;
        $motherboard->price = $request->price;
        $motherboard->brand = $request->brand;
        $motherboard->save();

        return redirect($this->route);
    }

    public function edit($id)
    {
        $motherboard = Motherboard::findOrFail($id);

        $motherboard->brand_text = $motherboard->brandText();

        return $motherboard;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required|string',
            'price' => 'required|numeric',
            'brand' => 'required|numeric'
        ]);

        $motherboard = Motherboard::findOrFail($request->id);

        $motherboard->name = $request->name;
        $motherboard->price = $request->price;
        $motherboard->brand = $request->brand;

        $motherboard->save();

        return redirect('admin/processor');
    }

    public function delete($id)
    {
        Motherboard::findOrFail($id)->delete();

        return redirect('admin/processor');
    }
}
