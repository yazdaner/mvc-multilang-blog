@extends('admin.layouts.admin')

@section('title', 'create event')

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

    <link href="{{ asset('css/admin/mds.bs.datetimepicker.style.css') }}" rel="stylesheet" />

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


    {{-- CKeditor --}}
    <script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content', {
            language: 'fa',
            filebrowserUploadUrl: '{{ route('admin.editor-upload', ['_token' => csrf_token()]) }}',
            filebrowserUploadMethod: 'form'

        });
    </script>

    <script src="{{ asset('js/admin/mds.bs.datetimepicker.js') }}"></script>

    <script>
        const dtp1Instance = new mds.MdsPersianDateTimePicker(document.getElementById('dtp1'), {
            targetTextSelector: '[data-name="dtp1-text"]',
            targetDateSelector: '[data-name="dtp1-date"]',
            textFormat: 'yyyy-MM-dd HH:mm:ss',
            dateFormat: 'yyyy-MM-dd HH:mm:ss',
            englishNumber: true,
            enableTimePicker: true,
        });
    </script>
@endsection




@section('content')

    <div class="col-12">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">داشبورد</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.events.index') }}">لیست رویدادها</a></li>
                <li class="breadcrumb-item active" aria-current="page">ایجاد رویداد</li>
            </ol>
        </nav>

        <div class="p-0">
            <div class="bg-white p-4 rounded">

                <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">عنوان</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror" id="title"
                                    value="{{ old('title') ?? '' }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label class="form-label" for="tag_ids">تگ</label>
                            <select class="selectpicker @error('tag_ids') is-invalid @enderror" id="tag_ids"
                                name="tag_ids[]" data-live-search="true" data-width="100%" multiple title="انتخاب تگ">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @error('tag_ids')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">زبان رویداد</label>
                                <select name="language_id" class="form-select @error('language_id') is-invalid @enderror">
                                    <option value="">انتخاب زبان ...</option>
                                    @foreach ($languages as $language)
                                        <option value="{{ $language->id }}">{{ $language->display_name }}</option>
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
                            <label class="form-label">زمان رویداد</label>

                            <div class="input-group mb-3"><span id="dtp1" class="input-group-text cursor-pointer"
                                    data-mds-dtp-guid="edba642b-1437-4120-b654-19afdaf4cc9d" data-bs-original-title=""
                                    title="">📅</span> <input type="text" placeholder="Date Picker Text"
                                    data-name="dtp1-text" class="form-control @error('time') is-invalid @enderror"> <input
                                    type="text" placeholder="Date Picker Date" data-name="dtp1-date" name="time"
                                    class="form-control @error('time') is-invalid @enderror"></div>
                            <h3 hidden="hidden">To Date</h3>
                            <div hidden="hidden" class="input-group mb-3"><span id="dtp2"
                                    class="input-group-text cursor-pointer"
                                    data-mds-dtp-guid="e3710edb-11c0-4103-8069-5eeb04ac7539" data-bs-original-title=""
                                    title="">📅</span> <input type="text" placeholder="Date Picker Text"
                                    data-name="dtp2-text" class="form-control"> <input type="text"
                                    placeholder="Date Picker Date" data-name="dtp2-date" class="form-control">

                            </div>

                        </div>


                        <div class="col-12">
                            <label class="form-label">بنر رویداد</label>
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
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mt-3">
                                <label for="preview" class="form-label">متن پیش نمایش</label>
                                <textarea name="preview" id="preview" rows="5" class="form-control @error('preview') is-invalid @enderror">{{ old('preview') ?? '' }}</textarea>
                                @error('preview')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="my-3">
                            <label for="content" class="form-label">محتوا</label>
                            <textarea name="content" id="content" cols="30" rows="10"
                                class="form-control  @error('content') is-invalid @enderror">{{ old('content') ?? '' }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">تایید</button>

                </form>

            </div>
        </div>

    @endsection
