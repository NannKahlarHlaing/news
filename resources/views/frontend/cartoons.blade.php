@extends('frontend.index')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://www.insightindia.com/mcss/icon-font.css">
    <style>
    .slick-slider .slick-prev, .slick-slider .slick-next {
        z-index: 100;
        font-size: 2.5em;
        height: 40px;
        width: 40px;
        margin-top: -20px;
        color: #B7B7B7;
        position: absolute;
        top: 50%;
        text-align: center;
        color: #000;
        opacity: .3;
        transition: opacity .25s;
        cursor: pointer;
    }
    .slick-slider .slick-prev:hover, .slick-slider .slick-next:hover {
        opacity: .65;
    }
    .slick-slider .slick-prev {
        left: 0;
    }
    .slick-slider .slick-next {
        right: 0;
    }

    #detail .product-images {
        width: 100%;
        margin: 0 auto;
        /* border:1px solid #eee; */
    }
    #detail .product-images li, #detail .product-images figure, #detail .product-images a, #detail .product-images img {
        display: block;
        outline: none;
        border: none;
    }
    #detail .product-images .main-img-slider figure {
        margin: 0 auto;
        padding: 0 2em;
    }
    #detail .product-images .main-img-slider figure a {
        cursor: pointer;
        cursor: -webkit-zoom-in;
        cursor: -moz-zoom-in;
        cursor: zoom-in;
    }
    #detail .product-images .main-img-slider figure a img {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
    }
    #detail .product-images .thumb-nav {
        margin: 0 auto;
        padding:20px 10px;
        max-width: 600px;
    }
    #detail .product-images .thumb-nav.slick-slider .slick-prev, #detail .product-images .thumb-nav.slick-slider .slick-next {
        font-size: 1.2em;
        height: 20px;
        width: 26px;
        margin-top: -10px;
        display: none !important;
    }
    #detail .product-images .thumb-nav.slick-slider .slick-prev {
        margin-left: -30px;
    }
    #detail .product-images .thumb-nav.slick-slider .slick-next {
        margin-right: -30px;
    }
    #detail .product-images .thumb-nav li {
        display: block;
        margin: 0 auto;
        cursor: pointer;
    }
    #detail .product-images .thumb-nav li img {
        display: block;
        width: 100%;
        max-width: 75px;
        margin: 0 auto;
        border: 2px solid transparent;
        -webkit-transition: border-color .25s;
        -ms-transition: border-color .25s;
        -moz-transition: border-color .25s;
        transition: border-color .25s;
    }
    #detail .product-images .thumb-nav li:hover, #detail .product-images .thumb-nav li:focus {
        border-color: #999;
    }
    #detail .product-images .thumb-nav li.slick-current img {
        border-color: #d12f81;
    }
    .slick-initialized .slick-slide {
        display: inline-flex;
    }
    .last-cartoons{
        background-color: #e3dbcd;
    }

</style>
@endsection

@section('content')
    <section class="cartoons-title">
        <div class="container-fluid">
            <div class="row d-flex-center">
                <div class="col-11">
                    <div class="row">
                        <div class="col-12">
                            <h2>Cartoons</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="detail" class="py-5">
        <div class="container-fluid">
          <div class="row d-flex-center">
            <div class="col-12">
            <!-- Product Images & Alternates -->
                <div class="product-images demo-gallery">
                  <!-- Begin Product Images Slider -->
                  <div class="main-img-slider">
                    {{-- @foreach ($posts as $item) --}}
                        <div class="row">
                            <div class="col-md-6">
                                <a data-fancybox="gallery" href="https://www.irrawaddy.com/wp-content/uploads/2017/03/2H9A7898-a-1-1345x900.jpg">
                                    <img src="https://www.irrawaddy.com/wp-content/uploads/2017/03/2H9A7898-a-1-1345x900.jpg"style="width: 100%;object-fit: cover;">
                                </a>
                            </div>
                            <div class="col-md-6 cartoon py-3">
                                <div class="row ">
                                    <div class="col-lg-12">
                                        <h3><a href="">“Hostage diplomacy”</a></h3>
                                        <span class="text-start">13 July 2023 - P2</span>
                                        <div class="row mt-3">
                                            <div class="col-12 ">
                                                <a class="me-3" style="display: inline-block;">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a class="me-3" style="display: inline-block;">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <span class="id d-none">tghghh</span>
                                                <span class="views me-4 border-right">dghdth</span>
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(URL::current()) }}" class="btn btn-fb btn-circle me-2" style="border: 1px solid #fff !important;display: inline-block;">
                                                    <i class="fa-brands fa-facebook-f"></i>
                                                </a>
                                                <a href="https://twitter.com/intent/tweet?text={{ urlencode(URL::current()) }}&url={{ urlencode(URL::current()) }}" class="btn btn-tw btn-circle me-2" style="border: 1px solid #fff !important;display: inline-block;">
                                                    <i class="fa-brands fa-twitter"></i>
                                                </a>
                                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(URL::current()) }}" class="btn btn-li btn-circle me-2" style="border: 1px solid #fff !important;display: inline-block;">
                                                    <i class="fa-brands fa-linkedin-in"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    {{-- @endforeach --}}
                    </div>
                <!-- End Product Images Slider -->

                <!-- Begin product thumb nav -->
                <ul class="thumb-nav d-none" >
                    {{-- @foreach ($posts as $item) --}}
                        <li><img src="https://www.irrawaddy.com/wp-content/uploads/2017/03/2H9A7898-a-1-1345x900.jpg"></li>
                    {{-- @endforeach --}}
                </ul>
                <!-- End product thumb nav -->
              </div>
            <!-- End Product Images & Alternates -->
            </div>
          </div>
        </div>
    </section>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.1/jquery-migrate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>\

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0" nonce="YOUR_NONCE_VALUE"></script>

    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    <script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
    <script>

        /*--------------*/
        // Main/Product image slider for product page
        $('#detail .main-img-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        fade:true,
        autoplay: true,
        autoplaySpeed: 4000,
        speed: 300,
        lazyLoad: 'ondemand',
        asNavFor: '.thumb-nav',
        prevArrow: '<div class="slick-prev"><i class="i-prev"></i><span class="sr-only sr-only-focusable">Previous</span></div>',
        nextArrow: '<div class="slick-next"><i class="i-next"></i><span class="sr-only sr-only-focusable">Next</span></div>'
        });
        // Thumbnail/alternates slider for product page
        $('.thumb-nav').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        centerPadding: '0px',
        asNavFor: '.main-img-slider',
        dots: false,
        centerMode: false,
        draggable: true,
        speed:200,
        focusOnSelect: true,
        prevArrow: '<div class="slick-prev"><i class="i-prev"></i><span class="sr-only sr-only-focusable">Previous</span></div>',
        nextArrow: '<div class="slick-next"><i class="i-next"></i><span class="sr-only sr-only-focusable">Next</span></div>'
        });


        //keeps thumbnails active when changing main image, via mouse/touch drag/swipe
        $('.main-img-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
        //remove all active class
        $('.thumb-nav .slick-slide').removeClass('slick-current');
        //set active class for current slide
        $('.thumb-nav .slick-slide:not(.slick-cloned)').eq(currentSlide).addClass('slick-current');
        });
    </script>
    <script>
        // $(document).ready(function(){
        //     $('.views').each(function() {
        //         var value = $(this).html();
        //         var id = $(this).prev('.id').text();
        //         var element = $(this);
        //         $.ajax({
        //             url: '',
        //             method: 'GET',
        //             data: {value: value, id: id},
        //             success: function(response){
        //                 console.log('response: ' + response);
        //                 element.html(response);
        //             },
        //             error: function(xhr, status, error) {
        //                 console.log('error: ' + error);
        //             }
        //         });
        //     });
        // });
    </script>
@endsection