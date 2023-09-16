@extends('home.layouts.home')
@section('title',__('Category'))
@section('content')
    @if ($posts->isNotEmpty())
        <section>
            <div class="my-5 d-flex justify-content-center">
                <h2 class="btn btn-success btn-lg">{{__('Posts')}} : {{ $category->name }}</h2>
            </div>
            <div class="container">
                <div class="row g-4">
                    @include('home.sections.posts')
                </div>
            </div>
            <div class="my-5 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </section>
    @endif
    @if ($newses->isNotEmpty())
        <section>
            <div class="my-5 d-flex justify-content-center">
                <h2 class="btn btn-success btn-lg">{{__('News')}} : {{ $category->name }}</h2>
            </div>
            <div class="container">
                <div class="row g-4">
                    @include('home.sections.news')
                </div>
            </div>

            <div class="my-5 d-flex justify-content-center">
                {{ $newses->links() }}
            </div>
        </section>
    @endif

@endsection
