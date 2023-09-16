@extends('home.layouts.home')
@section('title', __('Login'))

@section('content')
    <section>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-primary text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">{{__('Login')}}</h2>
                                <p class="text-white-50 mb-5">{{__('Please enter your login and password')}} !</p>
                                @if (session('status'))
                                    <div class="mb-4 text-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="email" value="{{ old('email') }}"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            placeholder="{{__('Email')}}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            placeholder="{{__('Password')}}">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-6 mt-1">
                                            <input class="form-check-input m-0" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                        <div class="col-6">

                                            <p class="small mb-5 pb-lg-2"><a class="text-white-50"
                                                    href="{{ route('password.request') }}">{{__('Forgot password ?')}}</a></p>

                                        </div>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">{{__('Login')}}</button>

                                </form>
                            </div>

                            <div>
                                <p class="mb-0">{{__("Don't have an account?")}} <a href="{{ route('register') }}"
                                        class="text-white-50 fw-bold">{{__('Sign Up')}}</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
