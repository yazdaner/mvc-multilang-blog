@extends('admin.layouts.admin')

@section('title', 'index events')
@section('content')
<div class="row">

<div class="col-12">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">داشبورد</a></li>
        <li class="breadcrumb-item active" aria-current="page">لیست رویدادها</li>
      </ol>
    </nav>

    <div class="p-0">
      <div class="bg-white p-4 rounded">
       <div class="mb-4 text-end">

            <a href="{{route('admin.events.create')}}" class="btn btn-primary">
                ایجاد
            </a>
       </div>
       <div class="table-responsive">
          <table class="table table-hover align-middle">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">عنوان</th>
                  <th scope="col">زمان برگزاری</th>
                  <th scope="col">نویسنده</th>
                  <th scope="col">زبان</th>
                  <th scope="col">تاریخ ایجاد</th>
                  <th scope="col">بنر</th>
                  <th scope="col">عملیات</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($events as $key => $event)
                <tr>
                    <th scope="row">{{$events->firstItem() + $key}}</th>
                    <td class="text-muted">{{$event->title}}</td>
                    <td class="text-muted">{{verta($event->time)->format('Y-n-j H:i')}}</td>
                    <td class="text-muted">{{$event->user->name}}</td>
                    <td class="text-muted">{{$event->language->name}}</td>
                    <td class="text-muted">{{verta($event->created_at)->format('Y/m/d')}}</td>
                    <td class="text-muted"><img  width="80" src="{{asset(env('EVENTS_BANNER_IMAGES_PATH').$event->banner)}}" alt=""></td>

                    <td>
                       <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                عملیات
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('admin.events.edit',$event->id)}}">ویرایش</a></li>
                                <li>
                                    <a class="dropdown-item" href="" onclick="destroyItem(event,{{$event->id}})">حذف</a>
                                    <form class="d-inline" action="{{route('admin.events.destroy',$event)}}" method="POST" id="delete-form-{{$event->id}}">
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
            {{$events->appends(request()->query())->links()}}
       </div>
   </div>
</div>


@endsection
