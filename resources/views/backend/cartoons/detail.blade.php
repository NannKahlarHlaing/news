@extends('frontend.index')

@section('content')
<section class="video_details py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 my-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('language.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('language.cartoons') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12">
                <h2>
                    {{ $post->title }}
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="mb-3">
                            <span><i class="fa-solid fa-clock"></i> {{ $post->created_at->format('d F Y') }} </span>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="overflow-hidden">
                                <span class="category"> {{ $post->cartoonist }} </span>
                                <img src="{{ asset('storage/images/original') . '/' . $post->img_link }}" alt="" width="100%" height="400px" style="object-fit: cover">
                            </div>
                        </div>
                        <div class="row d-flex align-items-center">
                            <div class="col-md-6 d-flex align-items-center">
                                <span class="d-none" id="id">{{ $post->id }}</span>
                                <i class="fa-regular fa-eye me-3"></i> <span id="views">{{ $post->views }}</span>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(URL::current()) }}" class="me-3">
                                    <i class="fa-brands fa-square-facebook"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode(URL::current()) }}&url={{ urlencode(URL::current()) }}" class="me-3">
                                    <i class="fa-brands fa-square-twitter"></i>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(URL::current()) }}">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="border-bottom border-white pb-2">{{ __('language.related_posts') }}</h4>
                        </div>
                        <div class="row related">
                            @foreach ($relatedPosts as $related)
                                <div class="col-md-12 py-1">
                                    <h6>
                                        <a href="{{ url('/cartoons') . '/' . $related->id }}">{{ $related->title }}</a>
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

@section('js')
<script>
    $(document).ready(function(){
        var value = $('#views').html();
        var id = $('#id').html();
        $.ajax({
            url: '{{ route('cartoon_views_count') }}',
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
