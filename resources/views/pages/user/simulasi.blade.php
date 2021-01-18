@extends('layouts.user')

@section('content')
    <div class="container container-bg rounded mt-5 mb-5 px-5 py-5">
        <form action="" method="post">
            <h5>KOMPATIBILITAS</h5>
            <hr>
            <div id="compatibility" class="form-group row">
                <label class="col-sm-2 col-form-label col-form-label-sm">Pilih Kompatibilitas</label> 
                <div class="col-sm-6">
                    <select class="form-control form-control-sm " id="compatibility" name="compatibility" tabindex="-1" aria-hidden="true">
                        <option selected value="1">Dengan Kompatibilitas</option>
                        <option value="2">Tanpa Kompatibilitas</option>
                    </select>
                </div>
            </div>

            <div id="processor-brand" class="form-group row" >
                <label class="col-sm-2 col-form-label col-form-label-sm">Pilih Brand Processor</label> 
                <div class="col-sm-6">
                    <select class="form-control form-control-sm " id="processor-brand" name="processor-brand" tabindex="-1" aria-hidden="true">
                        <option selected value="">--Pilih Brand Processor--</option>
                        <option value="1">INTEL</option>
                        <option value="2">AMD</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label col-form-label-sm">Pilih Processor</label> 
                <div class="col-sm-6">
                    <select class="form-control form-control-sm select2 select2-hidden-accessible" id="processor" name="processor" data-text="Processor" data-select2-id="10" tabindex="-1" aria-hidden="true"  onchange="return onChangeUpdatePrice($(this), 'q');">
                        <option data-type="" data-item="" data-price="0" value="">--Pilih Processor--</option>
                    </select>
                </div>
            
                <div class="col-sm-1">
                    <input type="number" class="form-control form-control-sm cart-quantity" id="processor_qty" name="processor_qty" min="1" value="1" onkeyup="valid_number(this)" onchange="return onChangeUpdatePrice($(this), 'q');"> 
                </div>
            
                <div class="col-sm-2">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend"> <span class="input-group-text">Rp</span> </div>
                        <input type="text" class="form-control form-control-sm text-right" id="processor_price" name="processor_price" value="0" readonly="" data-price="0"> 
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label col-form-label-sm">Pilih Motherboard</label> 
                <div class="col-sm-6">
                    <select class="form-control form-control-sm select2 select2-hidden-accessible" id="motherboard" name="motherboard" data-text="Motherboard" data-select2-id="10" tabindex="-1" aria-hidden="true"  onchange="return onChangeUpdatePrice($(this), 'q');">
                        <option data-type="" data-item="" data-price="0" value="">--Pilih Motherboard--</option>
                    </select>
                </div>
            
                <div class="col-sm-1">
                    <input type="number" class="form-control form-control-sm cart-quantity" id="motherboard_qty" name="motherboard_qty" min="1" value="1" onkeyup="valid_number(this)" onchange="return onChangeUpdatePrice($(this), 'q');"> 
                </div>
            
                <div class="col-sm-2">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend"> <span class="input-group-text">Rp</span> </div>
                        <input type="text" class="form-control form-control-sm text-right" id="motherboard_price" name="motherboard_price" value="0" readonly="" data-price="0"> 
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label col-form-label-sm">Pilih RAM</label> 
                <div class="col-sm-6">
                    <select class="form-control form-control-sm select2 select2-hidden-accessible" id="ram" name="ram" data-text="Ram" data-select2-id="10" tabindex="-1" aria-hidden="true"  onchange="return onChangeUpdatePrice($(this), 'q');">
                        <option data-type="" data-item="" data-price="0" value="">--Pilih RAM--</option>
                        @foreach ($randomAccessMemories as $ram)
                            <option data-type="" data-item="" data-price="{{$ram->price}}" value="{{$ram->id}}">{{$ram->name .' - '. $ram->price}}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="col-sm-1">
                    <input type="number" class="form-control form-control-sm cart-quantity" id="ram_qty" name="ram_qty" min="1" value="1" onkeyup="valid_number(this)" onchange="return onChangeUpdatePrice($(this), 'q');"> 
                </div>
            
                <div class="col-sm-2">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend"> <span class="input-group-text">Rp</span> </div>
                        <input type="text" class="form-control form-control-sm text-right" id="ram_price" name="ram_price" value="0" readonly="" data-price="0"> 
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label col-form-label-sm">Pilih Hard Disk</label> 
                <div class="col-sm-6">
                    <select class="form-control form-control-sm select2 select2-hidden-accessible" id="hdd" name="hdd" data-text="HDD" data-select2-id="10" tabindex="-1" aria-hidden="true"  onchange="return onChangeUpdatePrice($(this), 'q');">
                        <option data-type="" data-item="" data-price="0" value="">--Pilih Hard Disk--</option>
                        @foreach ($hardDisks as $hdd)
                            <option data-type="" data-item="" data-price="{{$hdd->price}}" value="">{{$hdd->name .' - '.$hdd->price}}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="col-sm-1">
                    <input type="number" class="form-control form-control-sm cart-quantity" id="hdd_qty" name="hdd_qty" min="1" value="1" onkeyup="valid_number(this)" onchange="return onChangeUpdatePrice($(this), 'q');"> 
                </div>
            
                <div class="col-sm-2">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend"> <span class="input-group-text">Rp</span> </div>
                        <input type="text" class="form-control form-control-sm text-right" id="hdd_price" name="hdd_price" value="0" readonly="" data-price="0"> 
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label col-form-label-sm">Pilih SSD</label> 
                <div class="col-sm-6">
                    <select class="form-control form-control-sm select2 select2-hidden-accessible" id="ssd" name="ssd" data-text="ssd" data-select2-id="10" tabindex="-1" aria-hidden="true"  onchange="return onChangeUpdatePrice($(this), 'q');">
                        <option data-type="" data-item="" data-price="0" value="">--Pilih SSD--</option>
                        @foreach ($solidStateDrives as $ssd)
                            <option data-type="" data-item="" data-price="{{$ssd->price}}" value="">{{$ssd->name .' - '. $ssd->price}}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="col-sm-1">
                    <input type="number" class="form-control form-control-sm cart-quantity" id="ssd_qty" name="ssd_qty" min="1" value="1" onkeyup="valid_number(this)" onchange="return onChangeUpdatePrice($(this), 'q');"> 
                </div>
            
                <div class="col-sm-2">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend"> <span class="input-group-text">Rp</span> </div>
                        <input type="text" class="form-control form-control-sm text-right" id="ssd_price" name="ssd_price" value="0" readonly="" data-price="0"> 
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label col-form-label-sm">Pilih Casing</label> 
                <div class="col-sm-6">
                    <select class="form-control form-control-sm select2 select2-hidden-accessible" id="casing" name="casing" data-text="casing" data-select2-id="10" tabindex="-1" aria-hidden="true"  onchange="return onChangeUpdatePrice($(this), 'q');">
                        <option data-type="" data-item="" data-price="0" value="">--Pilih Casing--</option>
                        @foreach ($casings as $casing)
                            <option data-type="" data-item="" data-price="{{$casing->price}}" value="">{{$casing->name .' - '. $casing->price}}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="col-sm-1">
                    <input type="number" class="form-control form-control-sm cart-quantity" id="casing_qty" name="casing_qty" min="1" value="1" onkeyup="valid_number(this)" onchange="return onChangeUpdatePrice($(this), 'q');"> 
                </div>
            
                <div class="col-sm-2">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend"> <span class="input-group-text">Rp</span> </div>
                        <input type="text" class="form-control form-control-sm text-right" id="casing_price" name="casing_price" value="0" readonly="" data-price="0"> 
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label col-form-label-sm">Pilih VGA</label> 
                <div class="col-sm-6">
                    <select class="form-control form-control-sm select2 select2-hidden-accessible" id="vga" name="vga" data-text="vga" data-select2-id="10" tabindex="-1" aria-hidden="true"  onchange="return onChangeUpdatePrice($(this), 'q');">
                        <option data-type="" data-item="" data-price="0" value="">--Pilih VGA--</option>
                        @foreach ($vgaCards as $vga)
                            <option data-type="" data-item="" data-price="{{$vga->price}}" value="">{{$vga->name .' - '. $vga->price}}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="col-sm-1">
                    <input type="number" class="form-control form-control-sm cart-quantity" id="vga_qty" name="vga_qty" min="1" value="1" onkeyup="valid_number(this)" onchange="return onChangeUpdatePrice($(this), 'q');"> 
                </div>
            
                <div class="col-sm-2">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend"> <span class="input-group-text">Rp</span> </div>
                        <input type="text" class="form-control form-control-sm text-right" id="vga_price" name="vga_price" value="0" readonly="" data-price="0"> 
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label col-form-label-sm">Pilih PSU</label> 
                <div class="col-sm-6">
                    <select class="form-control form-control-sm select2 select2-hidden-accessible" id="psu" name="psu" data-text="psu" data-select2-id="10" tabindex="-1" aria-hidden="true"  onchange="return onChangeUpdatePrice($(this), 'q');">
                        <option data-type="" data-item="" data-price="0" value="">--Pilih PSU--</option>
                        @foreach ($powerSuplyUnits as $psu)
                            <option data-type="" data-item="" data-price="{{$psu->price}}" value="">{{$psu->name .' - '. $psu->price}}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="col-sm-1">
                    <input type="number" class="form-control form-control-sm cart-quantity" id="psu_qty" name="psu_qty" min="1" value="1" onkeyup="valid_number(this)" onchange="return onChangeUpdatePrice($(this), 'q');"> 
                </div>
            
                <div class="col-sm-2">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend"> <span class="input-group-text">Rp</span> </div>
                        <input type="text" class="form-control form-control-sm text-right" id="psu_price" name="psu_price" value="0" readonly="" data-price="0"> 
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label col-form-label-sm">Pilih Keyboard</label> 
                <div class="col-sm-6">
                    <select class="form-control form-control-sm select2 select2-hidden-accessible" id="keyboard" name="keyboard" data-text="keyboard" data-select2-id="10" tabindex="-1" aria-hidden="true"  onchange="return onChangeUpdatePrice($(this), 'q');">
                        <option data-type="" data-item="" data-price="0" value="">--Pilih Keyboard--</option>
                        @foreach ($keyboards as $keyboard)
                            <option data-type="" data-item="" data-price="{{$keyboard->price}}" value="">{{$keyboard->name .' - '. $keyboard->price}}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="col-sm-1">
                    <input type="number" class="form-control form-control-sm cart-quantity" id="keyboard_qty" name="keyboard_qty" min="1" value="1" onkeyup="valid_number(this)" onchange="return onChangeUpdatePrice($(this), 'q');"> 
                </div>
            
                <div class="col-sm-2">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend"> <span class="input-group-text">Rp</span> </div>
                        <input type="text" class="form-control form-control-sm text-right" id="keyboard_price" name="keyboard_price" value="0" readonly="" data-price="0"> 
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label col-form-label-sm">Pilih Mouse</label> 
                <div class="col-sm-6">
                    <select class="form-control form-control-sm select2 select2-hidden-accessible" id="mouse" name="mouse" data-text="mouse" data-select2-id="10" tabindex="-1" aria-hidden="true"  onchange="return onChangeUpdatePrice($(this), 'q');">
                        <option data-type="" data-item="" data-price="0" value="">--Pilih Mouse--</option>
                        @foreach ($mice as $mouse)
                            <option data-type="" data-item="" data-price="{{$mouse->price}}" value="">{{$mouse->name .' - '. $mouse->price}}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="col-sm-1">
                    <input type="number" class="form-control form-control-sm cart-quantity" id="mouse_qty" name="mouse_qty" min="1" value="1" onkeyup="valid_number(this)" onchange="return onChangeUpdatePrice($(this), 'q');"> 
                </div>
            
                <div class="col-sm-2">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend"> <span class="input-group-text">Rp</span> </div>
                        <input type="text" class="form-control form-control-sm text-right" id="mouse_price" name="mouse_price" value="0" readonly="" data-price="0"> 
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label col-form-label-sm">Pilih Mouse Pad</label> 
                <div class="col-sm-6">
                    <select class="form-control form-control-sm select2 select2-hidden-accessible" id="mousePad" name="mousePad" data-text="mousePad" data-select2-id="10" tabindex="-1" aria-hidden="true"  onchange="return onChangeUpdatePrice($(this), 'q');">
                        <option data-type="" data-item="" data-price="0" value="">--Pilih Mouse Pad--</option>
                        @foreach ($mousePads as $mousePad)
                            <option data-type="" data-item="" data-price="{{$mousePad->price}}" value="">{{$mousePad->name .' - '. $mousePad->price}}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="col-sm-1">
                    <input type="number" class="form-control form-control-sm cart-quantity" id="mousePad_qty" name="mousePad_qty" min="1" value="1" onkeyup="valid_number(this)" onchange="return onChangeUpdatePrice($(this), 'q');"> 
                </div>
            
                <div class="col-sm-2">
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend"> <span class="input-group-text">Rp</span> </div>
                        <input type="text" class="form-control form-control-sm text-right" id="mousePad_price" name="mousePad_price" value="0" readonly="" data-price="0"> 
                    </div>
                </div>
            </div>

        </form>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
@endpush