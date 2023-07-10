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
            <h3>News</h3>
        </div>
        <div class="col-lg-4 d-flex justify-content-end">
            <a href="{{ route('backend.news.create_form') }}" class="btn btn-primary">Add News</a>
        </div>
    </div>
    @foreach ($posts as $item)
        <div class="row">
            <div class="col-md-3">
                <img src="{{ $item->img_link }}" alt="" width="100%">
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-12">
                        <h3>{{ $item->title }}</h3>
                    </div>
                    <div class="col-5">
                        <h5 class="fw-bold">Topics: </h5>
                        <span>{{ $item->topic }}</span>
                        <h5 class="fw-bold mt-2">Facebook Link:</h5>
                        <span >{{ $item->fb_link }}</span>
                        <h5 class="fw-bold mt-2">Short Description: </h5>
                        <p>{{ $item->short_desc }}</p>
                    </div>
                    <div class="col-2">
                        <hr class="vertical">
                    </div>
                    <div class="col-5">
                        <h5 class="fw-bold">Category: </h5> <span>{{ $item->category }}</span>
                        <h5 class="fw-bold mt-2">Twitter Link: </h5> <span>{{ $item->tw_link }}</span>
                        <h5 class="fw-bold mt-2">Linked In Link: </h5> <span>{{ $item->li_link }}</span>
                    </div>
                    <div class="col-12">
                        
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <div class="row">
                    <div class="col-12 mb-3">
                        <a href="{{ url('/admin/news/update') . '/' . $item->id }}" class="btn btn-danger btn-circle">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </div>
                    <div class="col-12 mb-3">
                        <a href="{{ url('/news') . '/' . $item->id }}" class="btn btn-danger btn-circle">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </div>
                    <div class="col-12">
                        <form action="{{ url('/admin/news/delete', $item->id) }}" method="POST">
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
        <div class="row pb-5 mb-5 border-bottom">
            <div class="col-12">
                <h5 class="fw-bold">Description: </h5>
                <textarea class="form-control" name="" id="" cols="30" rows="7">{{ $item->desc }}</textarea>
            </div>
        </div>
    @endforeach
</div>

    </div>


@endsection