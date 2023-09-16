@if ($sliders->isNotEmpty())
        <div class="owl-carousel owl-carousel-slider owl-theme owl-loaded" dir="ltr">
            @foreach ($sliders as $slider)
            <div class="position-relative">
                @if (isset($slider->title) || isset($slider->caption))
                <div class="owl-text-overlay">
                    <h2 class="owl-title">{{ $slider->title }}</h2>
                    <p class="owl-title">{{ $slider->caption }}</h2>
                  </div>
                @endif
                <img src="{{ env('SLIDER_IMAGES_PATH') . $slider->image }}" class="d-block w-100 carousel-img" alt="{{ $slider->title }}" />
            </div>
            @endforeach
        </div>


@endif
