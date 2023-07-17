@extends('frontend.index')

@section('content')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">
<link rel="stylesheet" type="text/css" href="https://codepen.io/fancyapps/pen/Kxdwjj.css">
<style>
    .last-photos{
        background-color: ;
    }
</style>
@endsection
<section class="video-page py-5">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-md-11">
                <div class="row">
                <div class="col-md-6">
                    <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-2 col-md-3 col-2">
                            <div class="col-12">
                                <a href="" class="btn btn-fb btn-circle mb-2">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </div>
                            <div class="col-12">
                                <a href="" class="btn btn-tw btn-circle mb-2">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </div>
                            <div class="col-12">
                                <a href="" class="btn btn-li btn-circle mb-2">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-9 col-10">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="border-bottom border-white"><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h2>
                                </div>
                            </div>
                            <span class="d-block py-3">28 June 2023</span>
                            <p >Also this week, foreign minister Than Swe defended the regime’s human rights record even as it simultaneously bombed, shelled and burned civilian settlements.</p>
                            <button class="btn btn-danger">Read Now</button>
                        </div>
                    </div>
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
                <h2 class="text-center">LATEST VIEWING</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <a data-fancybox href="https://www.youtube.com/watch?v=dK7_bcpGNeE" >
                      <img class="card-img-top img-fluid" src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" />
                    </a>
                    <div class="card-body">
                      <p class="card-text">Direct link to YouTube</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <a data-fancybox href="https://www.youtube.com/watch?v=dK7_bcpGNeE" >
                      <img class="card-img-top img-fluid" src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" />
                    </a>
                    <div class="card-body">
                      <p class="card-text">Direct link to YouTube</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <a data-fancybox href="https://www.youtube.com/watch?v=dK7_bcpGNeE" >
                      <img class="card-img-top img-fluid" src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" />
                    </a>
                    <div class="card-body">
                      <p class="card-text">Direct link to YouTube</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="last-photos">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-11">
                <div class="row">
                    <div class="col-4">
                        <h2 class="text-center">Filter</h2>
                    </div>
                    <div class="col-4">
                        <h2 class="text-center">Filter</h2>
                    </div>
                    <div class="col-4">
                        <h2 class="text-center">Filter</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <a data-fancybox href="https://www.youtube.com/watch?v=dK7_bcpGNeE" >
                  <img class="card-img-top img-fluid" src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" />
                </a>
                <div class="card-body">
                  <p class="card-text">Direct link to YouTube</p>
                </div>
            </div>
        </div>
        <div class="row py-5">
            <div class="col-12 text-center">
                <button class="btn btn-danger">View All Videos</button>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>
<script>
  // Attach click event to single image
  document.getElementById("singleImage").addEventListener("click", function() {
    // Open the carousel modal
    $('#carouselModal').modal('show');
  });
  //  Set caption from card text
$('.card-deck a').fancybox({
caption : function( instance, item ) {
  return $(this).parent().find('.card-text').html();
}
});
</script>
@endsection
