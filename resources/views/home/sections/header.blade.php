@php
    $langId = App\Models\Language::where('name', session()->get('locale') ?? App::getLocale())->first()->id;
    $lang = App\Models\Language::where('name', session()->get('locale') ?? App::getLocale())->first()->name;

    $gallery = App\Models\Gallery::get()->isNotEmpty();
    $news = App\Models\News::where('language_id', $langId)
        ->get()
        ->isNotEmpty();
    $events = App\Models\Event::where('language_id', $langId)
        ->get()
        ->isNotEmpty();
    $posts = App\Models\Post::where('language_id', $langId)
        ->get()
        ->isNotEmpty();
    $aboutUs = App\Models\AboutUs::where('language_id', $langId)
        ->get()
        ->isNotEmpty();

    $categories = App\Models\ParentCategory::where('language_id', $langId)
        ->with('children')
        ->get();

    $languages = App\Models\Language::all();
    $info = App\Models\Information::where('language_id', $langId)->first();

@endphp
<section x-data="toggleSidebar">

    @include('home.sections.mobile_header')

    <header x-data="{ navShow: false }" @scroll.window="navShow = window.scrollY > 70 ? true : false">
        <nav class="navbar navbar-expand-lg navbar-dark" :class="{ 'scrolled': navShow, 'fixed-top': navShow }">
            <div class="container-fluid">
                <button @click="toggle" class="navbar-toggler" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand" href="{{ route('home') }}">
                    <div class="" x-show="!navShow">
                        @if (isset($info->siteLogo))
                            <img src="{{ asset(env('LOGO_IMAGES_PATH') . $info->siteLogo) }}" alt="logo">
                        @endif
                    </div>
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mb-2 mb-lg-0 p-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                                href="{{ route('home') }}">{{ __('Home') }}</a>
                        </li>

                        @if ($aboutUs)
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('aboutUs') ? 'active' : '' }}" aria-current="page"
                                    href="{{ route('aboutUs.show') }}">{{ __('About Us') }}</a>
                            </li>
                        @endif


                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('contact-us') ? 'active' : '' }}" aria-current="page"
                                href="{{ route('contactUs') }}">{{ __('Contact Us') }}</a>
                        </li>

                        @if ($events)
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('events') ? 'active' : '' }}" aria-current="page"
                                    href="{{ route('events') }}">{{ __('Events') }}</a>
                            </li>
                        @endif

                        @if ($news)
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('news') ? 'active' : '' }}" aria-current="page"
                                    href="{{ route('news.index') }}">{{ __('News') }}</a>
                            </li>
                        @endif

                        @if ($gallery)
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('gallery') ? 'active' : '' }}" aria-current="page"
                                    href="{{ route('gallery') }}">{{ __('Gallery') }}</a>
                            </li>
                        @endif

                        {{-- @if ($lang != 'fa')

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('apply') ? 'active' : '' }}" aria-current="page"
                                href="{{ route('apply') }}">{{ __('Apply') }}</a>
                        </li>
                        @endif --}}



                        @if ($categories->isNotEmpty() && $posts)
                            <li class="nav-item dropdown has-megamenu">
                                <a class="nav-link {{ request()->is('category/*') ? 'active' : '' }} dropdown-toggle"
                                    href="#" data-bs-toggle="dropdown">
                                    {{ __('Blog') }}
                                </a>
                                @include('home.sections.megamenu')
                                <!-- dropdown-mega-menu.// -->
                            </li>
                        @endif

                    </ul>

                </div>

                <div class="d-flex">
                    <div class="auth d-md-flex align-items-center justify-content-center d-none">
                        <i class="search-icon fs-6 mx-3 bi bi-search cursor-pointer" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"></i>
                    </div>
                    @auth
                        <div class="auth d-flex align-items-center justify-content-center">
                            <a href="{{ route('profile.show') }}">{{ __('Profile') }}</a>
                            <a href="{{ route('logout') }}">{{ __('Logout') }}</a>
                        </div>
                    @else
                        <div class="auth d-flex align-items-center justify-content-center">
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
                    @endauth
                    <div class="auth d-flex align-items-center justify-content-center mx-2">
                        <select class="form-control form-control-sm changeLang text-center">
                            @foreach ($languages as $language)
                                <option value="{{ $language->name }}"
                                    {{ session()->get('locale') == $language->name ? 'selected' : '' }}>
                                    {{ $language->display_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>


            </div>
        </nav>
    </header>

</section>
