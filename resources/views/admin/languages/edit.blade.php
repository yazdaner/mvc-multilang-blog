@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">داشبورد</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.languages.index') }}">لیست زبان ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">آپدیت زبان</li>
                </ol>
            </nav>

            <div class="p-0">
                <div class="bg-white p-4 rounded">

                    <form action="{{ route('admin.languages.update', $language->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">نام</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ $language->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">نام نمایشی</label>
                                    <input type="text" name="display_name"
                                        class="form-control @error('display_name') is-invalid @enderror" value="{{ $language->display_name }}">
                                    @error('display_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">جهت</label>
                                    <select name="direction" class="form-select @error('direction') is-invalid @enderror">
                                        <option value="">انتخاب جهت ...</option>
                                            <option {{ $language->direction == 'rtl' ? 'selected' : '' }} value="rtl">راست به چپ</option>
                                            <option {{ $language->direction == 'ltr' ? 'selected' : '' }} value="ltr">چپ به راست</option>
                                    </select>
                                    @error('direction')
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
