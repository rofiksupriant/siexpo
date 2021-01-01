<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keyboard;
use Illuminate\Http\Request;

class KeyboardController extends Controller
{
    protected $route = "keyboard";

    public function index()
    {
        $keyboards  = Keyboard::with('brand')->orderBy('created_at','desc')->paginate(10);
        $parentMenu = "Master Data";
        $menu       = "Keyboard";
        $brands     = Keyboard::brandDropdown();

        return view('pages.admin.keyboard', compact('keyboards', 'menu', 'brands', 'parentMenu'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'brand_id' => 'nullable|exists:brands,id'
        ]);

        $keyboard = new Keyboard();
        $keyboard->name = $request->name;
        $keyboard->price = $request->price;
        $keyboard->brand_id = $request->brand_id;
        $keyboard->save();

        return redirect()->route($this->route);
    }

    public function edit($id)
    {
        $keyboard = Keyboard::findOrFail($id);

        return $keyboard;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'brand_id' => 'nullable|numeric|exists:brands,id'
        ]);

        $keyboard = Keyboard::findOrFail($request->id);

        $keyboard->name     = $request->name;
        $keyboard->price    = $request->price;
        $keyboard->brand_id = $request->brand_id;

        $keyboard->save();

        return redirect()->route($this->route);
    }

    public function delete($id)
    {
        Keyboard::findOrFail($id)->delete();

        return redirect()->route($this->route);
    }
}
