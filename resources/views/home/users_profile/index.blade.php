@extends('home.layouts.home')
@section('title', __('Profile'))
@section('script')
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
    };
</script>
@endsection
@section('content')
    <section class="post">
        <div class="container-fluid">
            <div class="row">
                @include('home.sections.dashboard_sidebar')
                <div class="col-lg-9 my-5">
                    <div class="tab-content bg-white rounded mt-3 p-md-5 p-3">
                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade show active" id="profile" role="tabpanel">
                            <div class="myaccount-content">
                                <h3>{{__('Profile')}}</h3>
                                <hr>
                                <div class="account-details-form">


                                    <form action="{{ route('profile.update', $user->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')

                                        {{__('Upload profile picture: (click on the picture)')}}
                                        <div class="text-center col-md-12 my-4">
                                            <label for="file" class="cursor-pointer">
                                                @php
                                                if ($user->avatar) {
                                                    $avatar = asset(env('USER_IMAGES_PATH') . $user->avatar->image);
                                                }
                                                else {
                                                    $avatar = asset('image/user.png');
                                                }
                                                @endphp
                                                <img id="output" src="{{$avatar}}"  width="120" height="120"
                                                    class="rounded-circle border">
                                            </label>
                                            <input accept="image/*" onchange="loadFile(event)" id="file" name="avatar" type="file" class="d-none">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="single-input-item">
                                                    <label class="form-label mt-3" for="name">
                                                        {{__('Name')}}
                                                    </label>
                                                    <input class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ $user->name }}" type="text"
                                                        id="name">
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="single-input-item col-md-6">
                                                <label class="form-label mt-3"> {{__('Email')}} </label>
                                                <input class="form-control" value="{{ $user->email }}" type="text"
                                                    disabled>
                                            </div>

                                            <div class="single-input-item mt-4">
                                                <button class="btn btn-primary">{{__('submit')}}</button>
                                            </div>
                                        </div>



                                    </form>



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
