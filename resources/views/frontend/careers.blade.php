@extends('frontend.index')

@section('content')
    <section class="careers-title">
        <div class="container-fluid">
            <div class="row d-flex-center">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <h2>Careers</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 ">
        <div class="container-fluid">
            <div class="row d-flex-center">
                <div class="col-12">
                    <div class="row">
                        @foreach ($posts as $item)
                        <div class="col-12 career">
                            <div class="row d-flex align-items-center p-4">
                                <div class="col-md-9 col-6">
                                    <h3 class="mb-4">{{ $item->position }}</h3>
                                    <span class="full d-flex align-items-center" >
                                        <span class="item-id d-none">{{$item->id }}</span>
                                        <i class="fa-solid fa-circle-plus me-1"></i> Full Details
                                        <div class="btn btn-transparent btn-circle-fe ms-4 me-1">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        {{ $item->location }}
                                    </span>
                                </div>
                                <div class="col-md-3 col-6 text-end">
                                    <button class="btn btn-danger">Apply Now</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-8 full-details py-4 {{ $item->id }}">
                            <div class="row mb-3">
                                <span><strong>Position: &ensp;</strong> {{ $item->position }}</span>
                            </div>
                            <div class="row mb-3">
                                <span><strong>Terms: &ensp;</strong> {{ $item->terms }}</span>
                            </div>
                            <div class="row mb-3">
                                <span><strong>Location: &ensp;</strong> {{ $item-> location }} </span>
                            </div>
                            <div class="row mb-3">
                                <strong class="mb-2">Organizational Background</strong>
                                {!! str_replace("\n", '', $item->org_background) !!}
                            </div>
                            <div class="row mb-3">
                                <strong class="mb-2">Job Overview</strong>
                                {!! nl2br($item->job_overview) !!}
                            </div>
                            <div class="row mb-3">
                                <strong class="mb-2">Roles and Responsibilities</strong>
                                {!! str_replace("\n", '', $item->role) !!}
                            </div>
                            <div class="row mb-3">
                                <strong class="mb-2">Qualifications/Requirements</strong>
                                {!! nl2br($item->qualification) !!}
                            </div>
                            <div class="row mb-3">
                                <strong class="mb-2">Benifits</strong>
                                <p>{{ $item->benefits }}</p>
                            </div>
                            <div class="row mb-3">
                                <strong><i>Interested applicants, please apply no later than {{ $item->latest_date }} with a letter of interest, a copy of full resume/CV (please mentioned two referrers) in English with the expected salary.</i></strong>
                            </div>
                            <div class="row mb-3">
                                <span><i><strong>Email: example@gmail.com</strong>(early applications are encouraged)</i></span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.full-details').hide();
            $('.full').click(function() {
                var itemId = $(this).find('.item-id').text();
                $('.'+itemId).toggle();
            });
            });
    </script>
@endsection
