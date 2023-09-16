@extends('home.layouts.home')
@section('title', 'category')
@section('content')
@if ($posts->isNotEmpty())
<section>
    <div class="mt-5 d-flex justify-content-center">
        <h2 class="btn btn-success btn-lg">Posts</h2>
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
<hr>
@endif
@if ($events->isNotEmpty())
<section>
    <div class="mt-5 d-flex justify-content-center">
        <h2 class="btn btn-success btn-lg">Events</h2>
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
<hr>
@endif
@if ($newses->isNotEmpty())
<section>
    <div class="mt-5 d-flex justify-content-center">
        <h2 class="btn btn-success btn-lg">News</h2>
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

@endsection
