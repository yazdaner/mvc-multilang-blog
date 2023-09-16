@extends('admin.layouts.admin')

@section('title', 'index languages')
@section('content')

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-12 col-md-12 mb-4 bg-white">

            <div class="m-4 d-flex justify-content-between">
                <h5 class="font-weight-bold">لیست زبان ها ({{ $languages->total() }})</h5>
                <a class="btn btn-outline-primary" href="{{ route('admin.languages.create') }}"><i class="fas fa-plus"></i>
                    ایجاد زبان</a>
            </div>
            <hr>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام</th>
                            <th scope="col">نام نمایشی</th>
                            <th scope="col">جهت</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($languages as $key => $language)
                            <tr>
                                <th scope="row">{{ $languages->firstItem() + $key }}</th>
                                <td>{{ $language->name }}</td>
                                <td>{{ $language->display_name }}</td>
                                <td>{{ $language->direction }}</td>


                                <td>
                                    <a href="{{ route('admin.languages.edit', $language) }}"
                                        class="btn btn-sm btn-outline-primary">ویرایش</a>
                                    <a class="btn btn-sm btn-outline-danger"
                                        onclick="destroyItem(event,{{ $language->id }})">حذف</a>
                                    <form class="d-inline" action="{{ route('admin.languages.destroy', $language) }}" method="POST"
                                        id="delete-form-{{ $language->id }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $languages->links() }}
            </div>


        </div>
    </div>
@endsection
