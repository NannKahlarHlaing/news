@extends('backend.index')

@section('content')
<div class="container-fluid">
    <div class="row my-3">
        <div class="col-md-5">
            <h3 class="">News Categories</h3>
        </div>
        <div class="col-md-3">
            <a href="{{ route('news.category.create_form') }}" class="btn btn-primary">Add New Category</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            @if (Session::has('status'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('status') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <th scope="col" class="col-6">Name</th>
                    <th scope="col" class="col-6" colspan="2">Action</th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->name }}</td>
                            <td>
                                <a href="{{ url('/admin/categories/news/update') . '/' . $post->id }}" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                <form action="{{ url('/admin/categories/news/delete', $post->id) }}" method="POST">
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
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection