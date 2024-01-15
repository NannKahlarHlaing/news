@extends('backend.index')

@section('content')
    <div class="row px-5">
        <div class="col-lg-12 ">
            <canvas class="chart" id="countryChart"></canvas>
        </div>
    </div>
    <div class="row px-5 mt-3">
        <div class="col-lg-12 col-md-12">
            <div class="card shadow mb-4" style="width: 100%">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Most Views</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Post Title</th>
                                    <th>Category</th>
                                    <th>Views</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mostViews as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->category->name_en }}</td>
                                        <td>{{ $item->views }}</td>
                                        <td>
                                            <a href="{{ url('/category') . '/' . $item->category->url_slug . '/' . $item->id }}" class="btn btn-secondary btn-circle" title="View">
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
        <div class="col-lg-6 col-md-12">
            <div class="card shadow mb-4" style="width: 100%">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Most Reacts</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Post Title</th>
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
                                            <a href="{{ url('/category') . '/' . $item->url_slug . '/' . $item->id }}" class="btn btn-secondary btn-circle" title="View">
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
        <div class="col-lg-6 col-md-12">
            <div class="card shadow mb-4" style="width: 100%">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Most Comments</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Post Title</th>
                                    <th>Category</th>
                                    <th>Comments</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mostComments as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->category->name_en }}</td>
                                        <td>{{ $item->comments_count }}</td>
                                        <td>
                                            <a href="{{ url('/category') . '/' . $item->category->url_slug . '/' . $item->id }}" class="btn btn-secondary btn-circle" title="View">
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
@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const topCountriesData = @json($mostViewsCountries);
    const countryNames = topCountriesData.map(data => data.country);
    const countryCounts = topCountriesData.map(data => data.country_count);

    const ctx = document.getElementById('countryChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: countryNames,
            datasets: [{
                label: 'Country Counts',
                data: countryCounts,
                backgroundColor: '#006934',
                borderColor: '#006934',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: {
                    grid: {
                        display: false,
                    },
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'View Count'
                    }
                }
            }
        }
    });
</script>

@endsection
