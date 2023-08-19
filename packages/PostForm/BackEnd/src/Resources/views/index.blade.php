@extends('back_end::master')

@section('page-content')

<div id='page-content'>
    <a href='{{ route("back_end.form.create") }}' class="btn btn-primary w-15 float-right mb-4" style="float: right;margin-right:30px;">New Form</a>
    
    <div class="row w-100 justify-content-end mt-4 form-list align-items-end flex-column-reverse">
        @foreach($forms as $form)
        <div class="col-lg-9 mb-3">
            <div class="card border-light animate-up-3 shadow-soft p-0 p-lg-2">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        <a href="{{ route('back_end.form.show', $form->id) }}"><b>{{ $form->name }}</b> </a><br>
    
                        {{ $form->endpoint }}
                    </div>
                    <div>
                        Copy Embeded Code
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection