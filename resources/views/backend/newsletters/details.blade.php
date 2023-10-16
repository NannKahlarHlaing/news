@extends('backend.index')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mb-1">
            <h3> Subject:: {{ $newsletter->subject }}</h3>
        </div>
        <div class="col-12">
            <strong>Message:: </strong> {!! $newsletter->message !!}
        </div>
    </div>
</div>

@endsection
