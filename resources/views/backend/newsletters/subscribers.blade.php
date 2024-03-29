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
    <div class="row pt-5">
        <div class="col-12">
            <h5>Subscribers</h5>
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
                                    <th>Subscribers</th>
                                    <th>Unsubscribe</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscribers as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <form action="{{ url('/admin/subscribers/unsubscribe', $item->id) }}" method="POST">
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
