@php
    $lang_dir = App\Models\Language::where('name', session()->get('locale') ?? App::getLocale())->first()->direction;
@endphp
@extends('home.layouts.home')
@section('title', __('news'))


@section('content')
    <section class="values py-5 overflow-hidden">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="fw-bold text-center">{{ __('All News') }}</h2>
                </div>
            </div>
            <div class="row g-4">

                @foreach ($newses as $news)
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="post-category">
                                <a style="background-color:#dc3545;"
                                    href="{{ route('category.show', $news->category->slug) }}">{{ $news->category->name }}</a>
                            </div>
                            <a href="{{ route('news.show', $news) }}">
                                <img src="{{ env('NEWS_BANNER_IMAGES_PATH') . $news->banner }}"
                                    class="card-img-top card-image" alt="value-image" />
                            </a>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">


                                </div>
                                <a href="{{ route('news.show', $news) }}">
                                    <h5 class="card-title text-primary fw-bold text-center">{{ $news->title }}</h5>
                                </a>
                                <a href="{{ route('news.show', $news) }}">

                                    <p class="card-text text-dark">
                                        {{ $news->preview }}
                                    </p>
                                </a>

                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center py-3">
                                <div>
                                    @if ($lang_dir == 'ltr')
                                        <span>{{ date('d M Y', strtotime($news->created_at)) }}</span>
                                    @else
                                        <span>{{ verta($news->time)->format('Y/n/j') }}</span>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    
                                    <div class="d-flex justify-content-between align-items-center me-3">
                                        <i class="text-danger bi bi-eye fs-5 mx-1"></i>
                                        <span>{{ $news->views }}</span>
                                    </div>

                                    <div class="comment">
                                        <i class="bi bi-chat text-danger"></i>
                                        <span>{{ $news->getCommentsCount() }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="mt-5 d-flex align-items-center justify-content-center">
            {{ $newses->links() }}
        </div>
    </section>
@endsection
