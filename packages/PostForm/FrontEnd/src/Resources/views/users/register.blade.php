@extends('front_end::master')

@section('page-content')
<div class="container login-form" id='hero'>
    <h1 class='text-center mb-2'>Pest Form</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <!-- <div class="card-header">{{ __('Register') }}</div> -->

                <div class="card-body">
                    <p class='text-center mb-4'>{{ _('Start Your 5-Day Free Trial') }}</p>

                    <form method="POST" action="{{ route('front_end.register.create') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="email">{{ __('Email Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            
                            <div class="col-md-12">
                                <label for="password" >{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            
                            <div class="col-md-12">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="w-100 btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
