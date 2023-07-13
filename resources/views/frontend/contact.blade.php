@extends('frontend.index')

@section('content')
    <section class="contact-title">
        <div class="container-fluid">
            <div class="row d-flex-center">
                <div class="col-11">
                    <div class="row">
                        <div class="col-12">
                            <h2>Contact</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 contact">
        <div class="container-fluid">
            <div class="row d-flex-center">
                <div class="col-11">
                    <div class="row">
                        <div class="col-lg-6">
                            
                            <form class="form bg-transparent" method="POST" action="{{ url('/contact') }}">
                                @csrf
                                <div class="mb-3">
                                    <input type="email" class="form-control bg-trasparent" placeholder="Name *" >
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Email *" >
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Phone" >
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Organisation" >
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="Information" selected>Information</option>
                                        <option value="Editors">Editors</option>
                                        <option value="Advertising">Advertising</option>
                                        <option value="Donation">Donation</option>
                                        <option value="Webmaster">Webmaster</option>
                                      </select>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="mb-3 text-end">
                                    <button type="submit" class="btn btn-danger">Send</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-1 col-md-0"></div>
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row d-flex align-items-center mb-3">
                                        <div class="col-lg-2 col-md-1 col-2">
                                            <div class=" btn-fb btn-circle">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-11 col-10">
                                            <span class="social-title">Facebook</span>
                                        <a href="" class="d-block">https://www.facebook.com/</a>
                                        <a href="" class="d-block">https://www.facebook.com/dsfthy</a>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center mb-3">
                                        <div class="col-lg-2 col-md-1 col-2">
                                            <div class=" btn-fb btn-circle">
                                                <i class="fa-brands fa-twitter"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-11 col-10">
                                            <span class="social-title">Twitter</span>
                                        <a href="" class="d-block">@IrrawaddyNews</a>
                                        
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center mb-3">
                                        <div class="col-lg-2 col-md-1 col-2">
                                            <div class=" btn-fb btn-circle">
                                                <i class="fa-brands fa-youtube"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-11 col-10 mb-3">
                                            <span class="social-title">Youtube</span>
                                        <a href="" class="d-block">https://youtube.com/user/irrawaddynews</a>
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center mb-3">
                                        <div class="col-lg-2 col-md-1 col-2">
                                            <div class=" btn-fb btn-circle">
                                                <i class="fa-solid fa-camera"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-11 col-10">
                                            <span class="social-title">Instagram</span>
                                        <a href="" class="d-block">@IrrawaddyNews</a>
                                        </div>
                                    </div>
                                    <div class="row d-flex mb-3">
                                        <div class="col-lg-2 col-md-2 col-2 text-center">
                                            <div class="btn btn-transparent btn-circle-fe">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-10">
                                            <address>Building 170/175, Room 806 and 312
                                                MGW Tower
                                                Boaungkyaw Street Middle Block
                                                Yangon
                                                Myanmar</address>
                                        </div>
                                    </div>
                                    <div class="row d-flex mb-3">
                                        <div class="col-lg-2 col-md-2 col-2 text-center">
                                            <div class="btn btn-transparent btn-circle-fe">
                                                <i class="fa-solid fa-phone"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-10">
                                            <address>+95-1-334344</address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection