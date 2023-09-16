@extends('admin.layouts.admin')

@section('title', 'index sliders')
@section('content')

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-12 col-md-12 mb-4 bg-white">

            <div class="m-4 d-flex justify-content-between">
                <h5 class="font-weight-bold">لیست اسلاید ها ({{ $sliders->total() }})</h5>
                <a class="btn btn-outline-primary" href="{{ route('admin.sliders.create') }}"><i class="fas fa-plus"></i>
                    ایجاد اسلاید</a>
            </div>
            <hr>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">عنوان</th>
                            <th scope="col">توضیح</th>
                            <th scope="col">زبان</th>
                            <th scope="col">تصویر</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $key => $slide)
                            <tr>
                                <th scope="row">{{ $sliders->firstItem() + $key }}</th>
                                <td>{{ $slide->title }}</td>
                                <td>{{ $slide->caption }}</td>
                                <td>{{ $slide->language->name }}</td>

                                <td><img src="{{ asset(env('SLIDER_IMAGES_PATH').$slide->image) }}" alt="" width="80"></td>


                                <td>
                                    <a href="{{ route('admin.sliders.edit', $slide) }}"
                                        class="btn btn-sm btn-outline-primary">ویرایش</a>
                                    <a class="btn btn-sm btn-outline-danger"
                                        onclick="destroyItem(event,{{ $slide->id }})">حذف</a>
                                    <form class="d-inline" action="{{ route('admin.sliders.destroy', $slide) }}" method="POST"
                                        id="delete-form-{{ $slide->id }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $sliders->links() }}
            </div>


        </div>
    </div>
@endsection
