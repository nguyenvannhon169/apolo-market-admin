@extends('layouts.base')
@section('title')
    Apolo Market - Login
@endsection

@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div>
                <div class="card o-hidden border-0 shadow-lg m-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="dropdown mx-5 float-right mt-3">
                                    <a class="dropdown-toggle text-decoration-none" href="#" id="localesDropdown" role="button" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        <img class="country-flags rounded-circle"
                                             src="{{ asset('assets/img/flags/vietnam-flag.png') }}">
                                    </a>
                                    <!-- Dropdown - Locales -->
                                    <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="localesDropdown" style="z-index: 1000">
                                            <a class="dropdown-item d-flex justify-content-between align-items-center active">
                                                Vietnamese
                                                <img src="{{ asset('assets/img/flags/vietnam-flag.png') }}" class="country-flags ml-2"
                                                     alt="country-flag">
                                            </a>
                                            <a class="dropdown-item d-flex justify-content-between align-items-center">
                                                English
                                                <img src="{{ asset('assets/img/flags/england-flag.png') }}" class="country-flags ml-2"
                                                     alt="country-flag">
                                            </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form id="form-login" action="{{ route('auth.submit.login') }}" method="POST" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input data-lala="1"  name="email" type="email" class="form-control form-control-user  @error('email') is-invalid @enderror"
                                                   id="exampleInputEmail" aria-describedby="emailHelp"
                                                   placeholder="Email Address...">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control form-control-user  @error('password') is-invalid @enderror"
                                                   id="exampleInputPassword" placeholder="Password">
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input name="remember" type="checkbox" class="custom-control-input  @error('remember') is-invalid @enderror" id="customCheck" {{ old('remember') ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                                @error('remember')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <a id="submit-login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a>
                                        <hr>
                                        <a href="{{ route('login.google','google') }}" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Template-->
    <script type="text/html" data-template="loading">
        <div class="spinner-grow spinner-grow-sm" role="status">
            <span class="visually-hidden"></span>
        </div>
    </script>

@endsection

@section('scripts')
    <script src="{{ asset('js/auth/users.js') }}"></script>
@endsection
