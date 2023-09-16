@extends('admin.layouts.admin')

@section('title', 'edit data')



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

                <form action="{{ route('admin.data.update',$data) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">عنوان</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror" id="title"
                                    value="{{ $data->title }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="count" class="form-label">تعداد</label>
                                <input type="text" name="count"
                                    class="form-control @error('count') is-invalid @enderror" id="count"
                                    value="{{ $data->count}}">
                                @error('count')
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
                                        <option {{ $data->language->id == $language->id ? 'selected' : '' }} value="{{ $language->id }}">{{ $language->display_name }}</option>
                                    @endforeach
                                </select>
                                @error('language_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="svg" class="form-label"><a href="https://icons.getbootstrap.com/" target="_blank">آیکون <i class="bi bi-bag-check"></i></a></label>
                                <textarea type="text" name="svg" class="form-control @error('svg') is-invalid @enderror" id="svg">{{ $data->svg }}</textarea>
                                @error('svg')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="color" class="form-label">کد رنگ آیکون</label>
                                <input type="color" name="color"
                                    class="form-control form-control-color @error('color') is-invalid @enderror" id="color"
                                    value="{{ $data->color}}">
                                @error('color')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>




                    </div>

                    <button type="submit" class="btn btn-primary mt-4">تایید</button>

                </form>

            </div>
        </div>

    @endsection
