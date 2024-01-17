
@extends('frontend.index')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css">
<link rel="stylesheet" href="https://www.insightindia.com/mcss/icon-font.css">
<style>
    #detail{
        background-color: #242423;
    }
    #detail img{
        transform: none;
    }
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
    .last-photos .fa-user-large{
        color: #ECE7DD;
        font-size: 43px;
    }
    .last-photos{
        background-color: var(--sectheme-color) !important;
    }

    .last-photos h2, .last-photos span{
        color: #ECE7DD !important;
        margin-bottom: 0;
    }
    .card{
        background-color: rgba(255,255,255,0.5) !important;
    }
    .card .fa-user-large{
        color: #222;
        font-size: 35px;
    }

</style>
@endsection

@section('content')
<section id="detail">
    {{-- <div class="container-fluid"> --}}
      <div class="row d-flex-center">
        <div class="col-12 p-0">
        <!-- Product Images & Alternates -->
            <div class="product-images demo-gallery">
              <!-- Begin Product Images Slider -->
              <div class="main-img-slider">

                <div class="">
                    <a data-fancybox="gallery" href="/storage/images/original/{{ $post->img_link }}">
                        <img src="/storage/images/original/{{ $post->img_link }}" class="ph-img" style="">
                    </a>
                </div>

                </div>
            <!-- End Product Images Slider -->

            <!-- Begin product thumb nav -->
            {{-- <ul class="thumb-nav d-none" >
                @foreach ($posts as $item)
                    <li><img src="{{ $item->url }}"></li>
                @endforeach
            </ul> --}}
            <!-- End product thumb nav -->
          </div>
        <!-- End Product Images & Alternates -->
        </div>
      </div>
    {{-- </div> --}}
</section>
<section class="last-photos py-3">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-8">
                <span class="d-none" id="id">{{ $post->id }}</span>
                <h2 class="text-center">
                    {{ $post->title }}
                </h2>
            </div>
        </div>
        {{-- <div class="row d-flex-center">
            <div class="col-8 text-center">
                <i class="fa-solid fa-user-large"></i><br>
                <span>{{ $post->author }}</span><br>
            </div>
        </div> --}}
    </div>
</section>
<section class="py-4">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-lg-8">
                <div class="row mb-3    ">
                    <div class="col-6">
                        {{ date('d M Y', strtotime($post->created_at)) }}
                    </div>
                    <div class="col-6 text-end">
                        {{ env('APP_NAME') }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        {!! $post->desc !!}
                    </div>
                    <div class="col-12 my-4 fw-bold fs-15"><strong>Topics:</strong>
                        {{ $post->topic }}
                    </div>
                    <div class="col-12 mb-3">
                        <div class="card py-3">
                            <div class="col-12">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-1 col-md-2 col-3">
                                        <i class="fa-solid fa-user-large"></i>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-9">
                                        <span class="fw-bold">{{ $post->author }}</span><br>
                                        <span>{{ env('APP_NAME') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="col-12">
                            <div class="row my-3  d-flex align-items-center">
                                <div class="col d-none d-md-block d-lg-block"></div>
                                <span class="text-center text-md-end text-lg-end col-12 col-md-5 col-lg-4">YOUR THOUGHTS …</span>
                                <div class="col-12 col-md-5 col-lg-4 text-center text-md-start text-lg-start">
                                    <button class="btn btn-reaction mb-2" id="btn-like">
                                        <img src="{{ asset('/images/liked.svg') }}" alt="">
                                    </button>
                                    <button class="btn btn-reaction mb-2" id="btn-love">
                                        <img src="{{ asset('/images/loved.svg') }}" alt="">
                                    </button>
                                    <button class="btn btn-reaction mb-2" id="btn-wow">
                                        <img src="{{ asset('/images/wow.svg') }}" alt="">
                                    </button>
                                    <button class="btn btn-reaction mb-2" id="btn-sad">
                                        <img src="{{ asset('/images/sad.svg') }}" alt="">
                                    </button>
                                </div>
                                
                                
                            </div>
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
        $(document).ready(function(){
            var id = $('#id').html();
            var likedKey = `photo_essay_liked_${id}`;
            if (localStorage.getItem(likedKey)) {
                $('#btn-love').prop('disabled', true);
                $('#btn-wow').prop('disabled', true);
                $('#btn-sad').prop('disabled', true);
            }

            var lovedKey = `photo_essay_loved_${id}`;
            if (localStorage.getItem(lovedKey)) {
                $('#btn-like').prop('disabled', true);
                $('#btn-wow').prop('disabled', true);
                $('#btn-sad').prop('disabled', true);
            }
            var wowKey = `photo_essay_wow_${id}`;
            if (localStorage.getItem(wowKey)) {
                $('#btn-like').prop('disabled', true);
                $('#btn-love').prop('disabled', true);
                $('#btn-sad').prop('disabled', true);
            }
            var sadKey = `photo_essay_sad_${id}`;
            if (localStorage.getItem(sadKey)) {
                $('#btn-like').prop('disabled', true);
                $('#btn-love').prop('disabled', true);
                $('#btn-wow').prop('disabled', true);
            }

            $('#btn-like').click(function(){
                var likedKey =  `photo_essay_liked_${id}`;
                if (!localStorage.getItem(likedKey)) {
                    $.ajax({
                        url: `/photo_essays/like/${id}`,
                        method: 'GET',
                        success: function(response) {
                            console.log(response);
                            document.cookie = `${likedKey}=true`;
                            localStorage.setItem(likedKey, 'true');

                            $('#btn-love').prop('disabled', true);
                            $('#btn-wow').prop('disabled', true);
                            $('#btn-sad').prop('disabled', true);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error liking post:', error);
                        }
                    });
                }

            });
            $('#btn-love').click(function(){
                var lovedKey =  `photo_essay_loved_${id}`;
                if (!localStorage.getItem(lovedKey)) {
                    $.ajax({
                        url: `/photo_essays/love/${id}`,
                        method: 'GET',
                        success: function(response) {
                            console.log(response);
                            document.cookie = `${lovedKey}=true`;
                            localStorage.setItem(lovedKey, 'true');

                            $('#btn-like').prop('disabled', true);
                            $('#btn-wow').prop('disabled', true);
                            $('#btn-sad').prop('disabled', true);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error liking post:', error);
                        }
                    });
                }

            });

            $('#btn-wow').click(function(){
                var wowKey =  `photo_essay_wow_${id}`;
                if (!localStorage.getItem(wowKey)) {
                    $.ajax({
                        url: `/photo_essays/wow/${id}`,
                        method: 'GET',
                        success: function(response) {
                            console.log(response);
                            document.cookie = `${wowKey}=true`;
                            localStorage.setItem(wowKey, 'true');

                            $('#btn-like').prop('disabled', true);
                            $('#btn-love').prop('disabled', true);
                            $('#btn-sad').prop('disabled', true);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error liking post:', error);
                        }
                    });
                }

            });

            $('#btn-sad').click(function(){
                var sadKey =  `photo_essay_sad_${id}`;
                if (!localStorage.getItem(sadKey)) {
                    $.ajax({
                        url: `/photo_essays/sad/${id}`,
                        method: 'GET',
                        success: function(response) {
                            console.log(response);
                            document.cookie = `${sadKey}=true`;
                            localStorage.setItem(sadKey, 'true');

                            $('#btn-like').prop('disabled', true);
                            $('#btn-love').prop('disabled', true);
                            $('#btn-wow').prop('disabled', true);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error liking post:', error);
                        }
                    });
                }

            });
        })
    </script>
@endsection
