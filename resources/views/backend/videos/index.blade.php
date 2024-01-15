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
    <div class="row pt-5 align-items-center">
        <div class="col-md-8">
            <h5>Videos</h5>
        </div>
        <div class="col-lg-4 d-flex justify-content-end">
            <a href="{{ route('backend.videos.create_form') }}" class="btn btn-primary">Add Videos</a>
        </div>
    </div>
    <div class="row py-3 px-3">
        <div class="card shadow mb-4" style="width: 100%">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Video URL</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Language</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $item)

                                <tr>
                                    <td>{{ $item->video_url }}</td>
                                    <td>{!! $item->desc !!}</td>
                                    <td>
                                        @if ($item->lang == 'mm')
                                            {{ $item->category->name_mm }}
                                        @elseif($item->lang == 'ch')
                                            {{ $item->category->name_ch }}
                                        @elseif($item->lang == 'ta')
                                            {{ $item->category->name_ta }}
                                        @else
                                            {{ $item->category->name_en }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->lang == 'en')
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
                                        <a href="{{ url('/admin/videos/update') . '/' . $item->id }}" class="btn btn-secondary btn-circle" title="Edit">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ url('/admin/videos/delete', $item->id) }}" method="POST">
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
