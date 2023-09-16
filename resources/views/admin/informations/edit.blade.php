@extends('admin.layouts.admin')

@section('title', 'edit informations')

@section('style')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <style>
        .custom-file-input {
            position: relative;
            z-index: 2;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            margin: 0;
            opacity: 0;
        }


        .custom-file-label {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-weight: 400;
            line-height: 1.5;
            color: #6e707e;
            background-color: #fff;
            border: 1px solid #d1d3e2;
            border-radius: 0.35rem;
        }

        .custom-file-label::after {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 3;
            display: block;
            height: calc(1.5em + 0.75rem);
            padding: 0.375rem 0.75rem;
            line-height: 1.5;
            color: #6e707e;
            content: "فایل";
            background-color: #eaecf4;
            border-right: inherit;
            border-radius: 0.35rem 0 0 0.35rem;
        }


        .custom-file {
            position: relative;
            display: inline-block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            margin-bottom: 0;
        }
    </style>
@endsection

@section('script')

    <script>
        // name

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        // size

        document.addEventListener('DOMContentLoaded', function() {
            // Query the elements
            const fileEle = document.getElementById('image');
            const sizeEle = document.getElementById('size');

            // Convert the file size to a readable format
            const formatFileSize = function(bytes) {
                const sufixes = ['B', 'kB', 'MB', 'GB', 'TB'];
                const i = Math.floor(Math.log(bytes) / Math.log(1024));
                return `${(bytes / Math.pow(1024, i)).toFixed(2)} ${sufixes[i]}`;
            };

            fileEle.addEventListener('change', function(e) {
                const files = e.target.files;
                if (files.length === 0) {
                    // Hide the size element if user doesn't choose any file
                    sizeEle.innerHTML = '';
                    sizeEle.style.display = 'none';
                } else {
                    // File size in bytes
                    const size = files[0].size;

                    // Convert it to a readable format
                    sizeEle.innerHTML = formatFileSize(size);

                    // Display it
                    sizeEle.style.display = 'block';
                }
            });
        });
    </script>

@endsection

@section('content')

    <div class="row">
        <div class="col-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">داشبورد</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.informations.index') }}">لیست اطلاعات ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ویرایش اطلاعات</li>
                </ol>
            </nav>

            <div class="p-0">
                <div class="bg-white p-4 rounded">

                    <form action="{{ route('admin.informations.update',$information) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">آدرس</label>
                                    <input type="text" name="address" value="{{$information->address}}"
                                        class="form-control @error('address') is-invalid @enderror" id="">
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">پشتیبانی</label>
                                    <input type="text" name="support" value="{{$information->support}}"
                                        class="form-control @error('support') is-invalid @enderror" id="">
                                    @error('support')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">توضیحات</label>
                                    <input type="text" name="description" value="{{$information->description}}"
                                        class="form-control @error('description') is-invalid @enderror" id="">
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">کپی رایت</label>
                                    <input type="text" name="copyright" value="{{$information->copyright}}"
                                        class="form-control @error('copyright') is-invalid @enderror" id="">
                                    @error('copyright')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">نام سایت</label>
                                    <input type="text" name="siteName" value="{{$information->siteName}}"
                                        class="form-control @error('siteName') is-invalid @enderror" id="">
                                    @error('siteName')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">زبان</label>
                                    <select name="language_id" class="form-select @error('language_id') is-invalid @enderror">
                                        <option value="">انتخاب زبان ...</option>
                                        @foreach ($languages as $language)
                                            <option {{ $information->language->id == $language->id ? 'selected' : '' }} value="{{ $language->id }}">{{ $language->display_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('language_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">لگو سایت</label>
                                <div class="custom-file">
                                    <input type="file" name="siteLogo" id="image"
                                        class="custom-file-input @error('siteLogo') is-invalid @enderror">
                                    <label for="image" class="custom-file-label">انتخاب فایل</label>
                                    <div id="size" dir="ltr" class="mt-2"></div>
                                    @error('siteLogo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <img class="img-fluid mt-3" width="150"
                                src="{{ asset(env('LOGO_IMAGES_PATH') . $information->siteLogo) }}" alt="">
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">تایید</button>

                    </form>

                </div>
            </div>
        </div>

    @endsection
