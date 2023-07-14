
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
        border:1px solid #eee;
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

</style>
@endsection

@section('content')
<section id="detail">
    <div class="container- fluid">
      <div class="row d-flex-center">
        <div class="col-12">
     <!-- Product Images & Alternates -->
            <div class="product-images demo-gallery">
              <!-- Begin Product Images Slider -->
              <div class="main-img-slider">
                 <a data-fancybox="gallery" href="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg"><img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" width="100%" height="800px"></a>
                 <a data-fancybox="gallery" href="http://via.placeholder.com/1920x1280"><img src="https://www.geneva-academy.ch/images/News/2023/10_Features_Geneva_Academy/_advanced-content-gallery/Digital_Tracking_Tools_Human_Rights_Implementation.jpg" width="100%" height="800px"></a>
                 <a data-fancybox="gallery" href="http://via.placeholder.com/1920x1280"><img src="https://www.geneva-academy.ch/images/News/2023/2022_Annual_Report/_advanced-content-gallery/Online_Executive_Master_in_International_Law_in_Armed_Conflict_2022_Annual_report.jpg" width="100%" height="800px"></a>
                 <a data-fancybox="gallery" href="http://via.placeholder.com/1920x1280"><img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" width="100%" height="800px"></a>
                 <a data-fancybox="gallery" href="http://via.placeholder.com/1920x1280"><img src="https://www.geneva-academy.ch/images/News/2023/10_Features_Geneva_Academy/_advanced-content-gallery/Digital_Tracking_Tools_Human_Rights_Implementation.jpg" width="100%" height="800px"></a>
                 <a data-fancybox="gallery" href="http://via.placeholder.com/1920x1280"><img src="https://www.geneva-academy.ch/images/News/2023/2022_Annual_Report/_advanced-content-gallery/Online_Executive_Master_in_International_Law_in_Armed_Conflict_2022_Annual_report.jpg" width="100%" height="800px"></a>
                </div>
            <!-- End Product Images Slider -->
          
            <!-- Begin product thumb nav -->
            <ul class="thumb-nav d-none" >
              <li><img src="http://via.placeholder.com/72x50"></li>
              <li><img src="http://via.placeholder.com/72x50"></li>
              <li><img src="http://via.placeholder.com/72x50"></li>
              <li><img src="http://via.placeholder.com/72x50"></li>
              <li><img src="http://via.placeholder.com/72x50"></li>
            </ul>
            <!-- End product thumb nav -->
          </div>
          <!-- End Product Images & Alternates -->
          
        </div>
      </div>
    </div>
</section>
<section class="description p-5">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-md-11">
                <div class="row">
                    <div class="col-12 text-center">
                        <p>A worshiper walked on fire in observance of the Theemithi Festival at a Hindu temple in Rangoon's Tamwe Township on Sunday. (Photo: Naing Lin Soe / The Irrawaddy)</p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 text-end border-right border-white">
                        <div class=" btn btn-white  btn-circle-social me-2">
                            <i class="fa-regular fa-eye"></i>
                        </div>
                        <span>94.4k</span>
                    </div>
                    <div class="col-6 text-start">
                        <a href="" class="btn btn-fb btn-circle me-2">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="" class="btn btn-tw btn-circle me-2">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="" class="btn btn-li btn-circle me-2">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="last-photos py-3">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-11">
                <h2 class="text-center">LATEST PHOTOS</h2>
            </div>
        </div>
    </div>
</section>
<section class="latest-photos py-3">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-11">
                <div class="row imglist">
                    <div class="col-lg-3 col-md-6 mb-2">
                        <a href="https://source.unsplash.com/juHayWuaaoQ/1500x1000" data-fancybox="images" data-caption="Backpackers following a dirt trail">
                            <img src="https://source.unsplash.com/juHayWuaaoQ/240x160" width="100%"  />
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="https://source.unsplash.com/eWFdaPRFjwE/1500x1000" data-fancybox="images" data-caption="Mallorca, Llubí, Spain">
                            <img src="https://source.unsplash.com/eWFdaPRFjwE/240x160" width="100%" />
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="https://source.unsplash.com/NhU0nUR7920/1500x1000" data-fancybox="images" data-caption="Sunset Picnic">
                            <img src="https://source.unsplash.com/NhU0nUR7920/240x160" width="100%" />
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="https://source.unsplash.com/eXHeq48Z-Q4/1500x1000" data-fancybox="images" data-caption="Sunrise above a sandy beach">
                            <img src="https://source.unsplash.com/eXHeq48Z-Q4/240x160" width="100%" />
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="https://source.unsplash.com/RFgO9B_OR4g/1500x1000" data-fancybox="images" data-caption="Woman on a slope by the shore">
                            <img src="https://source.unsplash.com/RFgO9B_OR4g/240x160" width="100%" />
                          </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="https://source.unsplash.com/NhU0nUR7920/1500x1000" data-fancybox="images" data-caption="Sunset Picnic">
                            <img src="https://source.unsplash.com/NhU0nUR7920/240x160" width="100%" />
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="https://source.unsplash.com/B2LYYV9-y0s/1500x1000" data-fancybox="images" data-caption="On them Indiana Nights">
                            <img src="https://source.unsplash.com/B2LYYV9-y0s/240x160" width="100%" />
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="https://source.unsplash.com/eWFdaPRFjwE/1500x1000" data-fancybox="images" data-caption="Mallorca, Llubí, Spain">
                            <img src="https://source.unsplash.com/eWFdaPRFjwE/240x160" width="100%" />
                        </a>
                    </div>
                </div>
                <div class="row py-5">
                    <div class="col-12 text-center">
                        <button class="btn btn-danger">View All Photos</button>
                    </div>
                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
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
@endsection