@extends('backend.index')

@section('content')
<div class="container-fluid">
    <div class="row my-3">
        <div class="col-md-8">
            <h3 class="">
                @if ($route_name == 'category')
                    Categories
                @elseif($route_name == 'tag')
                    Tag
                @else
                    Sub Category
                @endif
            </h3>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
            @if ($route_name == 'category')
                <a href="{{ route('category.create_form') }}" class="btn btn-primary">Add New </a>
            @elseif($route_name == 'tag')
                <a href="{{ route('tag.create_form') }}" class="btn btn-primary">Add New </a>
            @else
            <a href="{{ route('sub_category.create_form') }}" class="btn btn-primary">Add New </a>
            @endif

        </div>
    </div>
    <div class="row py-5 px-3">
        <div class="card shadow mb-4" style="width: 100%">
            @if(Session::has('status'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('status') }}
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th scope="col">Name</th>
                            @if ($route_name == 'sub_category')
                                <th scope="col">Category</th>
                            @endif
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->name_en }}</td>
                                    @if ($route_name == 'sub_category')
                                    <td>{{ $post->category->name_en }}</td>
                                    @endif
                                    <td>
                                        @if ($route_name == 'category')
                                            <a href="{{ url('/admin/categories/update') . '/' . $post->id }}" class="btn btn-warning">Edit</a>
                                        @elseif($route_name == 'tag')
                                            <a href="{{ url('/admin/tag/update') . '/' . $post->id }}" class="btn btn-warning">Edit</a>
                                        @else
                                            <a href="{{ url('/admin/sub_categories/update') . '/' . $post->id }}" class="btn btn-warning">Edit</a>
                                        @endif

                                    </td>
                                    <td>
                                        @if ($route_name == 'category')
                                            <form action="{{ url('/admin/categories/delete', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Are you sure to delete');"
                                                >
                                                    Delete
                                                </button>
                                            </form>
                                        @elseif($route_name == 'tag')
                                            <form action="{{ url('/admin/tag/delete', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Are you sure to delete');"
                                                >
                                                    Delete
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ url('/admin/sub_categories/delete', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Are you sure to delete');"
                                                >
                                                    Delete
                                                </button>
                                            </form>
                                        @endif

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
