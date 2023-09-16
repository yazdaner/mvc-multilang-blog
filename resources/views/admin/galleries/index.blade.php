@extends('admin.layouts.admin')

@section('title', 'gallery')
@section('content')

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-12 col-md-12 mb-4 bg-white">

            <div class="m-4 d-flex justify-content-between">
                <h5 class="font-weight-bold">لیست تصاویر
                ({{ $galleries->total() }})</h5>
                <a class="btn btn-outline-primary" href="{{ route('admin.galleries.create') }}"><i class="fas fa-plus"></i>
                    ایجاد تصویر </a>
            </div>
            <hr>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">عنوان</th>
                            <th scope="col">توضیح</th>
                            <th scope="col">دسته بندی</th>
                            <th scope="col">تصویر </th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($galleries as $key => $gallery)
                        <tr>
                            <th scope="row">{{ $galleries->firstItem() + $key }}</th>
                            <td>{{ $gallery->title }}</td>
                            <td>{{ $gallery->caption }}</td>
                            <td>{{ $gallery->category->title }}</td>
                            <td><img  width="80" src="{{asset(env('GALLERY_IMAGES_PATH').$gallery->image)}}" alt=""></td>


                            <td>
                                <a class="btn btn-sm btn-outline-danger"
                                    onclick="destroyItem(event,{{ $gallery->id }})">حذف</a>
                                <form class="d-inline" action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST"
                                    id="delete-form-{{ $gallery->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $galleries->links() }}
            </div>


        </div>
    </div>
@endsection
