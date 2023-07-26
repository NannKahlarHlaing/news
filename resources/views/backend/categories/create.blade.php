@extends('backend.index')

@section('content')
    <section class="container-fluid">
        <h3 class="my-3">Add
            @if ($route_name == 'category.create_form')
                Category
            @else
                Tag
            @endif
        </h3>
        <div class="row">
            <div class="col-md-8">
                <form class="form" method="POST" action="{{ route(Route::currentRouteName() == 'category.create_form' ? 'category.create' : 'tag.create') }}" enctype="multipart/form-data">
                    <nav class="mb-3">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">English</button>
                          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Myanmar</button>
                          <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Chinese</button>
                        </div>
                    </nav>
                    @csrf
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="form-group">
                                <label for="name_en">
                                    @if ($route_name == 'category.create_form')
                                        Category_Name_EN
                                    @else
                                        Tag_Name_EN
                                    @endif
                                </label>
                                <input type="text" class="form-control @error('name_en') is-invalid @enderror" value="{{ old('name_en') }}" name="name_en">
                                @error('name_en')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="form-group">
                                <label for="name_mm">
                                    @if ($route_name == 'category.create_form')
                                        Category_Name_MM
                                    @else
                                        Tag_Name_MM
                                    @endif
                                </label>
                                <input type="text" class="form-control @error('name_mm') is-invalid @enderror" value="{{ old('name_mm') }}" name="name_mm">
                                @error('name_mm')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="form-group">
                                <label for="name_ch">
                                    @if ($route_name == 'category.create_form')
                                        Category_Name_CH
                                    @else
                                        Tag_Name_CH
                                    @endif
                                </label>
                                <input type="text" class="form-control @error('name_ch') is-invalid @enderror" value="{{ old('name_ch') }}" name="name_ch">
                                @error('name_ch')
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
