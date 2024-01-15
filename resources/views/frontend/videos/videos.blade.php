@extends('frontend.index')

@section('content')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" type="text/css" href="https://codepen.io/fancyapps/pen/Kxdwjj.css">
    <style>
        .last-photos{
            background-color: var(--color-gray) !important;
        }
        .last-photos .card{
        background-color: #242423;
        /* border-radius: 0; */
        border: 0;
        }
        .last-photos .col-lg-3 {
            padding: 0;
        }
        .video-page .card{
            border-radius: 0 !important;
            border: 0;
        }
        .last-photos .card-text{
            color: var(--font-color);
        }

        .filter .search-input::placeholder{
            color: var(--color-gray) !important;
        }
        .filter .search-input{
            border-color: var(--color-gray) !important;
        }
</style>
@endsection
<section class="video-page py-5">
    <div class="container-fluid">
        <div class="row d-flex-center">
            @foreach ($latestVideos as $latest)
                @if($latest->lang == app()->getLocale())
                    <div class="col-md-12">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="card overflow-hidden">
                                <a data-fancybox href="{{ $latest->video_url }}" >
                                <img class="card-img-top img-fluid" src="{{ asset('/storage/images/original/') . '/' . $latest->img_url }}" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-2 text-center">
                                    <div class="col-12 mb-2">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(URL::current()) }}" title="Share on Facebook">
                                            <i class="fa-brands fa-square-facebook"></i>
                                        </a>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <a href="https://twitter.com/intent/tweet?text={{ urlencode(URL::current()) }}&url={{ urlencode(URL::current()) }}" title="Share on Twitter">
                                            <i class="fa-brands fa-square-twitter"></i>
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(URL::current()) }}" title="Share on LinkedIn">
                                            <i class="fa-brands fa-linkedin"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-9 col-10">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="border-bottom border-color pb-3">
                                                @if (app()->getLocale() == 'mm')
                                                    <a href="{{ url('/mm/videos') . '/' . $latest->id }}" >{{ $latest->title }}</a>
                                                @elseif(app()->getLocale() == 'ch')
                                                    <a href="{{ url('/ch/videos') . '/' . $latest->id }}" >{{ $latest->title }}</a>
                                                @elseif(app()->getLocale() == 'ta')
                                                    <a href="{{ url('/ta/videos') . '/' . $latest->id }}" >{{ $latest->title }}</a>
                                                @else
                                                    <a href="{{ url('/videos') . '/' . $latest->id }}" >{{ $latest->title }}</a>
                                                @endif
                                            </h2>
                                        </div>
                                    </div>
                                    <span class="d-block py-3">{{ $latest->created_at->format('d F Y') }}</span>
                                    <div class="row">
                                        {!! $latest->desc !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
<section class="bg-sec">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="row d-flex align-items-center my-3">
                <div class="col-md-3 col-6">
                    <select class="btn btn-gray" name="categories" id="categories">
                        <option value="">{{ __('language.pick_a_channel') }}</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">
                                @if (app()->getLocale() == 'mm')
                                    {{ $item->name_mm }}
                                @elseif(app()->getLocale() == 'ch')
                                    {{ $item->name_ch }}
                                @elseif(app()->getLocale() == 'ta')
                                    {{ $item->name_ta }}
                                @else
                                    {{ $item->name_en }}
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 col-6">
                    <h2 class="text-center">FILTERS</h2>
                </div>
                <div class="col-md-3 filter">
                    @if (session()->get('locale') == 'mm')
                        <form class="d-flex" id="search-form" action="{{ url('/mm/videos/search') }}" method="GET">
                            @csrf
                            <input class="form-control me-2 search-input text-white" type="search" placeholder="Search Videos..." aria-label="Search" name="search">
                            <button type="submit" class="btn btn-gray">Search</button>
                        </form>
                    @elseif (session()->get('locale') == 'ch')
                        <form class="d-flex" id="search-form" action="{{ url('/ch/videos/search') }}" method="GET">
                            @csrf
                            <input class="form-control me-2 search-input text-white" type="search" placeholder="Search Videos..." aria-label="Search" name="search">
                            <button type="submit" class="btn btn-gray">Search</button>
                        </form>
                    @elseif (session()->get('locale') == 'ta')
                        <form class="d-flex" id="search-form" action="{{ url('/ta/videos/search') }}" method="GET">
                            @csrf
                            <input class="form-control me-2 search-input text-white" type="search" placeholder="Search Videos..." aria-label="Search" name="search">
                            <button type="submit" class="btn btn-gray">Search</button>
                        </form>
                    @elseif (session()->get('locale') == 'en')
                        <form class="d-flex" id="search-form" action="{{ url('/en/videos/search') }}" method="GET">
                            @csrf
                            <input class="form-control me-2 search-input text-white" type="search" placeholder="Search Videos..." aria-label="Search" name="search">
                            <button type="submit" class="btn btn-gray">Search</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<section class="last-photos py-3">
    <div class="container-fluid">
        <div class="row" id="post_container">
            @if (count($posts) > 0)
                @foreach ($posts as $item)
                    @if($item->lang == app()->getLocale())
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card">
                                <a data-fancybox href="{{ $item->video_url }}" >
                                <img class="card-img-top img-fluid" src=" {{ asset('/storage/images/thumbnail') . '/' . $item->img_url }}" />
                                </a>
                                <div class="card-body">
                                    <p class="card-text">
                                        {{ $item->title }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="row">
                    <div class="col-12 text-center" id="pagination">
                        <div class="">{{ $posts->appends(Request::all())->links() }}</div>
                    </div>
                </div>
            @else
                <div class="col-12 mt-3 card p-3 text-center">No Content Available</div>
            @endif

        </div>

    </div>
</section>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0" nonce="YOUR_NONCE_VALUE"></script>

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

<script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
<script>

    $(document).ready(function(){

        $('#categories').on('change', function(event){
            event.preventDefault();
            cat_id = $('#categories').val();
            $.ajax({
                url: '{{ route('getVideosByCategory') }}',
                method: 'GET',
                data: { 'id': cat_id },
                success: function(response){
                    $('#post_container').empty();
                    responseLength = response.data.length;
                    if (responseLength > 0) {
                        response.data.forEach(video => {
                            const card = `
                                <div class="col-lg-3 mb-3">
                                    <div class="card">
                                        <a data-fancybox href="${video.video_url}">
                                            <img class="card-img-top img-fluid" src="/storage/images/original/${video.img_url}" />
                                        </a>
                                        <div class="card-body">
                                            <p class="card-text">${video.title_en}</p>
                                        </div>
                                    </div>
                                </div>
                            `;
                            $('#post_container').append(card);
                            $('#pagination').empty();
                            $('#pagination').html(response.pagination);
                        });
                    } else {
                        const card = `<div class="card p-3 text-center text-white fw-bold">"There is no search result"</div>`;
                        $('#post_container').append(card);
                    }
                }
            });
        })
    })

</script>
@endsection
