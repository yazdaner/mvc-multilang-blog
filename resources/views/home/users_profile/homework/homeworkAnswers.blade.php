@extends('home.layouts.home')
@section('title', __('Lessons'))
@section('script')
<script>
    function destroyItem(event,id){
        event.preventDefault();
        Swal.fire({
            title: 'آیا مطمئن هستی؟',
            text: "میخواهید این آیتم را حذف کنید",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'بله حذف کن !',
            cancelButtonText: 'خیر'
            }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${id}`).submit();
            }
        })
    }
</script>
<script>
    function approved(id){
        fetch(`/profile/homeworkAnswers/approved/${id}`, {
                method: 'post',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}'
                }
            }).then((res) => {
                res.json().then((data) => {
                    document.querySelector(`#item-${data}`).classList.toggle("btn-danger");
                    document.querySelector(`#item-${data}`).classList.toggle("btn-success");

                    console.log(data);

                })
            })
    }
</script>
@endsection
@section('content')
    <section class="post">
        <div class="container-fluid">
            <div class="row">
                @include('home.sections.dashboard_sidebar')
                <div class="col-lg-9 mt-5">
                    <div class="tab-content bg-white rounded mt-3 p-md-5 p-3">
                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" style="min-height: 500px;">
                            <div class="myaccount-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3>{{__('Homework Answers')}} : {{$homework->title}}</h3>

                                </div>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('profile.lessons') }}">درس ها</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('profile.homeworks',$homework->lesson) }}">لیست تکلیف ها</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">لیست پاسخ های تکلیف</li>
                                    </ol>
                                </nav>
                                <hr />
                                <div class="account-details-form">
                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">نام</th>
                                                <th scope="col">فایل</th>
                                                <th scope="col">تاریخ ارسال</th>
                                                <th scope="col">توضیحات</th>
                                                <th scope="col">وضعیت</th>
                                              </tr>
                                            </thead>
                                            <tbody>

                                              @foreach ($homeworkAnswers as $key => $homeworkAnswer)
                                              <tr>
                                                  <th scope="row">{{$homeworkAnswers->firstItem() + $key}}</th>
                                                  <td class="text-muted">{{$homeworkAnswer->name}}</td>
                                                  <td class="text-muted"><a class="btn btn-secondary" href="{{asset(env('HOMEWORK_ANSWER_FILES_PATH').$homework->title.'/'.$homeworkAnswer->file)}}" download>دانلود</a></td>
                                                  <td class="text-muted">{{verta($homeworkAnswer->created_at)->format('Y/n/j H:i')}}</td>
                                                  <td class="text-muted">{{$homeworkAnswer->description ?? 'ندارد'}}</td>

                                                  <td>
                                                    <button id="item-{{$homeworkAnswer->id}}" onclick="approved({{$homeworkAnswer->id}})" class="btn btn-sm {{ $homeworkAnswer->getRawOriginal('approved') ? 'btn-success' : 'btn-danger' }}">{{ $homeworkAnswer->approved }}</button>
                                                  </td>
                                                </tr>
                                              @endforeach
                                            </tbody>
                                          </table>
                                     </div>

                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
