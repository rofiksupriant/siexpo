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
                    @foreach ($fans as $fan)
                    <tr>
                        <td>{{$fan->name}}</td>
                        <td>{{$fan->price}}</td>
                        <td>{{$fan->brand?$fan->brand->name:"-"}}</td>
                        <td>
                            <div class="dropdown dropleft">
                                <button class="btn btn-transparent text-muted p-0 border-0" type="button" id="actionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v" style="opacity: 0.5;"></i>
                                </button>
                                <div x-placement="bottom-end" class="dropdown-menu" >
                                    <a id="updateAction" data-id={{$fan->id}} href="#" class="dropdown-item" type="button" style="opacity: 0.5;"><i class="fas fa-edit"> Edit</i></a>
                                    <a id="deleteAction" data-id={{$fan->id}} href="#" class="dropdown-item" type="button" style="opacity: 0.5;"><i class="fas fa-trash"> Delete</i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex">
                <div class="mx-auto mt-5">
                    {{ $fans->links('pagination::bootstrap-4') }}
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
                <form id="create" action="{{ route('create_fan') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-form-label">Harga</label>                    
                        <input type="number" class="form-control" id="price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="brand" class="col-form-label">Merek</label> 
                        <select class="custom-select" id="brand" name="brand_id">
                            <option selected>Pilih Merek</option>
                            @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>                              
                            @endforeach
                        </select>
                    </div>
                </form>
                <div class="row mt-5">
                    <button type="button" class="btn btn-primary" style="margin: 0 auto" 
                        onclick="event.preventDefault();
                            document.getElementById('create').submit();"
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
                <form id="update" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-form-label">Harga</label>                    
                        <input type="number" class="form-control" id="price" name="price" value="">
                    </div>
                    <div class="form-group">
                        <label for="brand" class="col-form-label">Merek</label> 
                        <select class="custom-select" id="brand" name="brand_id">
                            <option selected>Pilih Merek</option>
                            @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>                              
                            @endforeach
                        </select>
                    </div>
                </form>
                <div class="row mt-5">
                    <button type="button" class="btn btn-primary" style="margin: 0 auto" 
                        onclick="event.preventDefault();
                            document.getElementById('update').submit();"
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
        var routeUpdate = "{{ route('update_fan',":id") }}";
        let url = "{{ route('form_update_fan',":id") }}";

        url = url.replace(':id',id);
        routeUpdate = routeUpdate.replace(':id',id);

        $.ajax({
            url: url,
            type: 'GET',
            // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            // data: {
            //     _token: '{{ csrf_token() }}'
            // },
            success: function (fan) {
                $("#update #name").val(fan.name);
                $("#update #price").val(fan.price);
                $("#update #brand").val(fan.brand_id);
                $("#update").get(0).setAttribute('action', routeUpdate);
          }
        })
        
        $('#updateModal').modal('show');
    });
        
    $(document).on("click", "#deleteAction", function () {
        id = $(this).data('id');
        var routeDelete = "{{ route('delete_fan',":id") }}";
        routeDelete = routeDelete.replace(':id',id);

        $("#delete").get(0).setAttribute('action', routeDelete);
        $("#delete").submit();
    });
    </script>
@endpush
