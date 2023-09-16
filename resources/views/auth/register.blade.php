@extends('home.layouts.home')
@section('title', __('Register'))

@section('content')
    <section>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-primary text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">{{__('Sign Up')}}</h2>
                                <p class="text-white-50 mb-5">{{__('Please Sign Up')}} !</p>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control form-control-lg  @error('name') is-invalid @enderror"
                                            placeholder="{{__('Name')}}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

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

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="password_confirmation" class="form-control form-control-lg"
                                            placeholder="{{__('Confirm Password')}}">
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5 mt-4" type="submit">{{__('Register')}}</button>
                                </form>
                            </div>

                            <div>
                                <p class="mb-0">{{__('Do you have an account ?')}} <a href="{{route('login')}}"
                                        class="text-white-50 fw-bold">{{__('Login')}}</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
