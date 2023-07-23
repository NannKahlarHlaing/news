@extends('frontend.index')

@section('content')
    <section class="py-5">
        <div class="container-fluid">
            <div class="row d-flex-center">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ $post->img_url }}" class="img-fluid rounded-top" alt="" width="100%">
                        </div>
                        <div class="col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        @if (app()->getLocale() == 'mm')
                                            {{ $post->title_mm }}
                                        @elseif(app()->getLocale() == 'ch')
                                            {{ $post->title_ch }}
                                        @else
                                            {{ $post->title_en }}
                                        @endif
                                </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-12 my-5">
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
                            @if (app()->getLocale() == 'mm')
                                {!! str_replace("\n", '', $post->desc_mm) !!}
                            @elseif(app()->getLocale() == 'ch')
                                {!! str_replace("\n", '', $post->desc_ch) !!}
                            @else
                                {!! str_replace("\n", '', $post->desc_en) !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


