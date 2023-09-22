@extends('backend.index')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4" style="width: 100%">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Post Title EN</th>
                                    <th>Category</th>
                                    <th>Views</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mostViews as $item)
                                    <tr>
                                        <td>{{ $item->title_en }}</td>
                                        <td>{{ $item->category->name_en }}</td>
                                        <td>{{ $item->views }}</td>
                                        <td>
                                            <a href="{{ url('/category') . '/' . $item->category->name_en . '/' . $item->id }}" class="btn btn-danger btn-circle">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow mb-4" style="width: 100%">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Post Title EN</th>
                                    <th>Category</th>
                                    <th>Reactions</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mostReacts as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->category_name}}</td>
                                        <td>{{ $item->total_reactions }}</td>
                                        <td>
                                            <a href="{{ url('/category') . '/' . $item->category_name . '/' . $item->id }}" class="btn btn-danger btn-circle">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow mb-4" style="width: 100%">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Post Title EN</th>
                                    <th>Category</th>
                                    <th>Comments</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mostComments as $item)
                                    <tr>
                                        <td>{{ $item->title_en }}</td>
                                        <td>{{ $item->category->name_en }}</td>
                                        <td>{{ $item->comments_count }}</td>
                                        <td>
                                            <a href="{{ url('/category') . '/' . $item->category->name_en . '/' . $item->id }}" class="btn btn-danger btn-circle">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
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
