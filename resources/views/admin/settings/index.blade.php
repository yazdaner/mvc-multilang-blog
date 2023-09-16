@extends('admin.layouts.admin')

@section('title', 'settings')



@section('content')

    <div class="row">
        <div class="col-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">داشبورد</a></li>
                    <li class="breadcrumb-item active" aria-current="page">settings</li>
                </ol>
            </nav>

            <div class="p-0">
                <div class="bg-white p-4 rounded">

                    @if ($settings == null)
                        <form action="{{ route('admin.settings.store') }}" method="POST">
                        @else
                            <form action="{{ route('admin.settings.update', $settings) }}" method="POST">
                                @method('put')
                    @endif
                    @csrf
                    <div class="row">




                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>شماره تلفن یک</label>
                                <input class="form-control @error('telephone') is-invalid @enderror" type="text"
                                    name="telephone" value="{{ $settings == null ? '' : $settings->telephone }}">
                                @error('telephone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>شماره تلفن دو</label>
                                <input class="form-control @error('telephone2') is-invalid @enderror" type="text"
                                    name="telephone2" value="{{ $settings == null ? '' : $settings->telephone2 }}">
                                @error('telephone2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>طول جغرافیایی</label>
                                <input class="form-control @error('longitude') is-invalid @enderror" type="text"
                                    name="longitude" value="{{ $settings == null ? '' : $settings->longitude }}">
                                @error('longitude')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>عرض جغرافیایی</label>
                                <input class="form-control @error('latitude') is-invalid @enderror" type="text"
                                    name="latitude" value="{{ $settings == null ? '' : $settings->latitude }}">
                                @error('latitude')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>ایمیل یک</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="text"
                                    name="email" value="{{ $settings == null ? '' : $settings->email }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>ایمیل دو</label>
                                <input class="form-control @error('email2') is-invalid @enderror" type="text"
                                    name="email2" value="{{ $settings == null ? '' : $settings->email2 }}">
                                @error('email2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>اینستاگرام</label>
                                <input class="form-control @error('instagram') is-invalid @enderror" type="text"
                                    name="instagram" value="{{ $settings == null ? '' : $settings->instagram }}">
                                @error('instagram')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>تلگرام</label>
                                <input class="form-control @error('telegram') is-invalid @enderror" type="text"
                                    name="telegram" value="{{ $settings == null ? '' : $settings->telegram }}">
                                @error('telegram')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>فیسبوک</label>
                                <input class="form-control @error('facebook') is-invalid @enderror" type="text"
                                    name="facebook" value="{{ $settings == null ? '' : $settings->facebook }}">
                                @error('facebook')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>واتساپ</label>
                                <input class="form-control @error('whatsapp') is-invalid @enderror" type="text"
                                    name="whatsapp" value="{{ $settings == null ? '' : $settings->whatsapp }}">
                                @error('whatsapp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>لینکدین</label>
                                <input class="form-control @error('linkedin') is-invalid @enderror" type="text"
                                    name="linkedin" value="{{ $settings == null ? '' : $settings->linkedin }}">
                                @error('linkedin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>توییتر</label>
                                <input class="form-control @error('twitter') is-invalid @enderror" type="text"
                                    name="twitter" value="{{ $settings == null ? '' : $settings->twitter }}">
                                @error('twitter')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>گیت هاب</label>
                                <input class="form-control @error('github') is-invalid @enderror" type="text"
                                    name="github" value="{{ $settings == null ? '' : $settings->github }}">
                                @error('github')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">تایید</button>

                    </form>

                </div>
            </div>
        </div>

    @endsection
