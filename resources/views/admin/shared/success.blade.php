@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show d-flex justify-content-between" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>
@endif
