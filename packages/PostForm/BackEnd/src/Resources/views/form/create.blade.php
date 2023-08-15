@extends('back_end::master')

@section('page-content')

<div id='page-content'>
    <create-form></create-form>
</div>

@endsection

@push('script')

<script type='text/x-template' id="create-form-template">
  <!-- ======= Create form Section ======= -->
    <section id="contact" class="contact w-100">
      <div class="container">
        <div class="row mt-5 justify-content-center">
          <div class="col-lg-8 mt-5 mt-lg-0">
            <form @submit.prevent='createForm(event)' ref='create-form'>
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
                <div class="text-center col-12">
                  <button type="submit">Create</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  <!-- End Create form Section -->
</script>

<script>
  app.component('create-form', {
    template: "#create-form-template",

    data() {
      return {
        formData: {
          name:'',
          emails:'',
          url:'',
          user_id: @json(auth()->user()->id)
        }
      }
    },

    methods: {
      createForm(event) {
        const data = this.formData;

        axios.post('{{ route("create.form.index") }}', {data}).then(
            (response) => {
                toast.success(response.data.message);

                this.formData.name = "";
                this.formData.emails = "";
                this.formData.url = "";

                // window.location.href = '/forms';

            }).catch(($e) => {
              toast.error($e);
            });
      }
    }
  });
</script>
@endpush

