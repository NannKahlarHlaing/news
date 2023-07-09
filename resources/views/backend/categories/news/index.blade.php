@extends('backend.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h3>News Categories</h3>
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
                    <th scope="col" class="col-6">Action</th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->name }}</td>
                            <td>
                                <a href="{{ url('/admin/categories/news/update') . '/' . $post->id }}" class="btn btn-warning">Edit</a>
                                <a href="{{ url('/admin/categories/news/delete') . '/' . $post->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection