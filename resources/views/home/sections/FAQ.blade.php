@if ($FAQ->isNotEmpty())

<section class="FAQ mb-5">
    <div class="container">
        <div class="row pb-5">
            <div class="col-12 text-center">
                <h2 class="fw-bold">{{__('frequently asked questions')}}</h2>
                <div class="heading-line"></div>
            </div>
        </div>
        <div class="row">
            <div class="accordion" id="accordionExample">


                @foreach ($FAQ as $item)
                <div class="accordion-item mb-3 shadow">
                    <h2 class="accordion-header" id="heading-{{$item->id}}">
                        <button class="accordion-button {{$loop->first ? '' : 'collapsed'}}" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse-{{$item->id}}" aria-expanded="false" aria-controls="collapse-{{$item->id}}">
                            {{$item->title}}
                        </button>
                    </h2>
                    <div id="collapse-{{$item->id}}" class="accordion-collapse {{$loop->first ? 'collapse show' : 'collapse'}}" aria-labelledby="heading-{{$item->id}}"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{$item->description}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

