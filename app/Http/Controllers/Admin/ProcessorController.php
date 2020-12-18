<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Processor;
use Illuminate\Http\Request;

class ProcessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processors = Processor::paginate(15);
        $parentMenu = "Master Data";
        $menu = "Processor";
        $brands = Processor::brandDropdown();

        // dd($brands);

        return view('pages.admin.processor', compact('processors', 'menu', 'brands', 'parentMenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        return redirect('/admin/processor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $processor = Processor::findOrFail($id);

        $processor->brand_text = $processor->brandText();

        return $processor;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Processor::findOrFail($id)->delete();

        return redirect('admin/processor');
    }
}
