<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $route = "brand";

    public function index()
    {
        $brands = Brand::paginate(10);
        $products = Brand::productDropdown();

        $menu = "Brand";
        $parentMenu = "Master Data";

        return view('pages.admin.brand', compact('brands', 'products', 'parentMenu', 'menu'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'  => 'required|string',
            'product_type' => 'required|numeric',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->product_type = $request->product_type;
        $brand->save();

        return redirect()->route($this->route);
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        $brand->product_text = $brand->productTypeText();

        return $brand;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string',
            'product_type' => 'required|numeric',
        ]);

        $brand = Brand::findOrFail($id);

        $brand->name = $request->name;
        $brand->product_type = $request->product_type;

        $brand->save();

        return redirect()->route($this->route);
    }

    public function delete($id)
    {
        Brand::findOrFail($id)->delete();

        return redirect()->route($this->route);
    }
}
