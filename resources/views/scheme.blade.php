@extends('layouts.auth')
@section('content')

<div class="container">
    <div class="row my-5">
        @include('layouts.sidebar')
        <div class="col-md-9">
            @include('layouts.message') 
            <div class="card border-0 shadow">
                <div class="card-header  text-white">
                    Scheme
                    <a class="btn btn-success float-end" href="javascript:void(0)" id="createNewProduct"> <span class="fa fa-plus"></span>&nbsp;New</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped data-table">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>       
</div>


<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="schemeForm" name="schemeForm" class="form-horizontal">
                   <input type="hidden" name="scheme_id" id="scheme_id">
                   <div class="mb-3">
                        <label for="name" class="form-label">Scheme Name</label>
                        <input value="{{ old('scheme_name') }}" type="text" class="form-control @error('scheme_name') is-invalid @enderror" placeholder="Scheme Name" name="scheme_name" id="scheme_name" />
                        @error('scheme_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>       
                    <div class="mb-3">
                        <label for="author" class="form-label @error('status') is-invalid @enderror">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>       
                    <button type="submit" class="btn btn-success float-end" id="saveBtn" value="create">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>      
     
<script type="text/javascript">
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('list.scheme') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center'},
            {data: 'scheme_name', name: 'scheme_name'},
            {data: 'status', name: 'status', class: 'text-center', orderable: false, searchable: false},
            {data: 'action', name: 'action', class: 'text-center', orderable: false, searchable: false},
        ]
    });
    
    $('#createNewProduct').click(function () {
        $('#saveBtn').val("create-product");
        $('#scheme_id').val('');
        $('#productForm').trigger("reset");
        $('#modelHeading').html("Create New Product");
        $('#ajaxModel').modal('show');
    });
        
    $('body').on('click', '.editScheme', function () {
        var scheme_id = $(this).data('id');
        $.get("{{ route('api.scheme') }}" +'/edit/' + scheme_id , function (data) {
            $('#modelHeading').html("Edit Scheme");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#scheme_id').val(data.id);
            $('#scheme_name').val(data.scheme_name);
            $('#status').val(data.status);
        })
    });
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
            data: $('#schemeForm').serialize(),
            url: "{{ route('save.scheme') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
        
                $('#schemeForm').trigger("reset");
                $('#saveBtn').html('Save Changes');
                $('#ajaxModel').modal('hide');
                table.draw();
            
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
    });
    
    $('body').on('click', '.deleteScheme', function () {
    
        var scheme_id = $(this).data("id");
        if(confirm("Are You sure want to delete !")){
            $.ajax({
                type: "DELETE",
                url: "{{ route('api.scheme') }}"+'/delete/'+scheme_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }    
    });       
});
</script>
@endsection('content')