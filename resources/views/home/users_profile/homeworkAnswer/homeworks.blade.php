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
                                <h3>{{__('Homeworks')}} : {{$lesson->title}}</h3>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('profile.lessonsList') }}">درس ها</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">لیست تکلیف ها</li>
                                    </ol>
                                </nav>
                                <hr />
                                <div class="account-details-form">

                                              @foreach ($homeworks as $key => $homework)

                                                <div class="card">
                                                    <div class="card-body">
                                                      <h5 class="card-title"><strong>{{$homework->title}}</strong></h5>
                                                      <p class="card-text">{{$homework->description}}</p>
                                                      <p class="card-text">مهلت ارسال تکلیف : <span class="btn btn-danger">{{verta($homework->deadline)->format('H:i Y/n/j')}}</span></p>
                                                      <a href="{{asset(env('HOMEWORK_FILES_PATH').$lesson->title.'/'.$homework->file)}}" class="card-link btn btn-secondary" download>دانلود فایل تکلیف</a>
                                                      <a href="{{route('profile.homeworkAnswerCreate',$homework)}}" class="card-link btn btn-success">ارسال تکلیف</a>
                                                    </div>
                                                  </div>
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
