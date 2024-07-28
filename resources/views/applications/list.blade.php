@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row my-5">
        @include('layouts.sidebar')
        <div class="col-md-9">
            @include('layouts.message')  
            
            <div class="card border-0 shadow">
                <div class="card-header  text-white">
                    Applications
                </div>
                <div class="card-body pb-0">  
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('add.application') }}" class="btn btn-primary">Add Application</a>            
                        <form action="" method="get">
                            <div class="d-flex">                            
                                <input type="text" class="form-control" name="keyword" placeholder="Keywords" value="{{ Request::get('keyword') }}">
                                <button type="submit" class="btn btn-primary ms-2"> Search </button>
                                <a href="{{-- route('application_list') --}}" class="btn btn-secondary ms-2">Clear</a>
                            </div>
                        </form>
                    </div>          
                    <table class="table  table-striped mt-3">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">ID</th>    
                                <th class="text-center">Enterprise Name</th>
                                <th class="text-center">Contact Details</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            <tbody>
                                @if($applications->isNotEmpty())
                                    @foreach($applications as $application)
                                    <tr>
                                        <td>{{ $application->id }}</td>    
                                        <td>{{ $application->enterprise_name }}</td>
                                        <td><i class="fa-solid fa-phone"></i>&nbsp;{{ $application->telephone }}<br>
                                        <i class="fa-solid fa-envelope"></i>&nbsp;{{ $application->email }}<br>
                                        <i class="fa-solid fa-globe"></i>&nbsp;{{ $application->website }}<br>
                                        </td>
                                        
                                        <td class="text-center">
                                            @if($application->status=='1')
                                                <span class="badge bg-success">Active</span>
                                            @elseif($application->status=='2')
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('edit.application', $application->id) }}" class="btn btn-primary btn-sm"><i class="fa-regular fa-user"></i></a>
                                            <a href="{{ route('edit.application', $application->id) }}" class="btn btn-primary btn-sm"><i class="fa-regular fa-list"></i></a>
                                            <a href="{{ route('edit.application', $application->id) }}" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                            <a href="#" onclick="deleteApplication({{ $application->id }});" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr> 
                                    @endforeach
                                @else
                                <tr><td colspan="4"></td></tr>
                                @endif                                                               
                            </tbody>
                        </thead>
                    </table>  
                    @if($applications->isNotEmpty())
                        {{ $applications->links() }}
                    @endif 
                    <!-- <nav aria-label="Page navigation " >
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>                   -->
                    </div>
                    
                </div>                
            </div>
        </div>       

    </div>       
</div>
@endsection('content')

@section('script')
<script>
    function deleteApplication(id){
        if(confirm("Are you sure you want to delete")){
            $.ajax({
                type: "delete",
                url: "{{ route('delete.application') }}",
                data: {id:id},
                headers:{
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}',
                },

                success: function (response) {
                    window.location.href = "{{ route('list.application') }}";
                }
            });
        }
    }
</script>
@endsection