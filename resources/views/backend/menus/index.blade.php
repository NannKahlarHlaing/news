@extends('backend.index')

@section('content')

<section class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="card text-start">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <strong>Main Menu</strong>
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
        <div class="col-md-4">
            <div class="card text-start">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <strong>Footer Menu</strong>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ url('/admin/menu/update/2')}}" class="btn btn-primary px-3">Edit Menu Items </a>
                        </div>
                    </div>

                </div>
              </div>
        </div>
    </div>
</section>

@endsection
