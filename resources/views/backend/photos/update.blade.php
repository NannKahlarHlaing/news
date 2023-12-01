@extends('backend.index')

@section('content')
    <section class="container-fluid">
        <h3 class="my-3">Edit Photos</h3>
        <div class="row">
            <div class="col-md-8 ">
                <nav class="mb-3">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-en-tab" data-bs-toggle="tab" data-bs-target="#nav-en" type="button" role="tab" aria-controls="nav-en" aria-selected="true">English</button>
                        <button class="nav-link" id="nav-mm-tab" data-bs-toggle="tab" data-bs-target="#nav-mm" type="button" role="tab" aria-controls="nav-mm" aria-selected="false">Myanmar</button>
                        <button class="nav-link" id="nav-ch-tab" data-bs-toggle="tab" data-bs-target="#nav-ch" type="button" role="tab" aria-controls="nav-ch" aria-selected="false">Chinese</button>
                        <button class="nav-link" id="nav-ta-tab" data-bs-toggle="tab" data-bs-target="#nav-ta" type="button" role="tab" aria-controls="nav-ta" aria-selected="false">Ta Ang</button>
                    </div>
                </nav>
                <form class="form" method="POST" action="{{route('backend.photos.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <div class="form-group">
                        <label for="url">Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('url') is-invalid @enderror" id="url" name="url">
                        @error('url')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        <div class="col-lg-12 mt-2">
                            <img src="/storage/images/thumbnail/{{ $post->url }}" width="200" height="150">
                        </div>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                            <div class="form-group">
                                <label for="desc_en">Description_EN </label>
                                <textarea class="summernote form-control @error('desc_en') is-invalid @enderror"name="desc_en" id="desc_en" rows="10">{{ old('desc_en', $post->desc_en) }}</textarea>
                                @error('desc_en')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-mm" role="tabpanel" aria-labelledby="nav-mm-tab">
                            <div class="form-group">
                                <label for="desc_mm">Description_MM</label>
                                <textarea class="summernote form-control @error('desc_mm') is-invalid @enderror"name="desc_mm" id="desc_mm" rows="10">{{ old('desc_mm', $post->desc_mm) }}</textarea>
                                @error('desc_mm')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-ch" role="tabpanel" aria-labelledby="nav-ch-tab">
                            <div class="form-group">
                                <label for="desc_ch">Description_CH</label>
                                <textarea class="summernote form-control @error('desc_ch') is-invalid @enderror"name="desc_ch" id="desc_ch" rows="10">{{ old('desc_ch', $post->desc_ch) }}</textarea>
                                @error('desc_ch')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-ta" role="tabpanel" aria-labelledby="nav-ta-tab">
                            <div class="form-group">
                                <label for="desc_ta">Description_CH</label>
                                <textarea class="summernote form-control @error('desc_ta') is-invalid @enderror"name="desc_ta" id="desc_ta" rows="10">{{ old('desc_ta', $post->desc_ta) }}</textarea>
                                @error('desc_ta')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="camera">Camera Man</label>
                        <input type="text" class="form-control @error('camera') is-invalid @enderror" id="camera" name="camera" value="{{ old('camera', $post->camera) }}">
                        @error('camera')
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
