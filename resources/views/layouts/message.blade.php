@if(Session::has('success'))                        
    <div class="alert alert-success">{{ Session::get('success') }}</div>                         
@endif
@if(Session::has('error'))                        
    <div class="alert alert-danger">{{ Session::get('error') }}</div>                         
@endif 

<div class="alert alert-dismissible fade show" role="alert" style="display:none;">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <div></div>
</div>