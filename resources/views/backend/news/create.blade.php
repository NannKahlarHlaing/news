@extends('backend.home')

@section('content')
    <section class="container">
        <h3>News</h3>
        <div class="row">
            <div class="col-md-8 ">
                <form class="form" method="POST" action="" enctype="multipart/form-data"> 
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="occupancy">Occupancy </label>
                        <input type="number" class="form-control" id="occupancy" name="occupancy">
                    </div>
                    <div class="form-group">
                        <label for="bed">Bed</label>
                        <input type="text" class="form-control" id="bed" name="bed">
                    </div>
                    <div class="form-group">
                        <label for="size">Size (sqm) </label>
                        <input type="number" class="form-control" id="name" name="size">
                    </div>
                    <div class="form-group">
                        <label for="price">Price </label>
                        <input type="number" class="form-control" id="price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea class="form-control" id="desc" rows="3" name="desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Upload Images</label>
                        <input type="file" class="form-control" name="images[]" multiple>
                    </div>
                    <div class="form-group">    
                        <div class="row">
                            <!-- @foreach ($facilities as $item)
                                <div class="col-md-3">
                                    <input type="checkbox" name="facilities[]" value="{{ $item->name }}">
                                    <label>{{ $item->name }}</label>
                                </div>
                            @endforeach -->
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection