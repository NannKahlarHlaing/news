@extends('backend.index')

@section('content')
    <section class="container-fluid">
        <h3 class="my-3">Edit Post</h3>
        <div class="row">
            <div class="col-md-8 ">
                <form class="form" method="POST" action="{{route('backend.posts.update') }}" enctype="multipart/form-data">
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
                        <label>Categories</label>
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
                        <label for="topic">Topics</label>
                        <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic" value="{{ old('topic', $post->topic) }}">
                        @error('topic')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="short_desc">Short Description</label>
                        <textarea class="form-control @error('short_desc') is-invalid @enderror"name="short_desc" id="short_desc" >{{ old('short_desc', $post->short_desc) }}</textarea>
                        @error('short_desc')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea class="form-control @error('desc') is-invalid @enderror"name="desc" id="desc" rows="10">{{ old('desc', $post->desc) }}</textarea>
                        @error('desc')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="img_link">Image Url</label>
                        <input type="text" class="form-control @error('img_link') is-invalid @enderror" id="img_link" name="img_link" value="{{ old('img_link', $post->img_link) }}">
                        @error('img_link')
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
