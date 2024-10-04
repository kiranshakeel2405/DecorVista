

@if(Session::get('error'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Danger!</strong> {{Session::get('error')}}
  </div>
 @endif

 @if(Session::get('success'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Success!</strong> {{Session::get('success')}}.
</div>
 @endif

 
