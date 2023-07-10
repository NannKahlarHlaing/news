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
                                <span>{{ $post->category }}</span>
                                <h2>{{ $post->title }}</h2>
                            </div>
                            <div class="col-12">
                                <img src="{{ $post->img_link }}" alt="" width="100%" height="400px">
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
                            <div class="col-1 social">
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
                                            <span class="">0</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <a href="{{ $post->fb_link }}" class="btn btn-fb btn-circle mb-2">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a href="{{ $post->tw_link }}" class="btn btn-tw btn-circle mb-2">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <a href="{{ $post->li_link }}" class="btn btn-li btn-circle mb-2">
                                            <i class="fa-brands fa-linkedin-in"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-10">
                                <h6>BY <a href="" class="tex-dark fw-bold me-3">THE IRRAWADDY</a><span>{{ date('d F Y', strtotime($post->created_at)) }}</span></h6>
                                <p>{{ $post->desc }}</p>
                                <div class="col-12">
                                    <div class="card" style="height: 100px">
                                        ddd
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
                                        <div class="btn btn-transparent  btn-circle-fe mb-2">
                                            <i class="fa-regular fa-comment-dots"></i>
                                        </div>
                                        <div class="btn btn-transparent  btn-circle-fe mb-2">
                                            <i class="fa-regular fa-comment-dots"></i>
                                        </div>
                                        <div class="btn btn-transparent  btn-circle-fe mb-2">
                                            <i class="fa-regular fa-comment-dots"></i>
                                        </div>
                                        <div class="btn btn-transparent  btn-circle-fe mb-2">
                                            <i class="fa-regular fa-comment-dots"></i>
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