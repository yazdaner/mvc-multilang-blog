@if ($aboutUs != null)
<section class="about overflow-hidden">
    <div class="container my-5">
        <div class="row align-items-center gx-0 gy-5">
            <div class="col-lg-6">
            <div class="">
                <div class="content">
                    <h3 class="fw-bold text-primary">
                        {{$aboutUs->title}}
                    </h3>
                    <p class="text-muted text-break">
                        {{$aboutUs->description}}
                    </p>
                    <a href="{{route('aboutUs.show')}}" class="btn btn-lg btn-primary hover-grow mt-3">
                        {{__('About Us')}}
                    </a>
                </div>
            </div>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid" src="{{ asset(env('ABOUT_US_BANNER_IMAGES_PATH') . $aboutUs->banner) }}" alt="about-img" style="max-height: 250px; width:100%;"/>
            </div>
        </div>
    </div>
</section>
@endif
