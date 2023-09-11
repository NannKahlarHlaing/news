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
                    <div class="col-md-3 mb-3 py-3 border-bottom">
                        <h5>
                            @if ($route == 'post_search')
                                <a href="{{ url('/category') . '/' . $post->category->name_en . '/' . $post->id }}">
                            @else
                                <a href="{{ url('/videos') . '/' . $post->id }}">
                            @endif

                            @if (app()->getLocale() == 'mm')
                                {{ $post->title_mm }}
                            @elseif(app()->getLocale() == 'ch')
                                {{ $post->title_ch }}
                            @else
                                {{ $post->title_en }}
                            @endif
                        </a>
                        </h5>
                        <div class="row">
                            <div class="col-lg-12 col-md-10 col-10">
                                <span class="category">
                                    @if (app()->getLocale() == 'mm')
                                        {{ $post->category->name_mm }}
                                    @elseif(app()->getLocale() == 'ch')
                                        {{ $post->category->name_ch }}
                                    @else
                                        {{ $post->category->name_en }}
                                    @endif
                                </span>
                                <img src="{{ asset('storage/images/thumbnail') . '/' . $post->img_url }}" alt="image" width="100%">
                            </div>
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <span>BY THE VWXYZ Online</span>
                                @if ($route == 'post_search')
                                    <p>
                                        @if (app()->getLocale() == 'mm')
                                        {!! $post->short_desc_mm !!}

                                        @elseif(app()->getLocale() == 'ch')
                                        {!! $post->short_desc_ch !!}
                                        @else
                                        {!! $post->short_desc_en !!}
                                        @endif
                                    </p>
                                @else
                                <p>
                                    @if (app()->getLocale() == 'mm')
                                    {!! $post->desc_mm !!}

                                    @elseif(app()->getLocale() == 'ch')
                                    {!! $post->desc_ch !!}
                                    @else
                                    {!! $post->desc_en !!}
                                    @endif
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 card p-3 text-center">No Content Available</div>
            @endif


            {{-- {{ $posts->appends(Request::all())->links() }} --}}
        </div>
    </div>
</section>
@endsection
