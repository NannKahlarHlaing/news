@extends('frontend.index')

@section('content')
<section class="py-5">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-12 my-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Search
                            {{-- @if (app()->getLocale() == 'mm')
                                {{ $post->title_mm }}
                            @elseif(app()->getLocale() == 'ch')
                                {{ $post->title_ch }}
                            @else
                                {{ $post->title_en }}
                            @endif --}}
                    </li>
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
                            <a href="{{ url('/category') . '/' . $post->category->name_en . '/' . $post->id }}">
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
                                <img src="/storage/images/thumbnail/{{ $post->img_link }}" alt="image" width="100%">
                            </div>
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <span>BY THE VWXYZ Online</span>
                                <P>
                                    @if (app()->getLocale() == 'mm')
                                    {!! \Illuminate\Support\Str::limit(str_replace("\n", '', $post->short_desc_mm), 100) !!}

                                    @elseif(app()->getLocale() == 'ch')
                                    {!! \Illuminate\Support\Str::limit(str_replace("\n", '', $post->short_desc_ch), 100) !!}
                                    @else
                                    {!! \Illuminate\Support\Str::limit(str_replace("\n", '', $post->short_desc_en), 100) !!}
                                    @endif
                                </P>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 card p-3 text-center">No Content Available</div>
            @endif


            {{ $posts->appends(Request::all())->links() }}
        </div>
    </div>
</section>
@endsection
