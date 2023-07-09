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
                                <div class="col-1">
                                    
                                </div>
                                <div class="col-5">
                                    <span class="category">Myanmar’s Crisis & the World</span>
                                    <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                                </div>
                                <div class="col-6">
                                    <span>BY THE IRRAWADDY</span>
                                    <P>Regime aims to forge closer ties with Saudi Arabia, Kuwait and Qatar as it faces mounting calls for more sanctions.  </P>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <h2><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h2>
                            <div class="row">
                                <div class="col-1">
                                    
                                </div>
                                <div class="col-5">
                                    <span class="category">Myanmar’s Crisis & the World</span>
                                    <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                                </div>
                                <div class="col-6">
                                    <span>BY THE IRRAWADDY</span>
                                    <P>Regime aims to forge closer ties with Saudi Arabia, Kuwait and Qatar as it faces mounting calls for more sanctions.  </P>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <h2><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h2>
                            <div class="row">
                                <div class="col-1">
                                    
                                </div>
                                <div class="col-5">
                                    <span class="category">Myanmar’s Crisis & the World</span>
                                    <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                                </div>
                                <div class="col-6">
                                    <span>BY THE IRRAWADDY</span>
                                    <P>Regime aims to forge closer ties with Saudi Arabia, Kuwait and Qatar as it faces mounting calls for more sanctions.  </P>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <h2><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h2>
                            <div class="row">
                                <div class="col-1">
                                    
                                </div>
                                <div class="col-5">
                                    <span class="category">Myanmar’s Crisis & the World</span>
                                    <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                                </div>
                                <div class="col-6">
                                    <span>BY THE IRRAWADDY</span>
                                    <P>Regime aims to forge closer ties with Saudi Arabia, Kuwait and Qatar as it faces mounting calls for more sanctions.  </P>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <h2><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h2>
                            <div class="row">
                                <div class="col-1">
                                    
                                </div>
                                <div class="col-5">
                                    <span class="category">Myanmar’s Crisis & the World</span>
                                    <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                                </div>
                                <div class="col-6">
                                    <span>BY THE IRRAWADDY</span>
                                    <P>Regime aims to forge closer ties with Saudi Arabia, Kuwait and Qatar as it faces mounting calls for more sanctions.  </P>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <h2><a href="#">Myanmar Junta Aims to Boost Ties to the Mideast to Evade Isolation</a></h2>
                            <div class="row">
                                <div class="col-1">
                                    
                                </div>
                                <div class="col-5">
                                    <span class="category">Myanmar’s Crisis & the World</span>
                                    <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                                </div>
                                <div class="col-6">
                                    <span>BY THE IRRAWADDY</span>
                                    <P>Regime aims to forge closer ties with Saudi Arabia, Kuwait and Qatar as it faces mounting calls for more sanctions.  </P>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
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

@endsection