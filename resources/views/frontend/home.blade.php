@extends('frontend.index')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">
<link rel="stylesheet" type="text/css" href="https://codepen.io/fancyapps/pen/Kxdwjj.css">
@endsection
@section('content')
<section class="home">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-md-12 site-title">
                <h2>The VWXYZ Online</h2>
            </div>
        </div>
        {{-- <div class="row align-items-center d-flex-center border-dark border-top border-bottom">
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
                <div class="d-flex  justify-content-between align-items-center">
                    <div class="col "><i class="fa-brands fa-facebook-f circle"></i></div>
                    <div class="col"><i class="fa-brands fa-youtube circle"></i></div>
                    <div class="col"><i class="fa-brands fa-twitter circle"></i></div>
                    <div class="col"><i class="fa-solid fa-wifi circle"></i></div>

                </div>
            </div>
        </div> --}}
        <div class="row d-flex-center feature">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <img src=" {{ asset('storage/images/original') . '/' . $latest->img_link }}" alt="image" width="100%">
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <h2><a href="{{ url('/category') . '/' . $latest->category->name_en . '/' . $latest->id }}">
                                    @if (app()->getLocale() == 'mm')
                                        {{ $latest->title_mm }}
                                    @elseif(app()->getLocale() == 'ch')
                                        {{ $latest->title_ch }}
                                    @else
                                        {{ $latest->title_en }}
                                    @endif
                                </a></h2>
                                <p>
                                    @if (app()->getLocale() == 'mm')
                                        {!! str_replace("\n", '', $latest->short_desc_mm) !!}
                                    @elseif(app()->getLocale() == 'ch')
                                        {!! str_replace("\n", '', $latest->short_desc_ch) !!}
                                    @else
                                        {!! str_replace("\n", '', $latest->short_desc_en) !!}
                                    @endif
                                </p>
                                <a href="{{ url('/category') . '/' . $latest->category->name_en . '/' . $latest->id }}" class="btn btn-danger">Read Now</a>
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
            <div class="col-md-12">
               <div class="row text-white">
                    <div class="col-6">
                        <div class="row d-flex align-items-center">
                            <div class="col-6">
                                <span>THE NEWS FOR</span>
                                <h4>{{ \Carbon\Carbon::now()->format('d F Y') }}</h4>
                            </div>
                            <div class="col-md-5 col-6 text-end">
                                <span>YANGON</span>
                                <h5>{{ $temperature }} <sup>C</sup><i class="fa-solid fa-cloud-moon-rain fa-lg ms-1"></i></h5>
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
                                <h4>{{ \Carbon\Carbon::now()->format('d F Y') }}</h4>
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
        <div class="row feature">
            <div class="col-md-12">
                <div class="row ">
                    <div class="col-md-7">
                        <div class="row">
                            @foreach ($latestTen as $ten)
                                <div class="col-6 mb-3 py-3 border-bottom">
                                    <h6>
                                        <a href="{{ url('/category') . '/' . $ten->category->name_en . '/' . $ten->id }}">
                                            @if (app()->getLocale() == 'mm')
                                               {{ $ten->id }} {{ $ten->title_mm }}
                                            @elseif(app()->getLocale() == 'ch')
                                                {{ $ten->id }}   {{ $ten->title_ch }}
                                            @else
                                                {{ $ten->id }}  {{ $ten->title_en }}
                                            @endif
                                        </a>
                                    </h6>
                                    <div class="row d-flex justify-content-end">
                                        <div class="col-lg-2 col-md-2 col-2">
                                            <div class="row d-flex-center">
                                                <div class="col-12">
                                                    <div class="btn btn-reaction mb-2">
                                                        <img src="{{ asset('/images/liked.svg') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <i class="fa-regular fa-eye"></i>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <div class="mb-2">
                                                        <span>{{ $ten->views }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-10 mb-2">
                                            <span class="category">
                                                @if (app()->getLocale() == 'mm')
                                                    {{ $ten->category->name_mm }}
                                                @elseif(app()->getLocale() == 'ch')
                                                    {{ $ten->category->name_ch }}
                                                @else
                                                    {{ $ten->category->name_en }}
                                                @endif

                                            </span>
                                            <img src="https://www.xinhuanet.com/english/asiapacific/2020-10/29/139476798_16039816214291n.jpg" alt="image" width="100%">
                                        </div>
                                        <div class="col-10">
                                            <p>
                                                @if (app()->getLocale() == 'mm')
                                                    {!! $ten->short_desc_mm !!}
                                                @elseif(app()->getLocale() == 'ch')
                                                    {!! $ten->short_desc_ch !!}
                                                @else
                                                    {!! $ten->short_desc_en !!}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-5 top">
                        <div class="row">
                            <div class="col-12 p-0">
                                <img src=" {{ asset('/storage/images/thumbnail/') . '/' . $most_view->img_link }}" alt="image" width="100%" height="250px">
                                <span class="top-one d-block">1</span>
                            </div>
                            <div class="col-12" >
                                <div class="row bg-danger ps-2 pt-5" >
                                    <div class="col-md-2 col-2">
                                        <div class="col-12 text-center">
                                            <i class="fa-solid fa-eye"></i>
                                            <div class="mb-2">
                                                <span>{{ $most_view->views }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-10">
                                        <h2><a href="{{ url('/category') . '/' . $most_view->category->name_en . '/' . $most_view->id }}" >
                                            @if (app()->getLocale() == 'mm')
                                                {{ $most_view->title_mm }}
                                            @elseif(app()->getLocale() == 'ch')
                                                {{ $most_view->title_ch }}
                                            @else
                                                {{ $most_view->title_en }}
                                            @endif
                                            </a></h2>
                                    </div>
                                </div>
                                @foreach ($mostViews as $key => $itemFive)
                                    <div class="row py-3 top-ten d-flex align-items-center" >
                                        <div class="col-md-2 col-3">
                                            <div class="col-12">
                                                <span class="top-one">{{ $key + 2 }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-9">
                                            <h6>
                                                <a href="{{ url('/category') . '/' . $itemFive->category->name_en . '/' . $itemFive->id }}" >
                                                    @if (app()->getLocale() == 'mm')
                                                        {{ $itemFive->title_mm }}
                                                    @elseif(app()->getLocale() == 'ch')
                                                        {{ $itemFive->title_ch }}
                                                    @else
                                                        {{ $itemFive->title_en }}
                                                    @endif
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="opnion contact-email">
    <div class="container-fluid">
        <div class="row d-flex-center align-items-center">
            <div class="col-md-7">
               <div class="row d-flex align-items-center">
                    <div class="col-md-3">
                        <img src="" alt="logo" width="100%">
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
                        <button class="btn btn-dark" type="button" id="addon2">Sign Up</button>
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
<section>
    <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between align-items-center border-bottom border-danger border-3 ">
                                <div class="col p-0">
                                    <h3>Burma</h3>
                                </div>
                                <div class="col text-end p-0">
                                    <a href="{{ url('/News') . '/' . $catBurma }}"><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                                </div>
                            </div>
                            @foreach ($burmas as $burma)
                                <div class="row mt-3">
                                    <div class="col-md-4 col-6">
                                        <img src=" {{ asset('/storage/images/thumbnail/') . '/' . $burma->img_link }}" alt="image" width="100%">
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <p><a href="{{ url('/category') . '/' . $burma->category->name_en . '/' . $burma->id }}">
                                            @if (app()->getLocale() == 'mm')
                                                {{ $burma->title_mm }}
                                            @elseif(app()->getLocale() == 'ch')
                                                {{ $burma->title_ch }}
                                            @else
                                                {{ $burma->title_en }}
                                            @endif
                                        </a></p>
                                        <span class="small me-3"><i class="fa-solid fa-clock me-1"></i>{{ \Carbon\Carbon::parse($burma->created_at)->format('d F Y') }}</span><span class="small"><i class="fa-solid fa-eye me-4"></i>{{ $burma->views }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between align-items-center border-bottom border-primary border-3 ">
                                <div class="col p-0">
                                    <h3>Business</h3>
                                </div>
                                <div class="col text-end p-0">
                                    <a href=""><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                                </div>
                            </div>
                            @foreach ($businesses as $business)
                                <div class="row mt-3">
                                    <div class="col-md-4 col-6">
                                        <img src=" {{ asset('storage/images/thumbnail' . '/' . $business->img_link) }}" alt="image" width="100%">
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <p class=""><a href="{{ url('/category') . '/' . $business->category->name_en . '/' . $business->id }}">
                                            @if (app()->getLocale() == 'mm')
                                                {{ $business->title_mm }}
                                            @elseif(app()->getLocale() == 'ch')
                                                {{ $business->title_ch }}
                                            @else
                                                {{ $business->title_en }}
                                            @endif
                                        </a></p>
                                        <span class="small me-3"><i class="fa-solid fa-clock me-1"></i>{{ \Carbon\Carbon::parse($business->created_at)->format('d F Y') }}</span><span class="small"><i class="fa-solid fa-eye me-4"></i>{{ $business->views }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between align-items-center border-bottom border-danger border-3 ">
                                <div class="col p-0">
                                    <h3>In Person</h3>
                                </div>
                                <div class="col text-end p-0">
                                    <a href=""><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                                </div>
                            </div>
                            @foreach ($persons as $person)
                                <div class="row mt-3">
                                    <div class="col-md-4 col-6">
                                        <img src=" {{ asset('storage/images/thumbnail') . '/' . $person->img_link }}" alt="image" width="100%">
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <p class=""><a href="{{ url('/category') . '/' . $person->category->name_en . '/' . $person->id }}">
                                            @if (app()->getLocale() == 'mm')
                                                {{ $person->title_mm }}
                                            @elseif(app()->getLocale() == 'ch')
                                                {{ $person->title_ch }}
                                            @else
                                                {{ $person->title_en }}
                                            @endif
                                        </a></p>
                                        <span class="small me-3"><i class="fa-solid fa-clock me-1"></i>{{ \Carbon\Carbon::parse($person->created_at)->format('d F Y') }}</span><span class="small"><i class="fa-solid fa-eye me-4"></i>{{ $person->views }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between align-items-center border-bottom border-danger border-3 ">
                                <div class="col p-0">
                                    <h3>Opnion</h3>
                                </div>
                                <div class="col text-end p-0">
                                    <a href=""><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                                </div>
                            </div>
                            @foreach ($opinions as $opinion)
                                <div class="row mt-3">
                                    <div class="col-md-4 col-6">
                                        <img src="{{ asset('storage/images/thumbnail') . '/' . $opinion->img_link }}" alt="image" width="100%">
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <p class=""><a href="{{ url('/category') . '/' . $opinion->category->name_en . '/' . $opinion->id }}">
                                            @if (app()->getLocale() == 'mm')
                                                {{ $opinion->title_mm }}
                                            @elseif(app()->getLocale() == 'ch')
                                                {{ $opinion->title_ch }}
                                            @else
                                                {{ $opinion->title_en }}
                                            @endif
                                        </a></p>
                                        <span class="small me-3"><i class="fa-solid fa-clock me-1"></i>{{ \Carbon\Carbon::parse($opinion->created_at)->format('d F Y') }}</span><span class="small"><i class="fa-solid fa-eye me-4"></i>{{ $opinion->views }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between align-items-center border-bottom border-success border-3 ">
                                <div class="col p-0">
                                    <h3>Lifestyle</h3>
                                </div>
                                <div class="col text-end p-0">
                                    <a href=""><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                                </div>
                            </div>
                            @foreach ($lifeStyles as $lifestyle)
                                <div class="row mt-3">
                                    <div class="col-md-4 col-6">
                                        <img src="{{ asset('storage/images/thumbnail') . '/' . $lifestyle->img_link }}" alt="image" width="100%">
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <p class=""><a href="{{ url('/category') . '/' . $lifestyle->category->name_en . '/' . $lifestyle->id }}">
                                            @if (app()->getLocale() == 'mm')
                                                {{ $lifestyle->title_mm }}
                                            @elseif(app()->getLocale() == 'ch')
                                                {{ $lifestyle->title_ch }}
                                            @else
                                                {{ $lifestyle->title_en }}
                                            @endif
                                        </a></p>
                                        <span class="small me-3"><i class="fa-solid fa-clock me-1"></i>{{ \Carbon\Carbon::parse($lifestyle->created_at)->format('d F Y') }}</span><span class="small"><i class="fa-solid fa-eye me-4"></i>{{ $lifestyle->views }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between align-items-center border-bottom border-success border-3 ">
                                <div class="col p-0">
                                    <h3>Special</h3>
                                </div>
                                <div class="col text-end p-0">
                                    <a href=""><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                                </div>
                            </div>
                            @foreach ($specials as $special)
                                <div class="row mt-3">
                                    <div class="col-md-4 col-6">
                                        <img src="{{ asset('storage/images/thumbnail') . '/' . $special->img_link }}" alt="image" width="100%">
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <p class=""><a href="{{ url('/category') . '/' . $special->category->name_en . '/' . $special->id }}">
                                            @if (app()->getLocale() == 'mm')
                                                {{ $special->title_mm }}
                                            @elseif(app()->getLocale() == 'ch')
                                                {{ $special->title_ch }}
                                            @else
                                                {{ $special->title_en }}
                                            @endif
                                        </a></p>
                                        <span class="small me-3"><i class="fa-solid fa-clock me-1"></i>{{ \Carbon\Carbon::parse($special->created_at)->format('d F Y') }}</span><span class="small"><i class="fa-solid fa-eye me-4"></i>{{ $special->views }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between align-items-center border-bottom border-danger border-3 ">
                                <div class="col p-0">
                                    <h3>In Person</h3>
                                </div>
                                <div class="col text-end p-0">
                                    <a href=""><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                                </div>
                            </div>
                            @foreach ($persons as $person)
                                <div class="row mt-3">
                                    <div class="col-md-4 col-6">
                                        <img src=" {{ asset('storage/images/thumbnail') . '/' . $person->img_link }}" alt="image" width="100%">
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <p class=""><a href="{{ url('/category') . '/' . $person->category->name_en . '/' . $person->id }}">
                                            @if (app()->getLocale() == 'mm')
                                                {{ $person->title_mm }}
                                            @elseif(app()->getLocale() == 'ch')
                                                {{ $person->title_ch }}
                                            @else
                                                {{ $person->title_en }}
                                            @endif
                                        </a></p>
                                        <span class="small me-3"><i class="fa-solid fa-clock me-1"></i>{{ \Carbon\Carbon::parse($person->created_at)->format('d F Y') }}</span><span class="small"><i class="fa-solid fa-eye me-4"></i>{{ $person->views }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between align-items-center border-bottom border-danger border-3 ">
                                <div class="col p-0">
                                    <h3>Opnion</h3>
                                </div>
                                <div class="col text-end p-0">
                                    <a href=""><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                                </div>
                            </div>
                            @foreach ($opinions as $opinion)
                                <div class="row mt-3">
                                    <div class="col-md-4 col-6">
                                        <img src="{{ asset('storage/images/thumbnail') . '/' . $opinion->img_link }}" alt="image" width="100%">
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <p class=""><a href="{{ url('/category') . '/' . $opinion->category->name_en . '/' . $opinion->id }}">
                                            @if (app()->getLocale() == 'mm')
                                                {{ $opinion->title_mm }}
                                            @elseif(app()->getLocale() == 'ch')
                                                {{ $opinion->title_ch }}
                                            @else
                                                {{ $opinion->title_en }}
                                            @endif
                                        </a></p>
                                        <span class="small me-3"><i class="fa-solid fa-clock me-1"></i>{{ \Carbon\Carbon::parse($opinion->created_at)->format('d F Y') }}</span><span class="small"><i class="fa-solid fa-eye me-4"></i>{{ $opinion->views }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

{{-- <section class="mb-4 single-new">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-md-12">
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
</section> --}}

<section class="bg-dark p-3 video">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-6 d-flex">
                                <h3>Videos</h3>
                            </div>
                            <div class="col-6 text-end">
                                <span>{{ \Carbon\Carbon::parse($latest_video->created_at)->format('d F Y') }}</span>
                            </div>
                        </div>
                        <div class="row vd-home card-deck">
                            <div class="card">
                                <a data-fancybox href="{{ $latest_video->video_url }}" >
                                  <img class="card-img-top img-fluid" src="{{ asset('storage/images/thumbnail/') . '/' . $latest_video->img_url }}" />
                                </a>
                                <div class="card-body">
                                  <p class="card-text">
                                        @if (app()->getLocale() == 'mm')
                                            {{ $latest_video->id }} {{ $latest_video->title_mm }}
                                        @elseif(app()->getLocale() == 'ch')
                                            {{ $latest_video->id }}   {{ $latest_video->title_ch }}
                                        @else
                                            {{ $latest_video->id }}  {{ $latest_video->title_en }}
                                        @endif
                                        {{ $latest_video->img_url }}
                                  </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- <div class="col-md-3">
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

                                <p class="imglist" style="max-width: 1000px;">
                                    <a href="https://source.unsplash.com/juHayWuaaoQ/1500x1000" data-fancybox="images" data-caption="Backpackers following a dirt trail">
                                      <img src="https://source.unsplash.com/juHayWuaaoQ/240x160" />
                                    </a>

                                    <a href="https://source.unsplash.com/eWFdaPRFjwE/1500x1000" data-fancybox="images" data-caption="Mallorca, Llubí, Spain" class="d-none">
                                      <img src="https://source.unsplash.com/eWFdaPRFjwE/240x160" />
                                    </a>

                                    <a href="https://source.unsplash.com/c1JxO-uAZd0/1500x1000" data-fancybox="images" data-caption="Danish summer" class="d-none">
                                      <img src="https://source.unsplash.com/c1JxO-uAZd0/240x160" />
                                    </a>

                                    <a href="https://source.unsplash.com/eXHeq48Z-Q4/1500x1000" data-fancybox="images" data-caption="Sunrise above a sandy beach" class="d-none">
                                      <img src="https://source.unsplash.com/eXHeq48Z-Q4/240x160" />
                                    </a>

                                    <a href="https://source.unsplash.com/RFgO9B_OR4g/1500x1000" data-fancybox="images" data-caption="Woman on a slope by the shore" class="d-none">
                                      <img src="https://source.unsplash.com/RFgO9B_OR4g/240x160" />
                                    </a>

                                    <a href="https://source.unsplash.com/7bwQXzbF6KE/1500x1000" data-fancybox="images" data-caption="Mountain hiking sunset" class="d-none">
                                      <img src="https://source.unsplash.com/7bwQXzbF6KE/240x160" />
                                    </a>

                                    <a href="https://source.unsplash.com/NhU0nUR7920/1500x1000" data-fancybox="images" data-caption="Sunset Picnic" class="d-none">
                                      <img src="https://source.unsplash.com/NhU0nUR7920/240x160" />
                                    </a>

                                    <a href="https://source.unsplash.com/B2LYYV9-y0s/1500x1000" data-fancybox="images" data-caption="On them Indiana Nights" class="d-none">
                                      <img src="https://source.unsplash.com/B2LYYV9-y0s/240x160" />
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <div class="row">
                            <div class="row">
                                <div class="col-6 d-flex">
                                    <h3>Cartoons</h3>
                                </div>
                                <div class="col-6 text-end">
                                    <span>{{ \Carbon\Carbon::parse($latest_cartoon->created_at)->format('d F Y') }}</span>
                                </div>
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
