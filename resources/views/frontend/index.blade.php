<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    @yield('css')
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- style -->
    <link rel="stylesheet" type="text/css" href="{{asset('/style.css')}}">

    {{-- jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- botstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet"/>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> --}}

</head>
<body>
    <section class="bg-main">
        <div class="container-fluid">
            <div class="col-12 py-1 text-end locale">
                <span class="d-none" id ="lang">{{ app()->getLocale() }}</span>
                <a href="" class="text-white me-2" id="mm">Myanmar</a>
                <a href="" class="text-white me-2" id="ta">Ta'ang</a>
                <a href="" class="text-white me-2" id="ch">Chinese</a>
                <a href="" class="text-white" id="en">English</a>
            </div>
        </div>
    </section>

    <section class="d-flex justify-content-center navScroll" id="navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light aa">
                        <a class="btn btn-transparent py-0 ps-0 d-none" id="all-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                            <img src="{{ asset('images/viber_image_2023-10-02_15-49-11-831-removebg-preview.png') }}" class="d-none d-lg-inline" alt="" width="80px" height="80px">
                            <button class="btn btn-gray mt-1"><p class="fw-bold px-2"> ALL MENU</p></button>
                        </a>
                        <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                            <div class="container-fluid">
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-lg-2 col-md-2 text-center">
                                        <img src="{{ asset('images/viber_image_2023-10-02_15-49-11-831-removebg-preview.png') }}" alt="" width="100px" height="100px">
                                    </div>
                                    <div class="col-lg-10 col-md-10">
                                        <div class="offcanvas-header">
                                            <h5 id="offcanvasTopLabel">{{ env('APP_NAME') }}</h5>
                                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body d-flex justify-content-center">
                                            <div class="col">
                                                <div class="row">
                                                    @if(isset($all_menus))
                                                        @foreach ($all_menus as $menu)
                                                            <div class="col-md-3">
                                                                <h6>
                                                                    @if (session()->get('locale') == 'mm')
                                                                        <a href="{{ url('/mm/category') . '/' . $menu->url_slug }}">{{ $menu->name_mm }}</a>
                                                                    @elseif (session()->get('locale') == 'ch')
                                                                        <a href="{{ url('/ch/category') . '/' . $menu->url_slug }}">{{ $menu->name_ch }}</a>
                                                                    @elseif (session()->get('locale') == 'ta')
                                                                        <a href="{{ url('/ta/category') . '/' . $menu->url_slug }}">{{ $menu->name_ta }}</a>
                                                                    @else
                                                                        <a href="{{ url('/category') . '/' . $menu->url_slug }}">{{ $menu->name_en }}</a>
                                                                    @endif
                                                                </h6>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid col-lg px-0" id="nav-hide">
                            <div class="d-flex align-items-center" id="menu-bar">
                                <a class="btn btn-transparent py-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                                    <img src="{{ asset('images/viber_image_2023-10-02_15-49-11-831-removebg-preview.png') }}" class="d-none d-lg-inline" alt="" width="80px" height="80px">
                                    <button class="btn btn-green mt-1"><p class="fw-bold px-3"> ALL MENU</p></button>
                                </a>

                            </div>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link fw-bold" aria-current="page" href="{{ url('/') }}">{{ __('language.home') }}</a>
                                    </li>

                                    @if (session()->get('locale') == 'mm')
                                        @foreach ($main_menus_mm as $item)
                                            <li class="nav-item">
                                                <a class="nav-link fw-bold" aria-current="page" href="{{ $item->link }}" id={{ $item->id }}>{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                    @elseif (session()->get('locale') == 'ch')
                                        @foreach ($main_menus_ch as $item)
                                            <li class="nav-item">
                                                <a class="nav-link fw-bold" aria-current="page" href="{{ $item->link }}">{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                    @elseif (session()->get('locale') == 'ta')
                                        @foreach ($main_menus_ta as $item)
                                        <li class="nav-item">
                                            <a class="nav-link fw-bold" aria-current="page" href="{{ $item->link }}">{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                    @else
                                        @foreach ($main_menus_en as $item)
                                        <li class="nav-item">
                                            <a class="nav-link fw-bold" aria-current="page" href="{{ $item->link }}">{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>

                            </div>
                        </div>
                        <div class="col-lg h2 fw-bold text-white text-center" id="site-title">{{ env('APP_NAME') }}</div>
                        <div class="col-lg-2 col-12 text-end mt-2 mt-lg-0" id="search">
                            <span>{{ __('language.search') }}...</span><i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </nav>
                    @if (session()->get('locale') == 'mm')
                        <form class="d-flex" id="search-form" action="{{ url('/mm/posts/search') }}" method="GET">
                            @csrf
                            <input class="form-control me-2 search-input" type="search" placeholder="{{ __('language.search') }}..." aria-label="Search" name="search">
                            <i class="fa-solid fa-xmark" id="btn-close"></i>
                        </form>
                    @elseif (session()->get('locale') == 'ch')
                        <form class="d-flex" id="search-form" action="{{ url('/ch/posts/search') }}" method="GET">
                            @csrf
                            <input class="form-control me-2 search-input" type="search" placeholder="{{ __('language.search') }}..." aria-label="Search" name="search">
                            <i class="fa-solid fa-xmark" id="btn-close"></i>
                        </form>
                    @elseif (session()->get('locale') == 'ta')
                        <form class="d-flex" id="search-form" action="{{ url('/ta/posts/search') }}" method="GET">
                            @csrf
                            <input class="form-control me-2 search-input" type="search" placeholder="{{ __('language.search') }}..." aria-label="Search" name="search">
                            <i class="fa-solid fa-xmark" id="btn-close"></i>
                        </form>
                    @else
                        <form class="d-flex" id="search-form" action="{{ url('/posts/search') }}" method="GET">
                            @csrf
                            <input class="form-control me-2 search-input" type="search" placeholder="{{ __('language.search') }}..." aria-label="Search" name="search">
                            <i class="fa-solid fa-xmark" id="btn-close"></i>
                        </form>
                    @endif

                </div>

            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="container">

            </div>
        </div>
    </div>

    @yield('content')
    <section class="bg-main footer-top text-white">
        <div class="container-fluid">
            <div class="row d-flex-center" style="margin: 0">
                <div class="col-12 p-3">
                    <div class="row mb-4 d-flex justify-content-end align-items-center">
                        <div class="col-2 d-flex justify-content-end text-end">
                            <a href="" onclick="topFunction()" id="top">Top <i class="fa-sharp fa-solid fa-angle-up"></i></a>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-3">
                            <ul class="footer-link">
                                @if (session()->get('locale') == 'mm')
                                    @foreach ($footer_menus_mm as $item)
                                        <li><a class="nav-link "href="{{ $item->link }}">{{ $item->name }}</a></li>
                                    @endforeach
                                @elseif (session()->get('locale') == 'ch')
                                    @foreach ($footer_menus_ch as $item)
                                        <li><a class="nav-link "href="{{ $item->link }}">{{ $item->name }}</a></li>
                                    @endforeach
                                @elseif (session()->get('locale') == 'ta')
                                    @foreach ($footer_menus_ta as $item)
                                        <li><a class="nav-link "href="{{ $item->link }}">{{ $item->name }}</a></li>
                                    @endforeach
                                @else
                                    @foreach ($footer_menus_en as $item)
                                        <li><a class="nav-link "href="{{ $item->link }}">{{ $item->name }}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <div class="row footer-social">
                                <div class="col-12 d-flex-center border-bottom border-white pb-3 mb-3">
                                   <a href="{{ $facebook_link }}"><i class="fa-brands fa-square-facebook me-5"></i></a> <a href="{{ $youtube_link }}"><i class="fa-brands fa-square-youtube me-5"></i></a> <a href="{{ $instagram_link }}"><i class="fa-brands fa-instagram"></i></a>
                                </div>
                                <div class="col-12 text-center">
                                    <p>contact@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-md-0 mt-3">
                            <h5 class="fw-bold text-white">{{ __('language.about_us') }}</h5>
                            <p>
                                On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <span class="copyright"> {{ $info->footer_text }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @yield('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        var appUrl = '{{ $app_url }}';
        const searchInput = $('.search-input');

            searchInput.on('keydown', function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    $('#search-form').submit();
                }
            });

        var lang = $('#lang').text();

        $('#en').on('click', function(event) {
            event.preventDefault();
            var currentURL = window.location.href;
            if(lang == 'en'){
                var newUrl = currentURL.replace(appUrl, appUrl + 'en/');
            }else{
                var newUrl = currentURL.replace(/\/(mm|ch|ta)\//, '/en/');
            }

            window.location.replace(newUrl);
        });

        $('#mm').on('click', function(event) {
            event.preventDefault();
            var currentURL = window.location.href;
            if(lang == 'en'){
                var newUrl = currentURL.replace(appUrl, appUrl + 'mm/');
            }else{
                var newUrl = currentURL.replace(/\/(ch|en|ta)\//, '/mm/');
            }

            window.location.replace(newUrl);
        });

        $('#ch').on('click', function(event) {
            event.preventDefault();
            var currentURL = window.location.href;
            if(lang == 'en'){
                var newUrl = currentURL.replace(appUrl, appUrl + 'ch/');
            }else{
                var newUrl = currentURL.replace(/\/(mm|en|ta)\//, '/ch/');
            }

            window.location.replace(newUrl);
        });

        $('#ta').on('click', function(event) {
            event.preventDefault();
            var currentURL = window.location.href;
            if(lang == 'en'){
                var newUrl = currentURL.replace(appUrl, appUrl + 'ta/');
            }else{
                var newUrl = currentURL.replace(/\/(mm|en|ch)\//, '/ta/');
            }

            window.location.replace(newUrl);
        });

        var activeNavItem = localStorage.getItem('activeNavItem');

        if (activeNavItem) {
            $(`.nav-link[href="${activeNavItem}"]`).addClass('active');
        }

        $('.nav-link').on('click', function () {
            var itemHref = $(this).attr('href');
            localStorage.setItem('activeNavItem', itemHref);
        });

        $(document).on('click', function (e) {
            if (!$(e.target).hasClass('nav-link')) {
                $('.nav-link').removeClass('active');
                localStorage.removeItem('activeNavItem');
            }
        });

        $('#site-title').addClass('d-none');
        $('#search-form').addClass('d-none');
        var navbar = $('#navbar');
        var navbarOffset = navbar.offset().top;
        navbar.addClass('bg-gray');
        $('#text-menu').addClass('d-none');

        $(window).scroll(function () {

            if ($(window).scrollTop() > navbarOffset) {
                navbar.removeClass('bg-gray');
                navbar.addClass('sticky scrolled bg-background shadow');
                $('#nav-hide').addClass('d-none');
                $('#site-title').removeClass('d-none');
                $('#menu-bar').addClass('col');
                $('#text-menu').removeClass('d-none');
                $('#text-menu').addClass('text-white');
                $('.fa-bars').addClass('text-white');
                $('#search').addClass('text-white');
                $('#text-all').addClass('d-none');
                $('#all-menu').removeClass('d-none');
            } else {
                navbar.addClass('bg-gray');
                navbar.removeClass('sticky scrolled bg-background shadow');
                $('#nav-hide').removeClass('d-none');
                $('#site-title').addClass('d-none');
                $('#menu-bar').removeClass('col');
                $('#search').removeClass('text-white');
                $('#text-menu').addClass('d-none');
                $('.fa-bars').removeClass('text-white');
                $('#text-all').removeClass('d-none');
                $('#all-menu').addClass('d-none');
            }
        });
        $('#search').click(function(){
            $('#search-form').removeClass('d-none');
            $('.aa').addClass('d-none');
        });

        $('#btn-close').click(function(){
            $('#search-form').addClass('d-none');
            $('.aa').removeClass('d-none');
        })

        let mybutton = document.getElementById("top");
        function scrollFunction() {
        }

        window.onscroll = scrollFunction();

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    })

</script>
</body>
</html>
