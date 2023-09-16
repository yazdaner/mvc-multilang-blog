@extends('admin.layouts.admin')

@section('title', 'index footerLinks')
@section('content')

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-12 col-md-12 mb-4 bg-white">

            <div class="m-4 d-flex justify-content-between">
                <h5 class="font-weight-bold">لیست لینک فوتر ها ({{ $footerLinks->total() }})</h5>
                <a class="btn btn-outline-primary" href="{{ route('admin.footerLinks.create') }}"><i class="fas fa-plus"></i>
                    ایجاد لینک فوتر</a>
            </div>
            <hr>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">عنوان</th>
                            <th scope="col">دسته بندی</th>
                            <th scope="col">لینک</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($footerLinks as $key => $footerLink)
                            <tr>
                                <th scope="row">{{ $footerLinks->firstItem() + $key }}</th>
                                <td>{{ $footerLink->title }}</td>
                                <td>{{ $footerLink->category->title }}</td>
                                <td><a href="{{ $footerLink->link }}">{{ $footerLink->link }}</a></td>

                                <td>
                                    <a href="{{ route('admin.footerLinks.edit', $footerLink) }}"
                                        class="btn btn-sm btn-outline-primary">ویرایش</a>
                                    <a class="btn btn-sm btn-outline-danger"
                                        onclick="destroyItem(event,{{ $footerLink->id }})">حذف</a>
                                    <form class="d-inline" action="{{ route('admin.footerLinks.destroy', $footerLink) }}" method="POST"
                                        id="delete-form-{{ $footerLink->id }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $footerLinks->links() }}
            </div>


        </div>
    </div>
@endsection
