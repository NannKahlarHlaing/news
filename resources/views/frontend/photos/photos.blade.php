
@extends('frontend.index')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://www.insightindia.com/mcss/icon-font.css">
    <style>
    /* #detail{
        background-color: var(--color-gray);
    } */
    .slick-slider .slick-prev, .slick-slider .slick-next {
        z-index: 100;
        font-size: 2.5em;
        height: 40px;
        width: 40px;
        margin-top: -20px;
        color: #B7B7B7;
        position: absolute;
        top: 40%;
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

</style>
@endsection

@section('content')
<section id="detail">
    <div class="container-fluid">
      <div class="row d-flex-center">
        <div class="col-12">
        <!-- Product Images & Alternates -->
            <div class="product-images demo-gallery">
              <!-- Begin Product Images Slider -->
                <div class="main-img-slider">
                @foreach ($posts as $item)
                    @if($item->lang == app()->getLocale())
                        <div class="">
                            <a data-fancybox="gallery" href="{{ asset('storage/images/original/') . '/' . $item->url }}">
                                <img src="{{ asset('storage/images/original/') . '/' . $item->url }}"style="height:60vh;width: 100%;object-fit: cover;">
                                <div class="row description d-flex-center mt-5 py-3">
                                    <div class="col-lg-10 text-center">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-6">
                                                {!! $item->desc !!}
                                            </div>
                                            <div class="col-3 d-flex align-items-center"> <!-- Add a new column for the eye icon -->
                                                <i class="fa-regular fa-eye me-3"></i>
                                                <span class="id d-none">{{ $item->id }}</span>
                                                <span class="views d-inline">{{ $item->views }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            {{-- <a data-fancybox="gallery" href="http://via.placeholder.com/1920x1280"><img src="http://via.placeholder.com/840x480" class="img-fluid"></a> --}}
                        </div>
                    @endif
                @endforeach
                </div>
            <!-- End Product Images Slider -->

            <!-- Begin product thumb nav -->
            <ul class="thumb-nav d-none" >
                @foreach ($posts as $item)
                    @if($item->lang == app()->getLocale())
                        <li><img src="{{ asset('/storage/images/original') . '/' . $item->url }}"></li>
                    @endif
                @endforeach
            </ul>
            <!-- End product thumb nav -->
          </div>
        <!-- End Product Images & Alternates -->
        </div>

      </div>
    </div>
</section>
<section class="last-photos py-3">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-12">
                <h2 class="text-center mt-3">LATEST PHOTOS</h2>
            </div>
        </div>
    </div>
</section>
<section class="latest-photos py-3">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-12">
                <div class="row imglist">
                    @foreach ($posts as $item)
                        @if($item->lang == app()->getLocale())
                            <div class="col-lg-3 col-md-6 mb-2">
                                <a href="{{ asset('/storage/images/thumbnail') . '/' . $item->url }}" data-fancybox="images" data-caption="Backpackers following a dirt trail">
                                    <img src="{{ asset('/storage/images/thumbnail') . '/' . $item->url }}" width="100%"  />
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="row py-5">
                    <div class="col-12 text-center">
                        {{ $posts->appends(Request::all())->links() }}
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
        $(document).ready(function(){
            $('.views').each(function() {
                var value = $(this).html();
                var id = $(this).prev('.id').text();
                var element = $(this);
                $.ajax({
                    url: '{{ route('photo_views_count') }}',
                    method: 'GET',
                    data: {value: value, id: id},
                    success: function(response){
                        element.html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log('error: ' + error);
                    }
                });
            });
        });
    </script>
@endsection
