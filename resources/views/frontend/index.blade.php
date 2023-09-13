<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The VWXYZ Online</title>

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
    <section class="bg-dark">
        <div class="container-fluid">
            <div class="col-12 py-1 text-end locale">
                <span class="d-none" id ="lang">{{ app()->getLocale() }}</span>
                <a href="" class="text-white me-2" id="en">English</a>
                <a href="" class="text-white me-2" id="mm">Myanmar</a>
                <a href="" class="text-white" id="ch">Chinese</a>
            </div>
        </div>
    </section>

    <section class="d-flex justify-content-center navScroll" id="navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light aa">
                        <div class="" id="menu-bar">
                            <button class="btn btn-transparent d-none d-lg-block" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><i class="fa-solid fa-bars me-2"></i><span id="text-all">All</span><span id="text-menu">Menu</span></button>
                            <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                                <div class="container-fluid">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-11">
                                            <div class="offcanvas-header">
                                                <h5 id="offcanvasTopLabel">The VWXYZ Online</h5>
                                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                            </div>
                                            <div class="offcanvas-body d-flex justify-content-start">
                                                <div class="col">
                                                    <h6><a href="{{ url('/category/News')  }}">News</a></h6>
                                                    <div>
                                                        <h6><a href="{{ url('/categories/News/Burma') }}">Burma</a></h6>
                                                    </div>
                                                    <div>
                                                        <h6><a href="{{ url('/categories/News/Politics') }}">Politics</a></h6>
                                                    </div>
                                                    <div>
                                                        <h6><a href="{{ url('/categories/News/World') }}">World</a></h6>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h6><a href="{{ url('/category/Opinion')  }}">Opinion</a></h6>
                                                    <div>
                                                        <h6><a href="{{ url('/categories/News/Commentary') }}">Commentary</a></h6>
                                                    </div>
                                                    <div>
                                                        <h6><a href="{{ url('/categories/News/Editorial') }}">Editorial</a></h6>
                                                    </div>
                                                    <div>
                                                        <h6><a href="{{ url('/categories/News/Analysis') }}">Analysis</a></h6>
                                                    </div>
                                                    <div>
                                                        <h6><a href="{{ url('/categories/News/Articles') }}">Articles</a></h6>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h6><a href="{{ url('/category/Specials')  }}">Specials</a></h6>
                                                    <div>
                                                        <h6><a href="{{ url('/categories/News/Articles') }}">Articles</a></h6>
                                                    </div>
                                                    <div>
                                                        <h6><a href="{{ url('/categories/News/Articles') }}">Articles</a></h6>
                                                    </div>
                                                    <div>
                                                        <h6><a href="{{ url('/categories/News/Articles') }}">Articles</a></h6>
                                                    </div>
                                                    <div>
                                                        <h6><a href="{{ url('/categories/News/Articles') }}">Articles</a></h6>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div>
                                                        <h6><a href="{{ url('/category/LifeStyle')  }}">LifeStyle</a></h6>
                                                    </div>
                                                    {{-- <div>
                                                        <h6><a href="{{ route('frontend.videos') }}">Videos</a></h6>
                                                    </div>
                                                    <div>
                                                        <h6><a href="{{ route('frontend.photos') }}">Photos</a></h6>
                                                    </div>
                                                    <div>
                                                        <h6><a href="{{ route('frontend.photo_essays') }}">Photo Essays</a></h6>
                                                    </div>
                                                    <div>
                                                        <h6><a href="{{ route('frontend.contact') }}">Contact</a></h6>
                                                    </div>
                                                    <div class="">
                                                        <h6><a href="{{ route('frontend.donation') }}">Donate</a></h6>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid col-lg" id="nav-hide">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                Home
                            </a>

                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    @if (session()->get('locale') == 'mm')
                                        @foreach ($main_menus_mm as $item)
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="{{ $item->link }}">{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                    @elseif (session()->get('locale') == 'ch')
                                        @foreach ($main_menus_ch as $item)
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="{{ $item->link }}">{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                    @else
                                        @foreach ($main_menus_en as $item)
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="{{ $item->link }}">{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>

                            </div>
                        </div>
                        <div class="col-lg" id="site-title">THE VWXYZ ONLINE</div>
                        <div class="col-lg-2 col-12 text-end mt-2" id="search">
                            <span>SEARCH...</span><i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </nav>
                    @if (session()->get('locale') == 'mm')
                        <form class="d-flex" id="search-form" action="{{ url('/mm/posts/search') }}" method="GET">
                            @csrf
                            <input class="form-control me-2 search-input" type="search" placeholder="SEARCH..." aria-label="Search" name="search">
                            <i class="fa-solid fa-xmark" id="btn-close"></i>
                        </form>
                    @elseif (session()->get('locale') == 'ch')
                        <form class="d-flex" id="search-form" action="{{ url('/ch/posts/search') }}" method="GET">
                            @csrf
                            <input class="form-control me-2 search-input" type="search" placeholder="SEARCH..." aria-label="Search" name="search">
                            <i class="fa-solid fa-xmark" id="btn-close"></i>
                        </form>
                    @else
                        <form class="d-flex" id="search-form" action="{{ url('/posts/search') }}" method="GET">
                            @csrf
                            <input class="form-control me-2 search-input" type="search" placeholder="SEARCH..." aria-label="Search" name="search">
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
    <section class="bg-dark footer-top text-white">
        <div class="container-fluid">
            <div class="row d-flex-center" style="margin: 0">
                <div class="col-12 p-3">
                    <div class="row mb-4 d-flex justify-content-end align-items-center">
                        <div class="col-2 d-flex justify-content-end test-end">
                            <a href="" onclick="topFunction()" id="top">Top <i class="fa-sharp fa-solid fa-angle-up"></i></a>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-3">
                            <img src="" alt="logo" width="100%">
                            <ul class="footer-link">
                                @if (session()->get('locale') == 'mm')
                                    @foreach ($footer_menus_mm as $item)
                                        <li><a class="nav-link "href="{{ $item->link }}">{{ $item->name }}</a></li>
                                    @endforeach
                                @elseif (session()->get('locale') == 'ch')
                                    @foreach ($footer_menus_ch as $item)
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
                                    <i class="fa-brands fa-square-facebook me-5"></i> <i class="fa-brands fa-square-youtube me-5"></i> <i class="fa-brands fa-instagram"></i>
                                </div>
                                <div class="col-12 text-center">
                                    <p>contact@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-md-0 mt-3">
                            <h6>About Us</h6>
                            <p>
                                On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <span class="copyright"> Copyright © 2016 VWXYZ Publishing Group. All Rights Reserved</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @yield('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // https://vwxyz.online/public/
    $(document).ready(function(){
        // Get the input element
        const searchInput = $('.search-input');

            // Add an event listener for the "keydown" event on the input element
            searchInput.on('keydown', function(event) {
                // Check if the pressed key is the "Enter" key (key code 13)
                if (event.keyCode === 13) {
                    // Prevent the default behavior of the "Enter" key (form submission)
                    event.preventDefault();

                    // Submit the form
                    $('#search-form').submit();
                }
            });

        var lang = $('#lang').text();

        $('#en').on('click', function(event) {
            event.preventDefault();
            var currentURL = window.location.href;
            if(lang == 'en'){
                var newUrl = currentURL.replace('http://127.0.0.1:8000/', 'http://127.0.0.1:8000/en/');
            }else{
                var newUrl = currentURL.replace(/\/(mm|ch)\//, '/en/');
            }

            window.location.replace(newUrl);
        });

        $('#mm').on('click', function(event) {
            console.log( 'ddd');
            event.preventDefault();
            var currentURL = window.location.href;
            //
            console.log( ' ddd'+ $('#mm').text());
            if(lang == 'en'){
                var newUrl = currentURL.replace('http://127.0.0.1:8000/', 'http://127.0.0.1:8000/mm/');
            }else{
                var newUrl = currentURL.replace(/\/(ch|en)\//, '/mm/');
            }

            window.location.replace(newUrl);
        });

        $('#en').on('click', function(event) {
            event.preventDefault();
            var currentURL = window.location.href;
            if(lang == 'en'){
                var newUrl = currentURL.replace('http://127.0.0.1:8000/', 'http://127.0.0.1:8000/en/');
            }else{
                var newUrl = currentURL.replace(/\/(mm|ch)\//, '/en/');
            }
        });

        $('#ch').on('click', function(event) {
            event.preventDefault();
            var currentURL = window.location.href;
            if(lang == 'en'){
                var newUrl = currentURL.replace('http://127.0.0.1:8000/', 'http://127.0.0.1:8000/ch/');
            }else{
                var newUrl = currentURL.replace(/\/(mm|en)\//, '/ch/');
            }

            window.location.replace(newUrl);
        });

        $('#site-title').addClass('d-none');
        $('#search-form').addClass('d-none');
        var navbar = $('#navbar');
        var navbarOffset = navbar.offset().top;
        navbar.addClass('bg-danger');
        $('#text-menu').addClass('d-none');

        $(window).scroll(function () {

            if ($(window).scrollTop() > navbarOffset) {
                navbar.removeClass('bg-danger');
                navbar.addClass('sticky scrolled bg-background');
                $('#nav-hide').addClass('d-none');
                $('#site-title').addClass('text-danger');
                $('#site-title').removeClass('d-none');
                $('#menu-bar').addClass('col');
                $('#text-menu').removeClass('d-none');
                $('#text-all').addClass('d-none');
            } else {

                navbar.addClass('bg-danger');
                navbar.removeClass('sticky scrolled bg-background');
                $('#nav-hide').removeClass('d-none');
                $('#site-title').addClass('d-none');
                $('#menu-bar').removeClass('col');

                $('#text-menu').addClass('d-none');
                $('#text-all').removeClass('d-none');
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

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    })

</script>
</body>
</html>
