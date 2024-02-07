@extends('backend.index')

@section('content')

    <style>
        body {
            background-color: #f8f9fa;
        }
        .container-fluid {
            margin-top: 20px;
        }
        .email-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .button-container {
            margin-bottom: 20px; /* Adjust the margin as needed */
        }
    </style>
    
<div class="container-fluid">
    <div class="row">
        <div class="col-8 button-container">
            <a href="javascript:history.back()" class="btn btn-primary">Back</a>
        </div>

        <div class="col-md-8 mb-4">
            <div class="email-container">
                <h6>Subject:</h6>
                <b>{{ $newsletter->subject }}</b>
                <hr>
                <h6>Message:</h6>
                <div class="email-body">
                    {!! $newsletter->message !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
