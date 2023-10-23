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
            <h3>Posts</h3>
        </div>
        <div class="col-lg-4 d-flex justify-content-end">
            <a href="{{ route('backend.posts.create_form') }}" class="btn btn-success me-3">Add Post</a>
            <a href="{{ route('backend.posts.trashed') }}" class="btn btn-primary">Trashed Post</a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <form class="form-inline" action="">
                <input type="hidden" name="search" value="1">
                <input class="form-control" type="text" name="title" value="{{ $title }}" placeholder="Search by Title, Short Description or Description">

                <select class="form-control form-select mx-2" name="category" id="">
                    <option value="">Select Category</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}" {{ $category == $item->id ? 'selected' : '' }}> {{ $item->name_en }}</option>
                    @endforeach
                </select>

                <input type="date" class="form-control me-2" id="date" name="date" value="{{ $search_date }}">

                <button class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
    @if(count($posts) > 0)
        @foreach ($posts as $item)
            <div class="row mb-2 py-2 border-bottom">
                <div class="col-md-2">
                    <img src="/storage/images/thumbnail/{{ $item->img_link }}" alt="image" width="100%">
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <h3>{{ $item->id }}{{ $item->title_en }} </h3>
                        </div>
                        <div class="col-3">
                            <strong class="fw-bold h5">Category: </strong> <span>{{ $item->category->name_en }}</span>
                        </div>
                        <div class="col-3">
                            <strong class="fw-bold h5">SubCategory: </strong>
                            @if ($item->sub_category != '' || $item->sub_category != NULL)
                                <span>{{ $item->sub_category->name_en }}</span>
                            @endif
                        </div>
                        <div class="col-3">
                            <strong class="fw-bold h5">Tag: </strong>
                            @foreach ($item->tags as $post_tag)
                                @foreach ($tags as $tag)
                                    @if ($tag->id == $post_tag)
                                        <span>{{ $tag->name_en}},</span>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        <div class="col-3">
                            <strong class="fw-bold h5   ">Views: </strong> <span>{{ $item->views }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    @if ($route == 'post_index')
                        <div class="row">
                            <div class="col-12 mb-3">
                                <a href="{{ url('/admin/posts/update') . '/' . $item->id }}" class="btn btn-danger btn-circle">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </div>
                            <div class="col-12 mb-3">
                                <a href="{{ url('/category') . '/' . $item->category->name_en . '/' . $item->id }}" class="btn btn-danger btn-circle">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                            <div class="col-12">
                                <form action="{{ url('/admin/posts/delete', $item->id) }}" method="POST">
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
                    @else
                        <div class="row">
                            <div class="col-12 mb-3">
                                <form action="{{ url('/admin/posts/restore', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-circle"
                                    >
                                    <i class="fa-solid fa-recycle"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
        <div class="">{{ $posts->appends(Request::all())->links() }}</div>
    @else
        <div class="col-12 mt-3 card p-3 text-center">No Content Available</div>
    @endif

</div>

    </div>
@endsection
