@extends('front_end::master')

@section('page-content')
<div class="container login-form" id="hero">
    <h1 class='text-center mb-2'>Pest Form</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-white max-w-lg rounded shadow-lg w-full">
                <!-- <div class="card-header">{{ __('Login') }}</div> -->

                <div class="card-body">
                    <p class='text-center mb-4'>{{ _('Welcome Back') }}</p>
                    <form method="POST" action="{{ route('front_end.user.create') }}">
                        @csrf

                        <div class="row mb-3">
                            
                            <div class="col-md-12">
                                <label for="email" >{{ __('Email Address') }}</label>
                                
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            
                            <div class="col-md-12">
                                <label for="password">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <!-- <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div> -->

                            <div class="col-md-6">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                            <div class="col-md-6" style='text-align:right;'>
                                <a href="{{ route('front_end.register.create') }}" >Register</a>
                            </div>
                        </div>



                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="w-100 btn btn-primary">
                                    {{ __('Login') }}
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
