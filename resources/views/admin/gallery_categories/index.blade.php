@extends('admin.layouts.admin')

@section('title', 'index gallery categories')
@section('content')

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-12 col-md-12 mb-4 bg-white">

            <div class="m-4 d-flex justify-content-between">
                <h5 class="font-weight-bold">لیست دسته بندی های تصاویر ({{ $gallery_categories->total() }})</h5>
                <a class="btn btn-outline-primary" href="{{ route('admin.galleryCategories.create') }}"><i class="fas fa-plus"></i>
                    ایجاد دسته بندی </a>
            </div>
            <hr>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">عنوان</th>
                            <th scope="col">زبان</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gallery_categories as $key => $gallery_category)
                            <tr>
                                <th scope="row">{{ $gallery_categories->firstItem() + $key }}</th>
                                <td>{{ $gallery_category->title }}</td>
                                <td>{{ $gallery_category->language->display_name }}</td>


                                <td>
                                    <a href="{{ route('admin.galleryCategories.edit', $gallery_category) }}"
                                        class="btn btn-sm btn-outline-primary">ویرایش</a>
                                    <a class="btn btn-sm btn-outline-danger"
                                        onclick="destroyItem(event,{{ $gallery_category->id }})">حذف</a>
                                    <form class="d-inline" action="{{ route('admin.galleryCategories.destroy', $gallery_category) }}" method="POST"
                                        id="delete-form-{{ $gallery_category->id }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $gallery_categories->links() }}
            </div>


        </div>
    </div>
@endsection
