@extends('frontend.index')

@section('content')
<section id="detail" style="height: 100vh;">
    {{-- <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 mx-auto">
     <!-- Product Images & Alternates -->
            <div class="product-images demo-gallery">
              <!-- Begin Product Images Slider -->
              <div class="main-img-slider">
                 <a data-fancybox="gallery" href="http://via.placeholder.com/1920x1280"><img src="http://via.placeholder.com/840x480" class="img-fluid"></a>
                 <a data-fancybox="gallery" href="http://via.placeholder.com/1920x1280"><img src="http://via.placeholder.com/840x480" class="img-fluid"></a>
                 <a data-fancybox="gallery" href="http://via.placeholder.com/1920x1280"><img src="http://via.placeholder.com/840x480" class="img-fluid"></a>
                 <a data-fancybox="gallery" href="http://via.placeholder.com/1920x1280"><img src="http://via.placeholder.com/840x480" class="img-fluid"></a>
                 <a data-fancybox="gallery" href="http://via.placeholder.com/1920x1280"><img src="http://via.placeholder.com/840x480" class="img-fluid"></a>
                 <a data-fancybox="gallery" href="http://via.placeholder.com/1920x1280"><img src="http://via.placeholder.com/840x480" class="img-fluid"></a>
                </div>
            <!-- End Product Images Slider -->
          
            <!-- Begin product thumb nav -->
            <ul class="thumb-nav">
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
    </div> --}}
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
    <script>
        
    </script>
@endsection