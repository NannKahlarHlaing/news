@extends('frontend.index')

@section('content')
<section class="video_details py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 my-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('language.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('language.videos') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12">
                <h2>
                    {{ $post->title }}
                </h2>
            </div>
            <div class="mb-3">
                <span><i class="fa-solid fa-clock"></i> {{ $post->created_at->format('d F Y') }} </span>
            </div>
            <div class="row">
                <div class="col-md-7 mb-3">
                    <iframe width="100%" height="400px" src="https://www.youtube.com/embed/2WFBq-EaI9Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <span>{!!$post->desc !!}</span>
                                </div>
                                <div class="col-md-6 mb-3 text-end">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(URL::current()) }}" class="me-3" title="Share on Facebook">
                                        <i class="fa-brands fa-square-facebook"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text={{ urlencode(URL::current()) }}&url={{ urlencode(URL::current()) }}" class="me-3" title="Share on Twitter">
                                        <i class="fa-brands fa-square-twitter"></i>
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(URL::current()) }}" title="Share on LinkedIn">
                                        <i class="fa-brands fa-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-5 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="border-bottom border-white pb-2">{{ __('language.related_posts') }}</h4>
                        </div>
                        <div class="row related">
                            @foreach ($relatedPosts as $related)
                                <div class="col-md-12 py-1">
                                    <h6>
                                        @if (app()->getLocale() == 'mm')
                                            <a href="{{ url('/mm/videos') . '/' . $related->id }}" >{{ $related->title }}</a>
                                        @elseif(app()->getLocale() == 'ch')
                                            <a href="{{ url('/ch/videos') . '/' . $related->id }}" >{{ $related->title }}</a>
                                        @elseif(app()->getLocale() == 'ta')
                                            <a href="{{ url('/ta/videos') . '/' . $related->id }}" >{{ $related->title }}</a>
                                        @elseif(app()->getLocale() == 'en')
                                            <a href="{{ url('/en/videos') . '/' . $related->id }}" >{{ $related->title }}</a>
                                        @endif
                                    </h6>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
