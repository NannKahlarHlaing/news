@extends('frontend.index')

@section('content')
    <section class="py-5">
        <div class="container-fluid">
            <div class="row d-flex-center">
                <div class="col-lg-8">
                    <div class="row page">
                        <div class="col-12">
                            @if ($post->img_url)
                                <img src="{{ asset('storage/images/original') . '/' . $post->img_url }}" class="img-fluid rounded-top" alt="...." width="100%">
                            @endif
                        </div>
                        <div class="col-12 mt-4">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('language.home') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"></li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-12 my-2">
                            <h2>
                                {{ $post->title }}
                            </h2>
                        </div>
                        <div class="col-12">
                            {!! $post->desc !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


