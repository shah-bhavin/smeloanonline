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
                    <a class="btn btn-success float-end" href="javascript:void(0)" id="createNewApplication"> <span class="fa fa-plus"></span>&nbsp;New</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped data-table">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Mobile No.</th>
                                <th class="text-center">City</th>
                                <th class="text-center">Time</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-data">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Mobile No.</th>
                                <th class="text-center">City</th>
                                <th class="text-center">Time</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
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
                <form id="applicationForm" name="applicationForm" class="form-horizontal">
                   <input type="hidden" name="application_id" id="application_id">
                   <input type="hidden" name="product_type" id="product_type">
                   <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" id="name" />
                        <span class="text-danger err name_err"></span> 
                    </div>

                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input value="{{ old('mobile') }}" type="text" class="form-control @error('mobile') is-invalid @enderror" placeholder="Mobile" name="mobile" id="mobile" />
                        <span class="text-danger err mobile_err"></span>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input value="{{ old('city') }}" type="text" class="form-control @error('city') is-invalid @enderror" placeholder="City" name="city" id="city" />
                        <span class="text-danger err city_err"></span>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">Loan Time</label>
                        <input value="{{ old('loan_time') }}" type="text" class="form-control @error('loan_time') is-invalid @enderror" placeholder="Loan Time" name="loan_time" id="loan_time" />
                        <span class="text-danger err loan_time_err"></span>
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
            url: '{{ route('admin.list.application') }}',
            type: 'GET',
            dataSrc: ''
        },
        columns: [
            {data: 'id', class:'text-center'},
            {data: 'applicants_name'},
            {data: 'applicants_mobile'},
            {data: 'applicants_city'},
            {data: 'loan_time'},
            {data: 'application_type', class:'text-center',
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
                        return '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'+id+'" data-original-title="Edit" class="edit btn btn-primary btn-sm editApplication"><span class="fa fa-edit"></span></a>&nbsp;<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'+id+'" data-original-title="Delete" class="btn btn-danger btn-sm deleteApplication"><span class="fa fa-trash"></span></a>';
                    } else {
                        return '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'+id+'" data-original-title="Edit" class="edit btn btn-primary btn-sm editApplication"><span class="fa fa-edit"></span></a>&nbsp;<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'+id+'" data-original-title="Delete" class="btn btn-danger btn-sm deleteApplication"><span class="fa fa-trash"></span></a>';
                    }
                }
            },

        ],
        defaultContent: "<div class='text-center'>...</div>"
    });
    
    $('#createNewApplication').click(function () {
        $('#saveBtn').val("create-application");
        $('#application_id').val('');
        $('#applicationForm').trigger("reset");
        $('#modelHeading').html("Create New Application");
        $('#ajaxModel').modal('show');
    });
        
    $('body').on('click', '.editApplication', function () {
        var application_id = $(this).data('id');
        $.get("{{ route('api.application') }}" +'/edit/' + application_id , function (data) {
            $('#modelHeading').html("Edit Application");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#application_id').val(data.id);
            $('#product_type').val(data.product_type);
            $('#name').val(data.applicants_name);
            $('#mobile').val(data.applicants_mobile);
            $('#city').val(data.applicants_city);
            $('#loan_time').val(data.loan_time);
            $('#product_type').val(data.product_type);
            $('#status').val(data.status);
        })
    });
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
            data: $('#applicationForm').serialize(),
            url: "{{ route('admin.save.application') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#productForm').trigger("reset");
                $('#saveBtn').html('Save Changes');
                $('#ajaxModel').modal('hide');
                ShowAlert(data.msg_type, data.msg_body);
                table.ajax.reload();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
    });
    
    $('body').on('click', '.deleteApplication', function () {
    
        var product_id = $(this).data("id");
        if(confirm("Are You sure want to delete !")){
            $.ajax({
                type: "DELETE",
                url: "{{ route('api.application') }}"+'/delete/'+product_id,
                success: function (data) {
                    ShowAlert(data.msg_type, data.msg_body);
                    table.ajax.reload();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }    
    });  
    
    function ShowAlert(msg_type, msg_body) {
        var AlertMsg = $('div[role="alert"]');
        $(AlertMsg).find('div').html(msg_body);
        $(AlertMsg).removeAttr('class');
        $(AlertMsg).addClass('alert alert-dismissible '+msg_type+' fade show');
        $(AlertMsg).show();
    }
    
});


</script>


@endsection('content')