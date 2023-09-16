@extends('admin.layouts.admin')

@section('title', 'index items')
@section('content')

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-12 col-md-12 mb-4 bg-white">

            <div class="m-4 d-flex justify-content-between">
                <h5 class="font-weight-bold">لیست اساتید({{ $items->total() }})</h5>
                <a class="btn btn-outline-primary" href="{{ route('admin.professors.create') }}"><i class="fas fa-plus"></i>
                    ایجاد استاد</a>
            </div>
            <hr>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">اسم</th>
                            <th scope="col">عنوان</th>
                            <th scope="col">زبان</th>
                            <th scope="col">توضیحات</th>
                            <th scope="col">تصویر</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $key => $item)
                            <tr>
                                <th scope="row">{{ $items->firstItem() + $key }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->language->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td><img src="{{ asset(env('PROFESSOR_IMAGES_PATH').$item->image) }}" alt="" width="80"></td>


                                <td>
                                    <a href="{{ route('admin.professors.edit', $item) }}"
                                        class="btn btn-sm btn-outline-primary">ویرایش</a>
                                    <a class="btn btn-sm btn-outline-danger"
                                        onclick="destroyItem(event,{{ $item->id }})">حذف</a>
                                    <form class="d-inline" action="{{ route('admin.professors.destroy', $item) }}" method="POST"
                                        id="delete-form-{{ $item->id }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $items->links() }}
            </div>


        </div>
    </div>
@endsection
