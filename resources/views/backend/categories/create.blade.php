@extends('backend.index')

@section('content')
    <section class="container-fluid">
        <h3 class="my-3">Add News Category</h3>
        <div class="row">
            <div class="col-md-8">
                <form class="form" method="POST" action="{{ route('category.create') }}" enctype="multipart/form-data"> 
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name">
                        @error('name')
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