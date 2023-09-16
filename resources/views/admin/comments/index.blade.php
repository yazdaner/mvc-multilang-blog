@extends('admin.layouts.admin')

@section('title', 'index comments')
@section('script')
    <script>
        function updateItem(event, id) {
            document.getElementById(`update-form-${id}`).submit();
        }
    </script>
@endsection
@section('content')

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">داشبورد</a></li>
                    <li class="breadcrumb-item active" aria-current="page">لیست کامنت ها</li>
                </ol>
            </nav>

            <div class="p-0">
                <div class="bg-white p-4 rounded">
                    <div class="mb-4 text-end">
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="bi bi-funnel-fill"></i>
                            فیلتر
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">کاربر</th>
                                    <th scope="col">محتوا</th>
                                    <th scope="col">عنوان</th>
                                    <th scope="col">تاریخ</th>
                                    <th scope="col">تعداد پاسخ ها</th>
                                    <th scope="col">نمایش</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($comments as $key => $comment)
                                    <tr>
                                        <th scope="row">{{ $comments->firstItem() + $key }}</th>
                                        <td class="text-muted">{{ $comment->user->name }}</td>
                                        <td class="text-muted">{{ $comment->commentable_type }}</td>
                                        <td class="text-muted">{{ $comment->commentable->title }}</td>
                                        <td class="text-muted">{{ verta($comment->created_at)->format('Y/m/d') }}</td>
                                        <td class="text-muted">{{ $comment->replies_count }}</td>
                                        <td class="text-muted">

                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#show-{{ $comment->id }}">
                                                نمایش
                                            </button>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm {{ $comment->getRawOriginal('is_approved') ? 'btn-success' : 'btn-danger' }}"
                                                onclick="updateItem(event,{{ $comment->id }})">{{ $comment->is_approved }}</a>
                                            <form action="{{ route('admin.comments.update', $comment->id) }}" method="post"
                                                id="update-form-{{ $comment->id }}">
                                                @csrf
                                                @method('put')
                                            </form>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    عملیات
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('admin.comments.edit', $comment->id) }}">ویرایش</a></li>

                                                    <li>
                                                        <a class="dropdown-item" href=""
                                                            onclick="destroyItem(event,{{ $comment->id }})">حذف</a>
                                                        <form class="d-inline"
                                                            action="{{ route('admin.comments.destroy', $comment) }}"
                                                            method="POST" id="delete-form-{{ $comment->id }}">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination justify-content-center mt-4">
                        {{ $comments->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">فیلتر محصولات</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.comments.index') }}">
                            <div class="mb-4">
                                <label for="status" class="form-label">وضعیت کامنت</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="">همه</option>
                                    <option value="1" {{ request()->status == 1 ? 'selected' : '' }}>تایید شده
                                    </option>
                                    <option value="0" {{ request()->status == 0 ? 'selected' : '' }}>تایید نشده
                                    </option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">کنسل</button>
                        <button type="submit" class="btn btn-primary">فیلتر</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>


        <!-- Modal show comment -->
        @foreach ($comments as $comment)
            <div class="modal fade" id="show-{{ $comment->id }}" tabindex="-1" aria-labelledby="ss" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $comment->user->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{ $comment->body }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endsection
