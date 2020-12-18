@extends('layouts.admin')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <table id="" class="table table-hover">
                <div class="float-right">
                   {{-- <a href="http://"><i class="fas fa-plus"></i></a> --}}
                   <button type="button" class="btn btn-sm btn-transparent" data-toggle="modal" data-target="#createModal" style="opacity: 0.5;"><i class="fas fa-plus"></i></button> 
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
                        <td>{{$processor->brandText()}}</td>
                        <td>
                            <div class="dropdown dropleft">
                                <button class="btn btn-transparent" type="button" id="actionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v" style="opacity: 0.5;"></i>
                                </button>
                                <div class="dropdown-menu" >
                                    <a id="updateAction" data-id={{$processor->id}} href="#" class="dropdown-item" type="button" style="opacity: 0.5;"><i class="fas fa-edit"> Edit</i></a>
                                    <a data-id={{$processor->id}} href="#" class="dropdown-item" type="button" style="opacity: 0.5;"
                                         onclick="event.preventDefault(); document.getElementById('deleteAction').submit();"
                                        ><i class="fas fa-trash"> Delete</i>
                                    </a>
                                    <form id="deleteAction" action="{{ url('admin/delete_processor',$processor->id) }}" method="POST" >
                                        @csrf
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
            <!-- /.card-body -->
        </div>
    </div>

    {{-- create modal start--}}
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Processor Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>  
            <div class="modal-body">
                <form id="create-processor" action="{{ url('admin/create_processor') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="processor-name" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="processor-name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="processor-price" class="col-form-label">Harga</label>                    
                        <input type="number" class="form-control" id="processor-price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="processor-brand" class="col-form-label">Merek</label> 
                        <select class="custom-select" id="processor-brand" name="brand">
                            <option selected>Pilih Merek</option>
                            @foreach ($brands as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>                              
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" 
                    onclick="event.preventDefault();
                        document.getElementById('create-processor').submit();"
                >Simpan</button>
            </div>
            </div>
        </div>
    </div>
    {{-- create modal end--}}

    {{-- update modal start--}}
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Edit Processor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>  
            <div class="modal-body">
                <form id="update-processor" action="{{ url('admin/update_processor') }}" method="POST">
                    @csrf
                    <input type="hidden" id="processor-id" name="id" value="1">
                    <div class="form-group">
                        <label for="processor-name" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="processor-name" name="name" value="Nama">
                    </div>
                    <div class="form-group">
                        <label for="processor-price" class="col-form-label">Harga</label>                    
                        <input type="number" class="form-control" id="processor-price" name="price" value="2500000">
                    </div>
                    <div class="form-group">
                        <label for="processor-brand" class="col-form-label">Merek</label> 
                        <select class="custom-select" id="processor-brand" name="brand">
                            @foreach ($brands as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>                              
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" 
                    onclick="event.preventDefault();
                        document.getElementById('update-processor').submit();"
                >Simpan</button>
            </div>
            </div>
        </div>
    </div>
    {{-- update modal end--}}
@endsection

@push('script')
    <script>
        $(document).on("click", "#updateAction", function () {
        var id = $(this).data('id');

        $.ajax({
            url: "{{URL::to('admin/form_update_processor')}}/"+ id,
            type: 'GET',
            // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (processor) {
                $(".modal-body #processor-id").val(processor.id);
                $(".modal-body #processor-name").val(processor.name);
                $(".modal-body #processor-price").val(processor.price);
                $(".modal-body #processor-brand").val(processor.brand);
          }
        })
        
        $('#updateModal').modal('show');
    });

    </script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script> --}}
@endpush
