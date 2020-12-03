@extends('layouts.user')

@section('content')
    <div class="container container-bg rounded mt-5 mb-5 px-5 py-5">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label col-form-label-sm">Compatibilitas</label> 
            <div class="col-sm-6">
                <select class="form-control form-control-sm " id="compatibility" name="compatibility" tabindex="-1" aria-hidden="true">
                    <option value="1">Dengan Compatibilitas</option>
                    <option value="2">Tanpa Compatibilitas</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label col-form-label-sm">Brand Processor</label> 
            <div class="col-sm-6">
                <select class="form-control form-control-sm " id="brand-processor" name="brand-processor" tabindex="-1" aria-hidden="true">
                    <option value="">--Pilih Brand Processor--</option>
                    <option value="1">INTEL</option>
                    <option value="2">AMD</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label col-form-label-sm">Processor</label> 
            <div class="col-sm-6">
                <select class="form-control form-control-sm select2 select2-hidden-accessible" id="processor" name="processor" data-text="Processor" data-select2-id="10" tabindex="-1" aria-hidden="true">
                    <option data-type="" data-item="" data-price="0" value="" data-select2-id="448">--Pilih Processor--</option>
                </select>
            </div>
        
            <div class="col-sm-1">
                <input type="number" class="form-control form-control-sm cart-quantity" name="processor_qty" min="0" value="1" onkeyup="valid_number(this)" onchange="return onChangeUpdatePrice($(this), 'q');"> 
            </div>
        
            <div class="col-sm-2">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend"> <span class="input-group-text">Rp</span> </div>
                    <input type="text" class="form-control form-control-sm text-right" name="processor_price" value="0" readonly="" data-price="0"> 
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/ajaxScript.js') }}"></script>
@endpush