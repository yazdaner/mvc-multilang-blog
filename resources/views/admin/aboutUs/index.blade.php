@extends('admin.layouts.admin')

@section('title', 'index aboutUs')
@section('content')

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-12 col-md-12 mb-4 bg-white">

            <div class="m-4 d-flex justify-content-between">
                <h5 class="font-weight-bold">لیست درباره ی ما ({{ $aboutUs->total() }})</h5>
                <a class="btn btn-outline-primary" href="{{ route('admin.aboutUs.create') }}"><i class="fas fa-plus"></i>
                    ایجاد درباره ی ما</a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">عنوان</th>
                            <th scope="col">زبان</th>
                            <th scope="col">بنر</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aboutUs as $key => $item)

                            <tr>

                                <th scope="row">{{ $aboutUs->firstItem() + $key }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->language->name }}</td>
                                <td>
                                    <img  src="{{ asset(env('ABOUT_US_BANNER_IMAGES_PATH') . $item->banner) }}" alt="about-img" width="80"/>
                                </td>
                                <td>
                                    <a href="{{ route('admin.aboutUs.edit', $item) }}"
                                        class="btn btn-sm btn-outline-primary">ویرایش</a>
                                        <a class="btn btn-sm btn-outline-danger" onclick="destroyItem(event,{{$item->id}})">حذف</a>
                                        <form class="d-inline" action="{{route('admin.aboutUs.destroy',$item)}}" method="POST" id="delete-form-{{$item->id}}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $aboutUs->links() }}
            </div>


        </div>
    </div>
@endsection
