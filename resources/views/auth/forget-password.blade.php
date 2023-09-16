@extends('home.layouts.home')
@section('title', __('Forget Password'))

@section('content')
    <section>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-primary text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">{{__('Forget Password')}}</h2>
                                <p class="text-white-50 mb-5">{{__('Please enter your email')}} !</p>
                                @if (session('status'))
                                    <div class="mb-4 text-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('password.request') }}">
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



                                    <button class="btn btn-lg btn-outline-light mt-5" type="submit">{{__('Send Password Reset Link')}}</button>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
