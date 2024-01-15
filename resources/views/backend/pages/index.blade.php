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
    <div class="row pt-3 align-items-center">
        <div class="col-md-8">
            <h5>Pages</h5>
        </div>
        <div class="col-lg-4 d-flex justify-content-end">
            <a href="{{ route('backend.pages.create_form') }}" class="btn btn-primary">Add Page</a>
        </div>
    </div>
    <div class="row py-3 px-3">
        <div class="card shadow mb-4" style="width: 100%">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Page Title</th>
                                <th>Url Slug</th>
                                <th>Language</th>
                                <th>View</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->url_slug }}</td>
                                    <td>
                                        @if($item->lang == 'en')
                                            English
                                        @elseif($item->lang == 'mm')
                                            Myanmar
                                        @elseif($item->lang == 'ch')
                                            Chinese
                                        @elseif($item->lang == 'ta')
                                            Ta'ang
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/') . '/' . $item->url_slug }}" class="btn btn-secondary btn-circle" title="View">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/pages/update') . '/' . $item->id }}" class="btn btn-secondary btn-circle" title="Edit">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ url('/admin/pages/delete', $item->id) }}" method="POST">
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

@endsection
