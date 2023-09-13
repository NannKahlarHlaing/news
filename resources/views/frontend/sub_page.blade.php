@extends('frontend.index')

@section('content')

<section class="pt-5">
    <div class="container-fluid">
        <div class="row d-flex-center">
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
                        </a></h2>
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
                            <a href="{{ url('/category') . '/' . $latest->category->name_en . '/' . $latest->id }}" class="btn btn-danger mt-3">Read Now</a>
                        @else
                            <a href="{{ url('/') . '/' . $sub_cat[0] . '/' . $latest->id }}" class="btn btn-danger mt-3">Read Now</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
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
</section>
<section>
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
            <div class="col-lg-4 col-md-6 top">
                <div class="row">
                    <div class="col-12 p-0">
                        <img src="/storage/images/thumbnail/{{ $most_view->img_link}}" alt="image" width="100%" height="250px">
                        <span class="top-one d-block">1</span>
                    </div>
                    <div class="col-12" >
                        <div class="row bg-danger ps-2 pt-5" >
                            <div class="col-md-2 col-2">
                                <div class="col-12">
                                    <i class="fa-solid fa-eye"></i>
                                    <div class="mb-2 ms-3">
                                        <span>{{ $most_view->views }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10 col-10">
                                <h2><a href="{{ url('/category') . '/' . $most_view->category->name_en . '/' . $latest->id }}" >
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
</section>
@endsection
