{{-- Message --}}
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible w-25 position-absolute" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Success !</strong> {{ session('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible w-25 position-absolute" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error !</strong> {{ session('error') }}
    </div>
@endif