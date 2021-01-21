<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Casing;
use App\Models\Fan;
use App\Models\HardDiskDrive;
use App\Models\Keyboard;
use App\Models\Monitor;
use App\Models\Motherboard;
use App\Models\Mouse;
use App\Models\MousePad;
use App\Models\PowerSuplyUnit;
use App\Models\Processor;
use App\Models\RandomAccessMemory;
use App\Models\Simulasi;
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
        $fans                 = Fan::all();
        $monitors             = Monitor::all();

        return view('pages.user.simulasi', compact(
            'randomAccessMemories',
            'hardDisks',
            'solidStateDrives',
            'casings',
            'vgaCards',
            'powerSuplyUnits',
            'keyboards',
            'mice',
            'mousePads',
            'fans',
            'monitors'
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
    public function create(Request $request)
    {
        $simulasi = new Simulasi();

        $simulasi->processor_id   = $request->processor;
        $simulasi->motherboard_id = $request->motherboard;
        $simulasi->ram_id         = $request->ram;
        $simulasi->hdd_id         = $request->hdd;
        $simulasi->ssd_id         = $request->ssd;
        $simulasi->casing_id      = $request->casing;
        $simulasi->vga_id         = $request->vga;
        $simulasi->psu_id         = $request->psu;
        $simulasi->keyboard_id    = $request->keyboard;
        $simulasi->mouse_id       = $request->mouse;
        $simulasi->mousepad_id    = $request->mousePad;
        $simulasi->monitor_id     = $request->monitor;
        $simulasi->fan_id         = $request->fan;

        $simulasi->save();

        return redirect('/');
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
