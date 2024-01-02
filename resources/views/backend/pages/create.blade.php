@extends('backend.index')

@section('content')
    <section class="container-fluid">
        <h3 class="my-3">Add Page</h3>
        <div class="row">
            <div class="col-md-8 ">
                <form class="form" method="POST" action="{{route('backend.pages.create') }}" enctype="multipart/form-data">
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
                        <label for="img_url">Image</label>
                        <input type="file" class="form-control @error('img_url') is-invalid @enderror" id="img_url" name="img_url" >
                        @error('img_url')
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
                        <label for="title_en">Title_EN <span class="text-danger fw-bold">*** Title EN field must be filled for all languages!!!</span></label>
                        <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en" value="{{ old('title_en') }}">
                        @error('title_en')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea class="summernote form-control @error('desc') is-invalid @enderror"name="desc" id="desc" rows="10">{{ old('desc') }}</textarea>
                        @error('desc')
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
