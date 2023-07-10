<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>

    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- style -->
    <link rel="stylesheet" type="text/css" href="{{asset('/style.css')}}">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">

    {{-- jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
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
                                            <div class="col">LifeStyle</div>
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
            navbar.addClass('sticky scrolled bg-white');
            $('#nav-hide').addClass('d-none');
            $('#site-title').addClass('text-danger');
            $('#site-title').removeClass('d-none');
            $('#menu-bar').addClass('col');
            $('#text-menu').removeClass('d-none');
            $('#text-all').addClass('d-none');
        } else {
            
            // $('.fa-bars').removeClass('text-white');
            navbar.removeClass('sticky scrolled bg-white');
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
</script>
</body>
</html>