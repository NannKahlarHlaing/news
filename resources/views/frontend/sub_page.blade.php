@extends('frontend.index')

@section('css')

<style>
    .scroll-window {
      height: 40vh;
      overflow: auto;
      overflow-x: hidden;
      border: 1px solid var(--color-gray);
      padding: 0 15px;
      border-radius: 5px;
    }
  </style>

@endsection
@section('content')

<section class="pt-5">
    <div class="container-fluid">
        <div class="row">
            @if (Route::currentRouteName() == 'main_categories.sub_pages' || Route::currentRouteName() == 'main_categories.sub_pages.lang' ||Route::currentRouteName() == 'sub_pages' || Route::currentRouteName() == 'sub_pages.lang' )
                <div class="col-lg-2 col-md-3 ps-0">
                    <div class="bg-gray scroll-window px-0">
                        <div class="row">
                            <div class="col-12 bg-main text-white py-1 px-4">
                                Sub Categories
                            </div>
                            @foreach ($sub_categories as $sub)
                                <div class="sub_cat border-bottom border-sec-color  py-1 px-4">
                                    @if (app()->getLocale() == 'mm')
                                        @if($main_cat)
                                            <a href="{{ url('/mm/categories') . '/' . $main_cat->url_slug . '/' . $sub->url_slug  }}">{{ $sub->name_mm }}</a>
                                        @else
                                            <a href="{{ url('/mm/categories') . '/' . $sub_cat->url_slug . '/' . $sub->url_slug  }}">{{ $sub->name_mm }}</a>
                                        @endif
                                    @elseif(app()->getLocale() == 'ch')
                                        @if($main_cat)
                                            <a href="{{ url('/ch/categories') . '/' . $main_cat->url_slug . '/' . $sub->url_slug  }}">{{ $sub->name_ch }}</a>
                                        @else
                                            <a href="{{ url('/ch/categories') . '/' . $sub_cat->url_slug . '/' . $sub->url_slug  }}">{{ $sub->name_ch }}</a>
                                        @endif
                                    @elseif(app()->getLocale() == 'ta')
                                        @if($main_cat)
                                            <a href="{{ url('/ta/categories') . '/' . $main_cat->url_slug . '/' . $sub->url_slug  }}">{{ $sub->name_ta }}</a>
                                        @else
                                            <a href="{{ url('/ta/categories') . '/' . $sub_cat->url_slug . '/' . $sub->url_slug  }}">{{ $sub->name_ta }}</a>
                                        @endif
                                    @elseif(app()->getLocale() == 'en')
                                        @if($main_cat)
                                            <a href="{{ url('/en/categories') . '/' . $main_cat->url_slug . '/' . $sub->url_slug  }}">{{ $sub->name_en }}</a>
                                        @else
                                            <a href="{{ url('/en/categories') . '/' . $sub_cat->url_slug . '/' . $sub->url_slug  }}">{{ $sub->name_en }}</a>
                                        @endif

                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-lg-10 col-md-9">
                <div class="row">
                    @foreach ($latestPosts as $latest)
                    {{-- {{ Route::currentRouteName() }} --}}
                        @if($latest->lang == app()->getLocale())
                            <div class="col-md-6 mb-md-0 mb-3">
                                <div class="overflow-hidden">
                                    @if (Route::currentRouteName() == 'main_categories.sub_pages' || Route::currentRouteName() == 'main_categories.sub_pages.lang' || Route::currentRouteName() == 'sub_pages' || Route::currentRouteName() == 'sub_pages.lang')
                                        @if (app()->getLocale() == 'mm')
                                            <a href="{{ url('/mm/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}">
                                                <img src="/storage/images/original/{{ $latest->img_link }}" alt="image" width="100%">
                                            </a>
                                        @elseif(app()->getLocale() == 'ch')
                                            <a href="{{ url('/ch/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}">
                                                <img src="/storage/images/original/{{ $latest->img_link }}" alt="image" width="100%">
                                            </a>
                                        @elseif(app()->getLocale() == 'ta')
                                            <a href="{{ url('/ta/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}">
                                                <img src="/storage/images/original/{{ $latest->img_link }}" alt="image" width="100%">
                                            </a>
                                        @elseif(app()->getLocale() == 'en')
                                            <a href="{{ url('/en/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}">
                                                <img src="/storage/images/original/{{ $latest->img_link }}" alt="image" width="100%">
                                            </a>
                                        @endif
                                    @else
                                        @if (app()->getLocale() == 'mm')
                                            <a href="{{ url('/mm') . '/' . $sub_cat[0] . '/' . $latest->id }}">
                                                <img src="/storage/images/original/{{ $latest->img_link }}" alt="image" width="100%">
                                            </a>
                                        @elseif(app()->getLocale() == 'ch')
                                            <a href="{{ url('/ch') . '/' . $sub_cat[0] . '/' . $latest->id }}">
                                                <img src="/storage/images/original/{{ $latest->img_link }}" alt="image" width="100%">
                                            </a>
                                        @elseif(app()->getLocale() == 'ta')
                                            <a href="{{ url('/ta') . '/' . $sub_cat[0] . '/' . $latest->id }}">
                                                <img src="/storage/images/original/{{ $latest->img_link }}" alt="image" width="100%">
                                            </a>
                                        @elseif(app()->getLocale() == 'en')
                                            <a href="{{ url('/en') . '/' . $sub_cat[0] . '/' . $latest->id }}">
                                                <img src="/storage/images/original/{{ $latest->img_link }}" alt="image" width="100%">
                                            </a>
                                        @endif
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h2>
                                            @if (Route::currentRouteName() == 'main_categories.sub_pages' || Route::currentRouteName() == 'main_categories.sub_pages.lang' || Route::currentRouteName() == 'sub_pages' || Route::currentRouteName() == 'sub_pages.lang')
                                                @if (app()->getLocale() == 'mm')
                                                    <a href="{{ url('/mm/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}">{{ $latest->title }}</a>
                                                @elseif(app()->getLocale() == 'ch')
                                                    <a href="{{ url('/ch/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}">{{ $latest->title }}</a>
                                                @elseif(app()->getLocale() == 'ta')
                                                    <a href="{{ url('/ta/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}">{{ $latest->title }}</a>
                                                @elseif(app()->getLocale() == 'en')
                                                    <a href="{{ url('/en/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}">{{ $latest->title }}</a>
                                                @endif
                                            @else
                                                @if (app()->getLocale() == 'mm')
                                                    <a href="{{ url('/mm') . '/' . $sub_cat[0] . '/' . $latest->id }}">{{ $latest->title }}</a>
                                                @elseif(app()->getLocale() == 'ch')
                                                    <a href="{{ url('/ch') . '/' . $sub_cat[0] . '/' . $latest->id }}">{{ $latest->title }}</a>
                                                @elseif(app()->getLocale() == 'ta')
                                                    <a href="{{ url('/ta') . '/' . $sub_cat[0] . '/' . $latest->id }}">{{ $latest->title }}</a>
                                                @elseif(app()->getLocale() == 'en')
                                                    <a href="{{ url('/en') . '/' . $sub_cat[0] . '/' . $latest->id }}">{{ $latest->title }}</a>
                                                @endif
                                            @endif
                                        </h2>
                                        <p>
                                            {!! $latest->short_desc !!}
                                        </p>
                                        @if (Route::currentRouteName() == 'main_categories.sub_pages' || Route::currentRouteName() == 'main_categories.sub_pages.lang' || Route::currentRouteName() == 'sub_pages' || Route::currentRouteName() == 'sub_pages.lang')
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}" class="btn btn-green mt-3">{{ __('language.read_now') }}</a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}" class="btn btn-green mt-3">{{ __('language.read_now') }}</a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}" class="btn btn-green mt-3">{{ __('language.read_now') }}</a>
                                            @elseif(app()->getLocale() == 'en')
                                                <a href="{{ url('/en/category') . '/' . $latest->category->url_slug . '/' . $latest->id }}" class="btn btn-green mt-3">{{ __('language.read_now') }}</a>
                                            @endif
                                        @else
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm') . '/' . $sub_cat[0] . '/' . $latest->id }}" class="btn btn-green mt-3">{{ __('language.read_now') }}</a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch') . '/' . $sub_cat[0] . '/' . $latest->id }}" class="btn btn-green mt-3">{{ __('language.read_now') }}</a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta') . '/' . $sub_cat[0] . '/' . $latest->id }}" class="btn btn-green mt-3">{{ __('language.read_now') }}</a>
                                            @elseif(app()->getLocale() == 'en')
                                                <a href="{{ url('/en') . '/' . $sub_cat[0] . '/' . $latest->id }}" class="btn btn-green mt-3">{{ __('language.read_now') }}</a>
                                            @endif

                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 my-3 px-lg-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('language.home') }}</a></li>
                        @if($main_cat)
                            <li class="breadcrumb-item">
                                @if (app()->getLocale() == 'mm')
                                    <a href="{{ url('/mm/category') . '/' . $main_cat->url_slug }}">{{ $main_cat->name_mm }}</a>
                                @elseif(app()->getLocale() == 'ch')
                                    <a href="{{ url('/ch/category') . '/' . $main_cat->url_slug }}">{{ $main_cat->name_ch }}</a>
                                @elseif(app()->getLocale() == 'ta')
                                    <a href="{{ url('/ta/category') . '/' . $main_cat->url_slug }}">{{ $main_cat->name_ta }}</a>
                                @elseif(app()->getLocale() == 'en')
                                    <a href="{{ url('/en/category') . '/' . $main_cat->url_slug }}">{{ $main_cat->name_en }}</a>
                                @endif

                            </li>
                        @endif
                        <li class="breadcrumb-item active" aria-current="page">
                            @if (Route::currentRouteName() == 'main_categories.sub_pages' || Route::currentRouteName() == 'main_categories.sub_pages.lang' || Route::currentRouteName() == 'sub_pages' || Route::currentRouteName() == 'sub_pages.lang')
                                @if (app()->getLocale() == 'mm')
                                    {{ $sub_cat->name_mm }}
                                @elseif(app()->getLocale() == 'ch')
                                    {{ $sub_cat->name_ch }}
                                @elseif(app()->getLocale() == 'ta')
                                    {{ $sub_cat->name_ta }}
                                @elseif(app()->getLocale() == 'en')
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
            <div class="col-lg-8 col-md-6 ps-lg-0 pe-lg-4 pe-md-2">
                <div class="row gx-4">
                    @if (count($posts) >0)
                        @foreach ($posts as $ten)
                            @if($ten->lang == app()->getLocale())
                                <div class="col-lg-6 mb-3 pb-3 border-bottom">
                                    <h6>
                                        @if (Route::currentRouteName() == 'main_categories.sub_pages' || Route::currentRouteName() == 'main_categories.sub_pages.lang' || Route::currentRouteName() == 'sub_pages' || Route::currentRouteName() == 'sub_pages.lang')
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/category') . '/' . $ten->category->url_slug . '/' . $ten->id }}">{{ $ten->title_mm }}</a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/category') . '/' . $ten->category->url_slug . '/' . $ten->id }}">{{ $ten->title_ch }}</a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/category') . '/' . $ten->category->url_slug . '/' . $ten->id }}">{{ $ten->title_ta }}</a>
                                            @elseif(app()->getLocale() == 'en')
                                                <a href="{{ url('/en/category') . '/' . $ten->category->url_slug . '/' . $ten->id }}">{{ $ten->title_en }}</a>
                                            @endif
                                        @else
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm') . '/' . $sub_cat[0] . '/' . $ten->id }}">{{ $ten->title_mm }}</a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch') . '/' . $sub_cat[0] . '/' . $ten->id }}">{{ $ten->title_ch }}</a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta') . '/' . $sub_cat[0] . '/' . $ten->id }}">{{ $ten->title_ta }}</a>
                                            @elseif(app()->getLocale() == 'en')
                                                <a href="{{ url('/en') . '/' . $sub_cat[0] . '/' . $ten->id }}">{{ $ten->title_en }}</a>
                                            @endif
                                        @endif
                                    </h6>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-10 col-10">
                                            @if (Route::currentRouteName() == 'main_categories.sub_pages' || Route::currentRouteName() == 'main_categories.sub_pages.lang' || Route::currentRouteName() == 'sub_pages' || Route::currentRouteName() == 'sub_pages.lang')
                                                <span class="category">
                                                    @if (app()->getLocale() == 'mm')
                                                        {{ $latest->category->name_mm }}
                                                    @elseif(app()->getLocale() == 'ch')
                                                        {{ $latest->category->name_ch }}
                                                    @elseif(app()->getLocale() == 'ta')
                                                        {{ $latest->category->name_ta }}
                                                    @elseif(app()->getLocale() == 'en')
                                                        {{ $latest->category->name_en }}
                                                    @endif

                                                </span>
                                            @endif
                                            <div class="overflow-hidden">
                                                @if (Route::currentRouteName() == 'main_categories.sub_pages' || Route::currentRouteName() == 'main_categories.sub_pages.lang' || Route::currentRouteName() == 'sub_pages' || Route::currentRouteName() == 'sub_pages.lang')
                                                    @if (app()->getLocale() == 'mm')
                                                        <a href="{{ url('/mm/category') . '/' . $ten->category->url_slug . '/' . $ten->id }}">
                                                            <img src="/storage/images/thumbnail/{{ $ten->img_link }}" alt="image" width="100%">
                                                        </a>
                                                    @elseif(app()->getLocale() == 'ch')
                                                        <a href="{{ url('/ch/category') . '/' . $ten->category->url_slug . '/' . $ten->id }}">
                                                            <img src="/storage/images/thumbnail/{{ $ten->img_link }}" alt="image" width="100%">
                                                        </a>
                                                    @elseif(app()->getLocale() == 'ta')
                                                        <a href="{{ url('/ta/category') . '/' . $ten->category->url_slug . '/' . $ten->id }}">
                                                            <img src="/storage/images/thumbnail/{{ $ten->img_link }}" alt="image" width="100%">
                                                        </a>
                                                    @elseif(app()->getLocale() == 'en')
                                                        <a href="{{ url('/en/category') . '/' . $ten->category->url_slug . '/' . $ten->id }}">
                                                            <img src="/storage/images/thumbnail/{{ $ten->img_link }}" alt="image" width="100%">
                                                        </a>
                                                    @endif
                                                @else
                                                    @if (app()->getLocale() == 'mm')
                                                        <a href="{{ url('/mm') . '/' . $sub_cat[0] . '/' . $ten->id }}">
                                                            <img src="/storage/images/thumbnail/{{ $ten->img_link }}" alt="image" width="100%">
                                                        </a>
                                                    @elseif(app()->getLocale() == 'ch')
                                                        <a href="{{ url('/ch') . '/' . $sub_cat[0] . '/' . $ten->id }}">
                                                            <img src="/storage/images/thumbnail/{{ $ten->img_link }}" alt="image" width="100%">
                                                        </a>
                                                    @elseif(app()->getLocale() == 'ta')
                                                        <a href="{{ url('/ta') . '/' . $sub_cat[0] . '/' . $ten->id }}">
                                                            <img src="/storage/images/thumbnail/{{ $ten->img_link }}" alt="image" width="100%">
                                                        </a>
                                                    @elseif(app()->getLocale() == 'en')
                                                        <a href="{{ url('/en') . '/' . $sub_cat[0] . '/' . $ten->id }}">
                                                            <img src="/storage/images/thumbnail/{{ $ten->img_link }}" alt="image" width="100%">
                                                        </a>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-10 ">
                                            <p>
                                                {!! $ten->short_desc !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="">{{ $posts->appends(Request::all())->links() }}</div>
                    @else
                        <div class="col-12 card p-3 text-center">No Content Available</div>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-6 top mt-5 mt-md-1 mt-lg-1">
                <div class="row current text-white d-flex align-items-center rounded-top">
                    <span><p class="fw-bold">{{ __('language.most_read') }}</p></span>
                    <h4>{{ \Carbon\Carbon::now()->format('d F Y') }}</h4>
                </div>
                <div class="row">
                    <div class="col-12">
                        @foreach ($mostViews as $key => $itemFive)
                            <div class="row py-2 top-ten d-flex align-items-center">
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
                                        @elseif(app()->getLocale() == 'ch')
                                            <a href="{{ url('/ta/category') . '/' . $itemFive->category->url_slug . '/' . $itemFive->id }}" >
                                                <img src=" {{ asset('storage/images/thumbnail') . '/' . $itemFive->img_link }}" alt="image" width="100%" class="rounded">
                                            </a>
                                        @elseif(app()->getLocale() == 'en')
                                            <a href="{{ url('/en/category') . '/' . $itemFive->category->url_slug . '/' . $itemFive->id }}" >
                                                <img src=" {{ asset('storage/images/thumbnail') . '/' . $itemFive->img_link }}" alt="image" width="100%" class="rounded">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-9 col-8">
                                    <h6>
                                        @if (app()->getLocale() == 'mm')
                                            <a href="{{ url('/mm/category') . '/' . $itemFive->category->url_slug . '/' . $itemFive->id }}" >{{ $itemFive->title }}</a>
                                        @elseif(app()->getLocale() == 'ch')
                                            <a href="{{ url('/ch/category') . '/' . $itemFive->category->url_slug . '/' . $itemFive->id }}" >{{ $itemFive->title }}</a>
                                        @elseif(app()->getLocale() == 'ch')
                                            <a href="{{ url('/ta/category') . '/' . $itemFive->category->url_slug . '/' . $itemFive->id }}" >{{ $itemFive->title }}</a>
                                        @elseif(app()->getLocale() == 'en')
                                            <a href="{{ url('/en/category') . '/' . $itemFive->category->url_slug . '/' . $itemFive->id }}" >{{ $itemFive->title }}</a>
                                        @endif
                                    </h6>
                                </div>
                                <div class="col-12 d-flex align-items-center">
                                    <span><i class="fa-solid fa-eye me-2" style="color:#575757"></i> {{ $itemFive->views }}</span>
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
