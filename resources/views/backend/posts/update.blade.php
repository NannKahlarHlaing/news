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
    /* Add more custom CSS styles as needed */
  </style>

@endsection

@section('content')
    <section class="container-fluid">
        <h5 class="my-3">Edit Post</h5>
        <div class="row">
            <div class="col-md-8 ">
                <form class="form" method="POST" action="{{route('backend.posts.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <div class="form-group">
                        <select class="form-select form-select @error('lang') is-invalid @enderror " name="lang">
                            <option value="" {{ old('lang') == ''? "selected":"" }}>Choose Language</option>
                            <option value="en" {{ old('lang', $post->lang) == 'en'? "selected":"" }}>English</option>
                            <option value="mm" {{ old('lang', $post->lang) == 'mm'? "selected":"" }}>Myanmar</option>
                            <option value="ch" {{ old('lang', $post->lang) == 'ch'? "selected":"" }}>Chinese</option>
                            <option value="ta" {{ old('lang', $post->lang) == 'ta'? "selected":"" }}>Ta'ang</option>
                        </select>
                        @error('lang')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="img_link">Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('img_link') is-invalid @enderror" id="img_link" name="img_link">
                        @error('img_link')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        <div class="col-lg-12 mt-2">
                            <img src="/storage/images/thumbnail/{{ $post->img_link }}" width="200" height="150">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Categories <span class="text-danger">*</span></label>
                            <select class="form-control form-select @error('category') is-invalid @enderror" id="category" name="category" aria-label="Default select example">
                                <option value="">Select Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id  }}" {{ old('category', $post->category_id) == $item->id? "selected":"" }}>{{ $item->name_en }}</option>
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
                            <select class="form-control form-select @error('sub_category') is-invalid @enderror" id="sub_category" name="sub_category" aria-label="Default select example">
                                <option value="">Select SubCategory</option>
                                @foreach ($sub_categories as $item)
                                    <option value="{{ $item->id  }}" {{ old('sub_category', $post->sub_category_id) == $item->id? "selected":"" }}>{{ $item->name_en }}</option>
                                @endforeach
                            </select>
                            @error('sub_category')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Tag</label>
                            <div class="form-control scroll-window">
                                @foreach ($all_tags as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $item->id }}" @if(in_array($item->id, $tags)) checked @endif>
                                        <label class="form-check-label">{{ $item->name_en }}</label>
                                    </div>
                                @endforeach
                            </div>

                            @error('category')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title">Title </label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="topic">Topics</label>
                        <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic" value="{{ old('topic', $post->topic) }}">
                        @error('topic')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="short_desc">Short Description </label>
                        <textarea class="short_summernote form-control @error('short_desc') is-invalid @enderror"name="short_desc" id="short_desc" >{{ old('short_desc', $post->short_desc) }}</textarea>
                        @error('short_desc')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">Description </label>
                        <textarea class="summernote form-control @error('desc') is-invalid @enderror"name="desc" id="desc" rows="10">{{ old('desc', $post->desc) }}</textarea>
                        @error('desc')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script>
        $(document).ready(function(){
            var category = $('#category').val();
                $.ajax({
                    url: '{{ route('sub_category.get') }}',
                    type: 'GET',
                    data: {'category': category},
                    success: function(response){

                        $('#sub_category').empty();

                        $('#sub_category').append('<option value="" disabled hidden>Select SubCategory</option>');
                        $.each(response, function(key, value){
                            $('#sub_category').append($('<option>', {
                                value: value.id,
                                text: value.name_en
                            }));
                        });

                    }
                });
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
                });
            });
        });
    </script>
@endsection


