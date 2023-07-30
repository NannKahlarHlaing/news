@extends('backend.index')

@section('content')
    <section class="container-fluid">
        <h3 class="my-3">Add Photos</h3>
        <div class="row">
            <div class="col-md-8 ">
                <nav class="mb-3">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">English</button>
                      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Myanmar</button>
                      <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Chinese</button>
                    </div>
                </nav>
                <form class="form" method="POST" action="{{route('backend.photos.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="url">Image</label>
                        <input type="file" class="form-control @error('url') is-invalid @enderror" id="url" name="url">
                        @error('url')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="form-group">
                                <label for="desc_en">Description_EN</label>
                                <textarea class="form-control @error('desc_en') is-invalid @enderror"name="desc_en" id="desc_en" rows="10">{{ old('desc_en') }}</textarea>
                                @error('desc_en')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="form-group">
                                <label for="desc_mm">Description_MM</label>
                                <textarea class="form-control @error('desc_mm') is-invalid @enderror"name="desc_mm" id="desc_mm" rows="10">{{ old('desc_mm') }}</textarea>
                                @error('desc_mm')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="form-group">
                                <label for="desc_ch">Description_CH</label>
                                <textarea class="form-control @error('desc_ch') is-invalid @enderror"name="desc_ch" id="desc_ch" rows="10">{{ old('desc_ch') }}</textarea>
                                @error('desc_ch')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
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
