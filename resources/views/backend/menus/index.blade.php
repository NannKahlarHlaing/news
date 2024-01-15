@extends('backend.index')

@section('content')

<section class="container-fluid">
    <div class="row mb-3">
        <div class="col-lg-4 col-md-6">
            <div class="card text-start">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h6>All Menu</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('backend.all_menus.index') }}" class="btn btn-primary px-3">Edit Menus</a>
                        </div>
                    </div>

                </div>
              </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="card text-start">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <h6>Main Menu</h6>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ url('/admin/menu/update/1')}}" class="btn btn-primary px-3">Edit English Menu Items</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ url('/admin/menu/update/2')}}" class="btn btn-primary px-3">Edit Myanmar Menu Items</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ url('/admin/menu/update/3')}}" class="btn btn-primary px-3">Edit Chinese Menu Items</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ url('/admin/menu/update/7')}}" class="btn btn-primary px-3">Edit Ta'ang Menu Items </a>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="card text-start">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h6>Footer Menu</h6>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ url('/admin/menu/update/4')}}" class="btn btn-primary px-3">Edit English Menu Items </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ url('/admin/menu/update/5')}}" class="btn btn-primary px-3">Edit Myanmar Menu Items </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ url('/admin/menu/update/6')}}" class="btn btn-primary px-3">Edit Chinese Menu Items </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ url('/admin/menu/update/8')}}" class="btn btn-primary px-3">Edit Ta'ang Menu Items </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
        
</section>

@endsection
