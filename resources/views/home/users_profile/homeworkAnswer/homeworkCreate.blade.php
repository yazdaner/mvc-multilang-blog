@extends('home.layouts.home')
@section('title', __('Lessons'))
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
    <section class="post">
        <div class="container-fluid">
            <div class="row">
                @include('home.sections.dashboard_sidebar')
                <div class="col-lg-9 mt-5">
                    <div class="tab-content bg-white rounded mt-3 p-md-5 p-3">
                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" style="min-height: 500px;">
                            <div class="myaccount-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h3>{{ __('Send Homework') }} : {{ $homework->title }}</h3>
                                </div>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('profile.lessonsList') }}">درس ها</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('profile.homeworkAnswerIndex', $homework->lesson) }}">لیست
                                                تکلیف ها</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __('Send Homework') }}</li>
                                    </ol>
                                </nav>
                                <hr />
                                <div class="account-details-form">
                                    <div class="row">
                                        <div class="col-12">



                                            <div class="p-0">
                                                <div class="bg-white p-4 rounded">

                                                    <form action="{{ route('profile.homeworkAnswerStore', $homework) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">نام و نام خانوادگی</label>
                                                                    <input type="text" name="name"
                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                        id="">
                                                                    @error('name')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">توضیحات (اختیاری)</label>
                                                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id=""></textarea>
                                                                    @error('description')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-12 mb-4">
                                                                <label class="form-label">فایل تکلیف</label>
                                                                <div class="custom-file">
                                                                    <input type="file" name="file" id="image"
                                                                        class="custom-file-input @error('file') is-invalid @enderror">
                                                                    <label for="image" class="custom-file-label">انتخاب فایل</label>
                                                                    <div id="size" dir="ltr" class="mt-2"></div>
                                                                    @error('file')
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
