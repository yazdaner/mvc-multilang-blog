@php
$lang_dir = App\Models\Language::where('name', session()->get('locale') ?? App::getLocale())->first()->direction;
@endphp
@extends('home.layouts.home')
@section('title', __('Home'))
@section('script')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('tabs', () => ({
            tabName: "{{ __('All') }}",
            tabs: [
                @foreach ($categories_gallery as $category_gallery)
                    {
                        'category': '{{ $category_gallery->title }}',
                        'images': [
                            @foreach ($category_gallery->images as $image)
                                {
                                    'title': '{{ $image->title }}',
                                    'caption': '{{ $image->caption }}',
                                    'image': '{{ asset(env('GALLERY_IMAGES_PATH') . $image->image) }}',
                                },
                            @endforeach
                        ]
                    },
                @endforeach {
                    'category': "{{ __('All') }}",
                    'images': [
                        @foreach ($gallery as $image)
                            {
                                'title': '{{ $image->title }}',
                                'caption': '{{ $image->caption }}',
                                'image': '{{ asset(env('GALLERY_IMAGES_PATH') . $image->image) }}',
                            },
                        @endforeach
                    ]
                }
            ],
        }))
    })
</script>
@endsection
@section('content')
    @include('home.sections.sliders')
    @if ($events->isNotEmpty())
        <section class="values py-5 overflow-hidden">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2 class="fw-bold text-center">{{ __('Events') }} | <a
                                href="{{ route('events') }}">{{ __('All') }}</a></h2>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="owl-carousel owl-carousel-post owl-theme owl-loaded" dir="ltr">



                    @foreach ($events as $event)
                        <div class="">
                                <div class="card shadow">
                                    <a href="{{ route('home.event.show', $event) }}">
                                    <img src="{{ asset(env('EVENTS_BANNER_IMAGES_PATH') . $event->banner) }}" class="card-img-top card-image"
                                        alt="value-image" />
                                    </a>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="text-danger d-flex justify-content-between align-items-center">
                                                <i class="bi bi-eye fs-5 mx-1"></i>
                                                <span>{{ $event->views }}</span>
                                            </div>

                                            <div class="comment text-danger">
                                                <i class="bi bi-chat"></i>
                                                <span>{{ $event->getCommentsCount() }}</span>
                                            </div>
                                        </div>
                                    <a href="{{ route('home.event.show', $event) }}">

                                        <h5 class="card-title text-primary fw-bold text-center">{{ $event->title }}</h5>
                                        <p class="card-text text-dark">
                                            {{ $event->preview }}
                                        </p>
                                        @if ($lang_dir == 'ltr')
                                        <span class="d-block btn btn-danger">{{ date('d M Y H:i', strtotime($event->time)) }}</span>

                                        @else
                                        <span class="d-block btn btn-danger">{{ verta($event->time)->format('H:i Y/n/j'); }}</span>

                                        @endif
                                    </a>
                                    </div>
                                </div>
                        </div>
                    @endforeach

                </div>
            </div>
            </div>
        </section>
    @endif
    @include('home.sections.aboutUs')
    @if ($posts->isNotEmpty())
        <section class="values py-5 overflow-hidden">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2 class="fw-bold text-center">{{ __('Posts') }} | <a
                                href="{{ route('posts.index') }}">{{ __('All') }}</a></h2>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="owl-carousel owl-carousel-post owl-theme owl-loaded" dir="ltr">
                        @foreach ($posts as $post)
        <div class="">
            <div class="card shadow">
                <div class="post-category">
                    <a href="{{ route('category.show', $post->category->slug) }}">{{ $post->category->name }}</a>
                </div>
                <a href="{{ route('post.show', $post) }}">
                    <img src="{{ env('BANNER_IMAGES_PATH') . $post->banner }}" class="card-img-top card-image"
                        alt="value-image" />
                </a>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-danger d-flex justify-content-between align-items-center">
                            <i class="bi bi-eye fs-5 mx-1"></i>
                            <span>{{ $post->views }}</span>
                        </div>
                        <div class="">
                            <button class="bookmark-btn bookmark-click-{{ $post->slug }}"
                                @auth
                                            onclick="bookmarkPost('{{ $post->slug }}')"

                                            @else
                                            onclick="pleaseAuthBookmark('{{ $post->slug }}')" @endauth ">
                                            <i class="bi bi-bookmark fs-5 @if ($post->is_user_bookmarked) active @endif"></i>
                                        </button>
                                    </div>
                                </div>
                                <a href="{{ route('post.show', $post) }}">

                                    <h5 class="card-title text-primary fw-bold text-center">{{ $post->title }}</h5>
                                </a>
                            <a href="{{ route('post.show', $post) }}">

                                <p class="card-text text-dark">
                                    {{ $post->preview }}
                                </p>
                            </a>

                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <div class=" d-flex justify-content-between align-items-center">
                                    <a class=" d-flex justify-content-between align-items-center" href="{{route('writer',$post->user->id)}}">
                                        <img src="{{ $post->user->getUserProfile() }}" alt="user"
                                            class="rounded-circle me-1" width="50" height="50">
                                        <span class="text-dark mx-2">{{ $post->user->name }}</span>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="like mx-2 d-flex justify-content-between align-items-center">
                                        <button class="bookmark-btn like-btn-{{ $post->slug }}"
                                            @auth
                                            onclick="likePost('{{ $post->slug }}')"

                                            @else

                                                onclick="pleaseAuth()" @endauth>

                                            <i
                                                class="bi bi-heart text-danger @if ($post->is_user_liked) active @endif"></i>

                                        </button>
                                        <span
                                            class="postLikeCount-{{ $post->slug }}">{{ $post->getPostLikeCount() }}</span>
                                    </div>
                                    <div class="comment">
                                        <i class="bi bi-chat text-danger"></i>
                                        <span>{{ $post->getCommentsCount() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
     @endforeach

                    </div>
                </div>
            </div>
        </section>
    @endif
    @include('home.sections.FAQ')
    @if ($newses->isNotEmpty())
        <section class="values py-5 overflow-hidden">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h2 class="fw-bold text-center">{{ __('News') }} | <a
                                href="{{ route('news.index') }}">{{ __('All') }}</a></h2>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="owl-carousel owl-carousel-post owl-theme owl-loaded" dir="ltr">


                    @foreach ($newses as $news)
                        <div>
                            <div class="card shadow">
                                <div class="post-category">
                                    <a style="background-color:#dc3545;"
                                        href="{{ route('category.show', $news->category->slug) }}">{{ $news->category->name }}</a>
                                </div>
                                <a href="{{ route('news.show', $news) }}">
                                    <img src="{{ env('NEWS_BANNER_IMAGES_PATH') . $news->banner }}" class="card-img-top card-image"
                                        alt="value-image" />
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
                                        <span>{{ verta($news->time)->format('Y/n/j'); }}</span>

                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">

                                        <div class="d-flex justify-content-between align-items-center mx-3">
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
            </div>
        </section>
    @endif
    @include('home.sections.data')
    @include('home.sections.professors')
    @include('home.sections.contact_us')
    @include('home.sections.gallery')
@endsection
