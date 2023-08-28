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

    <form class="form" action="" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="menu_id" name="menu_id" value="{{ $id }}" />
        <div class="row">
            <div class="col-md-4">
                <h6 class="mb-3">Edit Menu Items From Pages</h6>
                <div class="form-control scroll-window mb-3">
                    @foreach ($pages as $item)
                        @php
                            if($id == '2' || $id == '3'){
                                $name = $item->title_mm;
                            }else if($id == '5' || $id == '6'){
                                $name = $item->title_ch;
                            }else{
                                $name = $item->title_en;
                            }
                            if($name == '' || $name == NULL){
                                $name = $item->title_en;
                            }
                            $menu = $menu_items->where('name', $name)->first();
                        @endphp
                        <div class="form-check mb-3">
                            <input class="form-check-input page-input-check" type="checkbox" name="{{ $name }}" value="{{ $item->id }}" data-page-input-id="page_input_{{ $item->id }}" {{ $menu ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $name }}</label>
                            <input type="text" id="page_input_{{ $item->id }}" placeholder="Enter Link" class="form-control input-link @error('link') is-invalid @enderror" id="" name="link" value="{{ old('link', ($menu ? $menu->link : '')) }}">
                        </div>
                    @endforeach
                </div>
            </div>
            @if ($menu_name == 'Main Menu EN' || $menu_name == 'Main Menu MM' || $menu_name == 'Main Menu CH')
                <div class="col-md-4">
                    <h6 class="mb-3">Edit Menu Items From Categories</h6>
                    <div class="form-control scroll-window mb-3">
                        @foreach ($categories as $item)
                            @php
                                if($id == '2' || $id == '3'){
                                    $name = $item->name_mm;
                                }else if($id == '5' || $id == '6'){
                                    $name = $item->name_ch;
                                }else{
                                    $name = $item->name_en;
                                }
                                if($name == '' || $name == NULL){
                                    $name = $item->name_en;
                                }
                                $menu = $menu_items->where('name', $name)->first();
                            @endphp
                            <div class="form-check mb-3">
                                <input class="form-check-input category-input-check" type="checkbox" name="{{ $name }}" value="{{ $item->id }}" data-category-input-id="category_input_{{ $item->id }}" {{ $menu ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $name }}</label>
                                <input type="text" id="category_input_{{ $item->id }}" placeholder="Enter Link" class="form-control input-link @error('link') is-invalid @enderror" id="" name="link" value="{{ old('link', ($menu ? $menu->link : '')) }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <h6 class="mb-3">Edit Menu Items From SubCategories</h6>
                    <div class="form-control scroll-window mb-3">
                        @foreach ($sub_categories as $item)
                            @php
                                if($id == '2' || $id == '3'){
                                    $name = $item->name_mm;
                                }else if($id == '5' || $id == '6'){
                                    $name = $item->name_ch;
                                }else{
                                    $name = $item->name_en;
                                }
                                if($name == '' || $name == NULL){
                                    $name = $item->name_en;
                                }
                                $menu = $menu_items->where('name', $name)->first();
                            @endphp
                            <div class="form-check mb-3">
                                <input class="form-check-input subcategory-input-check" type="checkbox" name="{{ $name }}" value="{{ $item->id }}" data-subcategory-input-id="subcategory_input_{{ $item->id }}" {{ $menu ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $name }}</label>
                                <input type="text" id="subcategory_input_{{ $item->id }}" placeholder="Enter Link" class="form-control input-link @error('link') is-invalid @enderror" id="" name="link" value="{{ old('link', ($menu ? $menu->link : '')) }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-save">Save</button>
            </div>
        </div>
    </form>

</section>

@endsection

@section('js')
<script>
    $(document).ready(function(){
        $(".input-link").hide();

        $('.page-input-check').each(function() {
            var inputId = $(this).data("page-input-id");
            var inputBox = $("#" + inputId);
            if ($(this).is(':checked')) {
                inputBox.show();
            }
        });

        $('.subcategory-input-check').each(function() {
            var inputId = $(this).data("subcategory-input-id");
            var inputBox = $("#" + inputId);
            if ($(this).is(':checked')) {
                inputBox.show();
            }
        });

        $('.category-input-check').each(function() {
            var inputId = $(this).data("category-input-id");
            var inputBox = $("#" + inputId);
            if ($(this).is(':checked')) {
                inputBox.show();
            }
        });

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
            var inputBox = $("#" + inputId);

            if ($(this).prop("checked")) {
                inputBox.show();
            } else {
                inputBox.hide();
            }
        });

        $(".subcategory-input-check").change(function() {
            var inputId = $(this).data("subcategory-input-id");
            var inputBox = $("#" + inputId);

            if ($(this).prop("checked")) {
                inputBox.show();
            } else {
                inputBox.hide();
            }
        });

        $('.btn-save').click(function(event){

            var menu_id = $("#menu_id").val();

            console.log(menu_id);

            var formData = [];

            var uncheckedData = [];

            $(".page-input-check:not(:checked)").each(function() {
                var checkboxName = $(this).attr("name");
                uncheckedData.push({
                    name: checkboxName
                });
            });

            $(".category-input-check:not(:checked)").each(function() {
                var checkboxName = $(this).attr("name");
                uncheckedData.push({
                    name: checkboxName
                });
            });

            $(".subcategory-input-check:not(:checked)").each(function() {
                var checkboxName = $(this).attr("name");
                uncheckedData.push({
                    name: checkboxName
                });
            });

            $(".page-input-check:checked").each(function() {
                var checkboxName = $(this).attr("name");
                var linkInputName = $(this).data("page-input-id");
                var linkValue = $("#" + linkInputName).val();
                var isChecked = $(this).prop("checked");

                formData.push({
                    checkboxName: checkboxName,
                    linkValue: linkValue
                });
            });

            $(".category-input-check:checked").each(function() {
                var checkboxName = $(this).attr("name");
                var linkInputName = $(this).data("category-input-id");
                var linkValue = $("#" + linkInputName).val();
                var isChecked = $(this).prop("checked");
                formData.push({
                    checkboxName: checkboxName,
                    linkValue: linkValue
                });
            });

            $(".subcategory-input-check:checked").each(function() {
                var checkboxName = $(this).attr("name");
                var linkInputName = $(this).data("subcategory-input-id");
                var linkValue = $("#" + linkInputName).val();
                var isChecked = $(this).prop("checked");
                formData.push({
                    checkboxName: checkboxName,
                    linkValue: linkValue
                });
            });

            $.ajax({
                url: "{{ route('backend.menu_items.update') }}",
                type: "GET",
                data: { 'menu_id': menu_id, 'formData': formData, 'uncheckedData': uncheckedData },
                dataType: 'json',
                success: function(response) {
                    console.log(response);

                },
                error: function(error) {
                    console.error("Error while saving data.");
                }
            });
        });

    });
</script>
@endsection
