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
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::guard()->user();

        $simulasi = new Simulasi();

        $simulasi->user_id = $user->id;
        $simulasi->name = $request->simulation_name;

        $simulasi->compatibility = $request->compatibility;
        $simulasi->processor_brand_id = $request->processor_brand;

        $simulasi->processor_id = $request->processor;
        $simulasi->processor_qty = $request->processor_qty;

        $simulasi->motherboard_id = $request->motherboard;
        $simulasi->motherboard_qty = $request->motherboard_qty;

        $simulasi->ram_id = $request->ram;
        $simulasi->ram_qty = $request->ram_qty;

        $simulasi->hdd_id = $request->hdd;
        $simulasi->hdd_qty = $request->hdd_qty;

        $simulasi->ssd_id = $request->ssd;
        $simulasi->ssd_qty = $request->ssd_qty;

        $simulasi->casing_id = $request->casing;
        $simulasi->casing_qty = $request->casing_qty;

        $simulasi->vga_id = $request->vga;
        $simulasi->vga_qty = $request->vga_qty;

        $simulasi->psu_id = $request->psu;
        $simulasi->psu_qty = $request->psu_qty;

        $simulasi->keyboard_id = $request->keyboard;
        $simulasi->keyboard_qty = $request->keyboard_qty;

        $simulasi->mouse_id = $request->mouse;
        $simulasi->mouse_qty = $request->mouse_qty;

        $simulasi->mousepad_id = $request->mousepad;
        $simulasi->mousepad_qty = $request->mousepad_qty;

        $simulasi->monitor_id = $request->monitor;
        $simulasi->monitor_qty = $request->monitor_qty;

        $simulasi->fan_id = $request->fan;
        $simulasi->fan_qty = $request->fan_qty;

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
