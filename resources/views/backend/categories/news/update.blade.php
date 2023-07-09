@extends('backend.index')

@section('content')
    <section class="container">
        <h3>Add News Category</h3>
        <div class="row">
            <div class="col-md-8">
                <form class="form" method="POST" action="{{ route('news.category.update') }}" enctype="multipart/form-data"> 
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $post->name) }}" name="name">
                        @error('title')
                            <div class="alert alert-danger">{{ $error }}</div>
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