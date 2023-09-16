@extends('home.layouts.home')
@section('title', __('Verify Email'))

@section('content')
    <section>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-primary text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">{{__('Verify Email')}}</h2>
                                <p class="text-white-50 mb-3">{{ __('Verify Your Email Address !') }}</p>



                                    <div class="card-body">
                                        @if (session('status') == 'verification-link-sent')
                                            <div class="mb-4 text-success">
                                                {{__('A new email verification link has been emailed to you!')}}
                                            </div>
                                        @endif

                                        {{ __('Before proceeding, please check your email for a verification link.') }}
                                        {{ __('If you did not receive the email') }},
                                        <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                                        </form>

                                        <div class="login-register-form text-center mt-4">
                                            {{__('If you entered the wrong email') }}

                                                <a href="{{ route('logout') }}" type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                            {{__('click here to correct it') }}
                                                </a>
                                        </div>
                                    </div>

                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
