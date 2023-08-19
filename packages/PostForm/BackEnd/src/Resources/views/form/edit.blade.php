@extends('back_end::master')

@section('page-content')
    
    <div id='page-content' class="py-3">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="list-group">
                    <div href="#" class="list-group-item list-group-item-action p-4" aria-current="true">
                        <h5 class="mb-1">Form Endpoint</h5><br>
                        
                        <div class="d-flex w-100 justify-content-between align-items-center">
                            <p class="mb-1 p-2 endpoint">
                                &lt;form action="{{ $form->endpoint }}" method="POST"&gt;
                            </p>
                            <small>Copy Embed Code</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center my-3">
            <div class="col-md-11">
                <div class="list-group">
                    <div class="list-group-item list-group-item-action p-4" aria-current="true">
                        <h5 class="mb-1">Form Details</h5><br>
                        
                        <div class="d-flex w-100 justify-content-between align-items-center">
                            <create-form></create-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center my-3">
            <div class="col-md-11">
                <div class="list-group">
                    <delete-form></delete-form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')

<script type='text/x-template' id="create-form-template">
    <form @submit.prevent='updateForm(event)' ref='create-form' class='w-100'>
        <div class="php-email-form row gy-2 gx-md-3">
            <div class="col-md-12 form-group">
                <input 
                type="text"
                class="form-control"
                id="name"
                placeholder="Your Name"
                v-model='formData.name'>
            </div>
            <div class="form-group col-12">
                <textarea 
                class="form-control" 
                rows="5" 
                placeholder="Message ( One Email address per line )"
                v-model='formData.emails'>
                </textarea>
            </div>
            <div class="form-group col-12">
                <input 
                type="text" 
                class="form-control" 
                placeholder="Thank You page URL"
                v-model='formData.url'>
            </div>
            <div class="col-12" style='text-align:right'>
                <button class='btn btn-primary' type="submit">Create</button>
            </div>
        </div>
    </form>
</script>

<script>
  app.component('create-form', {
    template: "#create-form-template",

    data() {
      return {
        formData: {
          name: @json($form->name),
          emails: @json($form->emails),
          url: @json($form->url),
          user_id: @json(auth()->user()->id)
        }
      }
    },

    mounted() {
       this.getEmail() 
    },

    methods: {
      updateForm(event) {
        const data = this.formData;

        axios.post('{{ route("back_end.form.update", $form->id) }}', {data}).then(
            (response) => {
                toast.success(response.data.message);

            }).catch(($e) => {
              toast.error($e);
            });
      },

      getEmail() {
        this.formData.emails = JSON.parse(this.formData.emails);
      }
    }
  });
</script>

<script type='text/x-template' id="delete-form-template">
    <form @submit.prevent='deleteForm(event)' ref='create-form'>
        <div href="#" class="list-group-item list-group-item-action p-4" aria-current="true">
            <h5 class="mb-1">Delete Form</h5><br>

            <div class="d-flex w-100 justify-content-between align-items-center">
                <p class="mb-1 p-2 endpoint">
                    This will delete this form and all its submissions. This cannot be undone.
                </p>
                <button class='btn btn-danger' type='submit'>Delete</button>
            </div>
        </div>
    </form>
</script>

<script>
  app.component('delete-form', {
    template: "#delete-form-template",

    methods: {
        deleteForm(event) {
            axios.post('{{ route("back_end.form.delete", $form->id) }}').then(
                (response) => {
                    toast.success(response.data.message);

                    window.location.href = "/forms";

                }).catch(($e) => {
                    toast.error($e);
                });
        },
    }
  });
</script>


@endpush