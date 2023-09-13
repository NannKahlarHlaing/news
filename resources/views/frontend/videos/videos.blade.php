@extends('frontend.index')

@section('content')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" type="text/css" href="https://codepen.io/fancyapps/pen/Kxdwjj.css">
    <style>
        .last-photos .card{
        background-color: #242423;
        border-radius: 0;
        }
        .last-photos .col-lg-3 {
            padding: 0;
        }
        .video-page .card{
            border-radius: 0 !important;
            border: 0;
        }
        .last-photos .card-text{
            color: #fff;
        }
</style>
@endsection
<section class="video-page py-5">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <a data-fancybox href="{{ $latest->video_url }}" >
                          <img class="card-img-top img-fluid" src="{{ asset('/storage/images/original/') . '/' . $latest->img_url }}" />
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-2 col-md-3 col-2 text-center">
                            <div class="col-12 mb-2">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(URL::current()) }}" >
                                    <i class="fa-brands fa-square-facebook"></i>
                                </a>
                            </div>
                            <div class="col-12 mb-2">
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode(URL::current()) }}&url={{ urlencode(URL::current()) }}">
                                    <i class="fa-brands fa-square-twitter"></i>
                                </a>
                            </div>
                            <div class="col-12">
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(URL::current()) }}">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-9 col-10">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="border-bottom border-white pb-3">
                                        <a href="{{ url('/videos') . '/' . $latest->id }}">
                                            @if (app()->getLocale() == 'mm')
                                            <a href="{{ url('/mm/videos') . '/' . $latest->id }}" >{{ $latest->title_mm }}</a>
                                        @elseif(app()->getLocale() == 'ch')
                                            <a href="{{ url('/ch/videos') . '/' . $latest->id }}" >{{ $latest->title_ch }}</a>
                                        @else
                                            <a href="{{ url('/videos') . '/' . $latest->id }}" >{{ $latest->title_en }}</a>
                                        @endif
                                        </a>
                                    </h2>
                                </div>
                            </div>
                            <span class="d-block py-3">{{ $latest->created_at->format('d F Y') }}</span>
                            <div class="row">
                                @if (app()->getLocale() == 'mm')
                                    {!! str_replace("\n", '', $latest->desc_mm) !!}
                                @elseif(app()->getLocale() == 'ch')
                                    {!! str_replace("\n", '', $latest->desc_ch) !!}
                                @else
                                    {!! str_replace("\n", '', $latest->desc_en) !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="last-photos">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-12">
                <div class="row d-flex align-items-center my-3">
                    <div class="col-md-3 col-6">
                        <select class="btn btn-secondary" name="categories" id="categories">
                            <option value=""> Pick A Channel</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">
                                    @if (app()->getLocale() == 'mm')
                                        {{ $item->name_mm }}
                                    @elseif(app()->getLocale() == 'ch')
                                        {{ $item->name_ch }}
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
                    <div class="col-md-3">
                        @if (session()->get('locale') == 'mm')
                            <form class="d-flex" id="search-form" action="{{ url('/mm/videos/search') }}" method="GET">
                                @csrf
                                <input class="form-control me-2 search-input text-white" type="search" placeholder="Search Videos..." aria-label="Search" name="search">
                                <button type="submit" class="btn btn-danger">Search</button>
                            </form>
                        @elseif (session()->get('locale') == 'ch')
                            <form class="d-flex" id="search-form" action="{{ url('/ch/videos/search') }}" method="GET">
                                @csrf
                                <input class="form-control me-2 search-input text-white" type="search" placeholder="Search Videos..." aria-label="Search" name="search">
                                <button type="submit" class="btn btn-danger">Search</button>
                            </form>
                        @else
                            <form class="d-flex" id="search-form" action="{{ url('/videos/search') }}" method="GET">
                                @csrf
                                <input class="form-control me-2 search-input text-white" type="search" placeholder="Search Videos..." aria-label="Search" name="search">
                                <button type="submit" class="btn btn-danger">Search</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="post_container">
            @foreach ($posts as $item)
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card">
                        <a data-fancybox href="{{ $item->video_url }}" >
                        <img class="card-img-top img-fluid" src=" {{ asset('/storage/images/thumbnail') . '/' . $item->img_url }}" />
                        </a>
                        <div class="card-body">
                            <p class="card-text">
                                @if (app()->getLocale() == 'mm')
                                    {{ $item->title_mm }}
                                @elseif(app()->getLocale() == 'ch')
                                    {{ $item->title_ch }}
                                @else
                                    {{ $item->title_en }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-12 text-center" id="pagination">
                    <div class="">{{ $posts->appends(Request::all())->links() }}</div>
                </div>
            </div>
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
            $cat_id = $('#categories').val();

            $.ajax({
                url: '{{ route('getVideosByCategory') }}',
                method: 'GET',
                data: { 'id': $cat_id },
                success: function(response){
                    console.log(response);
                    $('#post_container').empty();
                    const responseLength = response.data.length;
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
