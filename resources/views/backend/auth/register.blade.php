@extends('backend.index')

@section('css')
    <style>
        .form-select {
            font-size: 0.8rem;
            border-radius: 10rem;
            height: 3rem;
        }
    </style>
@endsection

@section('content')

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row d-flex justify-content-center">
                {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" action="{{ route('admin.register') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="name" placeholder="Name" value="{{ old('name') }}">
                                </div>
                                <div class="col-sm-6">
                                    <select name="role" class="form-control form-select @error('role') is-invalid @enderror">
                                        <option value="" disabled selected>Role</option>
                                        <option value="1" {{ old('role') == '1'? "selected":"" }}>Admin</option>
                                        <option value="2" {{ old('role') == '2'? "selected":"" }}>Moderator</option>
                                        <option value="3" {{ old('role') == '3'? "selected":"" }}>Normal</option>
                                    </select>

                                    @error('role')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Repeat Password">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                            {{--<hr>
                             <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a> --}}
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login.html">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
