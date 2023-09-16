@php
    $lang = App\Models\Language::where('name', session()->get('locale') ?? App::getLocale())->first();
    $langId = App\Models\Language::where('name', session()->get('locale') ?? App::getLocale())->first()->id;
    $info = App\Models\Information::where('language_id', $langId)->first();
@endphp
<!DOCTYPE html>
<html lang="{{ $lang->name }}" dir="{{ $lang->direction }}">

<head>
    <title>{{ $info->siteName ?? '' }} - @yield('title')</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favLogo/favLogo32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favLogo/favLogo16.png') }}">
    {!! SEO::generate() !!}
    <meta property="og:locality" content="بوشهر" />
    <meta property="og:region" content="بوشهر" />
    <meta property="og:country_name" content="ایران" />
    <meta property="og:site_name" content="{{ $info->siteName ?? '' }}">
    <meta name="rights" content="{{ $info->copyright ?? '' }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    @if ($lang->direction == 'ltr')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous" />
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
            integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    @endif
    <link rel="stylesheet" href="{{ asset('css/home/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/owl.theme.default.min.css') }}">
    <link href="{{ asset('css/home/style.css') }}" rel="stylesheet">
    @yield('style')

</head>

<body>

    {{-- @include('home.sections.loading') --}}
    @include('home.sections.header')
    @yield('content')
    @include('home.sections.footer')
    @include('home.sections.search_modal')



    <div id="scrollTop" onclick="scroll_top()">
        <i class="bi bi-arrow-up-circle-fill"></i>
    </div>



    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>


    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::has('error'))
        <script>
            Swal.fire({
                title: 'خطا !',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: "{{ __('ok') }}"
            })
        </script>
    @endif
    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: 'با موفقیت',
                text: "{{ session('success') }}",
                icon: 'success',
                showConfirmButton: false,
                timer: 4000
            })
        </script>
    @endif
    @if (Session::has('warning'))
        <script>
            Swal.fire({
                title: 'دقت کنید !',
                text: '{{ session('warning') }}',
                icon: 'warning',
                confirmButtonText: "{{ __('ok') }}"
            })
        </script>
    @endif
    @if (Session::has('successEditProfile'))
        <script>
            Swal.fire({
                title: "{{ __('Success') }}",
                text: "{{ __('Your user information edited !') }}",
                icon: 'success',
                showConfirmButton: false,
                timer: 4000
            })
        </script>
    @endif
    @if (Session::has('successSendMessage'))
        <script>
            Swal.fire({
                title: "{{ __('Success') }}",
                text: "{{ __('Your message has been successfully sent !') }}",
                icon: 'success',
                showConfirmButton: false,
                timer: 4000
            })
        </script>
    @endif
    @if (Session::has('successSendComment'))
        <script>
            Swal.fire({
                title: "{{ __('Success') }}",
                text: "{{ __('Your comment has been sent !') }}",
                icon: 'success',
                showConfirmButton: false,
                timer: 4000
            })
        </script>
    @endif
    <script type="text/javascript">
        var url = "{{ route('changeLang') }}";

        $(".changeLang").change(function() {
            window.location.href = url + "?lang=" + $(this).val();
        });
    </script>
    <script>
        function likePost(postSlug) {

            fetch(`/like/${postSlug}`, {
                method: 'post',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}'
                }
            }).then((res) => {
                $(`.like-btn-${postSlug}`).children('.bi-heart').toggleClass('active');
                res.json().then((data) => {
                    document.querySelector(`.postLikeCount-${postSlug}`).innerHTML = data;

                })
            })
        }

        function pleaseAuth() {

            Swal.fire({
                icon: 'warning',
                title: "{{ __('Please login to like this post!') }}",
                footer: "<a href='{{ route('login') }}'>{{ __('Do you want to login?') }}</a>",
                confirmButtonText: "{{ __('ok') }}"

            })
        }

        function bookmarkPost(postSlug) {

            fetch(`/bookmark/${postSlug}`, {
                method: 'post',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}'
                }
            }).then(() => {
                $(`.bookmark-click-${postSlug}`).children('.bi-bookmark').toggleClass('active');
            })
        }

        function pleaseAuthBookmark() {

            Swal.fire({
                icon: 'warning',
                title: "{{ __('Please login to bookmark this post!') }}",
                footer: "<a href='{{ route('login') }}'>{{ __('Do you want to login?') }}</a>"
            })
        }
    </script>
    <script>
        function setReplyValue(id, userName) {
            console.log(userName);
            document.getElementById('reply_id').value = id;
            document.getElementById('userNameReply').innerHTML = '{{ __('reply to') }} : ' + userName;
        }

        function setNull() {
            document.getElementById('reply_id').value = '';
            document.getElementById('userNameReply').innerHTML = '';
        }
    </script>

    <script>
        $(document).ready(function() {
            $(".owl-carousel-slider").owlCarousel({
                loop: true,
                items: 1,
                nav: true,
                autoplay: true,
                autoplayHoverPause: true,
            });
            $(".owl-carousel-post").owlCarousel({
                items: 3,
                margin: 0,
                center: true,
                loop: true,
                dots: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 2,
                    },
                    998: {
                        items: 3,
                    }
                }
            });
            $(".owl-carousel-professors").owlCarousel({
                loop: true,
                items: 1,
                nav: true,
                autoplay: true,
                dots: false,
                autoplayHoverPause: true,
                margin: 20,
            });

            $(".owl-prev").html('<i class="bi bi-chevron-left"></i>');
            $(".owl-next").html('<i class="bi bi-chevron-right"></i>');

        });
    </script>
    @yield('script')
</body>

</html>
