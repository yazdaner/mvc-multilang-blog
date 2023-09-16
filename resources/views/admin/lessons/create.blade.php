@extends('admin.layouts.admin')

@section('title', 'create lessons')


@section('content')

    <div class="row">
        <div class="col-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">داشبورد</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.lessons.index') }}">لیست درس ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ایجاد درس</li>
                </ol>
            </nav>

            <div class="p-0">
                <div class="bg-white p-4 rounded">

                    <form action="{{ route('admin.lessons.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">عنوان</label>
                                    <input type="text" name="title"
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
                                    <label class="form-label">استاد</label>
                                    <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">
                                        <option value="">انتخاب استاد ...</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
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
