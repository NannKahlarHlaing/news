@extends('frontend.index')

@section('content')
<section class="video_details py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-12 my-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cartoon</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-12">
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
                    <div class="mb-3">
                        <span><i class="fa-solid fa-clock"></i> {{ $post->created_at->format('d F Y') }} </span>
                    </div>
                    <div class="col-md-12 mb-3">
                        <img src="{{ asset('storage/images/original') . '/' . $post->img_link }}" alt="image">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(URL::current()) }}" class="btn btn-fb btn-circle me-3">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text={{ urlencode(URL::current()) }}&url={{ urlencode(URL::current()) }}" class="btn btn-tw btn-circle me-3">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(URL::current()) }}" class="btn btn-li btn-circle me-3">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                </div>
                                {{-- <div class="col-12">
                                    @if (app()->getLocale() == 'mm')
                                        <span>{!! str_replace("\n", '', $post->desc_mm) !!}</span>
                                    @elseif(app()->getLocale() == 'ch')
                                        <span>{!! str_replace("\n", '', $post->desc_ch) !!}</span>
                                    @else
                                        <span>{!! str_replace("\n", '', $post->desc_en) !!}</span>
                                    @endif
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="border-bottom border-white">
                                        <p class="card-text">Related Posts</p>
                                    </h4>
                                </div>
                                <div class="row">
                                    @foreach ($relatedPosts as $related)
                                        <div class="col-md-12 py-1">
                                            <h6><a href="" >
                                                @if (app()->getLocale() == 'mm')
                                                    {{ $related->title_mm }}
                                                @elseif(app()->getLocale() == 'ch')
                                                    {{ $related->title_ch }}
                                                @else
                                                    {{ $related->title_en }}
                                                @endif
                                                </a></h6>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
