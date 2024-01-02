@extends('backend.index')

@section('content')
    <section class="container-fluid">
        <h3 class="my-3">Edit Cartoon</h3>
        <div class="row">
            <div class="col-md-8 ">
                <form class="form" method="POST" action="{{route('backend.cartoons.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <div class="form-group">
                        <select class="form-select form-select @error('lang') is-invalid @enderror" name="lang">
                            <option value="" {{ old('lang') == ''? "selected":"" }}>Choose Language</option>
                            <option value="en" {{ old('lang', $post->lang) == 'en'? "selected":"" }}>English</option>
                            <option value="mm" {{ old('lang', $post->lang) == 'mm'? "selected":"" }}>Myanmar</option>
                            <option value="ch" {{ old('lang', $post->lang) == 'ch'? "selected":"" }}>Chinese</option>
                            <option value="ta" {{ old('lang', $post->lang) == 'ta'? "selected":"" }}>Ta'ang</option>
                        </select>
                        @error('lang')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="img_link">Image <span class="text-danger">*</span></label>
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
