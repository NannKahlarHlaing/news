@extends('frontend.index')

@section('css')

<style>
    .scroll-window {
      height: 40vh;
      overflow: auto;
      border: 1px solid var(--color-gray);
      padding: 0 15px;
      background-color: #fff;
      border-radius: 5px;
    }
  </style>

@endsection
@section('content')

<section class="pt-5">
    <div class="container-fluid">
        <div class="row d-flex-center">
            @if (Route::currentRouteName() == 'main_categories.sub_pages' || Route::currentRouteName() == 'main_categories.sub_pages.lang' )
                <div class="col-lg-2 col-md-3 scroll-window">
                    <div class="row">
                        <div class="bg-main text-white py-1">
                            Sub Categories
                        </div>
                        @foreach ($sub_categories as $sub)
                            <div class="sub_cat border-bottom border-sec-color py-1">
                                @if (app()->getLocale() == 'mm')
                                    <a href="{{ url('/mm/categories') . '/' . $sub_cat->name_en . '/' . $sub->name_en  }}">{{ $sub->name_mm }}</a>
                                @elseif(app()->getLocale() == 'ch')
                                <a href="{{ url('/ch/categories') . '/' . $sub_cat->name_en . '/' . $sub->name_en  }}">{{ $sub->name_ch }}</a>
                                @else
                                <a href="{{ url('/categories') . '/' . $sub_cat->name_en . '/' . $sub->name_en  }}">{{ $sub->name_en }}</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="col-lg-10 col-md-9">
                <div class="row">
                    <div class="col-md-6 mb-md-0 mb-3">
                        <img src="/storage/images/original/{{ $latest->img_link }}" alt="image" width="100%">
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <h2>
                                    @if (Route::currentRouteName() == 'main_categories.sub_pages' || Route::currentRouteName() == 'main_categories.sub_pages.lang' || Route::currentRouteName() == 'sub_pages' || Route::currentRouteName() == 'sub_pages.lang')
                                        @if (app()->getLocale() == 'mm')
                                            <a href="{{ url('/mm/category') . '/' . $latest->category->name_en . '/' . $latest->id }}">{{ $latest->title_mm }}</a>
                                        @elseif(app()->getLocale() == 'ch')
                                            <a href="{{ url('/ch/category') . '/' . $latest->category->name_en . '/' . $latest->id }}">{{ $latest->title_ch }}</a>
                                        @else
                                            <a href="{{ url('/category') . '/' . $latest->category->name_en . '/' . $latest->id }}">{{ $latest->title_en }}</a>
                                        @endif
                                    @else
                                        @if (app()->getLocale() == 'mm')
                                            <a href="{{ url('/mm') . '/' . $sub_cat[0] . '/' . $latest->id }}">{{ $latest->title_mm }}</a>
                                        @elseif(app()->getLocale() == 'ch')
                                            <a href="{{ url('/ch') . '/' . $sub_cat[0] . '/' . $latest->id }}">{{ $latest->title_ch }}</a>
                                        @else
                                            <a href="{{ url('/') . '/' . $sub_cat[0] . '/' . $latest->id }}">{{ $latest->title_en }}</a>
                                        @endif
                                    @endif
                                </h2>
                                <p>
                                    @if (app()->getLocale() == 'mm')
                                        {!! $latest->short_desc_mm !!}
                                    @elseif(app()->getLocale() == 'ch')
                                        {!! $latest->short_desc_ch !!}
                                    @else
                                        {!! $latest->short_desc_en !!}
                                    @endif
                                </p>
                                @if (Route::currentRouteName() == 'main_categories.sub_pages' || Route::currentRouteName() == 'main_categories.sub_pages.lang' || Route::currentRouteName() == 'sub_pages' || Route::currentRouteName() == 'sub_pages.lang')
                                    <a href="{{ url('/category') . '/' . $latest->category->name_en . '/' . $latest->id }}" class="btn btn-green mt-3">Read Now</a>
                                @else
                                    <a href="{{ url('/') . '/' . $sub_cat[0] . '/' . $latest->id }}" class="btn btn-green mt-3">Read Now</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 my-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            @if (Route::currentRouteName() == 'main_categories.sub_pages' || Route::currentRouteName() == 'main_categories.sub_pages.lang' || Route::currentRouteName() == 'sub_pages' || Route::currentRouteName() == 'sub_pages.lang')
                                @if (app()->getLocale() == 'mm')
                                    {{ $sub_cat->name_mm }}
                                @elseif(app()->getLocale() == 'ch')
                                    {{ $sub_cat->name_ch }}
                                @else
                                    {{ $sub_cat->name_en }}
                                @endif
                            @else
                                {{ $sub_cat[1] }}
                            @endif
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="mb-3">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-lg-8 col-md-6">
                <div class="row">
                    @foreach ($posts as $ten)
                        <div class="col-lg-4 mb-3 pb-3 border-bottom">
                            <h5>
                                @if (Route::currentRouteName() == 'main_categories.sub_pages' || Route::currentRouteName() == 'main_categories.sub_pages.lang' || Route::currentRouteName() == 'sub_pages' || Route::currentRouteName() == 'sub_pages.lang')
                                    @if (app()->getLocale() == 'mm')
                                        <a href="{{ url('/mm/category') . '/' . $ten->category->name_en . '/' . $ten->id }}">{{ $ten->title_mm }}</a>
                                    @elseif(app()->getLocale() == 'ch')
                                        <a href="{{ url('/ch/category') . '/' . $ten->category->name_en . '/' . $ten->id }}">{{ $ten->title_ch }}</a>
                                    @else
                                        <a href="{{ url('/category') . '/' . $ten->category->name_en . '/' . $ten->id }}">{{ $ten->title_en }}</a>
                                    @endif
                                @else
                                    @if (app()->getLocale() == 'mm')
                                        <a href="{{ url('/mm') . '/' . $sub_cat[0] . '/' . $ten->id }}">{{ $ten->title_mm }}</a>
                                    @elseif(app()->getLocale() == 'ch')
                                        <a href="{{ url('/ch') . '/' . $sub_cat[0] . '/' . $ten->id }}">{{ $ten->title_ch }}</a>
                                    @else
                                    <a href="{{ url('/') . '/' . $sub_cat[0] . '/' . $ten->id }}">{{ $ten->title_en }}</a>
                                    @endif

                                @endif
                            </h5>
                            <div class="row">
                                <div class="col-lg-12 col-md-10 col-10">
                                    @if (Route::currentRouteName() == 'sub_pages')
                                        <span class="category">
                                            @if (app()->getLocale() == 'mm')
                                                {{ $ten->category->name_mm }}
                                            @elseif(app()->getLocale() == 'ch')
                                                {{ $ten->category->name_ch }}
                                            @else
                                                {{ $ten->category->name_en }}
                                            @endif
                                        </span>
                                    @endif
                                    @if (Route::currentRouteName() == 'main_categories.sub_pages' || Route::currentRouteName() == 'main_categories.sub_pages.lang' || Route::currentRouteName() == 'sub_pages' || Route::currentRouteName() == 'sub_pages.lang')
                                        <span class="category">
                                            @if (app()->getLocale() == 'mm')
                                                {{ $latest->category->name_mm }}
                                            @elseif(app()->getLocale() == 'ch')
                                                {{ $latest->category->name_ch }}
                                            @else
                                                {{ $latest->category->name_en }}
                                            @endif

                                        </span>
                                    @endif
                                    <img src="/storage/images/thumbnail/{{ $ten->img_link }}" alt="image" width="100%">
                                </div>
                                <div class="col-lg-12 col-md-12 col-10 ">
                                    <span>BY THE VWXYZ Online</span>
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
                    <div class="">{{ $posts->appends(Request::all())->links() }}</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 top mt-5 mt-md-0 mt-lg-0">
                <div class="row current text-white d-flex align-items-center rounded-top">
                    <span><p class="fw-bold">MOST READ</p></span>
                    <h4>{{ \Carbon\Carbon::now()->format('d F Y') }}</h4>
                </div>
                <div class="row">
                    <div class="col-12">
                        @foreach ($mostViews as $key => $itemFive)
                            <div class="row py-1 top-ten d-flex align-items-center">
                                <div class="col-md-3 col-4">
                                    <img src=" {{ asset('storage/images/thumbnail') . '/' . $itemFive->img_link }}" alt="image" width="100%" class="rounded">
                                </div>
                                <div class="col-md-9 col-8">
                                    <h6>
                                        @if (app()->getLocale() == 'mm')
                                            <a href="{{ url('/mm/category') . '/' . $itemFive->category->name_en . '/' . $itemFive->id }}" >{{ $itemFive->title_mm }}</a>
                                        @elseif(app()->getLocale() == 'ch')
                                            <a href="{{ url('/ch/category') . '/' . $itemFive->category->name_en . '/' . $itemFive->id }}" >{{ $itemFive->title_ch }}</a>
                                        @else
                                            <a href="{{ url('/category') . '/' . $itemFive->category->name_en . '/' . $itemFive->id }}" >{{ $itemFive->title_en }}</a>
                                        @endif
                                    </h6>
                                </div>
                                <div class="col-12 d-flex align-items-center">
                                    <span><span class="fw-bold">Viewers:</span> {{ $itemFive->views }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
