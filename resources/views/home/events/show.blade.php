@php
    $lang_dir = App\Models\Language::where('name', session()->get('locale') ?? App::getLocale())->first()->direction;
@endphp
@extends('home.layouts.home')
@section('title', __('Event'))

@section('content')
<div class="post position-relative container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <div class="content-event bg-white mt-5 p-md-5 p-3 py-5">

                <div class="image-post">

                    <img class="img-fluid" src="{{ env('EVENTS_BANNER_IMAGES_PATH') . $event->banner }}" alt=""
                        style="max-height: 50vh;min-width:100%;">
                </div>
                <div class="post-datails my-5 d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <i class="bi bi-calendar text-danger"></i>
                            @if ($lang_dir == 'ltr')
                            <span>{{ date('d M Y H:i', strtotime($event->created_at)) }}</span>


                            @else
                            <span>{{ verta($event->time)->format('H:i Y/n/j'); }}</span>

                            @endif
                        </div>


                    </div>
                    <div class="d-flex justify-content-between align-items-center">

                        <div class="d-flex justify-content-between align-items-center me-3">
                            <i class="text-danger bi bi-eye fs-5 mx-1"></i>
                            <span>{{ $event->views }}</span>
                        </div>
                        <div>
                            <i class="bi bi-chat text-danger"></i>
                            <span>{{ $event->getCommentsCount() }}</span>
                        </div>
                    </div>
                </div>

                <div class="main-content-post">

                    <h2 class="fw-bold mb-4">{{ $event->title }}</h2>

                    <div class="text text-break" style="direction: rtl;">

                        {!! $event->content !!}

                    </div>

                    <hr class="my-5">
                    <div class="share-post d-flex align-items-center">
                        <div class="">
                                <h3 class="fw-bold mb-0">{{__('publishing article')}} : </h3>
                        </div>
                        <div class="social-share ms-5">
                            <a href="https://telegram.me/share/url?url={{URL::to('/').'/events/'.$event->slug}}"><i class="lh-0 bi bi-telegram"></i></a>

                            <a href="https://whatsapp://send/?text={{URL::to('/').'/events/'.$event->slug}}"><i class="lh-0 bi bi-whatsapp"></i></a>

                        </div>

                    </div>
                    <div class="tags mt-5 d-flex align-items-center">
                        <i class="bi bi-tag text-danger fs-4 lh-0 me-2"></i>
                        <div class="">

                            @foreach ($event->tags as $tag)
                                <a href="{{route('tag.show',$tag->name)}}">#{{ $tag->name }}</a> {{ $loop->last ? '' : ',' }}
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            <div class="content-post bg-white my-5 p-md-5 p-3 py-4" id="response">
                <h4 class="fw-bold">{{ $event->getCommentsCount() }} {{__('Comments')}} </h4>

                <hr>


                @auth
                    <div class="mb-5">
                        <div class="d-flex align-items-start justify-content-between">

                            <p class="fw-bold fs-5">{{__('Write a comment')}} : </p>

                            <p class="fw-bold text-danger" id="userNameReply"></p>
                        </div>
                        <form action="{{ route('event.comment.store', $event) }}" method="post">
                            @csrf
                            <input type="hidden" name="comment_id" value="" id="reply_id">
                            <textarea name="body" class="form-control my-4" rows="5" placeholder="{{__('Comment')}}"></textarea>
                            <button class="btn btn-primary">{{__('send')}}</button>
                            <button class="btn btn-danger" onclick="event.preventDefault(); setNull()">{{__('cancel')}}</button>
                        </form>
                        <hr class="my-4">

                    </div>
                @else
                    <div class="alert alert-secondary mb-5" role="alert">
                        {{__('Please')}} <a href="{{ route('login') }}">{{__('login')}}</a> {{__('to news a comment')}}
                    </div>
                @endauth

                <div class="comments">
                    @include('home.sections.comments')
                </div>


            </div>
        </div>
        <div class="col-lg-3 col-12 end-0" x-data="sideScroller"
        @scroll.window="scroll()"
        :class="{'position-absolute' : navEnd ,'bottom-0' : navEnd ,'py-5' : navEnd || navStart ,'position-fixed' : navStart}"
        >
            <div class="info-post bg-white mt-md-5">
                <p class="text-muted">{{__('Compilation')}} :</p>

                <div class="d-flex align-items-center justify-content-start">
                    <div class="me-3">
                        @php
                            if ($event->user->avatar) {
                                $avatar = asset(env('USER_IMAGES_PATH') . $event->user->avatar->image);
                            } else {
                                $avatar = asset('image/user.png');
                            }
                        @endphp
                        <img src="{{ $avatar }}" alt="user" class="rounded-circle" height="90"
                            width="90">
                    </div>
                    <div class="">
                        <h5 class="fw-bold">{{ $event->user->name }}</h5>
                        <p>{{__('Writer')}}</p>
                    </div>
                </div>
                <hr>
                <span class="text-muted">
                    <i class="bi bi-calendar"></i>
                    {{__('Date of Release')}} :
                </span>
                <span class="mx-2">
                    @if ($lang_dir == 'ltr')
                    <span>{{ date('d M Y', strtotime($event->created_at)) }}</span>


                    @else
                    <span>{{ verta($event->time)->format('Y/n/j'); }}</span>

                    @endif
                </span>

            </div>
        </div>
    </div>
</div>
@endsection
