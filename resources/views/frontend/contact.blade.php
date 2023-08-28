@extends('frontend.index')

@section('content')
    <section class="contact-title">
        <div class="container-fluid">
            <div class="row d-flex-center">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <h2>Contact</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 contact">
        <div class="container-fluid">
            <div class="row d-flex-center">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-6">
                            @if (Session::has('message'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            <form class="form bg-transparent" method="POST" action="{{ route('frontend.email_sent') }}">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" class="form-control bg-trasparent" placeholder="Name *" name="name">
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Email *" name="email">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Phone" name="phone">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Organisation" name="organisation">
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" aria-label="Default select example" name="category">
                                        <option value="Information" selected>Information</option>
                                        <option value="Editors">Editors</option>
                                        <option value="Advertising">Advertising</option>
                                        <option value="Donation">Donation</option>
                                        <option value="Webmaster">Webmaster</option>
                                      </select>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                                </div>
                                <div class="mb-3 text-end">
                                    <button type="submit" class="btn btn-danger">Send</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-1 col-md-0"></div>
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row d-flex align-items-center mb-3">
                                        <div class="col-lg-2 col-md-1 col-2">
                                            <i class="fa-brands fa-square-facebook"></i>
                                        </div>
                                        <div class="col-lg-10 col-md-11 col-10">
                                            <span class="social-title">Facebook</span>
                                            @foreach ($facebook as $item)
                                                <a href="" class="d-block">{{ $item }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center mb-3">
                                        <div class="col-lg-2 col-md-1 col-2">
                                            <i class="fa-brands fa-square-twitter"></i>
                                        </div>
                                        <div class="col-lg-10 col-md-11 col-10">
                                            <span class="social-title">Twitter</span>
                                            @foreach ($twitter as $item)
                                                <a href="" class="d-block">{{ $item }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center mb-3">
                                        <div class="col-lg-2 col-md-1 col-2">
                                            <i class="fa-brands fa-square-youtube"></i>
                                        </div>
                                        <div class="col-lg-10 col-md-11 col-10 mb-3">
                                            <span class="social-title">Youtube</span>
                                            @foreach ($youtube as $item)
                                                <a href="" class="d-block">{{ $item }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center mb-3">
                                        <div class="col-lg-2 col-md-1 col-2">
                                            <i class="fa-brands fa-instagram"></i>
                                        </div>
                                        <div class="col-lg-10 col-md-11 col-10">
                                            <span class="social-title">Instagram</span>
                                            @foreach ($instagram as $item)
                                                <a href="" class="d-block">{{ $item }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row d-flex mb-3">
                                        <div class="col-lg-2 col-md-2 col-2 ">
                                            <i class="fa-solid fa-phone-volume"></i>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-10">
                                            @foreach ($phone as $item)
                                                <a class="d-block">{{ $item }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row d-flex mb-3">
                                        <div class="col-lg-2 col-md-2 col-2 ">
                                            {{-- <div class="btn btn-transparent btn-circle-fe"> --}}
                                                <i class="fa-solid fa-location-dot"></i>
                                            {{-- </div> --}}
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-10">
                                            <address>{{ $info->address }}</address>
                                        </div>
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
