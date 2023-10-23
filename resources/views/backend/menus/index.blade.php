@extends('backend.index')

@section('content')

<section class="container-fluid">
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card text-start">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <strong>All Menu</strong>
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
        <div class="col-lg-4">
            <div class="card text-start">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <strong>Main Menu EN</strong>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ url('/admin/menu/update/1')}}" class="btn btn-primary px-3">Edit Menu Items</a>
                        </div>
                    </div>

                </div>
              </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card text-start">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <strong>Main Menu MM</strong>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ url('/admin/menu/update/2')}}" class="btn btn-primary px-3">Edit Menu Items</a>
                        </div>
                    </div>

                </div>
              </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card text-start">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <strong>Main Menu CH</strong>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ url('/admin/menu/update/3')}}" class="btn btn-primary px-3">Edit Menu Items</a>
                        </div>
                    </div>

                </div>
              </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card text-start">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <strong>Main Menu TA</strong>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ url('/admin/menu/update/7')}}" class="btn btn-primary px-3">Edit Menu Items </a>
                        </div>
                    </div>

                </div>
              </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card text-start">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <strong>Footer Menu EN</strong>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ url('/admin/menu/update/4')}}" class="btn btn-primary px-3">Edit Menu Items </a>
                        </div>
                    </div>

                </div>
              </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card text-start">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <strong>Footer Menu MM</strong>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ url('/admin/menu/update/5')}}" class="btn btn-primary px-3">Edit Menu Items </a>
                        </div>
                    </div>

                </div>
              </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card text-start">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <strong>Footer Menu CH</strong>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ url('/admin/menu/update/6')}}" class="btn btn-primary px-3">Edit Menu Items </a>
                        </div>
                    </div>

                </div>
              </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card text-start">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <strong>Footer Menu TA</strong>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ url('/admin/menu/update/8')}}" class="btn btn-primary px-3">Edit Menu Items </a>
                        </div>
                    </div>

                </div>
              </div>
        </div>
    </div>
</section>

@endsection
