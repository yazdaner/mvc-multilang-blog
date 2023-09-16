<div class="dropdown-menu megamenu" role="menu">
    <div class="row g-3">

        @foreach ($categories as $category)
            <div class="col-lg-3 col-6">
                <div class="col-megamenu">
                    <h6 class="title fw-bold">{{ $category->name }}</h6>
                    <ul class="list-unstyled lh-lg">
                        @foreach ($category->children as $subCategory)
                            <li><a href="{{ route('category.show', $subCategory->slug) }}">{{ $subCategory->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- col-megamenu.// -->
            </div>
            <!-- end col-3 -->
        @endforeach


    </div>
</div>
