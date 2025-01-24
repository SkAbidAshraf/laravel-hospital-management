@extends('layouts.user.guest')
@section('title', 'Register')

@section('content')
    <section class="">
        <div class="mask d-flex align-items-center gradient-custom-3">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card-header text-center my-5">
                            <a class="navbar-brand text-center text-primary fw-bold fs-2"
                                href="{{ '/' }}">HealthLink</a>
                        </div>

                        <div class="card mb-5 border-0 shadow-lg rounded-2">
                            <div class="card-body px-4">
                                <h4 class="text-uppercase fw-semibold mb-3 text-center border-bottom pb-4 pt-2">Register</h4>

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <!-- Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('Name') }}</label>
                                        <input id="name" type="text" name="name"
                                            class="form-control focus-ring focus-ring-light form-control-lg @error('name') is-invalid @enderror"
                                            placeholder="Enter your name" value="{{ old('name') }}" autofocus>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Email') }}</label>
                                        <input id="email" type="email" name="email"
                                            class="form-control focus-ring focus-ring-light form-control-lg @error('email') is-invalid @enderror"
                                            placeholder="Enter your email" value="{{ old('email') }}" autocomplete="username">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Password -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <input id="password" type="password" name="password"
                                            class="form-control focus-ring focus-ring-light form-control-lg @error('password') is-invalid @enderror"
                                            placeholder="Enter your password" autocomplete="new-password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                        <input id="password_confirmation" type="password" name="password_confirmation"
                                            class="form-control focus-ring focus-ring-light form-control-lg @error('password_confirmation') is-invalid @enderror"
                                            placeholder="Confirm your password" autocomplete="new-password">
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg w-100 mt-2 text-light">
                                        {{ __('Register') }}
                                    </button>

                                    <div class="text-center mt-3">
                                        <p>Already have an account?
                                            <a href="{{ route('login') }}" class="text-decoration-none">Login now</a>
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
