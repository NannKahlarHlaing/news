@extends('backend.index')

@section('content')
    <section class="container-fluid">
        <h5 class="my-3">Add Photos</h5>
        <div class="row">
            <div class="col-md-8 ">
                <form class="form" method="POST" action="{{route('backend.photos.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <select class="form-select form-select @error('lang') is-invalid @enderror " name="lang">
                            <option value="" {{ old('lang') == ''? "selected":"" }}>Choose Language</option>
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
                        <label for="url">Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('url') is-invalid @enderror" id="url" name="url">
                        @error('url')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">Description </label>
                        <textarea class="summernote form-control @error('desc') is-invalid @enderror"name="desc" id="desc" rows="10">{{ old('desc') }}</textarea>
                        @error('desc')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="camera">Camera Man</label>
                        <input type="text" class="form-control @error('camera') is-invalid @enderror" id="camera" name="camera" value="{{ old('camera') }}">
                        @error('camera')
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
