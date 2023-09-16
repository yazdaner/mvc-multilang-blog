@extends('admin.layouts.admin')

@section('title', 'index tags')
@section('content')

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-12 col-md-12 mb-4 bg-white">

            <div class="m-4 d-flex justify-content-between">
                <h5 class="font-weight-bold">لیست تگ ها ({{ $tags->total() }})</h5>
                <a class="btn btn-outline-primary" href="{{ route('admin.tags.create') }}"><i class="fas fa-plus"></i>
                    ایجاد تگ</a>
            </div>
            <hr>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $key => $tag)
                            <tr>
                                <th scope="row">{{ $tags->firstItem() + $key }}</th>
                                <td>{{ $tag->name }}</td>


                                <td>
                                    <a href="{{ route('admin.tags.edit', $tag) }}"
                                        class="btn btn-sm btn-outline-primary">ویرایش</a>
                                    <a class="btn btn-sm btn-outline-danger"
                                        onclick="destroyItem(event,{{ $tag->id }})">حذف</a>
                                    <form class="d-inline" action="{{ route('admin.tags.destroy', $tag) }}" method="POST"
                                        id="delete-form-{{ $tag->id }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $tags->links() }}
            </div>


        </div>
    </div>
@endsection
