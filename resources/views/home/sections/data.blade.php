@if ($data->isNotEmpty())
    <section class="counts py-5 overflow-hidden">
        <div class="container">
            <div class="row gy-5">
                @foreach ($data as $item)
                    <div class="col-md-6 col-lg-3">
                        <div class="shadow p-3 d-flex align-items-center justify-content-center" style="background-color: white;
                        border-radius: 10px;">
                            <div class="me-4 mb-4" style="color: {{$item->color}}">{!!$item->svg!!}</div>
                            <div class="">
                                <span class="text-primary fs-3 fw-bold counter">{{$item->count}}</span>
                                <p>{{$item->title}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endif
