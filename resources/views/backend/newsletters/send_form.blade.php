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
        <h3 class="my-3">Newsletter</h3>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-8 ">
                <form class="form" method="POST" action="{{route('newsletter') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}">
                            @error('subject')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="message">Message <span class="text-danger">*</span></label>
                            <textarea class="summernote form-control @error('message') is-invalid @enderror"name="message" id="message" rows="10">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Send Newsletter</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')

    <script>

    </script>

@endsection
