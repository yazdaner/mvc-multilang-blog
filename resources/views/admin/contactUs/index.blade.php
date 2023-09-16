@extends('admin.layouts.admin')

@section('title', 'index contactUs')
@section('script')
<script>

    function seenItem(id){
        fetch(`/admin-panel/seen/${id}`, {
                method: 'post',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}'
                }
            }).then((res) => {
                res.json().then((data) => {
                    document.querySelector(`#item-${data}`).classList.remove("btn-danger");
                    document.querySelector(`#item-${data}`).classList.add("btn-success");



                    let count = parseInt(document.querySelector('#contactus_count').innerText) - 1;
                    document.querySelector('#contactus_count').innerText = count ;
                    if(count == 0){
                        document.querySelector('#contactus_count').remove();
                    }
                })
            })
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
                    <li class="breadcrumb-item active" aria-current="page">لیست پیام ها</li>
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
                                    <th scope="col">نام</th>
                                    <th scope="col">ایمیل</th>
                                    <th scope="col">تاریخ</th>
                                    <th scope="col">نمایش</th>
                                    <th scope="col">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($contactUs as $key => $item)
                                    <tr>
                                        <th scope="row">{{ $contactUs->firstItem() + $key }}</th>
                                        <td class="text-muted">{{ $item->name }}</td>
                                        <td class="text-muted">{{ $item->email }}</td>
                                        <td class="text-muted">{{ verta($item->created_at) }}</td>

                                        <td class="text-muted">

                                            <button
                                            id="item-{{ $item->id }}"
                                            @if ($item->seen == 0)
                                            onclick="seenItem({{$item->id}})"
                                            @endif type="button" class="btn btn-sm
                                            @if ($item->seen == 0)
                                            btn-danger
                                            @else
                                            btn-success
                                            @endif" data-bs-toggle="modal"
                                                data-bs-target="#show-{{ $item->id }}">
                                                نمایش
                                            </button>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    عملیات
                                                </button>
                                                <ul class="dropdown-menu">

                                                        <a class="dropdown-item" href=""
                                                            onclick="destroyItem(event,{{ $item->id }})">حذف</a>
                                                        <form class="d-inline"
                                                            action="{{ route('admin.contactUs.destroy', $item->id) }}"
                                                            method="POST" id="delete-form-{{ $item->id }}">
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
                        {{ $contactUs->appends(request()->query())->links() }}
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
                        <form action="{{ route('admin.contactUs.index') }}">
                            <div class="mb-4">
                                <label for="status" class="form-label">وضعیت کامنت</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="" {{ !isset(request()->status)  ? 'selected' : '' }}>همه</option>
                                    <option value="1" {{ request()->status == '1' ? 'selected' : '' }}>دیده شده
                                    </option>
                                    <option value="0" {{ request()->status == '0' ? 'selected' : '' }}>دیده نشده
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


        <!-- Modal show item -->
        @foreach ($contactUs as $item)
            <div class="modal fade" id="show-{{ $item->id }}" tabindex="-1" aria-labelledby="ss" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">موضوع : {{ $item->subject }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{ $item->text }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endsection
