@extends('frontend.index')

@section('content')
<section class="home">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-md-11 site-title">
                <h2>{{ env('SITE_TITLE') }}</h2>
            </div>
        </div>
        <div class="row align-items-center d-flex-center border-dark border-top border-bottom">
            <div class="col-9">
                <nav class="navbar navbar-expand-lg navbar-light">    
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                    </ul>    
                </nav>
            </div>
            <div class="col-2">
                <div class="d-flex  justify-content-between">
                    <div class="col "><i class="fa-brands fa-facebook-f circle"></i></div>
                    <div class="col"><i class="fa-brands fa-youtube circle"></i></div>
                    <div class="col"><i class="fa-brands fa-twitter circle"></i></div>
                    <div class="col"><i class="fa-solid fa-wifi circle"></i></div>
                </div>
            </div>
        </div>
        <div class="row d-flex-center feature">
            <div class="col-md-11">
                <div class="row">
                <div class="col-md-6">
                    <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <h2><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h2>
                            <p>Also this week, foreign minister Than Swe defended the regime’s human rights record even as it simultaneously bombed, shelled and burned civilian settlements.</p>
                            <button class="btn btn-danger   ">Read Now</button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="current">
    <div class="half"></div>
    <div class="container-fluid">
        <div class="row d-flex-center align-items-center">
            <div class="col-md-11">
               <div class="row text-white">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa-regular fa-calendar"></i>
                                <span class="month">09</span>
                            </div>
                            <div class="col-5">
                                <span>THE NEWS FOR</span>
                                <h4>8 July 2023</h4>
                            </div>
                            <div class="col-4">
                                <span>YANGON</span>
                                <h5>31 <sup>C</sup><i class="fa-solid fa-cloud-moon-rain fa-lg ms-1"></i></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 most">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa-solid fa-eye"></i>
                            </div>
                            <div class="col-5">
                                <span>THE NEWS FOR</span>
                                <h4>8 July 2023</h4>
                            </div>
                            <div class="col-2">
                                <i class="fa-regular fa-comment-dots"></i>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="row d-flex-center feature">
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-12 mb-3 py-5 border-bottom ">
                                <h2><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h2>
                                <div class="row">
                                    <div class="col-lg-1 col-md-2 col-2">
                                        <div class="row d-flex-center">
                                            <div class="col-12">
                                                <div class="btn btn-reaction mb-2">
                                                    <img src="{{ asset('/images/liked.svg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class=" btn btn-transparent  btn-circle-social ">
                                                    <i class="fa-regular fa-eye"></i>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <span class="text-center">100</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-10 col-10">
                                        <span class="category">Myanmar’s Crisis & the World</span>
                                        <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12  ">
                                        <span>BY THE IRRAWADDY</span>
                                        <P>Regime aims to forge closer ties with Saudi Arabia, Kuwait and Qatar as it faces mounting calls for more sanctions.  </P>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3 py-5 border-bottom ">
                                <h2><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h2>
                                <div class="row">
                                    <div class="col-lg-1 col-md-2 col-2">
                                        <div class="row d-flex-center">
                                            <div class="col-12">
                                                <div class="btn btn-reaction mb-2">
                                                    <img src="{{ asset('/images/liked.svg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class=" btn btn-transparent  btn-circle-social ">
                                                    <i class="fa-regular fa-eye"></i>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <span class="text-center">100</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-10 col-10">
                                        <span class="category">Myanmar’s Crisis & the World</span>
                                        <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12  ">
                                        <span>BY THE IRRAWADDY</span>
                                        <P>Regime aims to forge closer ties with Saudi Arabia, Kuwait and Qatar as it faces mounting calls for more sanctions.  </P>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3 py-5 border-bottom ">
                                <h2><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h2>
                                <div class="row">
                                    <div class="col-lg-1 col-md-2 col-2">
                                        <div class="row d-flex-center">
                                            <div class="col-12">
                                                <div class="btn btn-reaction mb-2">
                                                    <img src="{{ asset('/images/liked.svg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class=" btn btn-transparent  btn-circle-social ">
                                                    <i class="fa-regular fa-eye"></i>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <span class="text-center">100</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-10 col-10">
                                        <span class="category">Myanmar’s Crisis & the World</span>
                                        <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12  ">
                                        <span>BY THE IRRAWADDY</span>
                                        <P>Regime aims to forge closer ties with Saudi Arabia, Kuwait and Qatar as it faces mounting calls for more sanctions.  </P>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3 py-5 border-bottom ">
                                <h2><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h2>
                                <div class="row">
                                    <div class="col-lg-1 col-md-2 col-2">
                                        <div class="row d-flex-center">
                                            <div class="col-12">
                                                <div class="btn btn-reaction mb-2">
                                                    <img src="{{ asset('/images/liked.svg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class=" btn btn-transparent  btn-circle-sociale ">
                                                    <i class="fa-regular fa-eye"></i>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <span class="text-center">100</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-10 col-10">
                                        <span class="category">Myanmar’s Crisis & the World</span>
                                        <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12  ">
                                        <span>BY THE IRRAWADDY</span>
                                        <P>Regime aims to forge closer ties with Saudi Arabia, Kuwait and Qatar as it faces mounting calls for more sanctions.  </P>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3 py-5 border-bottom ">
                                <h2><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h2>
                                <div class="row">
                                    <div class="col-lg-1 col-md-2 col-2">
                                        <div class="row d-flex-center">
                                            <div class="col-12">
                                                <div class="btn btn-reaction mb-2">
                                                    <img src="{{ asset('/images/liked.svg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class=" btn btn-transparent  btn-circle-social ">
                                                    <i class="fa-regular fa-eye"></i>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <span class="text-center">100</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-10 col-10">
                                        <span class="category">Myanmar’s Crisis & the World</span>
                                        <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12  ">
                                        <span>BY THE IRRAWADDY</span>
                                        <P>Regime aims to forge closer ties with Saudi Arabia, Kuwait and Qatar as it faces mounting calls for more sanctions.  </P>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3 py-5 border-bottom ">
                                <h2><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h2>
                                <div class="row">
                                    <div class="col-lg-1 col-md-2 col-2">
                                        <div class="row d-flex-center">
                                            <div class="col-12">
                                                <div class="btn btn-reaction mb-2">
                                                    <img src="{{ asset('/images/liked.svg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class=" btn btn-transparent  btn-circle-social ">
                                                    <i class="fa-regular fa-eye"></i>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <span class="text-center">100</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-10 col-10">
                                        <span class="category">Myanmar’s Crisis & the World</span>
                                        <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12  ">
                                        <span>BY THE IRRAWADDY</span>
                                        <P>Regime aims to forge closer ties with Saudi Arabia, Kuwait and Qatar as it faces mounting calls for more sanctions.  </P>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3 py-5 border-bottom ">
                                <h2><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h2>
                                <div class="row">
                                    <div class="col-lg-1 col-md-2 col-2">
                                        <div class="row d-flex-center">
                                            <div class="col-12">
                                                <div class="btn btn-reaction mb-2">
                                                    <img src="{{ asset('/images/liked.svg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class=" btn btn-transparent  btn-circle-social ">
                                                    <i class="fa-regular fa-eye"></i>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-2">
                                                    <span class="text-center">100</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-10 col-10">
                                        <span class="category">Myanmar’s Crisis & the World</span>
                                        <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12  ">
                                        <span>BY THE IRRAWADDY</span>
                                        <P>Regime aims to forge closer ties with Saudi Arabia, Kuwait and Qatar as it faces mounting calls for more sanctions.  </P>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 top">
                        <div class="row">
                            <div class="col-12 p-0">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%" height="250px">
                                <span class="top-one d-block">1</span>
                            </div>
                            <div class="col-12" >
                                <div class="row bg-danger ps-2 pt-5" >
                                    <div class="col-md-2 col-2">
                                        <div class="col-12">
                                            <i class="fa-solid fa-eye"></i>
                                            <div class="mb-2 text-center">
                                                <span>100</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-10">
                                        <h2><a href="#" >Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h2>
                                    </div>
                                </div>
                                <div class="row py-3 top-ten d-flex align-items-center" >
                                    <div class="col-md-2 col-2">
                                        <div class="col-12">
                                            <span class="top-one">2</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-2 ml--47">
                                        <div class="col-12">
                                            <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%" >
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-10">
                                        <h6><a href="#" >Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h2>
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
<section class="current contact-email">
    <div class="container-fluid">
        <div class="row d-flex-center align-items-center">
            <div class="col-md-5">
               <div class="row d-flex align-items-center">
                    <div class="col-md-3">
                        <img src="{{ asset('/images/logo.png') }}" alt="" width="100%">
                    </div>
                    <div class="col-md-9">
                        <h3>Get the top stories delivered to you daily…</h3>
                    </div>
               </div>
               <div class="row d-flex align-items-center">
                <div class="col-md-3 text-center">
                    <span>EMAIL NEWSLETTER</span>
                </div>
                <div class="col-md-9">
                    <div class="input-group ">
                        <input type="text" class="form-control bg-transparent rounded" name="email" placeholder="Enter your email" aria-label="Enter your name" aria-describedby="button-addon2">
                        <button class="btn btn-danger" type="button" id="addon2">Sign Up</button>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="checkbox" id="" type="checkbox" value="checkedValue" aria-label="Text for screen reader" checked><span> Subscribe me to the daily newsletter.</span>
                    </div>
                </div>
           </div>
            </div>
        </div>
    </div>
</section>

<section class="opnion p-5">
    <div class="container-fluid">
        <div class="row d-flex-center align-items-center text-center">
            <div class="col-md-11">
                <h3>Editorial & Opinion</h3>
            </div>
        </div>
    </div>
</section>

<section class="opnion mb-4 p-5" style="background-image: url('{{ asset('/images/bg-image.jpg') }}');width: 100%;height: 500px;background-size: cover;background-repeat: no-repeat;background-position: 50% 50%;">
    <div class="container-fluid">
        <div class="row d-flex-center align-items-center text-center">
            <div class="col-md-11">
                
            </div>
        </div>
    </div>
</section>

<section class="mb-4 single-new">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <span >ANALYSIS</span>
                        <h2 class="mt-3"><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h2>
                        <p>Also this week, foreign minister Than Swe defended the regime’s human rights record even as it simultaneously bombed, shelled and burned civilian settlements.</p>
                        <button class="btn btn-danger">Read Now</button>    
                    </div>
                    <div class="col-md-6">
                        <div class="row d-flex align-items-center">
                            <div class="col-2 text-end">
                                <div class=" btn-circle mb-3 border border-danger">
                                    <i class="fa-solid fa-user text-danger"></i>
                                </div>
                            </div>
                            <div class="col-10">
                                <h6 class="mb-0"><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h6>
                                <p>In two years, the Karenni Nationalities Defense Force has expanded to 22 battalions with over 7,000 troops, right on the border of the regime’s Naypyitaw</p>
                            </div>
                        </div>
                        <div class="row d-flex align-items-center">
                            <div class="col-2 text-end">
                                <div class=" btn-circle mb-3 border border-danger">
                                    <i class="fa-solid fa-user text-danger"></i>
                                </div>
                            </div>
                            <div class="col-10">
                                <h6 class="mb-0"><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h6>
                                <p>In two years, the Karenni Nationalities Defense Force has expanded to 22 battalions with over 7,000 troops, right on the border of the regime’s Naypyitaw</p>
                            </div>
                        </div>
                        <div class="row d-flex align-items-center">
                            <div class="col-2 text-end">
                                <div class=" btn-circle mb-3 border border-danger">
                                    <i class="fa-solid fa-user text-danger"></i>
                                </div>
                            </div>
                            <div class="col-10">
                                <h6 class="mb-0"><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h6>
                                <p>In two years, the Karenni Nationalities Defense Force has expanded to 22 battalions with over 7,000 troops, right on the border of the regime’s Naypyitaw</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-dark p-3 video mb-4">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-12 mb-2 ">
                                <span>28 JUNE 2023</span>
                            </div>
                            <div class="col-12 d-flex">
                                <div class=" btn-circle mb-3 border border-white me-2">
                                    <i class="fa-brands fa-facebook-f text-white"></i>
                                </div>
                                <h3>Videos</h3>
                            </div>
                        </div>
                        <div class="row">
                            <iframe width="420" height="315" src="https://www.youtube.com/embed/tgbNymZ7vqY" allowfullscreen>
                            </iframe>
                        </div>
                        
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-12 mb-2 ">
                                <span>28 JUNE 2023</span>
                            </div>
                            <div class="col-12 d-flex">
                                <div class=" btn-circle mb-3 border border-white me-2">
                                    <i class="fa-solid fa-camera text-white"></i>
                                </div>
                                <h3>Photos</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div id="singleImageContainer">
                                <img id="singleImage" class="img-thumbnail" src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-12 mb-2 ">
                                <span>28 JUNE 2023</span>
                            </div>
                            <div class="col-12 d-flex">
                                <div class=" btn-circle mb-3 border border-white me-2">
                                    <i class="fa-brands fa-facebook-f text-white"></i>
                                </div>
                                <h3>Cartoon</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div id="singleImageContainer">
                                <img id="singleImage" class="img-thumbnail" src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class=" mb-4">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-md-11">
                <div class="row gx-5">
                    <div class="col-md-4 mb-5">
                        <div class="row d-flex justify-content-between align-items-center border-bottom border-danger border-3 ">
                            <div class="col p-0">
                                <h3>Burma</h3>
                            </div>
                            <div class="col text-end p-0">
                                <a href=""><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row d-flex justify-content-between align-items-center border-bottom border-primary border-3 ">
                            <div class="col p-0">
                                <h3>Business</h3>
                            </div>
                            <div class="col text-end p-0">
                                <a href=""><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="row d-flex justify-content-between align-items-center border-bottom border-danger border-3 ">
                            <div class="col p-0">
                                <h3>In Person</h3>
                            </div>
                            <div class="col text-end p-0">
                                <a href=""><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="row d-flex justify-content-between align-items-center border-bottom border-danger border-3 ">
                            <div class="col p-0">
                                <h3>Opnion</h3>
                            </div>
                            <div class="col text-end p-0">
                                <a href=""><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row d-flex justify-content-between align-items-center border-bottom border-success border-3 ">
                            <div class="col p-0">
                                <h3>Lifestyle</h3>
                            </div>
                            <div class="col text-end p-0">
                                <a href=""><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row d-flex justify-content-between align-items-center border-bottom border-success border-3 ">
                            <div class="col p-0">
                                <h3>Food</h3>
                            </div>
                            <div class="col text-end p-0">
                                <a href=""><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row d-flex justify-content-between align-items-center border-bottom border-success border-3 ">
                            <div class="col p-0">
                                <h3>Culture</h3>
                            </div>
                            <div class="col text-end p-0">
                                <a href=""><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row d-flex justify-content-between align-items-center border-bottom border-warning border-3 ">
                            <div class="col p-0">
                                <h3>Photo Essay</h3>
                            </div>
                            <div class="col text-end p-0">
                                <a href=""><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row d-flex justify-content-between align-items-center border-bottom border-danger border-3 ">
                            <div class="col p-0">
                                <h3>Asia</h3>
                            </div>
                            <div class="col text-end p-0">
                                <a href=""><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3 col-6">
                                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                            </div>
                            <div class="col-md-9 col-6">
                                <p class=""><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 <!-- Bootstrap Carousel Modal -->
<div id="carouselModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="carouselModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-body">
            <div id="carouselExample" class="carousel slide" data-ride="carousel">
            <!-- Carousel Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExample" data-slide-to="1"></li>
                <li data-target="#carouselExample" data-slide-to="2"></li>
            </ol>
            <!-- Carousel Slides -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" class="d-block w-100">
                </div>
            </div>
            <!-- Carousel Controls -->
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
        </div>
    </div>
</div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    // Attach click event to single image
    document.getElementById("singleImage").addEventListener("click", function() {
      // Open the carousel modal
      $('#carouselModal').modal('show');
    });
  </script>

@endsection