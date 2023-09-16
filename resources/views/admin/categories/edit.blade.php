@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">داشبورد</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">لیست دسته بندی ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">آپدیت دسته بندی</li>
                </ol>
            </nav>

            <div class="p-0">
                <div class="bg-white p-4 rounded">

                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">نام</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">دسته بندی والد</label>
                                        <select name="parent_id" class="form-select @error('parent_id') is-invalid @enderror">
                                            <option value="">انتخاب دسته بندی والد</option>
                                            @foreach ($parentCategories as $parentCategory)
                                                <option {{ $category->parent_id == $parentCategory->id ? 'selected' : '' }}
                                                    value="{{ $parentCategory->id }}">{{ $parentCategory->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('parent_id')
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
