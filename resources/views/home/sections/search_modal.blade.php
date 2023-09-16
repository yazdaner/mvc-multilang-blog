<div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-5">
        <div class="modal-content">
            <p class="text-white text-center fw-bold mb-4">
                {{__('Press ESC to close')}}
            </p>
            <form action="{{route('search')}}" id="search">
                <div class="input-group">
                    <input value="{{request()->search ?? ''}}" class="form-control search-input" type="text" name="search" placeholder="{{__('Write something to search for')}}..." />
                    <i onclick="document.getElementById('search').submit()" class="search-icon fs-6 bi bi-search cursor-pointer" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"></i>
                </div>
            </form>
        </div>
    </div>
</div>
