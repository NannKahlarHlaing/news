@extends('frontend.index')

@section('content')
    <section class="careers-title">
        <div class="container-fluid">
            <div class="row d-flex-center">
                <div class="col-11">
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
                <div class="col-11">
                    <div class="row">
                        <div class="col-12 career">
                            <div class="row d-flex align-items-center p-4">
                                <div class="col-md-9 col-6">
                                    <h3 class="mb-4">Projects Director</h3>
                                    <span class="d-flex align-items-center" id="full">
                                        <i class="fa-solid fa-circle-plus me-1"></i> Full Details 
                                        <div class="btn btn-transparent btn-circle-fe ms-4 me-1">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        Chiang Mai, Thailand
                                    </span>
                                </div>
                                <div class="col-md-3 col-6 text-end">
                                    <button class="btn btn-danger">Apply Now</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-8 full-details py-4" style="display: none">
                            <div class="row mb-3">
                                <span><strong>Position: &ensp;</strong> Projects Directors</span>
                            </div>
                            <div class="row mb-3">
                                <span><strong>Terms: &ensp;</strong> Full-time, 12-month contract (with possible renewal depending on performance and funding)</span>
                            </div>
                            <div class="row mb-3">
                                <span><strong>Location: &ensp;</strong> Myanmar </span>  
                            </div>
                            <div class="row mb-3">
                                <strong class="mb-2">Organizational Background</strong> 
                                <p class="">The Irrawaddy is an independent non-partisan Burmese digital media company established in Thailand in 1993. It has credible domestic and international standing amongst its Burmese and English audiences. It publishes news, articles, views, analysis, editorial discussions, video-reports, and photo-essays. Since January 2016, the Irrawaddy has switched to digital media platforms in Burmese and English languages, like websites, FB pages, news apps, secure mobile apps, YouTube, Twitter (English) and daily e-news digest (Burmese and English).</p>
                            </div>
                            <div class="row mb-3">
                                <strong class="mb-2">Job Overview</strong> 
                                <p>The Irrawaddy is seeking a Projects Director to manage project development and management – develop media project proposals; regular research on emerging funding opportunities, oversee project monitoring, evaluation, and learning; and write project reports for donors and partners.</p>
                            </div>
                            <div class="row mb-3">
                                <strong class="mb-2">Roles and Responsibilities</strong> 
                                
                                <ul>
                                    <li>Develop project proposals to submit to donors in accordance with donor’s guidelines</li>
                                    <li>Track and prepare project reports according to the relevant requirements including monitoring, evaluation, and learning (MEL)</li>
                                    <li>To lead the project team and coordinate all current projects with other relevant departments</li>
                                </ul>
                            </div>
                            <div class="row mb-3">
                                <strong class="mb-2">Qualifications/Requirements</strong> 
                                <ul>
                                    <li>Develop project proposals to submit to donors in accordance with donor’s guidelines</li>
                                    <li>Track and prepare project reports according to the relevant requirements including monitoring, evaluation, and learning (MEL)</li>
                                    <li>To lead the project team and coordinate all current projects with other relevant departments</li>
                                </ul>
                            </div>
                            <div class="row mb-3">
                                <strong class="mb-2">Benifits</strong> 
                                <p>Salary is negotiable for an experienced candidate with proven track records.</p>
                            </div>
                            <div class="row mb-3">
                                <strong><i>Interested applicants, please apply no later than 30 April 2023 with a letter of interest, a copy of full resume/CV (please mentioned two referrers) in English with the expected salary.</i></strong>
                            </div>
                            <div class="row mb-3">
                                <span><i><strong>Email: application@irrawaddy.org</strong>(early applications are encouraged)</i></span>
                            </div>
                        </div>
                        <div class="col-12 career">
                            <div class="row d-flex align-items-center p-4">
                                <div class="col-md-9 col-6">
                                    <h3 class="mb-4">Finance Manager</h3>
                                    <span class="d-flex align-items-center">
                                        <i class="fa-solid fa-circle-plus me-1"></i> Full Details
                                        <div class="btn btn-transparent btn-circle-fe ms-4 me-1">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        Chiang Mai, Thailand
                                    </span>
                                </div>
                                <div class="col-md-3 col-6 text-end">
                                    <button class="btn btn-danger">Apply Now</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 career">
                            <div class="row d-flex align-items-center p-4">
                                <div class="col-md-9 col-6">
                                    <h3 class="mb-4">Reporter (English Edition)</h3>
                                    <span class="d-flex align-items-center">
                                        <i class="fa-solid fa-circle-plus me-1 "></i> 
                                        Full Details
                                        <div class="btn btn-transparent btn-circle-fe ms-4 me-1">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        Chiang Mai, Thailand
                                    </span>
                                </div>
                                <div class="col-md-3 col-6 text-end">
                                    <button class="btn btn-danger">Apply Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            
            $('#full').click(function () {
                $('.full-details').toggle();
            })
        });
    </script>
@endsection