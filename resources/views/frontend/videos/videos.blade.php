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
                        <div class="col-lg-2 col-md-3 col-2">
                            <div class="col-12">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(URL::current()) }}" class="btn btn-fb btn-circle mb-2">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </div>
                            <div class="col-12">
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode(URL::current()) }}&url={{ urlencode(URL::current()) }}" class="btn btn-tw btn-circle mb-2">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </div>
                            <div class="col-12">
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(URL::current()) }}" class="btn btn-li btn-circle mb-2">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-9 col-10">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="border-bottom border-white">
                                        <a href="#">
                                            <p class="card-text">
                                                @if (app()->getLocale() == 'mm')
                                                    {{ $latest->title_mm }}
                                                @elseif(app()->getLocale() == 'ch')
                                                    {{ $latest->title_ch }}
                                                @else
                                                    {{ $latest->title_en }}
                                                @endif
                                            </p>
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
<section class="last-photos py-3">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-12">
                <h2 class="text-center">LATEST VIEWING</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($recents as $item)
                <div class="col-lg-3">
                    <div class="card">
                        <a data-fancybox href="{{ $item->video_url }}" >
                            <img class="card-img-top img-fluid" src="/storage/images/original/{{ $item->img_url }}" alt=""/>
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
        </div>
    </div>
</section>
<section class="last-photos">
    <div class="container-fluid">
        <div class="row d-flex-center">
            <div class="col-12">
                <div class="row my-3">
                    <div class="col-3">
                        {{-- <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                              Pick A Channel
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                @foreach ($categories as $item)
                                    <li><a class="dropdown-item">{{ $item->name_en }}</a></li>
                                @endforeach
                            </ul>
                        </div> --}}
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
                    <div class="col-6">
                        <h2 class="text-center">FILTERS</h2>
                    </div>
                    <div class="col-3">
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
                <div class="col-lg-3 mb-3">
                    <div class="card">
                        <a data-fancybox href="{{ $item->video_url }}" >
                        <img class="card-img-top img-fluid" src="/storage/images/original/{{ $latest->img_url }}" />
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
        </div>
        <div class="row py-5">
            <div class="col-12 text-center">
                <button class="btn btn-danger">View All Videos</button>
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
          // Attach click event to single image
        // document.getElementById("singleImage").addEventListener("click", function() {
        //     // Open the carousel modal
        //     $('#carouselModal').modal('show');
        // });
        // //  Set caption from card text
        // $('.card-deck a').fancybox({
        //     caption : function( instance, item ) {
        //     return $(this).parent().find('.card-text').html();
        //     }
        // });

        $('#categories').on('change', function(event){
            event.preventDefault();
            $cat_id = $('#categories').val();

            $.ajax({
                url: '{{ route('getVideosByCategory') }}',
                method: 'GET',
                data: { 'id': $cat_id },
                success: function(response){
                    // console.log(response);
                    $('#post_container').empty();
                    if (response.length > 0) {
                        response.forEach(video => {
                            $.each(response, function(index, video) {
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
                            });
                        });
                    }else{
                        const card=`<div class="card p-3 text-center text-white fw-bold">"There is no search result"</div>`;
                        $('#post_container').append(card);
                    }
                }
            });

        })

    })


</script>
@endsection
