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
            <h3>Careers</h3>
        </div>
        <div class="col-lg-4 d-flex justify-content-end">
            <a href="{{ route('backend.careers.create_form') }}" class="btn btn-primary">Add Careers</a>
        </div>
    </div>
    @foreach ($posts as $item)
        <div class="row d-flex align-items-center">
            {{-- <div class="col-md-3">
                <img src="{{ $item->img_link }}" alt="" width="100%">
            </div> --}}
            <div class="col-md-9">
                <div class="row">
                    <div class="col-12">
                        <h3>{{ $item->position }}</h3>
                    </div>
                    <div class="col-12">
                        <h5 class="fw-bold">Latest Date: <small>{{ $item->latest_date }}</small></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <a href="{{ url('/admin/careers/update') . '/' . $item->id }}" class="btn btn-danger btn-circle">
                    <i class="fa-solid fa-pencil"></i>
                </a>
            </div>
            {{-- <div class="col-md-1">
                <a href="{{ url('/careers') . '/' . $item->id }}" class="btn btn-danger btn-circle">
                    <i class="fa-solid fa-eye"></i>
                </a>
            </div> --}}
            <div class="col-md-1">
                <form action="{{ url('/admin/careers/delete', $item->id) }}" method="POST">
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
    @endforeach
</div>

    </div>
@endsection
