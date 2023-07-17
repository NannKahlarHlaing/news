<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">

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


</head>
<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center sticky-lg-top navScroll" id="navbar">
            <div class="col-11">
                <nav class="navbar navbar-expand-lg navbar-light aa">
                    <div class="" id="menu-bar">
                        <button class="btn btn-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><i class="fa-solid fa-bars me-2"></i><span id="text-all">All</span><span id="text-menu">Menu</span></button>

                        <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                            <div class="container-fulid">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-10">
                                        <div class="offcanvas-header">
                                            <h5 id="offcanvasTopLabel">{{ env('SITE_TITLE') }}</h5>
                                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body d-flex justify-content-start">
                                            <div class="col">News</div>
                                            <div class="col">Opinion</div>
                                            <div class="col">Specials</div>
                                            <div class="col">
                                                <div>
                                                    <h6><a href="">LifeStyle</a></h6>
                                                </div>
                                                <div>
                                                    <h6><a href="{{ route('frontend.videos') }}">Videos</a></h6>
                                                </div>
                                                <div>
                                                    <h6><a href="{{ route('frontend.photos') }}">Photos</a></h6>
                                                </div>
                                                <div>
                                                    <h6><a href="">Photo Essays</a></h6>
                                                </div>
                                                <div>
                                                    <h6><a href="{{ route('frontend.contact') }}">Contact</a></h6>
                                                </div>
                                                <div>
                                                    <h6><a href="{{ route('frontend.careers') }}">Careers</a></h6>
                                                </div>
                                                <div class="">
                                                    <h6><a href="{{ route('frontend.donation') }}">Donate</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid col" id="nav-hide">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                                </li>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="col" id="site-title">News</div>
                    <div class="col-2 text-end" id="search">
                        <span>SEARCH...</span><i class="fa-solid fa-magnifying-glass"></i>
                    </div>

                </nav>
                <form class="d-flex" id="search-form">
                    <input class="form-control me-2 search-input" type="search" placeholder="SEARCH..." aria-label="Search">
                    <i class="fa-solid fa-xmark" id="btn-close"></i>
                </form>
            </div>

        </div>
        <div class="row">
            <div class="container">

            </div>
        </div>


    </div>
    @yield('content')
    <div class="container-fulid bg-dark border-top border-4 border-danger">
        <div class="row d-flex-center" style="margin: 0">
            <div class="col-11 p-3">
                <div class="row mb-4">
                    <div class="col-10">
                        <nav class="nav">
                            <a class="nav-link active" href="#">COPYRIGHT</a>
                            <a class="nav-link" href="#">CODE OF ETHICS</a>
                            <a class="nav-link" href="#">PRIVACY POLICY</a>
                            <a class="nav-link" href="#">CAREERS</a>
                            <a class="nav-link" href="#">TEAM</a>
                            <a class="nav-link" href="#">ABOUT US</a>
                            <a class="nav-link" href="#">CONTACT</a>
                        </nav>
                    </div>
                    <div class="col-2 d-flex justify-content-end align-items-center">
                        <a href="" onclick="topFunction()" id="top">Top <i class="fa-sharp fa-solid fa-angle-up"></i></a>
                    </div>
                </div>
                <div class="row footer-social">
                    <div class="col-12">
                        <ul>
                            <li style="">
                                <a href="">
                                    <div class="row">
                                        <div class="col-12 d-flex-center">
                                            <div class="btn btn-dark btn-circle mb-3 border-white text-center">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bg-danger rounded">
                                        <div class="col-12">
                                            <span>3.8M+ Fans</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li style="">
                                <a href="">
                                    <div class="row">
                                        <div class="col-12 d-flex-center">
                                            <div class="btn btn-dark btn-circle mb-3 border-white text-center">
                                                <i class="fa-brands fa-youtube"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bg-danger rounded">
                                        <div class="col-12">
                                            <span>12K Follow</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li style="">
                                <a href="">
                                    <div class="row">
                                        <div class="col-12 d-flex-center">
                                            <div class="btn btn-dark btn-circle mb-3 border-white text-center">
                                                <i class="fa-brands fa-twitter"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bg-danger rounded">
                                        <div class="col-12">
                                            <span>SUBS</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li style="">
                                <a href="">
                                    <div class="row">
                                        <div class="col-12 d-flex-center">
                                            <div class="btn btn-dark btn-circle mb-3 border-white text-center">
                                                <i class="fa-solid fa-wifi"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bg-danger rounded">
                                        <div class="col-12">
                                            <span>FEED</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li style="">
                                <a href="">
                                    <div class="row">
                                        <div class="col-12 d-flex-center">
                                            <div class="btn btn-dark btn-circle mb-3 border-white text-center">
                                                <i class="fa-solid fa-thumbs-up"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bg-danger rounded">
                                        <div class="col-12">
                                            <span>LIKED</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li style="">
                                <a href="">
                                    <div class="row">
                                        <div class="col-12 d-flex-center">
                                            <div class="btn btn-dark btn-circle mb-3 border-white text-center">
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bg-danger rounded">
                                        <div class="col-12">
                                            <span>LOVED</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li style="">
                                <a href="">
                                    <div class="row">
                                        <div class="col-12 d-flex-center">
                                            <div class="btn btn-dark btn-circle mb-3 border-white text-center">
                                                <i class="fa-solid fa-face-surprise"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bg-danger rounded">
                                        <div class="col-12">
                                            <span>WOWED</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li style="">
                                <a href="">
                                    <div class="row">
                                        <div class="col-12 d-flex-center">
                                            <div class="btn btn-dark btn-circle mb-3 border-white text-center">
                                                <i class="fa-solid fa-face-sad-tear"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bg-danger rounded">
                                        <div class="col-12">
                                            <span>SAD</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li style="">
                                <a href="">
                                    <div class="row">
                                        <div class="col-12 d-flex-center">
                                            <div class="btn btn-dark btn-circle mb-3 border-white text-center">
                                                <i class="fa-solid fa-camera"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bg-danger rounded">
                                        <div class="col-12">
                                            <span>PHOTOS</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li style="">
                                <a href="">
                                    <div class="row">
                                        <div class="col-12 d-flex-center">
                                            <div class="btn btn-dark btn-circle mb-3 border-white text-center">
                                                <i class="fa-solid fa-house"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bg-danger rounded ">
                                        <div class="col-12">
                                            <span>HOME</span>
                                        </div>
                                    </div>

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <span class="copyright"> Copyright © 2016 Irrawaddy Publishing Group. All Rights Reserved</span>
                </div>
            </div>
        </div>
    </div>
    @yield('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function(){
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
})
    let mybutton = document.getElementById("top");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
    // if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    //     mybutton.style.display = "block";
    // } else {
    //     mybutton.style.display = "none";
    // }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>
</body>
</html>
