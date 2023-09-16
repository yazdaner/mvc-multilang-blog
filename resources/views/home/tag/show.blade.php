@extends('home.layouts.home')
@section('title', __('tags'))

@section('content')
    @if ($posts->isNotEmpty())
        <section>
            <div class="mt-5 d-flex justify-content-center">
                <h2 class="btn btn-success btn-lg">Posts : {{ $tag->name }}</h2>
            </div>
            <div class="row container gy-5 m-0">
                @include('home.sections.posts')
            </div>

            <div class="my-5 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </section>
        <hr>
    @endif
    @if ($events->isNotEmpty())
        <section>
            <div class="mt-5 d-flex justify-content-center">
                <h2 class="btn btn-success btn-lg">Events : {{ $tag->name }}</h2>
            </div>
            <div class="row container m-0 gy-5">
                @include('home.sections.events')
            </div>

            <div class="my-5 d-flex justify-content-center">
                {{ $events->links() }}
            </div>
        </section>
    <hr>

    @endif

    @if ($newses->isNotEmpty())
        <section>
            <div class="mt-5 d-flex justify-content-center">
                <h2 class="btn btn-success btn-lg">News : {{ $tag->name }}</h2>
            </div>
            <div class="row container m-0 gy-5">
                @include('home.sections.news')
            </div>

            <div class="my-5 d-flex justify-content-center">
                {{ $newses->links() }}
            </div>
        </section>

    @endif

@endsection
