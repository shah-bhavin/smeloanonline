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
                </div>
                <div class="card-body">
                    <table class="table table-striped data-table">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Mobile No.</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Product</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-data">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Mobile No.</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Product</th>
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


<div class="modal modal-primary modal-lg fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">                
                <table class="table table-stripped myTable">
                    <tbody class="content">

                    </tbody>
                </table>
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
            {data: 'name'},
            {data: 'phone', class:'text-center'},            
            {data: 'product_type', class:'text-center',
                render: function(product_type, type, row) {
                    if (product_type) {
                        return '<span class="badge bg-secondary">'+product_type+'</span>';
                    } 
                }},
            {data: 'product', class:'text-center',
                render: function(product, type, row) {
                    if (product) {
                        return '<span class="badge bg-success">'+product+'</span>';
                    }
                }},
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
                    if (id) {
                        return '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'+id+'"  data-type="'+row['product']+'" data-original-title="Edit" class="edit btn btn-primary btn-sm editApplication"><span class="fa fa-eye"></span></a>';
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
        var id = $(this).data('id');
        var type = $(this).data('type');
        $.get("{{ route('api.loan.view') }}"  ,{ id: id, type: type}, function(data) {
            $('#modelHeading').html(data.name);
            $('#ajaxModel').modal('show');
            $('#ajaxModel .name').html(data.name);
            $('#ajaxModel .phone').html(data.phone);
            if(type == 'Machine Loan' || type == 'Subsidy Loan' ){
                if(data.machine_used_before==1){
                    var machine_used_before ='Yes';
                }else if(data.machine_used_before==2){
                    var machine_used_before ='No';
                }
                $('#ajaxModel .content').html(
                    '<tr><td><b>Name  </b></td><td>'+data.name+'</td></tr>'
                    +'<tr><td><b>Phone  </b></td><td>'+data.phone+'</td></tr>'
                    +'<tr><td><b>Cost of Machine with GST  </b></td><td>'+data.cost_with_gst+'</td></tr>'
                    +'<tr><td><b>Have You used Such Machine before  </b></td><td>'+machine_used_before+'</td></tr>'
                    +'<tr><td><b>When Will Machine be ready for Delivery  </b></td><td>'+data.machine_ready_time+'</td></tr>'
                )
            }else if(type == 'Project Loan'){
                if(data.project_stage==1){
                    var project_stage ='Land Acquired';
                }else if(data.project_stage==2){
                    var project_stage ='Identified';
                }else if(data.project_stage==3){
                    var project_stage ='Construction Started';
                }else if(data.project_stage==4){
                    var project_stage ='Machine Ordered';
                }
                $('#ajaxModel .content').html(
                    '<tr><td><b>Name  </b></td><td>'+data.name+'</td></tr>'
                    +'<tr><td><b>Phone  </b></td><td>'+data.phone+'</td></tr>'
                    +'<tr><td><b>Cost of Land (registry value)</b></td><td>'+data.cost_of_land+'</td></tr>'
                    +'<tr><td><b>Cost of Construction</b></td><td>'+data.cost_of_construction+'</td></tr>'
                    +'<tr><td><b>Cost of machine with GST???</b></td><td>'+data.cost_with_gst+'</td></tr>'
                    +'<tr><td><b>Are you putting project in same line or different line</b></td><td>'+data.project_line+'</td></tr>'
                    +'<tr><td><b>At what stage is your Project???</b></td><td>'+project_stage+'</td></tr>'
                    +'<tr><td><b>When do you want to start production from new project</b></td><td>'+data.production_start_time+'</td></tr>'
                )
            }
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