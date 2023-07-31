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
            <a href="{{ route('backend.posts.create_form') }}" class="btn btn-primary">Add post</a>
        </div>
    </div>
    @foreach ($posts as $item)
        <div class="row mb-4 py-3 border-bottom">
            <div class="col-md-2">
                <img src="/storage/images/thumbnail/{{ $item->img_link }}" alt="image" width="100%">
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-12 mb-2">
                        <h3>{{ $item->title_en }}</h3>
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
            </div>
        </div>
    @endforeach
</div>

    </div>
@endsection
