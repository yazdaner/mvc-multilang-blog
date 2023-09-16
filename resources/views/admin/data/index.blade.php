@extends('admin.layouts.admin')

@section('title', 'index data')
@section('style')
<style>
    .counts i {
    font-size: 45px;
}
</style>
@endsection
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
            <a href="{{route('admin.data.create')}}" class="btn btn-primary">
                ایجاد
            </a>
       </div>
       <div class="table-responsive">
          <table class="table table-hover align-middle">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">عنوان</th>
                  <th scope="col">تعداد</th>
                  <th scope="col">زبان</th>
                  <th scope="col">کد رنگ آیکون</th>
                  <th scope="col">آیکون</th>
                  <th scope="col">عملیات</th>

                </tr>
              </thead>
              <tbody>

                @foreach ($data as $key => $item)
                <tr>
                    <th scope="row">{{$data->firstItem() + $key}}</th>
                    <td class="text-muted">{{$item->title}}</td>
                    <td class="text-muted">{{$item->count}}</td>
                    <td class="text-muted">{{$item->language->name}}</td>
                    <td class="text-muted"><span style="color: {{$item->color}}">{{$item->color}}</span></td>
                    <td class="text-muted"><span class="counts" style="color: {{$item->color}}">{!!$item->svg!!}</span></td>

                    <td>
                       <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                عملیات
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('admin.data.edit',$item->id)}}">ویرایش</a></li>
                                <li>
                                    <a class="dropdown-item" href="" onclick="destroyItem(event,{{$item->id}})">حذف</a>
                                    <form class="d-inline" action="{{route('admin.data.destroy',$item->id)}}" method="POST" id="delete-form-{{$item->id}}">
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
            {{$data->appends(request()->query())->links()}}
       </div>
   </div>
</div>

@endsection
