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
    <div class="row">
        <div class="col-12">
            <h5 class="my-3">{{ $menu_name }}</h5>
            <form class="form" action="" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="menu_id" name="menu_id" value="{{ $id }}" />
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="mb-3">Edit Menu Items From Pages</h6>
                        <div class="form-control scroll-window mb-3">
                            @php
                                if($id == '2' || $id == '5'){
                                        $name = 'ဓာတ်ပုံများ';
                                        $link = '/mm/photos';
                                    }else if($id == '3' || $id == '6'){
                                        $link = '/ch/photos';
                                        $name = '相片';
                                    }else if($id == '7' || $id == '8'){
                                        $link = '/ta/photos';
                                        $name = 'ရူပ်အရာင်';
                                    }elseif($id == '1' || $id == '4'){
                                        $link = '/en/photos';
                                        $name = 'Photos';
                                    }
                                    if($name == '' || $name == NULL){
                                        $link = '/en/photos';
                                        $name = 'Photos';
                                    }
                                    $menu = $menu_items->where('item_id', 'p-1')->where('type', 'page')->first();
                            @endphp
                            <div class="form-check mb-3">
                                <input class="form-check-input page-input-check" type="checkbox" name="{{ $name }}" value="" data-page-input-id="page_input_photos" data-page-type="page" data-page-item-id="p-1" {{ $menu ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $name }}</label>
                                <input type="text" id="page_input_photos" placeholder="Enter Link" class="form-control input-link @error('link') is-invalid @enderror" id="" name="link" value="{{ old('link', ($menu ? $menu->link : $link)) }}">
                            </div>

                            @php
                                if($id == '2' || $id == '5'){
                                    $link = '/mm/photo_essays';
                                        $name = 'ဓာတ်ပုံအက်ဆေးများ';
                                    }else if($id == '3' || $id == '6'){
                                        $link = '/ch/photo_essays';
                                        $name = '照片随笔';
                                    }
                                    else if($id == '7' || $id == '8'){
                                        $link = '/ta/photo_essays';
                                        $name = 'ရုပ်အရာင် Essay';
                                    }elseif($id == '1' || $id == '4'){
                                        $link = '/en/photo_essays';
                                        $name = 'Photo Essays';
                                    }
                                    if($name == '' || $name == NULL){
                                        $link = '/en/photo_essays';
                                        $name = 'Photo Essays';
                                    }
                                $menu = $menu_items->where('item_id', 'p-2')->where('type', 'page')->first();
                            @endphp
                            <div class="form-check mb-3">
                                <input class="form-check-input page-input-check" type="checkbox" name="{{ $name }}" value="" data-page-input-id="page_input_photo_essays" data-page-type="page" data-page-item-id="p-2" {{ $menu ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $name }}</label>
                                <input type="text" id="page_input_photo_essays" placeholder="Enter Link" class="form-control input-link @error('link') is-invalid @enderror" id="" name="link" value="{{ old('link', ($menu ? $menu->link : $link)) }}">
                            </div>

                            @php
                                if($id == '2' || $id == '5'){
                                    $link = '/mm/videos';
                                        $name = 'Ta\'ang TV';
                                    }else if($id == '3' || $id == '6'){
                                        $link = '/ch/videos';
                                        $name = '视频';
                                    }
                                    else if($id == '7' || $id == '8'){
                                        $link = '/ta/videos';
                                        $name = 'Ta\'ang TV';
                                    }elseif($id == '1' || $id == '4'){
                                        $link = '/en/videos';
                                        $name = 'Ta\'ang TV';
                                    }
                                    if($name == '' || $name == NULL){
                                        $link = '/videos';
                                        $name = 'Ta\'ang TV';
                                    }
                                    $menu = $menu_items->where('item_id', 'p-3')->where('type', 'page')->first();
                            @endphp
                            <div class="form-check mb-3">
                                <input class="form-check-input page-input-check" type="checkbox" name="{{ $name }}" value="" data-page-input-id="page_input_videos" data-page-type="page" data-page-item-id="p-3" {{ $menu ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $name }}</label>
                                <input type="text" id="page_input_videos" placeholder="Enter Link" class="form-control input-link @error('link') is-invalid @enderror" id="" name="link" value="{{ old('link', ($menu ? $menu->link : $link)) }}">
                            </div>

                            @php
                                if($id == '2' || $id == '5'){
                                    $link = '/mm/cartoons';
                                        $name = 'ကာတွန်းများ';
                                    }else if($id == '3' || $id == '6'){
                                        $link = '/ch/cartoons';
                                        $name = '卡通';
                                    }else if($id == '7' || $id == '8'){
                                        $link = '/ta/cartoons';
                                        $name = 'ကာတူန်း';
                                    }elseif($id == '1' || $id == '4'){
                                        $link = '/en/cartoons';
                                        $name = 'Cartoons';
                                    }
                                    if($name == '' || $name == NULL){
                                        $link = '/en/cartoons';
                                        $name = 'Cartoons';
                                    }
                                    $menu = $menu_items->where('item_id', 'p-4')->where('type', 'page')->first();
                            @endphp
                            <div class="form-check mb-3">
                                <input class="form-check-input page-input-check" type="checkbox" name="{{ $name }}" value="" data-page-input-id="page_input_cartoons" data-page-type="page" data-page-item-id="p-4" {{ $menu ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $name }}</label>
                                <input type="text" id="page_input_cartoons" placeholder="Enter Link" class="form-control input-link @error('link') is-invalid @enderror" id="" name="link" value="{{ old('link', ($menu ? $menu->link : $link)) }}">
                            </div>

                            @php
                                if($id == '2' || $id == '5'){
                                    $link = '/mm/contact';
                                        $name = 'ဆက်သွယ်ရန်';
                                    }else if($id == '3' || $id == '6'){
                                        $link = '/ch/contact';
                                        $name = '联络我们';
                                    }else if($id == '7' || $id == '8'){
                                        $link = '/ta/contact';
                                        $name = 'ဒီကဆိုပ်ကဘား';
                                    }elseif($id == '1' || $id == '4'){
                                        $link = '/en/contact';
                                        $name = 'Contact';
                                    }
                                    if($name == '' || $name == NULL){
                                        $link = '/contact';
                                        $name = 'Contact';
                                    }
                                    $menu = $menu_items->where('item_id', 'p-5')->where('type', 'page')->first();
                            @endphp
                            <div class="form-check mb-3">
                                <input class="form-check-input page-input-check" type="checkbox" name="{{ $name }}" value="" data-page-input-id="page_input_contact" data-page-type="page" data-page-item-id="p-5" {{ $menu ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $name }} </label>
                                <input type="text" id="page_input_contact" placeholder="Enter Link" class="form-control input-link @error('link') is-invalid @enderror" id="" name="link" value="{{ old('link', ($menu ? $menu->link : $link)) }}">
                            </div>

                            @foreach ($pages as $item)
                            @if($id == '2' || $id == '5')
                                @php
                                    if($item->lang == 'mm'){
                                        $link = '/mm/' . $item->url_slug;
                                        $name = $item->title;
                                    }
                                @endphp
                            @elseif($id == '3' || $id == '6' )
                                @php
                                    if($item->lang == 'ch'){
                                        $link = '/ch/' . $item->url_slug;
                                        $name = $item->title;
                                    }
                                @endphp
                            @elseif($id == '7' || $id == '8')
                                @php
                                    if($item->lang == 'ta'){
                                        $link = '/ta/' . $item->url_slug;
                                        $name = $item->title;
                                    }
                                @endphp
                            @elseif($id == '1' || $id == '4')
                                @php
                                    if($item->lang == 'en'){
                                        $name = $item->title;
                                        $link = '/en/' . $item->url_slug;
                                    }
                                @endphp
                            @endif
                                @php

                                    $menu = $menu_items->where('item_id', $item->id)->where('type', 'page')->first();
                                @endphp
                                <div class="form-check mb-3">

                                    <input class="form-check-input page-input-check" type="checkbox" name="{{ $name }}" value="{{ $item->id }}" data-page-input-id="page_input_{{ $item->id }}" data-page-type="page" data-page-item-id="{{ $item->id }}"" {{ $menu ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $name }} </label>
                                    <input type="text" id="page_input_{{ $item->id }}" placeholder="Enter Link" class="form-control input-link @error('link') is-invalid @enderror" id="" name="link" value="{{ old('link', ($menu ? $menu->link : $link)) }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @if ($menu_name == 'English Main Menu' || $menu_name == 'Myanmar Main Menu' || $menu_name == 'Chinese Main Menu' || $menu_name == 'Ta\'ang Main Menu')
                        <div class="col-md-4">
                            <h6 class="mb-3">Edit Menu Items From Categories</h6>
                            <div class="form-control scroll-window mb-3">
                                @foreach ($categories as $item)
                                    @php
                                        if($id == '2' || $id == '5'){
                                            $name = $item->name_mm;
                                            $link = '/mm/category/' . $item->url_slug;
                                        }else if($id == '3' || $id == '6'){
                                            $name = $item->name_ch;
                                            $link = '/ch/category/' . $item->url_slug;
                                        }else if($id == '7' || $id == '8'){
                                            $name = $item->name_ta;
                                            $link = '/ta/category/' . $item->url_slug;
                                        }elseif($id == '1' || $id == '4'){
                                            $name = $item->name_en;
                                            $link = '/en/category/' . $item->url_slug;
                                        }
                                        if($name == '' || $name == NULL){
                                            $name = $item->name_en;
                                            $link = '/en/category/' . $item->url_slug;
                                        }
                                        $menu = $menu_items->where('item_id', $item->id)->where('type', 'category')->first();
                                    @endphp
                                    <div class="form-check mb-3">
                                        <input class="form-check-input category-input-check" type="checkbox" name="{{ $name }}" value="{{ $item->id }}" data-category-input-id="category_input_{{ $item->id }}" data-category-type="category" data-category-item-id="{{ $item->id }}" {{ $menu ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $name }}</label>
                                        <input type="text" id="category_input_{{ $item->id }}" placeholder="Enter Link" class="form-control input-link @error('link') is-invalid @enderror" id="" name="link" value="{{ old('link', ($menu ? $menu->link : $link)) }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h6 class="mb-3">Edit Menu Items From SubCategories</h6>
                            <div class="form-control scroll-window mb-3">
                                @foreach ($sub_categories as $item)
                                    @php
                                        if($id == '2' || $id == '5'){
                                            $name = $item->name_mm;
                                            $link = '/mm/categories/' . $item->category->url_slug . '/' . $item->url_slug;
                                        }else if($id == '3' || $id == '6'){
                                            $name = $item->name_ch;
                                            $link = '/ch/categories/' . $item->category->url_slug . '/' . $item->url_slug;
                                        }else if($id == '7' || $id == '8'){
                                            $name = $item->name_ta;
                                            $link = '/ta/categories/' . $item->category->url_slug . '/' . $item->url_slug;
                                        }elseif($id == '1' || $id == '4'){
                                            $name = $item->name_en;
                                            $link = '/en/categories/' . $item->category->url_slug . '/' . $item->url_slug;
                                        }
                                        if($name == '' || $name == NULL){
                                            $name = $item->name_en;
                                            $link = '/en/categories/' . $item->category->url_slug . '/' . $item->url_slug;
                                        }
                                        $menu = $menu_items->where('item_id', $item->id)->where('type', 'subcategory')->first();
                                    @endphp
                                    <div class="form-check mb-3">
                                        <input class="form-check-input subcategory-input-check" type="checkbox" name="{{ $name }}" value="{{ $item->id }}" data-subcategory-input-id="subcategory_input_{{ $item->id }}" data-subcategory-type="subcategory" data-subcategory-item-id="{{ $item->id }}" {{ $menu ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ $name }}</label>
                                        <input type="text" id="subcategory_input_{{ $item->id }}" placeholder="Enter Link" class="form-control input-link @error('link') is-invalid @enderror" id="" name="link" value="{{ old('link', ($menu ? $menu->link : $link)) }}">
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
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <h5>Menu Lists</h5>
            </div>
            @foreach ($menu_items as $item)
                    <div class="card text-start mb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-2 mb-lg-0 md-md-0">
                                    <input type="hidden" name="item_id" value="$item->id">
                                    <strong>{{ $item->name }}</strong>
                                </div>
                                <div class="col-md-2 col-6 mb-2 mb-lg-0 md-md-0 text-end">
                                    <input type="number" class="form-control" name="order" id="order-{{ $item->id }}" value="{{ $item->order }}">
                                </div>
                                <div class="col-md-3 col-6 text-end">
                                    <button class="btn btn-primary btn-update" data-id="{{ $item->id }}">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
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

            event.preventDefault();

            var menu_id = $("#menu_id").val();

            var formData = [];

            var uncheckedData = [];

            $(".page-input-check:not(:checked)").each(function() {
                var itemId = $(this).data('page-item-id');
                var type = $(this).data('page-type');
                var checkboxName = $(this).attr("name");
                uncheckedData.push({
                    itemId : itemId,
                    type: type,
                    name: checkboxName
                });
            });

            $(".category-input-check:not(:checked)").each(function() {
                var itemId = $(this).data('category-item-id');
                var type = $(this).data('category-type');
                var checkboxName = $(this).attr("name");
                uncheckedData.push({
                    itemId : itemId,
                    type: type,
                    name: checkboxName
                });
            });

            $(".subcategory-input-check:not(:checked)").each(function() {
                var itemId = $(this).data('subcategory-item-id');
                var type = $(this).data('subcategory-type');
                var checkboxName = $(this).attr("name");
                uncheckedData.push({
                    itemId : itemId,
                    type: type,
                    name: checkboxName
                });
            });

            $(".page-input-check:checked").each(function() {
                var itemId = $(this).data('page-item-id');
                var type = $(this).data('page-type');
                var checkboxName = $(this).attr("name");
                var linkInputName = $(this).data("page-input-id");
                var linkValue = $("#" + linkInputName).val();
                var isChecked = $(this).prop("checked");

                formData.push({
                    itemId : itemId,
                    type: type,
                    checkboxName: checkboxName,
                    linkValue: linkValue
                });
                //
            });

            $(".category-input-check:checked").each(function() {
                var itemId = $(this).data('category-item-id');
                var type = $(this).data('category-type');
                var checkboxName = $(this).attr("name");
                var linkInputName = $(this).data("category-input-id");
                var linkValue = $("#" + linkInputName).val();
                var isChecked = $(this).prop("checked");
                formData.push({
                    itemId : itemId,
                    type: type,
                    checkboxName: checkboxName,
                    linkValue: linkValue
                });

            });

            $(".subcategory-input-check:checked").each(function() {
                var itemId = $(this).data('subcategory-item-id');
                var type = $(this).data('subcategory-type');
                var checkboxName = $(this).attr("name");
                var linkInputName = $(this).data("subcategory-input-id");
                var linkValue = $("#" + linkInputName).val();
                var isChecked = $(this).prop("checked");
                formData.push({
                    itemId : itemId,
                    type: type,
                    checkboxName: checkboxName,
                    linkValue: linkValue
                });
            });

            var csrfToken = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('backend.menu_items.update') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: { 'menu_id': menu_id, 'formData': formData, 'uncheckedData': uncheckedData },
                // dataType: 'json',
                success: function(response) {
                    location.reload();
                },
                // error: function(error) {
                //     console.error("Error while saving data.");
                // }
            });
        });

        //order
        $('.btn-update').click(function(e){
            var id = $(this).data('id');
            var orderId = '#order-'+id;
            var order = $(orderId).val();
            $.ajax({
                url: '{{ route('backend.menu_items.order') }}',
                type: 'GET',
                data: { 'id': id, 'order': order},
                success: function(response){
                //    location.reload();
                }
            })
        })

    });
</script>
@endsection
