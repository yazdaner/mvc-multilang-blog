@extends('admin.layouts.admin')

@section('title', 'edit footerLinks')


@section('content')

    <div class="row">
        <div class="col-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">داشبورد</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.footerLinks.index') }}">لیست لینک فوتر ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ویرایش لینک فوتر</li>
                </ol>
            </nav>

            <div class="p-0">
                <div class="bg-white p-4 rounded">

                    <form action="{{ route('admin.footerLinks.update') }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">عنوان</label>
                                    <input type="text" name="title" value="{{$footerLink->title}}"
                                        class="form-control @error('title') is-invalid @enderror" id="">
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">لینک</label>
                                    <input type="text" name="link" value="{{$footerLink->link}}"
                                        class="form-control @error('link') is-invalid @enderror" id="">
                                    @error('link')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">دسته بندی</label>
                                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                    <option value="">انتخاب دسته بندی ...</option>
                                    @foreach ($categories as $category)
                                        <option
                                        {{$category->id == $footerLink->category->id ? 'selected' : '' ;}}
                                        value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
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
