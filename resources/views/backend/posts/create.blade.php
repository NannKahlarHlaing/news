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
        <h3 class="my-3">Add Post</h3>
        <div class="row">
            <div class="col-md-8 ">
                <form class="form" method="POST" action="{{route('backend.posts.create') }}" enctype="multipart/form-data">
                    @csrf
                    <nav class="mb-3">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">English</button>
                          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Myanmar</button>
                          <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Chinese</button>
                        </div>
                    </nav>
                    <div class="form-group">
                        <label for="img_link">Image</label>
                        <input type="file" class="form-control @error('img_link') is-invalid @enderror" id="img_link" name="img_link" value="{{ old('img_link') }}">
                        @error('img_link')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Categories</label>
                            <select class="form-control form-select @error('category') is-invalid @enderror" id="category" name="category" aria-label="Default select example">
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
                            <select class="form-control form-select @error('sub_category') is-invalid @enderror" id="sub_category" name="sub_category" aria-label="Default select example">
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
                            <label>Tag</label>
                            <div class="form-control scroll-window">
                                @foreach ($tags as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $item->id }}">
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

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="form-group">
                                <label for="title_en">Title_EN</label>
                                <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en" value="{{ old('title_en') }}">
                                @error('title_en')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="topic_en">Topics_EN</label>
                                <input type="text" class="form-control @error('topic_en') is-invalid @enderror" id="topic_en" name="topic_en" value="{{ old('topic_en') }}">
                                @error('topic_en')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_desc_en">Short Description_EN</label>
                                <textarea class="short_summernote form-control @error('short_desc_en') is-invalid @enderror"name="short_desc_en" id="short_desc_en" >{{ old('short_desc_en') }}</textarea>
                                @error('short_desc_en')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="desc_en">Description_EN</label>
                                <textarea class="summernote form-control @error('desc_en') is-invalid @enderror"name="desc_en" id="desc_en" rows="10">{{ old('desc_en') }}</textarea>
                                @error('desc_en')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="form-group">
                                <label for="title_mm">Title_MM</label>
                                <input type="text" class="form-control @error('title_mm') is-invalid @enderror" id="title_mm" name="title_mm" value="{{ old('title_mm') }}">
                                @error('title_mm')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="topic_mm">Topics_MM</label>
                                <input type="text" class="form-control @error('topic_mm') is-invalid @enderror" id="topic_mm" name="topic_mm" value="{{ old('topic_mm') }}">
                                @error('topic_mm')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_desc_mm">Short Description_MM</label>
                                <textarea class="short_summernote form-control @error('short_desc_mm') is-invalid @enderror"name="short_desc_mm" id="short_desc_mm" >{{ old('short_desc_mm') }}</textarea>
                                @error('short_desc_mm')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="desc_mm">Description_EN</label>
                                <textarea class="summernote form-control @error('desc_mm') is-invalid @enderror"name="desc_mm" id="desc_mm" rows="10">{{ old('desc_mm') }}</textarea>
                                @error('desc_mm')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="form-group">
                                <label for="title_ch">Title_CH</label>
                                <input type="text" class="form-control @error('title_ch') is-invalid @enderror" id="title_ch" name="title_ch" value="{{ old('title_ch') }}">
                                @error('title_ch')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="topic_ch">Topics_CH</label>
                                <input type="text" class="form-control @error('topic_ch') is-invalid @enderror" id="topic_ch" name="topic_ch" value="{{ old('topic_ch') }}">
                                @error('topic_ch')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_desc_ch">Short Description_CH</label>
                                <textarea class="short_summernote form-control @error('short_desc_ch') is-invalid @enderror"name="short_desc_ch" id="short_desc_ch" >{{ old('short_desc_ch') }}</textarea>
                                @error('short_desc_ch')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="desc_ch">Description_CH</label>
                                <textarea class="summernote form-control @error('desc_ch') is-invalid @enderror"name="desc_ch" id="desc_ch" rows="10">{{ old('desc_ch') }}</textarea>
                                @error('desc_ch')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
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
