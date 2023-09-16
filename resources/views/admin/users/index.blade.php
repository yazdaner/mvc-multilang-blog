@extends('admin.layouts.admin')

@section('title', 'index users')
@section('content')

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-12 col-md-12 mb-4 bg-white">

            <div class="m-4 d-flex justify-content-between">
                <h5 class="font-weight-bold">لیست کاربران ({{ $users->total() }})</h5>
            </div>
            <hr>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">پروفایل</th>
                            <th scope="col">نام</th>
                            <th scope="col">ایمیل</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                @php
                                if ($user->avatar) {
                                    $avatar = asset(env('USER_IMAGES_PATH') . $user->avatar->image);
                                }
                                else {
                                    $avatar = asset('image/user.png');
                                }
                                @endphp
                                <th scope="row">{{ $users->firstItem() + $key }}</th>
                                <td><img src="{{ $avatar }}" width="50" height="50" class="rounded-circle"></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>


                                <td>
                                    <a href="{{ route('admin.users.edit', $user) }}"
                                        class="btn btn-sm btn-outline-primary">ویرایش</a>
                                    <a class="btn btn-sm btn-outline-danger"
                                        onclick="destroyItem(event,{{ $user->id }})">حذف</a>
                                    <form class="d-inline" action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                        id="delete-form-{{ $user->id }}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $users->links() }}
            </div>


        </div>
    </div>
@endsection
