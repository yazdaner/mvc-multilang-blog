@if ($professors->isNotEmpty())
<section class="comments-index">
    <div style="height: 150px; overflow: hidden">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%">
            <path d="M0.00,49.98 C149.99,150.00 271.49,-49.98 500.00,49.98 L500.00,0.00 L0.00,0.00 Z"
                style="stroke: none; fill: #f1f1f1"></path>
        </svg>
    </div>
    <div class="container">
        <div class="row">
            <h3 class="fw-bold">{{__('Professors')}}</h3>
        </div>
        <div class="row">
            <div>

                    <div class="owl-carousel owl-carousel-professors owl-theme owl-loaded" dir="ltr">

                        @foreach ($professors as $item)
                    <div class="carousel-inner rounded p-3 mb-3">

                            <div>
                                <div class="">
                                <img class="rounded-circle" src="{{asset(env('PROFESSOR_IMAGES_PATH') . $item->image)}}" alt=""  height="120" />
                                </div>
                                <div class="py-3">
                                    <h4 class="fw-bold">{{$item->name}}</h4>
                                    <p>{{$item->title}}</p>
                                </div>
                                <p>{{$item->description}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>




            </div>
        </div>
    </div>
    <div style="height: 150px; overflow: hidden">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%">
            <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                style="stroke: none; fill: #f1f1f1"></path>
        </svg>
    </div>
</section>
@endif
