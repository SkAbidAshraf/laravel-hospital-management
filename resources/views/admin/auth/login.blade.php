@extends('layouts.admin.guest')

@section('title', 'Admin Login')

@section('content')

    <section class="my-5">
        <div class="mask d-flex align-items-center gradient-custom-3">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card-header text-center my-5">
                            <a class="navbar-brand text-center text-primary fw-bold fs-2"
                                href="{{ '/' }}">HealthLink</a>
                        </div>

                        <div class="card border-0 shadow-lg rounded-2">
                            <div class="card-body px-4">
                                <h4 class="text-uppercase fw-semibold mb-3 text-center border-bottom pb-4 pt-2">Admin login</h4>

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('admin.login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Email') }}</label>
                                        <input id="email" type="email" name="email" placeholder="Enter you email"
                                            class="form-control focus-ring focus-ring-light form-control-lg @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" autofocus autocomplete="username">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <input id="password" type="password" name="password" placeholder="Enter your password"
                                            class="form-control focus-ring focus-ring-light form-control-lg @error('password') is-invalid @enderror"
                                            autocomplete="current-password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg w-100 mt-2 text-light">
                                        {{ __('Log in') }}
                                    </button>

                                    <div class="text-center mt-3">
                                        <p>Don't have an account?
                                            <a href="{{ route('admin.register') }}" class="text-decoration-none">Sign Up now</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
