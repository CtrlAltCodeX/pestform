@extends('back_end::master')

@section('page-content')

<div id='page-content'>
    <a href='{{ route("back_end.form.create") }}' class="btn btn-primary w-15 float-right mb-4" style="float: right;margin-right:30px;">New Form</a>
    
    <div class="row w-100 justify-content-end mt-4 form-list align-items-end flex-column-reverse">
        @if (! $forms->isEmpty())
            @foreach($forms as $form)
            <div class="col-lg-9 mb-3">
                <div class="card border-light animate-up-3 shadow-soft p-0 p-lg-2">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <a href="{{ route('back_end.form.show', $form->id) }}"><b>{{ $form->name }}</b> </a><br>
        
                            <p>{{ $form->endpoint }}</p>
                            <input type='hidden' id='endpoint' value="{{ $form->endpoint }}">
                        </div>
                        <div>
                            <a onclick="copy()">Copy Embeded Code</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else 
            <div class="row">
                <div class="col-md-12 shadow-sm text-center p-5">
                    <img src='/back_end/images/msg.svg' class="mb-4">
                    <h4>There doesn`t seem to be anything here!</h4>
                    <p>Any form submissions you mark as archived will appear here.</p>
                </div>
            </div>
        @endif
    </div>

</div>

@endsection

@push('script')
    <script>

        function copy(){
            var endPoint = document.getElementById("endpoint");
            endPoint.select();
            document.execCommand('copy');
            alert('Copied');
        }


    </script>
@endpush