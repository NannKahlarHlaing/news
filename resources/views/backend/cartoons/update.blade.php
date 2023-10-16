@extends('backend.index')

@section('content')
    <section class="container-fluid">
        <h3 class="my-3">Add Cartoon</h3>
        <div class="row">
            <div class="col-md-8 ">
                <nav class="mb-3">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-en-tab" data-bs-toggle="tab" data-bs-target="#nav-en" type="button" role="tab" aria-controls="nav-en" aria-selected="true">English</button>
                        <button class="nav-link" id="nav-mm-tab" data-bs-toggle="tab" data-bs-target="#nav-mm" type="button" role="tab" aria-controls="nav-mm" aria-selected="false">Myanmar</button>
                        <button class="nav-link" id="nav-ch-tab" data-bs-toggle="tab" data-bs-target="#nav-ch" type="button" role="tab" aria-controls="nav-ch" aria-selected="false">Chinese</button>
                        <button class="nav-link" id="nav-ta-tab" data-bs-toggle="tab" data-bs-target="#nav-ta" type="button" role="tab" aria-controls="nav-ta" aria-selected="false">Ta-Ang</button>
                    </div>
                </nav>
                <form class="form" method="POST" action="{{route('backend.cartoons.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                            <div class="form-group">
                                <label for="title_en">Title_EN</label>
                                <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en" value="{{ old('title_en', $post->title_en) }}">
                                @error('title_en')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-mm" role="tabpanel" aria-labelledby="nav-mm-tab">
                            <div class="form-group">
                                <label for="title_mm">Title_MM</label>
                                <input type="text" class="form-control @error('title_mm') is-invalid @enderror" id="title_mm" name="title_mm" value="{{ old('title_mm', $post->title_mm) }}">
                                @error('title_mm')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-ch" role="tabpanel" aria-labelledby="nav-ch-tab">
                            <div class="form-group">
                                <label for="title_ch">Title_CH</label>
                                <input type="text" class="form-control @error('title_ch') is-invalid @enderror" id="title_ch" name="title_ch" value="{{ old('title_ch', $post->title_ch) }}">
                                @error('title_ch')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-ta" role="tabpanel" aria-labelledby="nav-ta-tab">
                            <div class="form-group">
                                <label for="title_ta">Title_TA</label>
                                <input type="text" class="form-control @error('title_ta') is-invalid @enderror" id="title_ta" name="title_ta" value="{{ old('title_ta', $post->title_ta) }}">
                                @error('title_ta')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="img_link">Image</label>
                        <input type="file" class="form-control @error('img_link') is-invalid @enderror" id="img_link" name="img_link">
                        @error('img_link')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        <div class="col-lg-12 mt-2">
                            <img src="{{ asset('storage/images/thumbnail/') . '/' . $post->img_link }}" width="200" height="150">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cartoonist">Cartoonist</label>
                        <input type="text" class="form-control @error('cartoonist') is-invalid @enderror" id="cartoonist" name="cartoonist" value="{{ old('cartoonist', $post->cartoonist) }}">
                        @error('cartoonist')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
