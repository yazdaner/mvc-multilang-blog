<section x-cloak class="sidebar scroller" :class="open || 'inactive'">
    <div class="d-flex align-items-center justify-content-between justify-content-lg-center">
        <div class="">
            @if (isset($info->siteLogo))
                <img class="img-fluid" width="80" src="{{ asset(env('LOGO_IMAGES_PATH') . $info->siteLogo) }}"
                    alt="logo">
            @endif
        </div>
        <i class="bi bi-x fs-1 d-lg-none cursor-pointer text-white" @click="toggle"></i>
    </div>
    <div class="mt-4">
        <div class="search mb-4">
            <form action="{{ route('search') }}" id="search_mobile">

                <div class="input-group">
                    <input value="{{ request()->search ?? '' }}" class="form-control" type="text" name="search"
                        placeholder="{{ __('search') }}..." />
                    <i onclick="document.getElementById('search_mobile').submit()"
                        class="search-icon fs-6 bi bi-search cursor-pointer"></i>
                </div>
            </form>

        </div>
        <ul class="list-unstyled p-0">
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">
                    <i class="bi bi-house"></i>
                    <span class="mx-2">{{ __('Home') }}</span>
                </a>
            </li>
            @if ($aboutUs)
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('aboutUs') ? 'active' : '' }}"
                        href="{{ route('aboutUs.show') }}">
                        <i class="bi bi-file-earmark-person"></i>
                        <span class="mx-2">{{ __('About Us') }}</span>
                    </a>
                </li>
            @endif
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('contact-us') ? 'active' : '' }}"
                    href="{{ route('contactUs') }}">
                    <i class="bi bi-telephone"></i>
                    <span class="mx-2">{{ __('Contact Us') }}</span>
                </a>
            </li>
            @if ($events)
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('events') ? 'active' : '' }}"
                        href="{{ route('events') }}">
                        <i class="bi bi-calendar-event"></i>
                        <span class="mx-2">{{ __('Events') }}</span>
                    </a>
                </li>
            @endif
            @if ($news)
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('news') ? 'active' : '' }}"
                        href="{{ route('news.index') }}">
                        <i class="bi bi-newspaper"></i>
                        <span class="mx-2">{{ __('News') }}</span>
                    </a>
                </li>
            @endif
            @if ($gallery)
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('gallery') ? 'active' : '' }}"
                        href="{{ route('gallery') }}">
                        <i class="bi bi-images"></i>
                        <span class="mx-2">{{ __('Gallery') }}</span>
                    </a>
                </li>
            @endif
            {{-- <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('apply') ? 'active' : '' }}" href="{{ route('apply') }}">
                    <i class="bi bi-clipboard2-check"></i>
                    <span class="mx-2">{{ __('Apply') }}</span>
                </a>
            </li> --}}
            @if ($categories->isNotEmpty() && $posts)

                <li x-data="toggleSubmenu" class="sidebar-item">
                    <div @click="toggle" class="sidebar-link {{ request()->is('category/*') ? 'active' : '' }}">
                        <i class="bi bi-grid-fill"></i>
                        <span class="mx-2">{{ __('Blog') }}</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </div>
                    <ul x-show="open" x-transition class="submenu list-unstyled mt-1">

                        @foreach ($categories as $category)
                            <li x-data="toggleSubmenu" class="sidebar-item ms-3">
                                <div @click="toggle" class="sidebar-link">
                                    <span>{{ $category->name }}</span>
                                    <i class="bi bi-chevron-down ms-auto"></i>
                                </div>
                                <ul x-show="open" x-transition class="submenu list-unstyled mt-1">
                                    @foreach ($category->children as $subCategory)
                                        <li
                                            class="submenu-item {{ request()->is('category/' . $subCategory->slug) ? 'active' : '' }}">
                                            <a
                                                href="{{ route('category.show', $subCategory->slug) }}">{{ $subCategory->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endif
        </ul>
        <div>
            <div class="socials">
                <div class="col-12 social-links mt-4">
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
</section>
