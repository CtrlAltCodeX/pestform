@extends('back_end::master')

@section('page-content')

<div id='page-content' style="height:99vh;">

    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(! $formValues->isEmpty())
                <list-form></list-form>
            @else

            <div class="row">
                <div class="col-md-12 shadow-sm text-center p-5">
                    <img src='/back_end/images/msg.svg' class="mb-4">
                    <h4>There doesn’t seem to be anything here!</h4>
                    <p>Any form submissions you mark as archived will appear here.</p>
                </div>
            </div>

            @endif

        </div>
    </div>
</div>

@endsection

@push('script')
    <script type='text/x-template' id="list-form-template">
        <div class='row'>
            <div class="col-md-4 shadow-sm p-3 mb-5 rounded">
                <div class="list-group">
                    @foreach($formValues as $key => $values)
                        <a class="list-group-item list-group-item-action" @click='selectTab({{$values}}, {{$values->form}})'>
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $values->form->name }}</h5>
                                <small>{{ $values->created_at }}</small>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
    
            <div class="col-md-8 shadow-sm p-3 mb-5 rounded overflow-y-auto" style='max-height:450px;height:450px;'>
                <div class="d-flex justify-content-between">
                    <h5>@{{ formName }}</h5>@{{ date }}
                </div>
    
                <hr>
                <h5>@{{ field }} - @{{ value }} </h5>
            </div>
        </div>
    </script>

    <script>
        app.component('list-form', {
            template: "#list-form-template",

            data() {
                return {
                    field:"",
                    value:"",
                    date:"",
                    formName: "",
                }
            },

            methods:{
                selectTab(value, formName) {
                    this.value = value.values;
                    this.field = value.fields;
                    this.date = new Date(value.created_at).toDateString();
                    this.formName = formName.name;
                },
            },
        });
    </script>
@endpush