@extends('admin.layouts.admin')

@section('title', 'index informations')
@section('content')

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-12 col-md-12 mb-4 bg-white">

            <div class="m-4 d-flex justify-content-between">
                <h5 class="font-weight-bold">لیست اطلاعات ({{ $informations->total() }})</h5>
                <a class="btn btn-outline-primary" href="{{ route('admin.informations.create') }}"><i class="fas fa-plus"></i>
                    ایجاد اطلاعات</a>
            </div>
            <hr>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام سایت</th>
                            <th scope="col">زبان</th>
                            <th scope="col">آدرس</th>
                            <th scope="col">پشتیبانی</th>
                            <th scope="col">توضیحات</th>
                            <th scope="col">کپی رایت</th>
                            <th scope="col">لگو سایت</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($informations as $key => $information)
                            <tr>
                                <th scope="row">{{ $informations->firstItem() + $key }}</th>
                                <td>{{ $information->siteName }}</td>
                                <td>{{ $information->language->display_name }}</td>
                                <td>{{ $information->address }}</td>
                                <td>{{ $information->support }}</td>
                                <td>{{ $information->description }}</td>
                                <td>{{ $information->copyright }}</td>
                                <td><img  width="80" src="{{asset(env('LOGO_IMAGES_PATH').$information->siteLogo)}}" alt=""></td>


                                <td>
                                    <a href="{{ route('admin.informations.edit', $information) }}"
                                        class="btn btn-sm btn-outline-primary">ویرایش</a>
                                    <a class="btn btn-sm btn-outline-danger"
                                        onclick="destroyItem(event,{{ $information->id }})">حذف</a>
                                    <form class="d-inline" action="{{ route('admin.informations.destroy', $information) }}" method="POST"
                                        id="delete-form-{{ $information->id }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $informations->links() }}
            </div>


        </div>
    </div>
@endsection
