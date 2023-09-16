<section x-cloak class="sidebar scroller" :class="open || 'inactive'">
    <div class="d-flex align-items-center justify-content-between justify-content-lg-center">
        <h4 class="fw-bold">Persian Gulf</h4>
        <i class="bi bi-x fs-1 d-lg-none cursor-pointer" @click="toggle"></i>
    </div>
    <div class="mt-4">
        <ul class="list-unstyled p-0">


            @can('dashboard')
                <li class="sidebar-item {{ request()->is('admin-panel') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                        <i class="me-2 bi bi-speedometer"></i>
                        <span>داشبورد</span>
                    </a>
                </li>
            @endcan

            @can('users')
            <li class="sidebar-item {{ request()->is('admin-panel/users*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.users.index') }}">
                    <i class="me-2 bi bi-person-circle"></i>
                    <span>کاربران</span>
                </a>
            </li>
            @endcan

            @can('comments')
            <li class="sidebar-item {{ request()->is('admin-panel/comments*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.comments.index') }}">
                    <i class="me-2 bi bi-chat-left-quote-fill"></i>
                    <span>کامنت ها</span>
                </a>
            </li>
            @endcan

            @can('categories')
            <li x-data="toggleSubmenu"
                class="sidebar-item  {{ request()->is('admin-panel/categories*') || request()->is('admin-panel/parentCategories*') ? 'active' : '' }}">
                <div @click="toggle" class="sidebar-link">
                    <i class="me-2 bi bi-grid-fill"></i>
                    <span>دسته بندی</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </div>
                <ul x-show="open" x-transition="" class="submenu list-unstyled mt-1" style="display: none;">
                    <li class="submenu-item"><a href="{{ route('admin.parentCategories.index') }}">دسته بندی
                            والد</a></li>
                    <li class="submenu-item"><a href="{{ route('admin.categories.index') }}">دسته بندی فرزند</a></li>
                </ul>
            </li>
            @endcan
            @can('languages')

            <li class="sidebar-item {{ request()->is('admin-panel/languages*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.languages.index') }}">
                    <i class="me-2 bi bi-translate"></i>
                    <span>زبان ها</span>
                </a>
            </li>
            @endcan
            @can('tags')

            <li class="sidebar-item {{ request()->is('admin-panel/tags*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.tags.index') }}">
                    <i class="me-2 bi bi-tags-fill"></i>
                    <span>تگ</span>
                </a>
            </li>
            @endcan
            @can('posts')

            <li class="sidebar-item {{ request()->is('admin-panel/posts*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.posts.index') }}">
                    <i class="me-2 bi bi-stickies-fill"></i>
                    <span>مقاله</span>
                </a>
            </li>
            @endcan
            @can('news')

            <li class="sidebar-item {{ request()->is('admin-panel/news*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.news.index') }}">
                    <i class="me-2 bi bi-newspaper"></i>
                    <span>خبر</span>
                </a>
            </li>
            @endcan

            @can('events')
            <li class="sidebar-item {{ request()->is('admin-panel/events*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.events.index') }}">
                    <i class="me-2 bi bi-calendar-event-fill"></i>
                    <span>رویداد</span>
                </a>
            </li>
            @endcan

            @can('galleries')

            <li x-data="toggleSubmenu"
                class="sidebar-item  {{ request()->is('admin-panel/galleryCategories*') || request()->is('admin-panel/galleries*') ? 'active' : '' }}">
                <div @click="toggle" class="sidebar-link">
                    <i class="me-2 bi bi-images"></i>
                    <span>گالری</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </div>
                <ul x-show="open" x-transition="" class="submenu list-unstyled mt-1" style="display: none;">
                    <li class="submenu-item"><a href="{{ route('admin.galleryCategories.index') }}">دسته بندی
                            تصاویر</a></li>
                    <li class="submenu-item"><a href="{{ route('admin.galleries.index') }}">تصاویر</a></li>
                </ul>
            </li>
            @endcan
            @can('sliders')

            <li class="sidebar-item {{ request()->is('admin-panel/sliders*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.sliders.index') }}">
                    <i class="me-2 bi bi-file-slides-fill"></i>
                    <span>اسلایدر</span>
                </a>
            </li>
            @endcan
            @can('professors')

            <li class="sidebar-item {{ request()->is('admin-panel/professors*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.professors.index') }}">
                    <i class="me-2 bi bi-mortarboard-fill"></i>
                    <span>اساتید</span>
                </a>
            </li>
            @endcan
            @can('FAQ')

            <li class="sidebar-item {{ request()->is('admin-panel/FAQ*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.FAQ.index') }}">
                    <i class="me-2 bi bi-question-circle-fill"></i>
                    <span>سوالات متداول</span>
                </a>
            </li>
            @endcan
            @can('aboutUs')
            <li class="sidebar-item {{ request()->is('admin-panel/aboutUs*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.aboutUs.index') }}">
                    <i class="me-2 bi bi-people-fill"></i>
                    <span>درباره ما</span>
                </a>
            </li>
            @endcan
            @can('data')

            <li class="sidebar-item {{ request()->is('admin-panel/data*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.data.index') }}">
                    <i class="me-2 bi bi-clipboard2-data-fill"></i>
                    <span>آمار</span>
                </a>
            </li>
            @endcan
            @can('settings')

            <li class="sidebar-item {{ request()->is('admin-panel/settings*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.settings.index') }}">
                    <i class="me-2 bi bi-gear-fill"></i>
                    <span>تنظیمات</span>
                </a>
            </li>
            @endcan
            @can('information')

            <li class="sidebar-item {{ request()->is('admin-panel/informations*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.informations.index') }}">
                    <i class="me-2 bi bi-info-circle"></i>
                    <span>اطلاعات</span>
                </a>
            </li>
            @endcan
            @can('footer')

            <li x-data="toggleSubmenu"
                class="sidebar-item {{ request()->is('admin-panel/footerLinkCatrgories*') || request()->is('admin-panel/footerLinks*') ? 'active' : '' }}">
                <div @click="toggle" class="sidebar-link">
                    <i class="me-2 bi-file-earmark-post"></i>
                    <span>فوتر</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </div>
                <ul x-show="open" x-transition="" class="submenu list-unstyled mt-1" style="display: none;">
                    <li class="submenu-item"><a href="{{ route('admin.footerLinkCatrgories.index') }}">دسته بندی لینک
                            فوتر</a></li>
                    <li class="submenu-item"><a href="{{ route('admin.footerLinks.index') }}">لینک فوتر</a></li>
                </ul>
            </li>
            @endcan

            @can('lessons')

            <li class="sidebar-item {{ request()->is('admin-panel/lessons*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.lessons.index') }}">
                    <i class="me-2 bi bi-book-half"></i>
                    <span>درس ها</span>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</section>
