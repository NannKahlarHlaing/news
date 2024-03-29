@extends('backend.index')

@section('content')
    <section class="container-fluid">
        <h5 class="my-3">Edit User</h5>
        <div class="row">
            <div class="col-md-8">
                <form class="form" method="POST" action="{{ route('users.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $post->name) }}" name="name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email', $post->email) }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="role" class="form-control form-select @error('role') is-invalid @enderror">
                            <option value="" disabled selected>Role <span class="text-danger">*</span></option>
                            <option value="1" {{ old('role', $post->role) == '1'? "selected":"" }}>Admin</option>
                            <option value="2" {{ old('role', $post->role) == '2'? "selected":"" }}>Moderator</option>
                            <option value="3" {{ old('role', $post->role) == '3'? "selected":"" }}>Normal</option>
                        </select>

                        @error('role')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="check" id="check" class="form-check-input" @if(old('check')) checked @else {{''}} @endif>
                        <label class="form-check-label" for="check">
                            Change Password
                        </label>
                    </div>

                    <div id="password-field">
                        <div class="form-group">
                            <label for="password">Password <span class="text-danger">*</span></label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" >
                        </div>

                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        if($('#check').is(':checked')) {
                $('#password-field').show();
            } else {
                $('#password-field').hide();
            }

        $('#check').change(function(){
            if($(this).is(':checked')) {
                $('#password-field').show();
            } else {
                $('#password-field').hide();
            }
            //
        });
    });
</script>
@endsection
