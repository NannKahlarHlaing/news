@extends('backend.index')

@section('content')
    <section class="container-fluid">
        <h3 class="my-3">Edit Videos</h3>
        <div class="row">
            <div class="col-md-8 ">
                <form class="form" method="POST" action="{{route('backend.videos.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $post->id }}">
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
                        <label for="video_url">Video URL</label>
                        <input type="text" class="form-control @error('video_url') is-invalid @enderror" id="video_url" name="video_url" value="{{ old('video_url', $post->video_url) }}">
                        @error('video_url')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="img_url">Image URL</label>
                        <input type="text" class="form-control @error('img_url') is-invalid @enderror" id="img_url" name="img_url" value="{{ old('img_url', $post->img_url) }}">
                        @error('img_url')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea class="form-control @error('desc') is-invalid @enderror"name="desc" id="desc" rows="5">{{ old('desc', $post->desc) }}</textarea>
                        @error('desc')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control @error('category') is-invalid @enderror" name="category" aria-label="Default select example">
                            <option value="">Select Category</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id  }}" {{ old('category', $post->category) == $item->id? "selected":"" }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
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
