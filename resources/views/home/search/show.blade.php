@extends('home.layouts.home')
@section('title', __('search'))
@section('content')
    @if ($posts->isNotEmpty())
        <section>
            <div class="mt-5 d-flex justify-content-center">
                <h2 class="btn btn-success btn-lg">{{__('Posts')}} {{__('with')}} {{ request()->search }}</h2>
            </div>
            <div class="container">
                <div class="row gy-5 m-0">
                    @include('home.sections.posts')
                </div>
            </div>

            <div class="my-5 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </section>
    @endif
    @if ($events->isNotEmpty())
        <section>
            <div class="mt-5 d-flex justify-content-center">
                <h2 class="btn btn-success btn-lg">{{__('Events')}} {{__('with')}} {{ request()->search }}</h2>
            </div>
            <div class="container">
                <div class="row gy-5 m-0">
                    @include('home.sections.events')
                </div>
            </div>

            <div class="my-5 d-flex justify-content-center">
                {{ $events->links() }}
            </div>
        </section>
    @endif
    @if ($newses->isNotEmpty())
        <section>
            <div class="mt-5 d-flex justify-content-center">
                <h2 class="btn btn-success btn-lg">{{__('News')}} {{__('with')}} {{ request()->search }}</h2>
            </div>
            <div class="container">
                <div class="row gy-5 m-0">
                    @include('home.sections.news')
                </div>
            </div>

            <div class="my-5 d-flex justify-content-center">
                {{ $newses->links() }}
            </div>
        </section>
    @endif


    @if ($newses->isEmpty() && $events->isEmpty() && $posts->isEmpty())
        <div class="container w-75" style="height: 50vh">
            <div class="row mt-5">

                <div class="alert alert-dark text-center mt-5 p-5" role="alert">
                    {{__('Nothing found with')}} <span class="text-danger"><strong>{{ request()->search }}</strong></span> !
                </div>
            </div>
        </div>
    @endif


@endsection
