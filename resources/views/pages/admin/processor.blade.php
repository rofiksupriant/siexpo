@extends('layouts.admin')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <table id="" class="table table-hover">
                <div class="float-right">
                   {{-- <a href="http://"><i class="fas fa-plus"></i></a> --}}
                   <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#createModal" data-whatever="@mdo"><i class="fas fa-plus"></i></button> 
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
@endsection

@push('script')
    {{-- <script>
        $('#createModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
        })
    </script> --}}
@endpush