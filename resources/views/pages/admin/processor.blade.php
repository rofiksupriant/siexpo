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
                        <th>Brand</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($processors as $processor)
                    <tr>
                        <td>{{$processor->name}}</td>
                        <td>{{$processor->price}}</td>
                        <td>{{$processor->brand->name}}</td>
                        <td>
                            <div class="dropdown dropleft">
                                <button class="btn btn-transparent text-muted p-0 border-0" type="button" id="actionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v" style="opacity: 0.5;"></i>
                                </button>
                                <div x-placement="bottom-end" class="dropdown-menu" >
                                    <a id="updateAction" data-id={{$processor->id}} href="#" class="dropdown-item" type="button" style="opacity: 0.5;"><i class="fas fa-edit"> Edit</i></a>
                                    <a data-id={{$processor->id}} href="#" class="dropdown-item" type="button" style="opacity: 0.5;"
                                         onclick="event.preventDefault(); document.getElementById('deleteAction').submit();"
                                        ><i class="fas fa-trash"> Delete</i>
                                    </a>
                                    <form id="deleteAction" action="{{ route('delete_processor',$processor->id) }}" method="POST" >
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    {{ $processors->links() }}
                </tfoot>
            </table>
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
                <form id="create" action="{{ route('create_processor') }}" method="POST">
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
                        <select class="custom-select" id="brand" name="brand">
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
                        <select class="custom-select" id="brand" name="brand">
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
@endsection

@push('script')
    <script>
        $(document).on("click", "#updateAction", function () {

        let id = $(this).data('id');
        let routeUpdate = "{{ route('update_processor',":id") }}";
        let url = "{{ route('form_update_processor',":id") }}";

        url = url.replace(':id',id);
        routeUpdate = routeUpdate.replace(':id',id);

        $.ajax({
            url: url,
            type: 'GET',
            // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            // data: {
            //     _token: '{{ csrf_token() }}'
            // },
            success: function (processor) {
                console.log(routeUpdate);
                $("#update #name").val(processor.name);
                $("#update #price").val(processor.price);
                $("#update #brand").val(processor.brand_id);
                $("#update").get(0).setAttribute('action', routeUpdate);
          }
        })
        
        $('#updateModal').modal('show');
    });

    </script>
@endpush
