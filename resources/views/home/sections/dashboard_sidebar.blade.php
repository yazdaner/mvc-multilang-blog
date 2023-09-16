@php
    $lang = App\Models\Language::where('name', session()->get('locale') ?? App::getLocale())->first()->name;
@endphp
<div class="col-lg-3 mt-3">
    <ul class="list-group mt-5">
        <a href="{{route('profile.show')}}">
            <li class="list-group-item align-items-center d-flex {{request()->is('profile') ? 'active' : '' }}">
                <i class="bi bi-person-fill lh-0 me-2 text-primary fs-5"></i>
                {{__('Profile')}}
            </li>
        </a>
        @if ($lang == 'fa')
        @role('teacher')

        <a href="{{route('profile.lessons')}}">
            <li class="list-group-item align-items-center d-flex {{request()->is('profile/lessons') || request()->is('profile/homework*') ? 'active' : '' }}">
                <i class="bi bi-book-fill lh-0 me-2 text-primary fs-5"></i>
                {{__('Lessons')}}
            </li>
        </a>

        @else
        <a href="{{route('profile.lessonsList')}}">
            <li class="list-group-item align-items-center d-flex {{request()->is('profile/lessons') || request()->is('profile/homework*') ? 'active' : '' }}">
                <i class="bi bi-book-fill lh-0 me-2 text-primary fs-5"></i>
                {{__('Lessons')}}
            </li>
        </a>
        @endrole
        @endif

        <a href="{{route('profile.posts-liked')}}">
            <li class="list-group-item align-items-center d-flex {{request()->is('profile/posts-liked') ? 'active' : '' }}">
                <i class="bi bi-heart-fill lh-0 me-2 text-primary fs-5"></i>
                {{__('Likes')}}
            </li>
        </a>
        <a href="{{route('profile.comments')}}">
            <li class="list-group-item align-items-center d-flex {{request()->is('profile/comments') ? 'active' : '' }}">
                <i class="bi bi-chat-fill lh-0 me-2 text-primary fs-5"></i>
                {{__('Comments')}}
            </li>
        </a>
        <a href="{{route('profile.bookmarks')}}">
            <li class="list-group-item align-items-center d-flex {{request()->is('profile/bookmarks') ? 'active' : '' }}">
                <i class="bi bi-bookmark-fill lh-0 me-2 text-primary fs-5"></i>
                {{__('Bookmarks')}}
            </li>
        </a>
        <a href="{{route('logout')}}">
            <li class="list-group-item align-items-center d-flex">
                <i class="bi bi-door-open-fill lh-0 me-2 text-primary fs-5"></i>
                {{__('Exit')}}
            </li>
        </a>
    </ul>
</div>
