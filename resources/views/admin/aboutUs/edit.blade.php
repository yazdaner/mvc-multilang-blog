@extends('admin.layouts.admin')

@section('title', 'about us')

@section('style')

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


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


    {{-- CKeditor --}}
    <script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body', {
            language: 'fa',
            filebrowserUploadUrl: '{{ route('admin.aboutUs.editor.upload', ['_token' => csrf_token()]) }}',
            filebrowserUploadMethod: 'form'

        });
    </script>

@endsection



@section('content')

    <div class="row">
        <div class="col-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">داشبورد</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.aboutUs.index') }}">لیست درباره ی ما</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ویرایش درباره ی ما</li>
                </ol>
            </nav>

            <div class="p-0">
                <div class="bg-white p-4 rounded">

                    <form action="{{ route('admin.aboutUs.update' ,$aboutUs) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>عنوان</label>
                                    <input class="form-control @error('title') is-invalid @enderror" type="text"
                                        name="title" value="{{old('title') ?? $aboutUs->title}}">
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>توضیحات</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" type="text" name="description">{{old('description') ?? $aboutUs->description}}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="mb-4">
                                <label class="form-label">بنر</label>
                                <div class="custom-file">
                                    <input type="file" name="banner" id="image"
                                        class="custom-file-input @error('banner') is-invalid @enderror">
                                    <label for="image" class="custom-file-label">انتخاب فایل</label>
                                    <div id="size" dir="ltr" class="mt-2"></div>
                                    @error('banner')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <img class="img-fluid mb-5" width="100"
                                    src="{{ asset(env('ABOUT_US_BANNER_IMAGES_PATH') . $aboutUs->banner) }}" alt="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">زبان</label>
                                    <select name="language_id" class="form-select @error('language_id') is-invalid @enderror">
                                        <option value="">انتخاب زبان ...</option>
                                        @foreach ($languages as $language)
                                            <option {{ $aboutUs->language->id == $language->id ? 'selected' : '' }} value="{{ $language->id }}">{{ $language->display_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('language_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="my-3">
                                    <label for="body" class="form-label">محتوا</label>
                                    <textarea name="body" id="body" cols="30" rows="10"
                                        class="form-control  @error('body') is-invalid @enderror">{{old('body') ?? $aboutUs->body}}</textarea>
                                    @error('body')
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
