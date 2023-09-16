@php
    $langId = App\Models\Language::where('name', session()->get('locale') ?? App::getLocale())->first()->id;
    $setting = App\Models\Setting::first();
    $footerLinkCatrgories = App\Models\FooterLinkCatrgory::where('language_id', $langId)->get();
    $info = App\Models\Information::where('language_id', $langId)->first();
@endphp
<footer class="bg-primary text-white pt-5">
    <div class="container mb-4">
        <div class="row py-4 gy-4">
            <div class="col-md-4">
                <div class="d-flex">
                    <i class="bi bi-telephone-fill text-white fs-1 mx-3"></i>
                    <div>
                        <p class="mb-0">{{ $setting->telephone ?? '' }}</p>
                        <p class="mb-0">{{ $setting->telephone2 ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex">
                    <i class="bi bi-envelope-fill text-white fs-1 mx-3"></i>
                    <div>
                        <p class="mb-0">{{ $setting->email ?? '' }}</p>
                        <p class="mb-0">{{ $setting->email2 ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex">
                    <i class="bi bi-map-fill text-white fs-1 mx-3"></i>
                    <div>
                        <p class="mb-0">{{$info->support ?? ''}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="social-links" style="background-color: #011227;">
        <div class="container">
            <div class="row text-center align-items-center gy-3 py-3">
                <div class="col-md-6">{{$info->address ?? ''}}</div>
                <div class="col-md-6">

                    @if (isset($setting->facebook))
                        <a class="mb-2" target="_blank" href="{{ $setting->facebook }}"><i
                                class="text-white bi bi-facebook"></i></a>
                    @endif
                    @if (isset($setting->twitter))
                        <a class="mb-2" target="_blank" href="{{ $setting->twitter }}"><i
                                class="text-white bi bi-twitter"></i></a>
                    @endif
                    @if (isset($setting->github))
                        <a class="mb-2" target="_blank" href="{{ $setting->github }}"><i
                                class="text-white bi bi-github"></i></a>
                    @endif
                    @if (isset($setting->linkedin))
                        <a class="mb-2" target="_blank" href="{{ $setting->linkedin }}"><i
                                class="text-white bi bi-linkedin"></i></a>
                    @endif
                    @if (isset($setting->instagram))
                        <a class="mb-2" target="_blank" href="{{ $setting->instagram }}"><i
                                class="text-white bi bi-instagram"></i></a>
                    @endif
                    @if (isset($setting->telegram))
                        <a class="mb-2" target="_blank" href="{{ $setting->telegram }}"><i
                                class="text-white bi bi-telegram"></i></a>
                    @endif
                    @if (isset($setting->whatsapp))
                        <a class="mb-2" target="_blank" href="{{ $setting->whatsapp }}"><i
                                class="text-white bi bi-whatsapp"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row py-5 gy-4">
            <div class="col-md-6">
               <div class="d-flex">
                @if (isset($info->siteLogo))
                <img class="img-fluid ms-3"  src="{{ asset(env('LOGO_IMAGES_PATH') . $info->siteLogo) }}" alt="logo">
                @endif
                <div class="ms-3">

                    <h3 class="fw-bold">{{$info->siteName ?? ''}}</h3>
                    <hr style="width: 80px;">
                    <p class="lh-lg mb-0">{{$info->description ?? ''}}</p>

                </div>
            </div>
            </div>
            @foreach ($footerLinkCatrgories as $footerLinkCatrgory)
                <div class="col-6 col-md-2">
                    <h5 class="fw-bold">{{ $footerLinkCatrgory->title ?? '' }}</h5>
                    <hr style="width: 80px;">
                    <ul class="list-unstyled p-0">

                        @foreach ($footerLinkCatrgory->links as $item)
                            <li><a href="{{ $item->link ?? '' }}">{{ $item->title ?? '' }}</a></li>
                        @endforeach

                    </ul>
                </div>
            @endforeach
        </div>
    </div>
    <div style="background-color: #000915;">
        <div class="container">
            <div class="row">
                <div class="py-3 text-center">
                    <h4 class="fw-bold">{{$info->siteName ?? ''}}</h4>
                    <p class="mb-0">{{$info->copyright ?? ''}}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
