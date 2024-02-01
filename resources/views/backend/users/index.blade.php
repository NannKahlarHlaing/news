@extends('backend.index')

@section('content')
<div class="container-fluid">
    @if(Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('status') }}
        </div>
    @endif
    <div class="row my-3">
        <div class="col-md-8">
            <h3 class="">Users</h3>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
            <a href="{{ route('users.create_form') }}" class="btn btn-primary">Add New </a>
        </div>
    </div>
    <div class="row py-3 px-3">
        <div class="card shadow mb-4" style="width: 100%">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->email }}</td>
                                    <td>
                                        @if($post->role == '1')
                                            Admin
                                        @elseif($post->role == '2')
                                            Moderator
                                        @elseif($post->role == '3')
                                            Normal
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/users/update') . '/' . $post->id }}" class="btn btn-secondary btn-circle" title="Edit">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                    </td>
                                    <td>

                                        <form action="{{ url('/admin/users/delete', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-secondary btn-circle"
                                                onclick="return confirm('Are you sure to delete');"
                                                @if (Auth::guard('admins')->user()->id == $post->id)
                                                disabled
                                                @endif
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
