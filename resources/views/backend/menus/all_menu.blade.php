@extends('backend.index')

@section('content')

<section class="container-fluid">
    <div class="row mb-3">
        <div class="col-lg-5">
            @foreach ($items as $item)
                <div class="card text-start mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-2 mb-lg-0 md-md-0">
                                <input type="hidden" name="item_id" value="$item->id">
                                <strong>{{ $item->name_en }}</strong>
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
        $('.btn-update').click(function(e){
            var id = $(this).data('id');
            var orderId = '#order-'+id;
            var order = $(orderId).val();
            $.ajax({
                url: '{{ route('backend.all_menus.update') }}',
                type: 'GET',
                data: { 'id': id, 'order': order},
                success: function(response){
                   location.reload();
                }
            })
        })
    });
</script>
@endsection
