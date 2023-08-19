@extends('back_end::master')

@section('page-content')

<div id='page-content'>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class='row'>
                <div class="col-md-4 shadow-sm p-3 mb-5 rounded">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                            The current link item
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">A second link item</a>
                        <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                        <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                        <a class="list-group-item list-group-item-action disabled" aria-disabled="true">A disabled link item</a>
                    </div>
                </div>
                <div class="col-md-8 shadow-sm p-3 mb-5 rounded">
                    <div class="d-flex justify-content-between">
                        <h5>Name</h5>{{ date('10/8/2023') }}
                    </div>
                    <hr>
                    <h5>Form Fields</h5>
                    Values
                </div>
            </div>
        </div>
    </div>

</div>

@endsection