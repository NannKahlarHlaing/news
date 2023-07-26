@extends('backend.index')

@section('content')
    <section class="container-fluid">
        <h3 class="my-3">Add User</h3>
        <div class="row">
            <div class="col-md-8">
                <form class="form" method="POST" action="{{ route('users.create_form') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $post->name) }}" name="name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email', $post->email) }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="role" class="form-control form-select @error('role') is-invalid @enderror">
                            <option value="" disabled selected>Role</option>
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
                    <div class="form-group">
                        <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
