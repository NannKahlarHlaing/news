@extends('frontend.index')

@section('content')
    <div class="container-fluid">
        <div class="row d-flex-center my-5">
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-3">
                        sidebar
                    </div>
                    <div class="col-md-9">
                        <div class="row mb-5">
                            <div class="col-12">
                                <span class="d-none" id="id">{{ $post->id }}</span>
                                <span>{{ $post->category->name }}</span>
                                <h2>
                                    @if (app()->getLocale() == 'mm')
                                        {{ $post->title_mm }}
                                    @elseif(app()->getLocale() == 'ch')
                                        {{ $post->title_ch }}
                                    @else
                                    {{ $post->title_en }}
                                    @endif
                                </h2>
                            </div>
                            <div class="col-12">
                                <img src="{{ $post->img_link }}" alt="" width="100%" height="400px" style="object-fit: cover">
                                <div class="row my-3  d-flex align-items-center">
                                    <div class="col-1">
                                        <div class="btn btn-transparent  btn-circle-fe">
                                            <i class="fa-solid fa-camera"></i>
                                        </div>
                                    </div>
                                    <hr class="line col">
                                    <span class="text-end col">Daik-U Prison as seen on Google Maps</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 social" id="social">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="btn btn-transparent  btn-circle-fe mb-2">
                                            <i class="fa-regular fa-comment-dots"></i>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="btn btn-transparent  btn-circle-fe ">
                                            <i class="fa-regular fa-eye"></i>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="btn border-bottom mb-2">
                                            <span id="views">{{ $post->views }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(URL::current()) }}" class="btn btn-fb btn-circle mb-2">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a href="https://twitter.com/intent/tweet?text={{ urlencode(URL::current()) }}&url={{ urlencode(URL::current()) }}" target="_blank" rel="noopener" class="btn btn-tw btn-circle mb-2">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        {{-- <script type="IN/Share" data-url="{{ URL::current() }}"><i class="fa-brands fa-linkedin-in"></i></script> --}}
                                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(URL::current()) }}" target="_blank" class="btn btn-li btn-circle mb-2">
                                            <i class="fa-brands fa-linkedin-in"></i>
                                          </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-10">
                                <h6>BY <a href="" class="tex-dark fw-bold me-3">The VWXYZ Online</a><span>{{ date('d F Y', strtotime($post->created_at)) }}</span></h6>
                                <p>
                                    @if (app()->getLocale() == 'mm')
                                        {!! str_replace("\n", '', $post->desc_mm) !!}
                                    @elseif(app()->getLocale() == 'ch')
                                        {!! str_replace("\n", '', $post->desc_ch) !!}
                                    @else
                                        {!! str_replace("\n", '', $post->desc_en) !!}
                                    @endif
                                </p>
                                <div class="col-12 mb-4"><strong>Topics:</strong>
                                    @if (app()->getLocale() == 'mm')
                                        {{ $post->topic_mm }}
                                    @elseif(app()->getLocale() == 'ch')
                                        {{ $post->topic_ch }}
                                    @else
                                    {{ $post->topic_en }}
                                    @endif
                                </div>
                                <div class="col-12">
                                    <div class="card py-2">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-2">
                                                <img src="{{ asset('/images/logo.png') }}" alt="" width="130px">
                                            </div>
                                            <div class="col-md-3">
                                                The VWXYZ Online
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row my-3  d-flex align-items-center">
                                        <div class="col-1">
                                            <div class="btn btn-transparent  btn-circle-fe">
                                                <i class="fa-solid fa-camera"></i>
                                            </div>
                                        </div>
                                        <hr class="line col">
                                        <span class="text-end col">YOUR THOUGHTS …</span>
                                        <div class="btn btn-reaction mb-2">
                                            <img src="{{ asset('/images/liked.svg') }}" alt="">
                                        </div>
                                        <div class="btn btn-reaction mb-2">
                                            <img src="{{ asset('/images/loved.svg') }}" alt="">
                                        </div>
                                        <div class="btn btn-reaction mb-2">
                                            <img src="{{ asset('/images/wow.svg') }}" alt="">
                                        </div>
                                        <div class="btn btn-reaction mb-2">
                                            <img src="{{ asset('/images/sad.svg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0" nonce="YOUR_NONCE_VALUE"></script>

<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

<script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>

<script>
    $(document).ready(function(){
        var value = $('#views').html();
        var id = $('#id').html();
        $.ajax({
            url: '{{ route('new_views_count') }}',
            method: 'GET',
            data: {value: value, id: id},
            success: function(response){
                $('#views').html(response);
            },
            error: function(xhr, status, error) {
                console.log('error' + error);
            }
        });
    });
</script>

@endsection
