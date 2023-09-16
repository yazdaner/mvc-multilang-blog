@extends('admin.layouts.admin')

@section('title', 'index footerLinkCatrgories')
@section('content')

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-12 col-md-12 mb-4 bg-white">

            <div class="m-4 d-flex justify-content-between">
                <h5 class="font-weight-bold">لیست دسته بندی لینک فوتر ها ({{ $footerLinkCatrgories->total() }})</h5>
                <a class="btn btn-outline-primary" href="{{ route('admin.footerLinkCatrgories.create') }}"><i class="fas fa-plus"></i>
                    ایجاد دسته بندی لینک فوتر</a>
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
                        @foreach ($footerLinkCatrgories as $key => $footerLinkCatrgory)
                            <tr>
                                <th scope="row">{{ $footerLinkCatrgories->firstItem() + $key }}</th>
                                <td>{{ $footerLinkCatrgory->title }}</td>
                                <td>{{ $footerLinkCatrgory->language->display_name }}</td>


                                <td>
                                    <a href="{{ route('admin.footerLinkCatrgories.edit', $footerLinkCatrgory) }}"
                                        class="btn btn-sm btn-outline-primary">ویرایش</a>
                                    <a class="btn btn-sm btn-outline-danger"
                                        onclick="destroyItem(event,{{ $footerLinkCatrgory->id }})">حذف</a>
                                    <form class="d-inline" action="{{ route('admin.footerLinkCatrgories.destroy', $footerLinkCatrgory) }}" method="POST"
                                        id="delete-form-{{ $footerLinkCatrgory->id }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $footerLinkCatrgories->links() }}
            </div>


        </div>
    </div>
@endsection
