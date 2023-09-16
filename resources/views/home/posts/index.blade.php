@extends('home.layouts.home')
@section('title', __('posts'))

@section('content')

<section class="values py-5 overflow-hidden">
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="fw-bold text-center">{{__('All Posts')}}</h2>
            </div>
        </div>
        <div class="row g-4">
            @foreach ($posts as $post)
            <div class="col-md-4">
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
                                    <div class="">
                                        <a href="{{route('writer',$post->user->id)}}">
                                            <img src="{{ $post->user->getUserProfile() }}" alt="user"
                                                class="rounded-circle me-1" width="50" height="50">
                                            <span class="text-dark">{{ $post->user->name }}</span>
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="like me-3 inline-block">
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
    <div class="mt-5 d-flex align-items-center justify-content-center">
        {{$posts->links()}}
    </div>
</section>

@endsection
