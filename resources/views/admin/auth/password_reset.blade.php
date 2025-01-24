@extends('layouts.admin.guest')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-lg-4 mx-auto">
                @if (session()->has('error'))
                    <p class="alert alert-danger small">{{ session('error') }}</p>
                @endif

                @if (session()->has('success'))
                    <p class="alert alert-success small text-center">{{ session('success') }}</p>
                @endif
                <div class="card my-4 p-5 text-center">
                    <h4 class="py-4">Forgot Password?</h4>
                    <form method="POST" action="{{ route('admin.password.reset.submit') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-error :messages="$errors->get('email')" class="ps-0"/>
                            <x-text-input id="email" class="form-control form-control-lg" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" />
                           
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <x-primary-button class="btn btn-info btn-block btn-lg gradient-custom-4 text-light">
                                Password Reset
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
