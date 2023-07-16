@extends('backend.index')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('status'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('status') }}
                </div>
            @endif   
        </div>
        
    </div>
</div>
<div class="card shadow mb-4">
<div class="card-header py-3">
    <div class="row mb-3">
        <div class="col-md-8">
            <h3>Photo Essays</h3>
        </div>
        <div class="col-lg-4 d-flex justify-content-end">
            <a href="{{ route('backend.photo_essays.create_form') }}" class="btn btn-primary">Add Photos Essay</a>
        </div>
    </div>
    @foreach ($posts as $item)
        <div class="row mb-4 py-3 border-bottom">
            <div class="col-md-3">
                <img src="{{ $item->img_link }}" alt="image" width="100%">
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-12">
                        <h3>{{ $item->title }}</h3>
                    </div>
                    <div class="col-6">
                        <h5 class="fw-bold">Author: </h5> <span>{{ $item->author }}</span>
                    </div>
                    <div class="col-6">
                        <h5 class="fw-bold">Create Date: </h5> <span>{{ $item->date }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <div class="row">
                    <div class="col-12 mb-3">
                        <a href="{{ url('/admin/photo_essays/update') . '/' . $item->id }}" class="btn btn-danger btn-circle">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </div>
                    <div class="col-12 mb-3">
                        <a href="{{ url('/photo_essays') . '/' . $item->id }}" class="btn btn-danger btn-circle">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </div>
                    <div class="col-12">
                        <form action="{{ url('/admin/photo_essays/delete', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button 
                                type="submit" 
                                class="btn btn-danger btn-circle"
                                onclick="return confirm('Are you sure to delete');"
                            >
                            <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    @endforeach
</div>

    </div>
@endsection