@extends('frontend.index')

@section('content')
<section class="py-5">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-12 my-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Search</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12"><h3>Search Resluts for '{{ $search }}'</h3></div>
        </div>
        <div class="row">
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    @if($post->lang == app()->getLocale())
                        <div class="col-md-3 mb-3 py-3 border-bottom">
                            <h6 class="mb-2">
                                @if ($route == 'post_search')
                                    @if (app()->getLocale() == 'mm')
                                        <a href="{{ url('/mm/category') . '/' . $post->category->url_slug . '/' . $post->id }}">{{ $post->title }}</a>
                                    @elseif(app()->getLocale() == 'ch')
                                        <a href="{{ url('/ch/category') . '/' . $post->category->url_slug . '/' . $post->id }}">{{ $post->title }}</a>
                                    @elseif(app()->getLocale() == 'ta')
                                        <a href="{{ url('/ta/category') . '/' . $post->category->url_slug . '/' . $post->id }}">{{ $post->title }}</a>
                                    @elseif(app()->getLocale() == 'en')
                                        <a href="{{ url('/en/category') . '/' . $post->category->url_slug . '/' . $post->id }}">{{ $post->title }}</a>
                                    @endif
                                @else
                                    @if (app()->getLocale() == 'mm')
                                        <a href="{{ url('/mm/videos') . '/' . $post->id }}">{{ $post->title }}</a>
                                    @elseif(app()->getLocale() == 'ch')
                                        <a href="{{ url('/ch/videos') . '/' . $post->id }}">{{ $post->title }}</a>
                                    @elseif(app()->getLocale() == 'ta')
                                        <a href="{{ url('/ta/videos') . '/' . $post->id }}">{{ $post->title }}</a>
                                    @elseif(app()->getLocale() == 'en')
                                        <a href="{{ url('/en/videos') . '/' . $post->id }}">{{ $post->title }}</a>
                                    @endif
                                @endif
                            </h6>
                            <div class="row">
                                <div class="col-lg-12 col-md-10 col-10">
                                    <div class="overflow-hidden">
                                        <span class="category">
                                            @if (app()->getLocale() == 'mm')
                                                {{ $post->category->name_mm }}
                                            @elseif(app()->getLocale() == 'ch')
                                                {{ $post->category->name_ch }}
                                            @elseif(app()->getLocale() == 'ta')
                                                {{ $post->category->name_ta }}
                                            @elseif(app()->getLocale() == 'en')
                                                {{ $post->category->name_en }}
                                            @endif
                                        </span>
                                        @if ($route == 'post_search')
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/category') . '/' . $post->category->url_slug . '/' . $post->id }}"><img src="{{ asset('storage/images/thumbnail') . '/' . $post->img_link }}" alt="image" width="100%"></a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/category') . '/' . $post->category->url_slug . '/' . $post->id }}"><img src="{{ asset('storage/images/thumbnail') . '/' . $post->img_link }}" alt="image" width="100%"></a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/category') . '/' . $post->category->url_slug . '/' . $post->id }}"><img src="{{ asset('storage/images/thumbnail') . '/' . $post->img_link }}" alt="image" width="100%"></a>
                                            @elseif(app()->getLocale() == 'en')
                                                <a href="{{ url('/en/category') . '/' . $post->category->url_slug . '/' . $post->id }}"><img src="{{ asset('storage/images/thumbnail') . '/' . $post->img_link }}" alt="image" width="100%"></a>
                                            @endif

                                        @else
                                            @if (app()->getLocale() == 'mm')
                                                <a href="{{ url('/mm/videos') . '/' . $post->id }}"><img src="{{ asset('storage/images/thumbnail') . '/' . $post->img_url }}" alt="image" width="100%"></a>
                                            @elseif(app()->getLocale() == 'ch')
                                                <a href="{{ url('/ch/videos') . '/' . $post->id }}"><img src="{{ asset('storage/images/thumbnail') . '/' . $post->img_url }}" alt="image" width="100%"></a>
                                            @elseif(app()->getLocale() == 'ta')
                                                <a href="{{ url('/ta/videos') . '/' . $post->id }}"><img src="{{ asset('storage/images/thumbnail') . '/' . $post->img_url }}" alt="image" width="100%"></a>
                                            @elseif(app()->getLocale() == 'en')
                                                <a href="{{ url('/en/videos') . '/' . $post->id }}"><img src="{{ asset('storage/images/thumbnail') . '/' . $post->img_url }}" alt="image" width="100%"></a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 ">
                                    @if ($route == 'post_search')
                                        <p class="mt-1">
                                            {!! $post->short_desc !!}
                                        </p>
                                    @else
                                        <p class="mt-1">
                                            {!! $post->desc !!}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                <div class="">
                    {{ $posts->appends(Request::all())->links() }}
                </div>
            @else
                <div class="col-12 card p-3 text-center">No Content Available</div>
            @endif

        </div>
    </div>
</section>
@endsection
