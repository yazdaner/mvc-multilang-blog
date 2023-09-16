<header class="d-flex align-items-center justify-content-between">
    <div>
        <i class="bi bi-justify fs-3 cursor-pointer toggle-sidebar-icon" @click="toggle"></i>
    </div>
    <div class="d-flex align-items-center">
        @can('contactUs')

        <div class="dropdown me-4">
            @php

                $ContactUs = App\Models\ContactUs::where('seen', 0)
                    ->get()
                    ->count();
            @endphp
            <a href="{{ route('admin.contactUs.index') }}">

                @if ($ContactUs != 0)
                <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-red" id="contactus_count">
                    {{ $ContactUs }}
                </span>
                @endif
                <i class="bi bi-envelope fs-4">
                </i>
            </a>

        </div>
        @endcan


        <div class="dropdown">
            <div class="profile d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{auth()->user()->getUserProfile()}}" class="img-fluid rounded-circle me-2" style="width: 50px; height: 50px;">

                <div>
                    <h6 class="fs-6 fw-bold text-gray-600 mb-0">{{auth()->user()->name}}</h6>
                    <p class="fs-8 text-gray-600 mb-0">{{auth()->user()->roles()->first()->display_name ?? 'بدون نقش'}}</p>
                </div>
            </div>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                    <a class="dropdown-item fs-7" href="{{route('profile.show')}}">
                        <i class="bi bi-person fs-5 me-1"></i>
                        پروفایل
                    </a>
                </li>
                @can('settings')
                <li>
                    <a class="dropdown-item fs-7" href="{{route('admin.settings.index')}}">
                        <i class="bi bi-gear fs-6 me-1"></i>
                        تنظیمات
                    </a>
                </li>
                @endcan
                <li>
                    <a class="dropdown-item fs-7" href="{{route('home')}}">
                        <i class="bi bi-house fs-6 me-1"></i>
                        صفحه اصلی
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item fs-7" href="{{route('logout')}}">
                        <i class="bi bi-box-arrow-left fs-5 me-1"></i>
                        خروج
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>
