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
            @if (Session::has('empty'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('empty') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
        <div class="col-lg-8">
            <div class="row pt-5 align-items-center">
                <div class="col-lg-8">
                    <h5>Newsletters</h5>
                </div>
                <div class="col-lg-4 d-flex justify-content-end">
                    <a href="{{ route('backend.newsletter_form') }}" class="btn btn-primary">Send Newsletter</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row py-3">
        <div class="col-lg-8">
            <div class="card shadow mb-4" style="width: 100%">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subject</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($newsletters as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>
                                            <a href="{{ url('/admin/newsletters/details') . '/' . $item->id }}" class="btn btn-secondary btn-circle">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ url('/admin/newsletters/delete', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-secondary btn-circle"
                                                    onclick="return confirm('Are you sure to delete');"
                                                    title="Delete"
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
</div>

@endsection
