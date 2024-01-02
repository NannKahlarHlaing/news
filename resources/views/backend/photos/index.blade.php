@extends('backend.index')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('status'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('status') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-md-8">
            <h3>Photos</h3>
        </div>
        <div class="col-lg-4 d-flex justify-content-end">
            <a href="{{ route('backend.photos.create_form') }}" class="btn btn-primary">Add Photos</a>
        </div>
    </div>
    <div class="row py-5 px-3">
        <div class="card shadow mb-4" style="width: 100%">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Description_En</th>
                                <th>Camera Man</th>
                                <th>Views</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Description</th>
                                <th>Camera Man</th>
                                <th>Views</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($posts as $item)

                                <tr>
                                    <td>{!!$item->desc !!}</td>
                                    <td>{{ $item->camera }}</td>
                                    <td>{{ $item->views }}</td>
                                    <td>
                                        <a href="{{ url('/admin/photos/update') . '/' . $item->id }}" class="btn btn-danger btn-circle">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ url('/admin/photos/delete', $item->id) }}" method="POST">
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
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
