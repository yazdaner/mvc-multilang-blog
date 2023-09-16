@extends('home.layouts.home')
@section('title', __('Lessons'))
@section('content')
    <section class="post">
        <div class="container-fluid">
            <div class="row">
                @include('home.sections.dashboard_sidebar')
                <div class="col-lg-9 mt-5">
                    <div class="tab-content bg-white rounded mt-3 p-md-5 p-3">
                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" style="min-height: 500px;">
                            <div class="myaccount-content">
                                <h3>{{__('Lessons')}}</h3>
                                <hr />
                                <div class="account-details-form">
                                    @foreach ($lessons as $lesson)
                                        <div>
                                           <a href="{{route('profile.homeworks',$lesson->id)}}"> {{$lesson->title}}</a>
                                        </div>
                                        <hr class="my-4">
                                    @endforeach
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
