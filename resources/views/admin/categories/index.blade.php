@extends('admin.layouts.admin')

@section('title', 'index categories')
@section('content')

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-12 col-md-12 mb-4 bg-white">

            <div class="m-4 d-flex justify-content-between">
                <h5 class="font-weight-bold">لیست دسته بندی ها ({{ $categories->total() }})</h5>
                <a class="btn btn-outline-primary" href="{{ route('admin.categories.create') }}"><i class="fas fa-plus"></i>
                    ایجاد دسته بندی</a>
            </div>
            <hr>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام</th>
                            <th scope="col">والد</th>
                            <th scope="col">زبان</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                            <tr>
                                <th scope="row">{{ $categories->firstItem() + $key }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->parent->name }}</td>
                                <td>{{ $category->parent->language->display_name }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                        class="btn btn-sm btn-outline-primary">ویرایش</a>
                                        <a class="btn btn-sm btn-outline-danger" onclick="destroyItem(event,{{$category->id}})">حذف</a>
                                        <form class="d-inline" action="{{route('admin.categories.destroy',$category)}}" method="POST" id="delete-form-{{$category->id}}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>


        </div>
    </div>
@endsection
