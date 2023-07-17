@extends('backend.index')
@section('css')

@endsection
@section('content')
    <section class="container-fluid">
        <h3 class="my-3">Add Careers</h3>
        <div class="row">
            <div class="col-md-8 ">
                <form class="form" method="POST" action="{{route('backend.careers.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" value="{{ old('position') }}">
                        @error('position')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="terms">Terms</label>
                        <input type="text" class="form-control @error('terms') is-invalid @enderror" id="terms" name="terms" value="{{ old('terms') }}">
                        @error('terms')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}">
                        @error('location')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="org_background">Organizational Background</label>
                        <textarea class="form-control @error('org_background') is-invalid @enderror"name="org_background" id="org_background" rows="5">{{ old('org_background') }}</textarea>
                        @error('org_background')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="job_overview">Job Overviews</label>
                        <textarea class="form-control @error('job_overview') is-invalid @enderror"name="job_overview" id="job_overview" rows="5">{{ old('job_overview') }}</textarea>
                        @error('job_overview')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Role And Responsibilities</label>
                        <textarea id="editor" class="form-control @error('role') is-invalid @enderror"name="role" id="role" rows="5">{{ old('role') }}</textarea>
                        @error('role')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="qualification">Qualifications/Requirements</label>
                        <textarea class="form-control @error('qualification') is-invalid @enderror"name="qualification" id="qualification" rows="5">{{ old('qualification') }}</textarea>
                        @error('qualification')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="benefits">Benefits</label>
                        <input type="text" class="form-control @error('benefits') is-invalid @enderror" id="benefits" name="benefits" value="{{ old('benefits') }}">
                        @error('benefits')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="latest_date">Latest Date</label>
                        <input type="date" class="form-control @error('latest_date') is-invalid @enderror" id="latest_date" name="latest_date" value="{{ old('latest_date') }}">
                        @error('latest_date')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <textarea id="tiny"></textarea>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
      selector: 'textarea', // Use all textareas as TinyMCE editors
      plugins: 'advlist autolink lists link image imagetools charmap print preview anchor',
      toolbar: 'undo redo | formatselect | bold italic backcolor | \
        alignleft aligncenter alignright alignjustify | \
        bullist numlist outdent indent | removeformat | image | link',
      menubar: 'file edit view insert format tools table help',
    });
  </script>

@endsection
