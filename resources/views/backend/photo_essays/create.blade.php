@extends('backend.index')

@section('content')
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="my-3">Add Photo Essays</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 ">
                <form class="form" method="POST" action="{{route('backend.photo_essays.create') }}" enctype="multipart/form-data">
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
                        <label for="img_link">Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('img_link') is-invalid @enderror" id="img_link" name="img_link">
                        @error('img_link')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') }}">
                        @error('author')
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
                        <label for="topic">Topics</label>
                        <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic" value="{{ old('topic') }}">
                        @error('topic')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="short_desc">Short_Description </label>
                        <textarea class="short_summernote form-control @error('short_desc') is-invalid @enderror"name="short_desc" id="short_desc" >{{ old('short_desc') }}</textarea>
                        @error('short_desc')
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

