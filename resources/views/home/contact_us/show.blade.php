@extends('home.layouts.home')
@section('title', __('Contact Us'))
@section('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <style>
        #map {
            height: 400px;
        }
        .leaflet-top{
            top: unset;
            bottom: 10px;
        }
    </style>
@endsection
@section('script')
@if (isset($setting->longitude) && isset($setting->longitude))

    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
    <script>
        var map = L.map('map').setView([{{$setting->longitude}},{{$setting->latitude}}], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);
        var marker = L.marker([{{$setting->longitude}},{{$setting->latitude}}]).addTo(map);
        marker.bindPopup("{{__('College')}}").openPopup();
    </script>
@endif
@endsection
@section('content')
    <div class="container">

        <div class="row py-5">

            <div class="col-lg-6">
                <div class="contact-info-area my-md-5 mb-5">
                    <h2 class="fw-bold"> {{__('Contact to')}} {{$info->siteName ?? ''}} </h2>
                    <p class="mb-5">
                    </p>
                    <div class="contact-info-wrap">
                        <div class="single-contact-info">
                            <div class="d-flex align-items-end">
                                <i class="bi bi-geo-alt fs-1 mx-3"></i>
                                <p>{{$info->address ?? ''}}</p>
                            </div>
                            <div class="d-flex align-items-end my-2">
                                <i class="bi bi-envelope fs-1 mx-3"></i>
                                <p>{{$setting->email ?? '' }}</p>
                            </div>
                            <div class="d-flex align-items-end">
                                <i class="bi bi-phone fs-1 mx-3"></i>
                                <p>{{$setting->telephone ?? '' }} {{isset($setting->telephone2) ? '/' :''}} {{$setting->telephone2 ?? '' }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6">

                <div class="card bg-primary text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mt-md-4 pb-5">

                            <h2 class="fw-bold mb-5 text-uppercase">{{__('Contact Us')}}</h2>

                            <form action="{{ route('home.contact-us.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-outline form-white mb-4">
                                        <input type="text" name="name"
                                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            placeholder="{{__('Name')}}" value="{{ old('name') ?? '' }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-outline form-white mb-4">
                                        <input type="text" name="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror "
                                            placeholder="{{__('Email')}}" value="{{ old('email') ?? '' }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="subject"
                                            class="form-control form-control-lg @error('subject') is-invalid @enderror "
                                            placeholder="{{__('subject')}}" value="{{ old('subject') ?? '' }}">
                                        @error('subject')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <textarea rows="4" name="text" class="form-control form-control-lg @error('text') is-invalid @enderror"
                                            placeholder="{{__('Message')}}">{{ old('text') ?? '' }}</textarea>
                                        @error('text')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <button class="btn btn-outline-light btn-lg px-5 mt-4" type="submit">{{__('send')}}</button>

                            </form>


                        </div>


                    </div>
                </div>
            </div>

        </div>

        @if (isset($setting->longitude) && isset($setting->longitude))
            <div id="map" class="my-5"></div>
        @endif

    </div>
@endsection
