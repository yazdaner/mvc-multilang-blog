@extends('home.layouts.home')
@section('title',__('Comments'))
@section('content')
    <section class="post">
        <div class="container-fluid">
            <div class="row">
                @include('home.sections.dashboard_sidebar')
                <div class="col-lg-9 mt-5">
                    <div class="tab-content bg-white rounded mt-3 p-md-5 p-3" style="min-height: 500px;">
                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade show active" id="profile" role="tabpanel">
                            <div class="myaccount-content">
                                <h3>{{__('Comments')}}</h3>
                                <hr />
                                <div class="account-details-form">
                                    <div class="comments">

                                        @foreach ($comments as $comment)
                                        <div>
                                            <div class="comment d-flex align-items-start">
                                                <a href="{{route('post.show',$comment->commentable->slug)}}">
                                                    <img src="{{$comment->commentable->getBannerPost()}}"
                                                    alt="" class="img-fluid me-4" width="80" height="80">
                                                </a>
                                                <div class="w-100">
                                                    <div class="mb-3">
                                                        <span class="fw-bold me-2">{{__('for')}} : </span>
                                                        <span class="fw-bold">{{$comment->commentable->title}}</span>
                                                        <p >{{$comment->body}}</p>
                                                    </div>

                                                    <p class="lh-lg">{{$comment->content}}</p>
                                                    <span>{{ date('d M Y', strtotime($comment->created_at)) }}</span>

                                                </div>

                                            </div>
                                        </div>
                                        <hr class="my-4">
                                        @endforeach
                                        <div class="d-flex justify-content-center">
                                            {{ $comments->links() }}

                                        </div>




                                        <div class="pagination justify-content-center mt-4">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
