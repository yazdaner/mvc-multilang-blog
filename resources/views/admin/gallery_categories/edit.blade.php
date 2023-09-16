@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">داشبورد</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.galleryCategories.index') }}">لیست دسته بندی های تصاویر</a></li>
                    <li class="breadcrumb-item active" aria-current="page">آپدیت دسته بندی</li>
                </ol>
            </nav>

            <div class="p-0">
                <div class="bg-white p-4 rounded">

                    <form action="{{ route('admin.galleryCategories.update', $galleryCategory->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">عنوان</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" value="{{ $galleryCategory->title }}" id="">
                                    @error('title')
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
                                            <option {{ $galleryCategory->language->id == $language->id ? 'selected' : '' }} value="{{ $language->id }}">{{ $language->display_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('language_id')
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
