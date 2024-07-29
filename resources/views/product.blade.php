@extends('layouts.auth')
@section('content')

<div class="container">
    <div class="row my-5">
        @include('layouts.sidebar')
        <div class="col-md-9">
            @include('layouts.message') 
            <div class="card border-0 shadow">
                <div class="card-header  text-white">
                    Product
                    <a class="btn btn-success float-end" href="javascript:void(0)" id="createNewProduct"> <span class="fa fa-plus"></span>&nbsp;New</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped data-table">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Product Type</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-data">
                            <tr>
                                <td class="text-center">No</td>
                                <td class="text-center">Name</td>
                                <td class="text-center">Product Type</td>
                                <td class="text-center">Status</td>
                                <td class="text-center">Action</td>
                            </tr>
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
                <form id="productForm" name="productForm" class="form-horizontal">
                   <input type="hidden" name="product_id" id="product_id">
                   <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input value="{{ old('product_name') }}" type="text" class="form-control @error('product_name') is-invalid @enderror" placeholder="Product Name" name="product_name" id="product_name" />
                        @error('product_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="product_desc" class="form-label">Product Desc</label>
                        <textarea class="form-control  @error('product_name') is-invalid @enderror"" name="product_desc" id="product_desc" rows="3">
                            {{ old('product_desc') }}
                        </textarea>
                        @error('product_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                          
                    <div class="mb-3">
                        <label for="status" class="form-label @error('status') is-invalid @enderror">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="product_type" class="form-label @error('product_type') is-invalid @enderror">Product Type</label>
                        <select name="product_type" id="product_type" class="form-control">
                            <option value="1">Loan</option>
                            <option value="2">Subsidy</option>
                        </select>
                        @error('product_type')
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
        serverSide: false,
        ajax: {
            url: '{{ route('list.product') }}',
            type: 'GET',
            dataSrc: ''
        },
        columns: [
            {data: 'id', class:'text-center'},
            {data: 'product_name'},
            {data: 'product_type', class:'text-center',
                render: function(product_type, type, row) {
                    if (product_type == '1') {
                        return '<span class="badge bg-success">Loan</span>';
                    } else {
                        return '<span class="badge bg-danger">Subsidy</span>';
                    }
                }
            },
            {data: 'status', class:'text-center',
                render: function(status, type, row) {
                    if (status == '1') {
                        return '<span class="badge bg-success">Active</span>';
                    } else {
                        return '<span class="badge bg-danger">Inactive</span>';
                    }
                }
            },
            {data: 'id', class:'text-center',
                render: function(id, type, row) {
                    if (status == '1') {
                        return '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'+id+'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"><span class="fa fa-edit"></span></a>&nbsp;<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'+id+'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><span class="fa fa-trash"></span></a>';
                    } else {
                        return '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'+id+'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"><span class="fa fa-edit"></span></a>&nbsp;<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'+id+'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><span class="fa fa-trash"></span></a>';
                    }
                }
            },

        ],
        defaultContent: "<div class='text-center'>...</div>"
    });
    
    $('#createNewProduct').click(function () {
        $('#saveBtn').val("create-product");
        $('#product_id').val('');
        $('#productForm').trigger("reset");
        $('#modelHeading').html("Create New Product");
        $('#ajaxModel').modal('show');
    });
        
    $('body').on('click', '.editProduct', function () {
        var product_id = $(this).data('id');
        $.get("{{ route('api.product') }}" +'/edit/' + product_id , function (data) {
            $('#modelHeading').html("Edit Product");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#product_id').val(data.id);
            $('#product_name').val(data.product_name);
            $('#product_desc').val(data.product_desc);
            $('#product_type').val(data.product_type);
            $('#status').val(data.status);
        })
    });
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
            data: $('#productForm').serialize(),
            url: "{{ route('save.product') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#productForm').trigger("reset");
                $('#saveBtn').html('Save Changes');
                $('#ajaxModel').modal('hide');
                table.ajax.reload();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
    });
    
    $('body').on('click', '.deleteProduct', function () {
    
        var product_id = $(this).data("id");
        if(confirm("Are You sure want to delete !")){
            $.ajax({
                type: "DELETE",
                url: "{{ route('api.product') }}"+'/delete/'+product_id,
                success: function (data) {
                    table.ajax.reload();
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