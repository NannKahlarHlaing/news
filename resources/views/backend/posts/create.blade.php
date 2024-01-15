@extends('backend.index')

@section('css')

<style>
    .scroll-window {
      height: 80px;
      overflow: auto;
      border: 1px solid #ccc;
      padding: 5px 15px;
      background-color: #f9f9f9;
    }
  </style>

@endsection

@section('content')
    <section class="container-fluid">
        <h5 class="my-3">Add Post</h5>
        <div class="row">
            <div class="col-md-8 ">
                <form class="form" method="POST" action="{{route('backend.posts.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <select class="form-select @error('lang') is-invalid @enderror " name="lang">
                            <option value="" {{ old('lang') == ''? "selected":"" }}>Choose Language</option>
                            <option value="en" {{ old('lang') == 'en'? "selected":"" }}>English</option>
                            <option value="mm" {{ old('lang') == 'mm'? "selected":"" }}>Myanmar</option>
                            <option value="ch" {{ old('lang') == 'ch'? "selected":"" }}>Chinese</option>
                            <option value="ta" {{ old('lang') == 'ta'? "selected":"" }}>Ta'ang</option>
                        </select>
                        @error('lang')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="img_link">Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('img_link') is-invalid @enderror" id="img_link" name="img_link" value="{{ old('img_link') }}">
                        @error('img_link')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Categories <span class="text-danger">*</span></label>
                            <select class=" form-select @error('category') is-invalid @enderror" id="category" name="category" aria-label="Default select example">
                                <option value="" selected hidden>Select Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id  }}" {{ old('category') == $item->id? "selected":"" }}>{{ $item->name_en }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>SubCategories</label>
                            <select class=" form-select @error('sub_category') is-invalid @enderror" id="sub_category" name="sub_category" aria-label="Default select example">
                                <option value="" selected hidden>Select SubCategory</option>
                                @foreach ($sub_categories as $item)
                                    <option value="{{ $item->id  }}" {{ old('sub_category') == $item->id? "selected":"" }}>{{ $item->name_en }}</option>
                                @endforeach
                            </select>
                            @error('sub_category')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Tag </label>
                            <div class="form-control scroll-window">
                                @foreach ($tags as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $item->id }}" {{ is_array(old('tags')) && in_array($item->id, old('tags')) ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $item->name_en }}</label>
                                    </div>
                                @endforeach
                            </div>

                            @if ($errors->has('tags'))
                            <div class="text-danger">
                                {{ $errors->first('tags') }}
                            </div>
                        @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="topic">Topics</label>
                        <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic" value="{{ old('topic') }}">
                        @error('topic')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="short_desc">Short Description</label>
                        <textarea class="short_summernote form-control @error('short_desc') is-invalid @enderror"name="short_desc" id="short_desc" >{{ old('short_desc') }}</textarea>
                        @error('short_desc')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">Description </label>
                        <textarea class="summernote form-control @error('desc') is-invalid @enderror"name="desc" id="desc" rows="10">{{ old('desc') }}</textarea>
                        @error('desc')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
<!-- Example: Using the jQuery CDN (Content Delivery Network) -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <script>
        $(document).ready(function(){
            $('#category').change(function(){
                var category = $('#category').val();
                $.ajax({
                    url: '{{ route('sub_category.get') }}',
                    type: 'GET',
                    data: {'category': category},
                    success: function(response){

                        $('#sub_category').empty();

                        $('#sub_category').append('<option value="" disabled selected hidden>Select SubCategory</option>');
                        $.each(response, function(key, value){
                            $('#sub_category').append($('<option>', {
                                value: value.id,
                                text: value.name_en
                            }));
                        });

                    }
                })
            });
        });
    </script>

@endsection
