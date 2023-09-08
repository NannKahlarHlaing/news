@extends('backend.index')

@section('content')
    <section class="container-fluid">
        <h3 class="my-3">Edit Page</h3>
        <div class="row">
            <div class="col-md-8 ">
                <nav class="mb-3">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">English</button>
                      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Myanmar</button>
                      <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Chinese</button>
                    </div>
                </nav>
                <form class="form" method="POST" action="{{route('backend.pages.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <div class="form-group">
                        <label for="img_url">Image</label>
                        <input type="file" class="form-control @error('img_url') is-invalid @enderror" id="img_url" name="img_url">
                        @error('img_url')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        <div class="col-lg-12 mt-2">
                            <img src="/storage/images/thumbnail/{{ $post->img_url }}" width="200" height="150">
                        </div>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="form-group">
                                <label for="title_en">Title_EN</label>
                                <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en" value="{{ old('title_en', $post->title_en) }}">
                                @error('title_en')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="desc_en">Description_EN</label>
                                <textarea class="summernote form-control @error('desc_en') is-invalid @enderror"name="desc_en" id="desc_en" rows="10">{{ old('desc_en', $post->desc_en) }}</textarea>
                                @error('desc_en')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="form-group">
                                <label for="title_mm">Title_MM</label>
                                <input type="text" class="form-control @error('title_mm') is-invalid @enderror" id="title_mm" name="title_mm" value="{{ old('title_mm', $post->title_mm) }}">
                                @error('title_mm')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
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
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="form-group">
                                <label for="title_ch">Title_CH</label>
                                <input type="text" class="form-control @error('title_ch') is-invalid @enderror" id="title_ch" name="title_ch" value="{{ old('title_ch', $post->title_ch) }}">
                                @error('title_ch')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
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
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
