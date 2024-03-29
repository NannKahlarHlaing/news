@extends('backend.index')
@section('css')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row my-3 align-items-center">
        <div class="col-md-8">
            <h5 class="">
                @if ($route_name == 'category')
                    Categories
                @elseif($route_name == 'tag')
                    Tag
                @else
                    Sub Category
                @endif
            </h5>
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
    <div class="row py-3 px-3">
        <div class="row">
            @if(Session::has('status'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('status') }}
                </div>
            @endif
        </div>
        <div class="card shadow mb-4" style="width: 100%">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">English Name</th>
                            <th scope="col">Myanmar Name</th>
                            <th scope="col">Chinese Name</th>
                            <th scope="col">Ta'ang Name</th>
                            @if ($route_name == 'sub_category')
                                <th scope="col">Category</th>
                            @endif
                            @if ($route_name == 'category' || $route_name == 'sub_category')
                                <th scope="col">Url Slug</th>
                            @endif
                            @if ($route_name == 'category')
                                <th scope="col">Add To Carousel</th>
                            @endif
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th>{{ $post->id }}</th>
                                    <td>{{ $post->name_en }}</td>
                                    <td>{{ $post->name_mm }}</td>
                                    <td>{{ $post->name_ch }}</td>
                                    <td>{{ $post->name_ta }}</td>
                                    @if ($route_name == 'sub_category')
                                        <td>{{ $post->category->name_en }}</td>
                                    @endif
                                    @if ($route_name == 'category' || $route_name == 'sub_category')
                                        <td scope="col">{{ $post->url_slug }}</td>
                                    @endif
                                    @if ($route_name == 'category')
                                        <th>{{ $post->add_to_carousel }}</th>
                                    @endif
                                    <td>
                                        @if ($route_name == 'category')
                                            <a href="{{ url('/admin/categories/update') . '/' . $post->id }}" class="btn btn-secondary btn-circle" title="Edit"><i class="fa-solid fa-pencil"></i></a>
                                        @elseif($route_name == 'tag')
                                            <a href="{{ url('/admin/tag/update') . '/' . $post->id }}" class="btn btn-secondary btn-circle" title="Edit"><i class="fa-solid fa-pencil"></i></a>
                                        @else
                                            <a href="{{ url('/admin/sub_categories/update') . '/' . $post->id }}" class="btn btn-secondary btn-circle" title="Edit"><i class="fa-solid fa-pencil"></i></a>
                                        @endif

                                    </td>
                                    <td>
                                        @if ($route_name == 'category')
                                            <form action="{{ url('/admin/categories/delete', $post->id) }}" method="POST">
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
                                        @elseif($route_name == 'tag')
                                            <form action="{{ url('/admin/tag/delete', $post->id) }}" method="POST">
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
                                        @else
                                            <form action="{{ url('/admin/sub_categories/delete', $post->id) }}" method="POST">
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
