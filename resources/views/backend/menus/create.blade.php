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
    /* Add more custom CSS styles as needed */
  </style>

@endsection

@section('content')
<section class="container-fluid">
    <h3 class="my-3">Add Menu Items</h3>
    <div class="row">
        <div class="col-lg-8">
            <form class="form" method="POST" action="{{route('backend.pages.create') }}" enctype="multipart/form-data">
                @csrf
                <div class="radio-container mb-3 h5">
                    <label class="radio-inline me-5">
                        <input type="radio" name="menu_id" value="1"> Main Menu
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="menu_id" value="2"> Footer Menu
                    </label>
                </div>
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

                    <div class="col-md-4">
                        <h6 class="mb-3">Add Menu Items From Categories</h6>
                        <div class="form-control scroll-window mb-3">
                            @foreach ($categories as $item)
                                <div class="form-check mb-3">
                                    <input class="form-check-input category-input-check" type="checkbox" name="{{ $item->name_en }}" value="{{ $item->id }}" data-category-input-id="category_input_{{ $item->id }}">
                                    <label class="form-check-label">{{ $item->name_en }}</label>
                                    <input type="text" id="category_input_{{ $item->id }}" placeholder="Enter Link" class="form-control input-link @error('link') is-invalid @enderror" id="" name="link" value="{{ old('link') }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            {{-- <button type="submit" class="btn btn-primary btn-save">Save</button> --}}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h6 class="mb-3">Add Menu Items From SubCategories</h6>
                        <div class="form-control scroll-window mb-3">
                            @foreach ($sub_categories as $item)
                                <div class="form-check mb-3">
                                    <input class="form-check-input subcategory-input-check" type="checkbox" name="{{ $item->name_en }}" value="{{ $item->id }}" data-subcategory-input-id="subcategory_input_{{ $item->id }}">
                                    <label class="form-check-label">{{ $item->name_en }}</label>
                                    <input type="text" id="subcategory_input_{{ $item->id }}" placeholder="Enter Link" class="form-control input-link @error('link') is-invalid @enderror" id="" name="link" value="{{ old('link') }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            {{-- <button type="submit" class="btn btn-primary btn-save">Save</button> --}}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@section('js')
<script>
    $(document).ready(function(){
        $(".input-link").hide();

        $(".page-input-check").change(function() {
            var inputId = $(this).data("page-input-id");
            var inputBox = $("#" + inputId);

            if ($(this).prop("checked")) {
                inputBox.show();
            } else {
                inputBox.hide();
            }
        });

        $(".category-input-check").change(function() {
            var inputId = $(this).data("category-input-id");
            console.log(inputId);
            var inputBox = $("#" + inputId);

            if ($(this).prop("checked")) {
                inputBox.show();
            } else {
                inputBox.hide();
            }
        });

        $(".subcategory-input-check").change(function() {
            var inputId = $(this).data("subcategory-input-id");
            console.log(inputId);
            var inputBox = $("#" + inputId);

            if ($(this).prop("checked")) {
                inputBox.show();
            } else {
                inputBox.hide();
            }
        });

        $('.btn-save').click(function(event){

            var menu_id = $("input[name='menu_id']:checked").val();

            var formData = [];

            $(".page-input-check:checked").each(function() {
                var checkboxName = $(this).attr("name");
                var linkInputName = $(this).data("page-input-id");
                var linkValue = $("#" + linkInputName).val();
                formData.push({
                    checkboxName: checkboxName,
                    linkValue: linkValue
                });
            });

            $(".category-input-check:checked").each(function() {
                var checkboxName = $(this).attr("name");
                var linkInputName = $(this).data("category-input-id");
                var linkValue = $("#" + linkInputName).val();
                formData.push({
                    checkboxName: checkboxName,
                    linkValue: linkValue
                });
            });

            $(".subcategory-input-check:checked").each(function() {
                var checkboxName = $(this).attr("name");
                var linkInputName = $(this).data("subcategory-input-id");
                var linkValue = $("#" + linkInputName).val();
                formData.push({
                    checkboxName: checkboxName,
                    linkValue: linkValue
                });
            });

            $.ajax({
                url: "{{ route('backend.menu_items.create') }}",
                type: "GET",
                data: { 'menu_id': menu_id, 'formData': formData },
                dataType: 'json',
                success: function(response) {
                    window.location.href = "{{ route('backend.menus') }}";
                },
                error: function(error) {
                    console.error("Error while saving data.");
                }
            });
        });

    });
</script>
@endsection
@endsection
