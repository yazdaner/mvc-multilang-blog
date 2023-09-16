@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">داشبورد</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.comments.index') }}">لیست کامنت ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">آپدیت کامنت</li>
                </ol>
            </nav>

            <div class="p-0">
                <div class="bg-white p-4 rounded">

                    <form action="{{ route('admin.comments.updateText', $comment->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">متن کامنت</label>

                                        <textarea name="body" rows="8" class="form-control @error('body') is-invalid @enderror">{{ $comment->body }}</textarea>
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
