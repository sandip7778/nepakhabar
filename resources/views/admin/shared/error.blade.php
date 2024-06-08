@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>
@endif
