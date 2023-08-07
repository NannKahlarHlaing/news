@extends('backend.index')

@section('css')
<style>
    .scroll-window {
      height: 150px;
      overflow: auto;
      border: 1px solid #ccc;
      padding: 5px 15px;
      background-color: #f9f9f9;
    }
</style>
@endsection
@section('content')

<section class="container-fluid">
    <h3 class="my-3">{{ $menu_name }}</h3>
    <div class="row">
        <div class="col-md-4">
            <h6 class="mb-3">Add Menu Items From Pages</h6>
            <div class="form-control scroll-window mb-3">
                @foreach ($pages as $item)
                    <div class="form-check mb-3">
                        <input class="form-check-input page-input-check" type="checkbox" name="{{ $item->title_en }}" value="{{ $item->id }}" data-page-input-id="page_input_{{ $item->id }}">
                        <label class="form-check-label">{{ $item->title_en }}</label>
                        <input type="text" id="page_input_{{ $item->id }}" placeholder="Enter Link" class="form-control input-link @error('link') is-invalid @enderror" id="" name="link" value="{{ old('link') }}">
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-save">Save</button>
            </div>
        </div>
    </div>
</section>

@endsection
