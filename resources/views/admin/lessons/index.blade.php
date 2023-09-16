@extends('admin.layouts.admin')

@section('title', 'index lessons')
@section('content')

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-12 col-md-12 mb-4 bg-white">

            <div class="m-4 d-flex justify-content-between">
                <h5 class="font-weight-bold">لیست درس ها ({{ $lessons->total() }})</h5>
                <a class="btn btn-outline-primary" href="{{ route('admin.lessons.create') }}"><i class="fas fa-plus"></i>
                    ایجاد درس</a>
            </div>
            <hr>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">عنوان</th>
                            <th scope="col">استاد</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lessons as $key => $lesson)
                            <tr>
                                <th scope="row">{{ $lessons->firstItem() + $key }}</th>
                                <td>{{ $lesson->title }}</td>
                                <td>{{ $lesson->teacher->name }}</td>


                                <td>
                                    <a href="{{ route('admin.lessons.edit', $lesson) }}"
                                        class="btn btn-sm btn-outline-primary">ویرایش</a>
                                    <a class="btn btn-sm btn-outline-danger"
                                        onclick="destroyItem(event,{{ $lesson->id }})">حذف</a>
                                    <form class="d-inline" action="{{ route('admin.lessons.destroy', $lesson) }}" method="POST"
                                        id="delete-form-{{ $lesson->id }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $lessons->links() }}
            </div>


        </div>
    </div>
@endsection
