@extends('frontend.index')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">
<link rel="stylesheet" type="text/css" href="https://codepen.io/fancyapps/pen/Kxdwjj.css">

@endsection
@section('content')
<section class="home">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-12 site-title">
                <h2>{{ env('APP_NAME') }}</h2>
            </div>
        </div>
        <div class="row d-flex-center feature">
            <div class="col-md-12">
                <div class="row border-bottom py-2">
                    <div class="col-md-7">
                        <div class="overflow-hidden">
                            @if (app()->getLocale() == 'mm')
                            <a href="{{ url('/mm/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}">
                                <img src=" {{ asset('storage/images/original') . '/' . $latest->img_link }}" alt="image" width="100%">
                            </a>
                            @elseif(app()->getLocale() == 'ch')
                                <a href="{{ url('/ch/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}">
                                    <img src=" {{ asset('storage/images/original') . '/' . $latest->img_link }}" alt="image" width="100%">
                                </a>
                            @elseif(app()->getLocale() == 'ta')
                                <a href="{{ url('/ta/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}">
                                    <img src=" {{ asset('storage/images/original') . '/' . $latest->img_link }}" alt="image" width="100%">
                                </a>
                            @else
                                <a href="{{ url('/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}">
                                    <img src=" {{ asset('storage/images/original') . '/' . $latest->img_link }}" alt="image" width="100%">
                                </a>
                            @endif
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <h2>
                                    @if (app()->getLocale() == 'mm')
                                        <a href="{{ url('/mm/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}">{{ $latest->title_mm }}</a>
                                    @elseif(app()->getLocale() == 'ch')
                                        <a href="{{ url('/ch/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}">{{ $latest->title_ch }}</a>
                                    @elseif(app()->getLocale() == 'ta')
                                        <a href="{{ url('/ta/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}">{{ $latest->title_ta }}</a>
                                    @else
                                        <a href="{{ url('/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}">{{ $latest->title_en }}</a>
                                    @endif
                                </h2>
                                <p>
                                    @if (app()->getLocale() == 'mm')
                                        {!! $latest->short_desc_mm !!}
                                    @elseif(app()->getLocale() == 'ch')
                                        {!! $latest->short_desc_ch !!}
                                    @elseif(app()->getLocale() == 'ta')
                                        {!! $latest->short_desc_ta !!}
                                    @else
                                        {!! $latest->short_desc_en !!}
                                    @endif
                                </p>
                                @if (app()->getLocale() == 'mm')
                                    <a href="{{ url('/mm/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}" class="btn btn-green mt-3">{{ __('language.read_now') }}</a>
                                @elseif(app()->getLocale() == 'ch')
                                    <a href="{{ url('/ch/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}" class="btn btn-green mt-3">{{ __('language.read_now') }}

                                    </a>
                                @elseif(app()->getLocale() == 'ta')
                                    <a href="{{ url('/ta/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}" class="btn btn-green mt-3">{{ __('language.read_now') }}

                                    </a>
                                @else
                                    <a href="{{ url('/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}" class="btn btn-green mt-3">{{ __('language.read_now') }}

                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 top mt-5 mt-md-0 mt-lg-0">
                        <div class="row current text-white d-flex align-items-center rounded-top">
                            <div class="col-6">
                                <span><p class="fw-bold">{{ __('language.most_read') }}</p></span>
                                <h4>{{ \Carbon\Carbon::now()->format('d F Y') }}</h4>
                            </div>
                            <div class=" col-6 text-end">
                                <span><p class="fw-bold">YANGON</p></span>
                                <h5>{{ $temperature }} <sup>C</sup><i class="fa-solid fa-cloud-moon-rain fa-lg ms-1"></i></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @foreach ($mostViews as $key => $itemFive)
                                    <div class="row py-1 top-ten d-flex align-items-center">
                                        <div class="col-md-3 col-4">
                                            <div class="overflow-hidden">
                                                @if (app()->getLocale() == 'mm')
                                                    <a href="{{ url('/mm/category') . '/' . $itemFive->category->url_slug . '/' . $itemFive->id }}" >
                                                        <img src=" {{ asset('storage/images/thumbnail') . '/' . $itemFive->img_link }}" alt="image" width="100%" class="rounded">
                                                    </a>
                                                @elseif(app()->getLocale() == 'ch')
                                                    <a href="{{ url('/ch/category') . '/' . $itemFive->category->url_slug . '/' . $itemFive->id }}" >
                                                        <img src=" {{ asset('storage/images/thumbnail') . '/' . $itemFive->img_link }}" alt="image" width="100%" class="rounded">
                                                    </a>
                                                @elseif(app()->getLocale() == 'ta')
                                                    <a href="{{ url('/ta/category') . '/' . $itemFive->category->url_slug . '/' . $itemFive->id }}" >
                                                        <img src=" {{ asset('storage/images/thumbnail') . '/' . $itemFive->img_link }}" alt="image" width="100%" class="rounded">
                                                    </a>
                                                @else
                                                    <a href="{{ url('/category') . '/' . $itemFive->category->url_slug . '/' . $itemFive->id }}" >
                                                        <img src=" {{ asset('storage/images/thumbnail') . '/' . $itemFive->img_link }}" alt="image" width="100%" class="rounded">
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-8">
                                            <h6>
                                                @if (app()->getLocale() == 'mm')
                                                    <a href="{{ url('/mm/category') . '/' . $itemFive->category->url_slug . '/' . $itemFive->id }}" >{{ $itemFive->title_mm }}</a>
                                                @elseif(app()->getLocale() == 'ch')
                                                    <a href="{{ url('/ch/category') . '/' . $itemFive->category->url_slug . '/' . $itemFive->id }}" >{{ $itemFive->title_ch }}</a>
                                                @elseif(app()->getLocale() == 'ta')
                                                    <a href="{{ url('/ta/category') . '/' . $itemFive->category->url_slug . '/' . $itemFive->id }}" >{{ $itemFive->title_ta }}</a>
                                                @else
                                                    <a href="{{ url('/category') . '/' . $itemFive->category->url_slug . '/' . $itemFive->id }}" >{{ $itemFive->title_en }}</a>
                                                @endif
                                            </h6>
                                        </div>
                                        <div class="col-12 d-flex align-items-center">
                                            <span><span class="fw-bold">Views:</span> {{ $itemFive->views }}</span>
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

<section>
    <div class="container-fluid pb-2">
        <div class="row d-flex-center mt-4 mb-3 border-start border-5 border-color">
            <div class="col-12">
                <h2 class="mt-2">{{ __('language.latest_news') }}</h2>
            </div>
        </div>
        <div class="row feature">
            <div class="col-md-12">
                <div class="row ">
                    @foreach ($latestTen as $index => $ten)
                        <div class="col-md-6 pt-3 {{ $index >= count($latestTen) - 2 ? '' : ' border-bottom' }}">
                            <div class="row d-flex justify-content-end">
                                <div class="col-md-4 col-5">
                                    <div class="row">
                                        <div class=" mb-2">
                                            <div class="overflow-hidden">
                                                @if (app()->getLocale() == 'mm')
                                                    <span class="category">{{ $ten->category->name_mm }}</span>
                                                    <a href="{{ url('/mm/category') . '/' . $ten->category->url_slug . '/' . $ten->id }}">
                                                        <img src="{{ asset('storage/images/thumbnail/') . '/' . $ten->img_link }}" alt="image" width="100%" class="rounded">
                                                    </a>
                                                @elseif(app()->getLocale() == 'ch')
                                                    <span class="category">{{ $ten->category->name_ch }}</span>
                                                    <a href="{{ url('/ch/category') . '/' . $ten->category->url_slug . '/' . $ten->id }}">
                                                        <img src="{{ asset('storage/images/thumbnail/') . '/' . $ten->img_link }}" alt="image" width="100%" class="rounded">
                                                    </a>
                                                @elseif(app()->getLocale() == 'ta')
                                                    <span class="category">{{ $ten->category->name_ta }}</span>
                                                    <a href="{{ url('/ta/category') . '/' . $ten->category->url_slug . '/' . $ten->id }}">
                                                        <img src="{{ asset('storage/images/thumbnail/') . '/' . $ten->img_link }}" alt="image" width="100%" class="rounded">
                                                    </a>
                                                @else
                                                    <span class="category">{{ $ten->category->name_en }}</span>
                                                    <a href="{{ url('/category') . '/' . $ten->category->url_slug . '/' . $ten->id }}">
                                                        <img src="{{ asset('storage/images/thumbnail/') . '/' . $ten->img_link }}" alt="image" width="100%" class="rounded">
                                                    </a>
                                                @endif
                                            </div>

                                            <div class="col-12 d-flex align-items-center">
                                                <span><span class="fw-bold">Viewers:</span> {{ $itemFive->views }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-7">
                                    <h6>
                                        @if (app()->getLocale() == 'mm')
                                            <a href="{{ url('/mm/category') . '/' . $ten->category->url_slug . '/' . $ten->id }}">{{ $ten->title_mm }}</a>
                                        @elseif(app()->getLocale() == 'ch')
                                            <a href="{{ url('/ch/category') . '/' . $ten->category->url_slug . '/' . $ten->id }}">{{ $ten->title_ch }}</a>
                                        @elseif(app()->getLocale() == 'ta')
                                            <a href="{{ url('/ta/category') . '/' . $ten->category->url_slug . '/' . $ten->id }}">{{ $ten->title_ta }}</a>
                                        @else
                                            <a href="{{ url('/category') . '/' . $ten->category->url_slug . '/' . $ten->id }}">{{ $ten->title_en }}</a>
                                        @endif
                                    </h6>
                                    <p>
                                        @if (app()->getLocale() == 'mm')
                                            {!! $ten->short_desc_mm !!}
                                        @elseif(app()->getLocale() == 'ch')
                                            {!! $ten->short_desc_ch !!}
                                        @elseif(app()->getLocale() == 'ta')
                                            {!! $ten->short_desc_ta !!}
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
        </div>
    </div>
</section>

<section class="opnion contact-email text-white">
    <div class="container-fluid">
        <div class="row d-flex-center align-items-center">
            <div class="col-md-8">
               <div class="row d-flex align-items-center">
                    <div class="col-md-3 text-center">
                        <img src="{{ asset('images/viber_image_2023-10-02_15-49-11-831-removebg-preview.png') }}" alt="logo" width="60%">
                        <span class="d-block">EMAIL NEWSLETTER</span>
                    </div>
                    <div class="col-md-9">
                        <h3>Get the top stories delivered to you daily…</h3>
                        <form id="subscribe-form">
                            <div class="input-group ">
                                <input type="email" class="form-control bg-transparent rounded subscribe" placeholder="Enter your email" id="email" name="email">
                                <button class="btn btn-dark" type="button" id="sign-up">Sign Up</button>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="checkbox" id="newsletter" type="checkbox" value="checkedValue" aria-label="Text for screen reader" checked readonly><span> Subscribe me to the daily newsletter.</span>
                            </div>
                        </form>
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
                            <div class="row d-flex justify-content-between align-items-center border-bottom border-color border-3 ">
                                <div class="col p-0">
                                    <h3>Burma</h3>
                                </div>
                                <div class="col text-end p-0">
                                    <a href="{{ url('/categories/news/burma') }}"><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                                </div>
                            </div>
                            @foreach ($burmas as $burma)
                                <div class="row mt-3">
                                    <div class="col-md-4 col-6">
                                        <div class="overflow-hidden">
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/category') . '/' . $burma->category->url_slug . '/' . $burma->id }}">
                                                    <img src=" {{ asset('/storage/images/thumbnail/') . '/' . $burma->img_link }}" alt="image" width="100%">
                                                </a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/category') . '/' . $burma->category->url_slug . '/' . $burma->id }}">
                                                    <img src=" {{ asset('/storage/images/thumbnail/') . '/' . $burma->img_link }}" alt="image" width="100%">
                                                </a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/category') . '/' . $burma->category->url_slug . '/' . $burma->id }}">
                                                    <img src=" {{ asset('/storage/images/thumbnail/') . '/' . $burma->img_link }}" alt="image" width="100%">
                                                </a>
                                            @else
                                                <a href="{{ url('/category') . '/' . $burma->category->url_slug . '/' . $burma->id }}">
                                                    <img src=" {{ asset('/storage/images/thumbnail/') . '/' . $burma->img_link }}" alt="image" width="100%">
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <p>
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/category') . '/' . $burma->category->url_slug . '/' . $burma->id }}">{{ $burma->title_mm }}</a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/category') . '/' . $burma->category->url_slug . '/' . $burma->id }}">{{ $burma->title_ch }}</a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/category') . '/' . $burma->category->url_slug . '/' . $burma->id }}">{{ $burma->title_ta }}</a>
                                            @else
                                                <a href="{{ url('/category') . '/' . $burma->category->url_slug . '/' . $burma->id }}">{{ $burma->title_en }}</a>
                                            @endif
                                        </p>
                                        <span class="small me-3"><i class="fa-solid fa-clock me-1"></i>{{ \Carbon\Carbon::parse($burma->created_at)->format('d F Y') }}</span><span class="small"><i class="fa-solid fa-eye me-4"></i>{{ $burma->views }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between align-items-center border-bottom border-color border-3 ">
                                <div class="col p-0">
                                    <h3>Business</h3>
                                </div>
                                <div class="col text-end p-0">
                                    <a href="{{ url('/category/business') }}"><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                                </div>
                            </div>
                            @foreach ($businesses as $business)
                                <div class="row mt-3">
                                    <div class="col-md-4 col-6">
                                        <div class="overflow-hidden">
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/category') . '/' . $business->category->url_slug . '/' . $business->id }}">
                                                    <img src=" {{ asset('storage/images/thumbnail' . '/' . $business->img_link) }}" alt="image" width="100%">
                                                </a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/category') . '/' . $business->category->url_slug . '/' . $business->id }}">
                                                    <img src=" {{ asset('storage/images/thumbnail' . '/' . $business->img_link) }}" alt="image" width="100%">
                                                </a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/category') . '/' . $business->category->url_slug . '/' . $business->id }}">
                                                    <img src=" {{ asset('storage/images/thumbnail' . '/' . $business->img_link) }}" alt="image" width="100%">
                                                </a>
                                            @else
                                                <a href="{{ url('/category') . '/' . $business->category->url_slug . '/' . $business->id }}">
                                                    <img src=" {{ asset('storage/images/thumbnail' . '/' . $business->img_link) }}" alt="image" width="100%">
                                                </a>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <p class="">
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/category') . '/' . $business->category->url_slug . '/' . $business->id }}">{{ $business->title_mm }}</a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/category') . '/' . $business->category->url_slug . '/' . $business->id }}">{{ $business->title_ch }}</a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/category') . '/' . $business->category->url_slug . '/' . $business->id }}">{{ $business->title_ta }}</a>
                                            @else
                                                <a href="{{ url('/category') . '/' . $business->category->url_slug . '/' . $business->id }}">{{ $business->title_en }}</a>
                                            @endif
                                        </p>
                                        <span class="small me-3"><i class="fa-solid fa-clock me-1"></i>{{ \Carbon\Carbon::parse($business->created_at)->format('d F Y') }}</span><span class="small"><i class="fa-solid fa-eye me-4"></i>{{ $business->views }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between align-items-center border-bottom border-color border-3 ">
                                <div class="col p-0">
                                    <h3>In Person</h3>
                                </div>
                                <div class="col text-end p-0">
                                    <a href="{{ url('/category/in-person') }}"><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                                </div>
                            </div>
                            @foreach ($persons as $person)
                                <div class="row mt-3">
                                    <div class="col-md-4 col-6">
                                        <div class="overflow-hidden">
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/category') . '/' . $person->category->url_slug . '/' . $person->id }}">
                                                    <img src=" {{ asset('storage/images/thumbnail') . '/' . $person->img_link }}" alt="image" width="100%">
                                                </a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/category') . '/' . $person->category->url_slug . '/' . $person->id }}">
                                                    <img src=" {{ asset('storage/images/thumbnail') . '/' . $person->img_link }}" alt="image" width="100%">
                                                </a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/category') . '/' . $person->category->url_slug . '/' . $person->id }}">
                                                    <img src=" {{ asset('storage/images/thumbnail') . '/' . $person->img_link }}" alt="image" width="100%">
                                                </a>
                                            @else
                                                <a href="{{ url('/category') . '/' . $person->category->url_slug . '/' . $person->id }}">
                                                    <img src=" {{ asset('storage/images/thumbnail') . '/' . $person->img_link }}" alt="image" width="100%">
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <p class="">
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/category') . '/' . $person->category->url_slug . '/' . $person->id }}">{{ $person->title_mm }}</a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/category') . '/' . $person->category->url_slug . '/' . $person->id }}">{{ $person->title_ch }}</a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/category') . '/' . $person->category->url_slug . '/' . $person->id }}">{{ $person->title_ta }}</a>
                                            @else
                                                <a href="{{ url('/category') . '/' . $person->category->url_slug . '/' . $person->id }}">{{ $person->title_en }}</a>
                                            @endif
                                        </p>
                                        <span class="small me-3"><i class="fa-solid fa-clock me-1"></i>{{ \Carbon\Carbon::parse($person->created_at)->format('d F Y') }}</span><span class="small"><i class="fa-solid fa-eye me-4"></i>{{ $person->views }}</span>
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
                            <div class="row d-flex justify-content-between align-items-center border-bottom border-color border-3 ">
                                <div class="col p-0">
                                    <h3>Opnion</h3>
                                </div>
                                <div class="col text-end p-0">
                                    <a href="{{ url('/category/opinion') }}"><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                                </div>
                            </div>
                            @foreach ($opinions as $opinion)
                                <div class="row mt-3">
                                    <div class="col-md-4 col-6">
                                        <div class="overflow-hidden">
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/category') . '/' . $opinion->category->url_slug . '/' . $opinion->id }}">
                                                    <img src="{{ asset('storage/images/thumbnail') . '/' . $opinion->img_link }}" alt="image" width="100%">
                                                </a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/category') . '/' . $opinion->category->url_slug . '/' . $opinion->id }}">
                                                    <img src="{{ asset('storage/images/thumbnail') . '/' . $opinion->img_link }}" alt="image" width="100%">
                                                </a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/category') . '/' . $opinion->category->url_slug . '/' . $opinion->id }}">
                                                    <img src="{{ asset('storage/images/thumbnail') . '/' . $opinion->img_link }}" alt="image" width="100%">
                                                </a>
                                            @else
                                                <a href="{{ url('/category') . '/' . $opinion->category->url_slug . '/' . $opinion->id }}">
                                                    <img src="{{ asset('storage/images/thumbnail') . '/' . $opinion->img_link }}" alt="image" width="100%">
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <p class="">
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/category') . '/' . $opinion->category->url_slug . '/' . $opinion->id }}">{{ $opinion->title_mm }}</a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/category') . '/' . $opinion->category->url_slug . '/' . $opinion->id }}">{{ $opinion->title_ch }}</a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/category') . '/' . $opinion->category->url_slug . '/' . $opinion->id }}">{{ $opinion->title_ta }}</a>
                                            @else
                                                <a href="{{ url('/category') . '/' . $opinion->category->url_slug . '/' . $opinion->id }}">{{ $opinion->title_en }}</a>
                                            @endif
                                        </p>
                                        <span class="small me-3"><i class="fa-solid fa-clock me-1"></i>{{ \Carbon\Carbon::parse($opinion->created_at)->format('d F Y') }}</span><span class="small"><i class="fa-solid fa-eye me-4"></i>{{ $opinion->views }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between align-items-center border-bottom border-color border-3 ">
                                <div class="col p-0">
                                    <h3>Lifestyle</h3>
                                </div>
                                <div class="col text-end p-0">
                                    <a href="{{ url('/category/lifestyle') }}"><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                                </div>
                            </div>
                            @foreach ($lifeStyles as $lifestyle)
                                <div class="row mt-3">
                                    <div class="col-md-4 col-6">
                                        <div class="overflow-hidden">
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/category') . '/' . $lifestyle->category->url_slug . '/' . $lifestyle->id }}">
                                                    <img src="{{ asset('storage/images/thumbnail') . '/' . $lifestyle->img_link }}" alt="image" width="100%">
                                                </a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/category') . '/' . $lifestyle->category->url_slug . '/' . $lifestyle->id }}">
                                                    <img src="{{ asset('storage/images/thumbnail') . '/' . $lifestyle->img_link }}" alt="image" width="100%">
                                                </a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/category') . '/' . $lifestyle->category->url_slug . '/' . $lifestyle->id }}">
                                                    <img src="{{ asset('storage/images/thumbnail') . '/' . $lifestyle->img_link }}" alt="image" width="100%">
                                                </a>
                                            @else
                                                <a href="{{ url('/category') . '/' . $lifestyle->category->url_slug . '/' . $lifestyle->id }}">
                                                    <img src="{{ asset('storage/images/thumbnail') . '/' . $lifestyle->img_link }}" alt="image" width="100%">
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <p class="">
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/category') . '/' . $lifestyle->category->url_slug . '/' . $lifestyle->id }}">{{ $lifestyle->title_mm }}</a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/category') . '/' . $lifestyle->category->url_slug . '/' . $lifestyle->id }}">{{ $lifestyle->title_ch }}</a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/category') . '/' . $lifestyle->category->url_slug . '/' . $lifestyle->id }}">{{ $lifestyle->title_ta }}</a>
                                            @else
                                                <a href="{{ url('/category') . '/' . $lifestyle->category->url_slug . '/' . $lifestyle->id }}"> {{ $lifestyle->title_en }}</a>
                                            @endif
                                        </p>
                                        <span class="small me-3"><i class="fa-solid fa-clock me-1"></i>{{ \Carbon\Carbon::parse($lifestyle->created_at)->format('d F Y') }}</span><span class="small"><i class="fa-solid fa-eye me-4"></i>{{ $lifestyle->views }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between align-items-center border-bottom border-color border-3 ">
                                <div class="col p-0">
                                    <h3>Specials</h3>
                                </div>
                                <div class="col text-end p-0">
                                    <a href="{{ url('/category/specials') }}"><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                                </div>
                            </div>
                            @foreach ($specials as $special)
                                <div class="row mt-3">
                                    <div class="col-md-4 col-6">
                                        <div class="overflow-hidden">
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/category') . '/' . $special->category->url_slug . '/' . $special->id }}">
                                                    <img src="{{ asset('storage/images/thumbnail') . '/' . $special->img_link }}" alt="image" width="100%">
                                                </a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/category') . '/' . $special->category->url_slug . '/' . $special->id }}">
                                                    <img src="{{ asset('storage/images/thumbnail') . '/' . $special->img_link }}" alt="image" width="100%">
                                                </a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/category') . '/' . $special->category->url_slug . '/' . $special->id }}">
                                                    <img src="{{ asset('storage/images/thumbnail') . '/' . $special->img_link }}" alt="image" width="100%">
                                                </a>
                                            @else
                                                <a href="{{ url('/category') . '/' . $special->category->url_slug . '/' . $special->id }}">
                                                    <img src="{{ asset('storage/images/thumbnail') . '/' . $special->img_link }}" alt="image" width="100%">
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <p class="">
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/category') . '/' . $special->category->url_slug . '/' . $special->id }}">{{ $special->title_mm }}</a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/category') . '/' . $special->category->url_slug . '/' . $special->id }}">{{ $special->title_ch }}</a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/category') . '/' . $special->category->url_slug . '/' . $special->id }}">{{ $special->title_ta }}</a>
                                            @else
                                                <a href="{{ url('/category') . '/' . $special->category->url_slug . '/' . $special->id }}">{{ $special->title_en }}</a>
                                            @endif
                                        </p>
                                        <span class="small me-3"><i class="fa-solid fa-clock me-1"></i>{{ \Carbon\Carbon::parse($special->created_at)->format('d F Y') }}</span><span class="small"><i class="fa-solid fa-eye me-4"></i>{{ $special->views }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between align-items-center border-bottom border-color border-3 ">
                                <div class="col p-0">
                                    <h3>In Person</h3>
                                </div>
                                <div class="col text-end p-0">
                                    <a href="{{ url('/category/in-person') }}"><span>MORE</span><i class="fa-solid fa-circle-plus ms-1 "></i></a>
                                </div>
                            </div>
                            @foreach ($persons as $person)
                                <div class="row mt-3">
                                    <div class="col-md-4 col-6">
                                        @if (app()->getLocale() == 'mm')
                                            <a href="{{ url('/mm/category') . '/' . $person->category->url_slug . '/' . $person->id }}">
                                                <img src=" {{ asset('storage/images/thumbnail') . '/' . $person->img_link }}" alt="image" width="100%">
                                            </a>
                                        @elseif(app()->getLocale() == 'ch')
                                            <a href="{{ url('/ch/category') . '/' . $person->category->url_slug . '/' . $person->id }}">
                                                <img src=" {{ asset('storage/images/thumbnail') . '/' . $person->img_link }}" alt="image" width="100%">
                                            </a>
                                        @elseif(app()->getLocale() == 'ta')
                                            <a href="{{ url('/ta/category') . '/' . $person->category->url_slug . '/' . $person->id }}">
                                                <img src=" {{ asset('storage/images/thumbnail') . '/' . $person->img_link }}" alt="image" width="100%">
                                            </a>
                                        @else
                                            <a href="{{ url('/category') . '/' . $person->category->url_slug . '/' . $person->id }}">
                                                <img src=" {{ asset('storage/images/thumbnail') . '/' . $person->img_link }}" alt="image" width="100%">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <p class="">
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/category') . '/' . $person->category->url_slug . '/' . $person->id }}">{{ $person->title_mm }}</a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/category') . '/' . $person->category->url_slug . '/' . $person->id }}">{{ $person->title_ch }}</a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/category') . '/' . $person->category->url_slug . '/' . $person->id }}">{{ $person->title_ta }}</a>
                                            @else
                                                <a href="{{ url('/category') . '/' . $person->category->url_slug . '/' . $person->id }}">{{ $person->title_en }}</a>
                                            @endif
                                        </p>
                                        <span class="small me-3"><i class="fa-solid fa-clock me-1"></i>{{ \Carbon\Carbon::parse($person->created_at)->format('d F Y') }}</span><span class="small"><i class="fa-solid fa-eye me-4"></i>{{ $person->views }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> --}}
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

<section class="bg-gray p-3 video">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-6 d-flex">
                                <h3>{{ __('language.photos') }}</h3>
                            </div>
                            <div class="col-6 text-end fw-bold">
                                <span>{{ \Carbon\Carbon::parse($latest_photo->created_at)->format('d F Y') }}</span>
                            </div>
                        </div>
                        <div class="row vd-home card-deck">
                            <div class="card">
                                <a data-fancybox href="{{ asset('storage/images/original/') . '/' . $latest_photo->url }}" >
                                  <img class="card-img-top img-fluid" src="{{ asset('storage/images/original/') . '/' . $latest_photo->url }}" />
                                </a>
                                <div class="card-body">
                                  <p class="card-text">
                                        @if (app()->getLocale() == 'mm')
                                            {!! $latest_photo->desc_mm !!}
                                        @elseif(app()->getLocale() == 'ch')
                                            {!! $latest_photo->desc_ch !!}
                                        @elseif(app()->getLocale() == 'ta')
                                            {!! $latest_photo->desc_ta !!}
                                        @else
                                            {!! $latest_photo->desc_en !!}
                                        @endif
                                  </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="row">
                                <div class="col-6 d-flex">
                                    <h3>{{ __('language.cartoons') }}</h3>
                                </div>
                                <div class="col-6 text-end fw-bold">
                                    <span>{{ \Carbon\Carbon::parse($latest_cartoon->created_at)->format('d F Y') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            @foreach ($lasts_cartoons as $last)
                            <div class="col-md-4">
                                <div class="row cartoons" >
                                    <div class="col-12 mb-1">
                                        <div class="overflow-hidden">
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/cartoons') . '/' . $last->id }}" >
                                                    <img src=" {{ asset('/storage/images/thumbnail/') . '/' . $last->img_link }}" alt="image" width="100%">
                                                </a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/cartoons') . '/' . $last->id }}" >
                                                    <img src=" {{ asset('/storage/images/thumbnail/') . '/' . $last->img_link }}" alt="image" width="100%">
                                                </a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/cartoons') . '/' . $last->id }}" >
                                                    <img src=" {{ asset('/storage/images/thumbnail/') . '/' . $last->img_link }}" alt="image" width="100%">
                                                </a>
                                            @else
                                                <a href="{{ url('/cartoons') . '/' . $last->id }}" >
                                                    <img src=" {{ asset('/storage/images/thumbnail/') . '/' . $last->img_link }}" alt="image" width="100%">
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h6>
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/cartoons') . '/' . $last->id }}" >{{ $last->title_mm }}</a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/cartoons') . '/' . $last->id }}" >{{ $last->title_ch }}</a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/cartoons') . '/' . $last->id }}" >{{ $last->title_ta }}</a>
                                            @else
                                                <a href="{{ url('/cartoons') . '/' . $last->id }}" >{{ $last->title_en }}</a>
                                            @endif
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script>
    $(document).ready(function(){
        $('#sign-up').click(function (e) {

            var email = $('#email').val();

            $.ajax({
                type: 'GET',
                url : '{{ route('email')  }}',
                data: {email},
                success: function(response){
                    console.log(response);
                    if (response == 'saved') {
                        alert('You are succesfully subscribed');
                        location.reload();
                    } else {
                        alert('You are already subscribed');
                        location.reload();
                    }
                },
            });
        });
    });

//   // Attach click event to single image
//     document.getElementById("singleImage").addEventListener("click", function() {
//     // Open the carousel modal
//         $('#carouselModal').modal('show');
//         });
//         //  Set caption from card text
//         $('.card-deck a').fancybox({
//         caption : function( instance, item ) {
//         return $(this).parent().find('.card-text').html();
//         }

//     });

</script>
@endsection
