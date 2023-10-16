@extends('frontend.index')

@section('content')
    <section class="py-5">
        <div class="container-fluid">
            <div class="row d-flex-center">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            @if ($post->img_url)
                                <img src="{{ asset('storage/images/original') . '/' . $post->img_url }}" class="img-fluid rounded-top" alt="...." width="100%">
                            @endif

                        </div>
                        <div class="col-12 mt-4">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        @if (app()->getLocale() == 'mm')
                                            {{ $post->title_mm }}
                                        @elseif(app()->getLocale() == 'ch')
                                            {{ $post->title_ch }}
                                        @elseif(app()->getLocale() == 'ta')
                                            {{ $post->title_ta }}
                                        @else
                                            {{ $post->title_en }}
                                        @endif
                                </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-12 my-2">
                            <h2>
                                @if (app()->getLocale() == 'mm')
                                    {{ $post->title_mm }}
                                @elseif(app()->getLocale() == 'ch')
                                    {{ $post->title_ch }}
                                @elseif(app()->getLocale() == 'ta')
                                    {{ $post->title_ta }}
                                @else
                                    {{ $post->title_en }}
                                @endif
                            </h2>
                        </div>
                        <div class="col-12">
                            @if (app()->getLocale() == 'mm')
                                {!! $post->desc_mm !!}
                            @elseif(app()->getLocale() == 'ch')
                                {!! $post->desc_ch !!}
                            @elseif(app()->getLocale() == 'ta')
                                {!! $post->desc_ta !!}
                            @else
                                {!! $post->desc_en !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


