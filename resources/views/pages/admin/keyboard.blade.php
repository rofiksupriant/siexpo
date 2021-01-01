@extends('layouts.admin')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <table id="" class="table table-hover">
                <div class="float-right">
                   <button type="button" class="btn btn-sm btn-transparent mr-3" data-toggle="modal" data-target="#createModal" style="opacity: 0.5;"><i class="fas fa-plus"></i></button> 
                </div>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Merek</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keyboards as $keyboard)
                    <tr>
                        <td>{{$keyboard->name}}</td>
                        <td>{{$keyboard->price}}</td>
                        <td>{{$keyboard->brand?$keyboard->brand->name:"-"}}</td>
                        <td>
                            <div class="dropdown dropleft">
                                <button class="btn btn-transparent text-muted p-0 border-0" type="button" id="actionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v" style="opacity: 0.5;"></i>
                                </button>
                                <div x-placement="bottom-end" class="dropdown-menu" >
                                    <a id="updateAction" data-id={{$keyboard->id}} href="#" class="dropdown-item" type="button" style="opacity: 0.5;"><i class="fas fa-edit"> Edit</i></a>
                                    <a id="deleteAction" data-id={{$keyboard->id}} href="#" class="dropdown-item" type="button" style="opacity: 0.5;"><i class="fas fa-trash"> Delete</i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex">
                <div class="mx-auto mt-5">
                    {{ $keyboards->links('pagination::bootstrap-4') }}
                </div>
                </div>
            </div>
        </div>
    </div>

    {{-- create modal start--}}
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <div class="container mb-3">
                    <button type="button" class="close mb-3" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="create-keyboard" action="{{ route('create_keyboard') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="keyboard-name" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="keyboard-name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="keyboard-price" class="col-form-label">Harga</label>                    
                        <input type="number" class="form-control" id="keyboard-price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="keyboard-brand" class="col-form-label">Merek</label> 
                        <select class="custom-select" id="keyboard-brand" name="brand_id">
                            <option selected>Pilih Merek</option>
                            @foreach ($brands as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>                              
                            @endforeach
                        </select>
                    </div>
                </form>
                <div class="row mt-5">
                    <button type="button" class="btn btn-primary" style="margin: 0 auto" 
                        onclick="event.preventDefault();
                            document.getElementById('create-keyboard').submit();"
                    >Simpan</button>
                </div>
            </div>
            </div>
        </div>
    </div>
    {{-- create modal end--}}

    {{-- update modal start--}}
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-body">
                 <div class="container mb-3">
                    <button type="button" class="close mb-3" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="update-keyboard" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="keyboard-name" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="keyboard-name" name="name" value="">
                    </div>
                    <div class="form-group">
                        <label for="keyboard-price" class="col-form-label">Harga</label>                    
                        <input type="number" class="form-control" id="keyboard-price" name="price" value="">
                    </div>
                    <div class="form-group">
                        <label for="keyboard-brand" class="col-form-label">Merek</label> 
                        <select class="custom-select" id="keyboard-brand" name="brand_id">
                            @foreach ($brands as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>                              
                            @endforeach
                        </select>
                    </div>
                </form>
                <div class="row mt-5">
                    <button type="button" class="btn btn-primary" style="margin: 0 auto" 
                        onclick="event.preventDefault();
                            document.getElementById('update-keyboard').submit();"
                    >Simpan</button>
                </div>                
            </div>
            </div>
        </div>
    </div>
    {{-- update modal end--}}   
     
    {{-- delete form --}}
    <form id="delete" action="" method="POST" >
        @csrf
        @method('delete')
    </form>
@endsection

@push('script')
    <script>
        $(document).on("click", "#updateAction", function () {

        id = $(this).data('id');
        var routeUpdate = "{{ route('update_keyboard',":id") }}";
        let url = "{{ route('form_update_keyboard',":id") }}";

        url = url.replace(':id',id);
        routeUpdate = routeUpdate.replace(':id',id);

        $.ajax({
            url: url,
            type: 'GET',
            // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            // data: {
            //     _token: '{{ csrf_token() }}'
            // },
            success: function (keyboard) {
                console.log(routeUpdate);
                $(".modal-body #keyboard-name").val(keyboard.name);
                $(".modal-body #keyboard-price").val(keyboard.price);
                $(".modal-body #keyboard-brand").val(keyboard.brand_id);
                $("#update-keyboard").get(0).setAttribute('action', routeUpdate);
          }
        })
        
        $('#updateModal').modal('show');
    });        
    
    $(document).on("click", "#deleteAction", function () {
        id = $(this).data('id');
        var routeDelete = "{{ route('delete_keyboard',":id") }}";
        routeDelete = routeDelete.replace(':id',id);

        $("#delete").get(0).setAttribute('action', routeDelete);
        $("#delete").submit();
    });

    </script>
@endpush
