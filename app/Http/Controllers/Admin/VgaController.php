<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VgaCard;
use Illuminate\Http\Request;

class VgaController extends Controller
{
    protected $route = "vga";

    public function index()
    {
        $vgas       = VgaCard::with('brand')->orderBy('created_at', 'desc')->paginate(10);
        $parentMenu = "Master Data";
        $menu       = "VGA";
        $brands     = VgaCard::brandDropdown();

        return view('pages.admin.vga', compact('vgas', 'menu', 'brands', 'parentMenu'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'brand_id' => 'nullable|exists:brands,id'
        ]);

        $vga = new VgaCard();
        
        $vga->name     = $request->name;
        $vga->price    = $request->price;
        $vga->brand_id = $request->brand_id;
        $vga->save();

        return redirect()->route($this->route);
    }

    public function edit($id)
    {
        $vga = VgaCard::findOrFail($id);

        return $vga;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'brand_id' => 'nullable|numeric|exists:brands,id'
        ]);

        $vga = VgaCard::findOrFail($request->id);

        $vga->name     = $request->name;
        $vga->price    = $request->price;
        $vga->brand_id = $request->brand_id;

        $vga->save();

        return redirect()->route($this->route);
    }

    public function delete($id)
    {
        VgaCard::findOrFail($id)->delete();

        return redirect()->route($this->route);
    }
}
