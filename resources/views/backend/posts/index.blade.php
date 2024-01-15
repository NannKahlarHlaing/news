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
    <div class="row mb-3 align-items-center">
        <div class="col-md-8">
            <h5>Posts</h5>
        </div>
        <div class="col-lg-4 d-flex justify-content-end">
            <a href="{{ route('backend.posts.create_form') }}" class="btn btn-primary me-3">Add Post</a>
            <a href="{{ route('backend.posts.trashed') }}" class="btn btn-primary">Trashed Post</a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-7">
            <form class="form" action="">
                <div class="d-flex mb-3">
                    <input type="hidden" name="search" value="1">
                    <select class="form-control form-select me-2" name="category" id="">
                        <option value="">Select Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}" {{ $category == $item->id ? 'selected' : '' }}> {{ $item->name_en }}</option>
                        @endforeach
                    </select>
                    <select class="form-control form-select" style="width:350px" name="lang" id="">
                        <option value="">Select Language</option>
                        <option value="en" {{ $lang == 'en' ? 'selected' : '' }}>English</option>
                        <option value="mm" {{ $lang == 'mm' ? 'selected' : '' }}>Myanmar</option>
                        <option value="ch" {{ $lang == 'ch' ? 'selected' : '' }}>Chinese</option>
                        <option value="ta" {{ $lang == 'ta' ? 'selected' : '' }}>Ta'ang</option>
                    </select>
                    <input type="date" class="form-control ms-2" id="date" name="date" value="{{ $search_date }}">
                </div>
    
                <div class="d-flex">
                    <input class="form-control me-2" type="text" name="title" value="{{ $title }}" placeholder="Search by Title, Short Description or Description">
                    <button class="btn btn-primary">Search</button>
                </div>
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
                            <h6>{{ $item->title }} </h6>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-2">
                            Category: 
                                @if ($item->lang == 'mm')
                                    {{ $item->category->name_mm }}
                                @elseif($item->lang == 'ch')
                                    {{ $item->category->name_ch }}
                                @elseif($item->lang == 'ta')
                                    {{ $item->category->name_ta }}
                                @else
                                    {{ $item->category->name_en }}
                                @endif
                        </div>
                        <div class="col-lg-4 col-md-6 mb-2">
                            SubCategory: 
                            @if ($item->sub_category != '' || $item->sub_category != NULL)
                                <span>
                                    @if ($item->lang == 'mm')
                                            {{ $item->sub_category->name_mm }}
                                        @elseif($item->lang == 'ch')
                                            {{ $item->sub_category->name_ch }}
                                        @elseif($item->lang == 'ta')
                                            {{ $item->sub_category->name_ta }}
                                        @else
                                            {{ $item->sub_category->name_en }}
                                        @endif
                                </span>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6 mb-2">
                            Tag:
                            @foreach ($item->tags as $post_tag)
                                @foreach ($tags as $tag)
                                    @if ($tag->id == $post_tag)
                                        <span>
                                            @if ($item->lang == 'mm')
                                                {{ $tag->name_mm }},
                                            @elseif($item->lang == 'ch')
                                                {{ $tag->name_ch }},
                                            @elseif($item->lang == 'ta')
                                                {{ $tag->name_ta }},
                                            @else
                                                {{ $tag->name_en }},
                                            @endif
                                        </span>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        <div class="col-lg-4 col-md-6 mb-2">
                            Views:{{ $item->views }}
                        </div>
                        <div class="col-lg-4 col-md-6 mb-2">
                            Language: 
                                @if ($item->lang == 'en')
                                    English
                                @elseif($item->lang == 'mm')
                                    Myanmar
                                @elseif($item->lang == 'ch')
                                    Chinese
                                @elseif($item->lang == 'ta')
                                    Ta'ang
                                @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    @if ($route == 'post_index')
                        <div class="row">
                            <div class="col-12 mb-3">
                                <a href="{{ url('/category') . '/' . $item->category->name_en . '/' . $item->id }}" class="btn btn-secondary btn-circle" title="View">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                            <div class="col-12 mb-3">
                                <a href="{{ url('/admin/posts/update') . '/' . $item->id }}" class="btn btn-secondary btn-circle" title="Edit">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </div>
                            <div class="col-12">
                                <form action="{{ url('/admin/posts/delete', $item->id) }}" method="POST">
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
                                        class="btn btn-secondary btn-circle"
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
