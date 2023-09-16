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
                                <h3>{{__('Homeworks')}} : {{$lesson->title}}</h3>
                                <a class="btn btn-primary" href="{{route('profile.homeworkCreate',$lesson->id)}}">{{__('Create Homework')}}</a>

                                </div>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('profile.lessons') }}">درس ها</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">لیست تکلیف ها</li>
                                    </ol>
                                </nav>
                                <hr />
                                <div class="account-details-form">
                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">عنوان</th>
                                                <th scope="col">مهلت ارسال تکلیف</th>
                                                <th scope="col">توضیحات</th>
                                                <th scope="col">فایل</th>
                                                <th scope="col">تاریخ ایجاد</th>
                                                <th scope="col">پاسخ ها</th>
                                                <th scope="col">عملیات</th>
                                              </tr>
                                            </thead>
                                            <tbody>

                                              @foreach ($homeworks as $key => $homework)
                                              <tr>
                                                  <th scope="row">{{$homeworks->firstItem() + $key}}</th>
                                                  <td class="text-muted">{{$homework->title}}</td>
                                                  <td class="text-muted">{{verta($homework->deadline)->format('Y/n/j H:i')}}</td>
                                                  <td class="text-muted">{{$homework->description}}</td>
                                                  <td class="text-muted"><a class="btn btn-secondary" href="{{asset(env('HOMEWORK_FILES_PATH').$lesson->title.'/'.$homework->file)}}" download>دانلود</a></td>
                                                  <td class="text-muted">{{verta($homework->created_at)->format('Y/n/j H:i')}}</td>
                                                  <td class="text-muted"><a class="btn btn-success" href="{{route('profile.homeworkAnswersList',$homework)}}">لیست</a></td>


                                                  <td>
                                                     <div class="dropdown">
                                                          <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                              عملیات
                                                          </button>
                                                          <ul class="dropdown-menu">
                                                              <li><a class="dropdown-item" href="{{route('profile.homeworkEdit',$homework)}}">ویرایش</a></li>
                                                              <li>
                                                                  <a class="dropdown-item" href="" onclick="destroyItem(event,{{$homework->id}})">حذف</a>
                                                                  <form class="d-inline" action="{{route('profile.homeworkDestroy',$homework)}}" method="POST" id="delete-form-{{$homework->id}}">
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
