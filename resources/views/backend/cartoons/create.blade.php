@extends('backend.index')

@section('content')
    <section class="container-fluid">
        <h3 class="my-3">Add Cartoon</h3>
        <div class="row">
            <div class="col-lg-8">
                <form class="form" method="POST" action="{{route('backend.cartoons.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <select class="form-select form-select @error('lang') is-invalid @enderror" name="lang">
                            <option  value="" selected>Choose Language</option>
                            <option value="en" {{ old('lang') == 'en'? "selected":"" }}>English</option>
                            <option value="mm" {{ old('lang') == 'mm'? "selected":"" }}>Myanmar</option>
                            <option value="ch" {{ old('lang') == 'ch'? "selected":"" }}>Chinese</option>
                            <option value="ta" {{ old('lang') == 'ta'? "selected":"" }}>Ta'ang</option>
                        </select>
                        @error('lang')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
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
                    </div>
                    <div class="form-group">
                        <label for="cartoonist">Cartoonist</label>
                        <input type="text" class="form-control @error('cartoonist') is-invalid @enderror" id="cartoonist" name="cartoonist" value="{{ old('cartoonist') }}">
                        @error('cartoonist')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
