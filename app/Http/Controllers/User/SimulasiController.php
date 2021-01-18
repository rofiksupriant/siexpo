<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Casing;
use App\Models\HardDiskDrive;
use App\Models\Keyboard;
use App\Models\Motherboard;
use App\Models\Mouse;
use App\Models\MousePad;
use App\Models\PowerSuplyUnit;
use App\Models\Processor;
use App\Models\RandomAccessMemory;
use App\Models\SolidStateDrive;
use App\Models\VgaCard;
use Illuminate\Http\Request;

class SimulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $randomAccessMemories = RandomAccessMemory::all();
        $hardDisks            = HardDiskDrive::all();
        $solidStateDrives     = SolidStateDrive::all();
        $casings              = Casing::all();
        $vgaCards             = VgaCard::all();
        $powerSuplyUnits      = PowerSuplyUnit::all();
        $keyboards            = Keyboard::all();
        $mice                 = Mouse::all();
        $mousePads            = MousePad::all();

        return view('pages.user.simulasi', compact(
            'randomAccessMemories',
            'hardDisks',
            'solidStateDrives',
            'casings',
            'vgaCards',
            'powerSuplyUnits',
            'keyboards',
            'mice',
            'mousePads'
        ));
    }

    public function processors(Request $request)
    {
        $processors = Processor::where(function ($query) use ($request) {
            if ($request->filled('brand_id')) {
                $query->where('brand_id', $request->brand_id);
            }
        })->get();

        return $processors;
    }

    public function motherboards(Request $request)
    {
        $motherboards = Motherboard::where(function ($query) use ($request) {
            if ($request->filled('processor_brand_id')) {
                $query->where('processor_brand_id', $request->processor_brand_id);
            }
        })->get();

        return $motherboards;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
