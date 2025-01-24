@extends('layouts.user.master')
@section('title')
    {{ 'Contact' }}
@endsection

@section('content')
    <section class="contact-section my-5" id="contact">
        <div class="container">
            <h2 class="text-center pt-3 mb-5"><span class="border-bottom border-4 border-primary">Contact Us</span></h2>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card shadow-lg border-0 p-4">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <h4 class="text-center mb-4">Send Us a Message</h4>

                        <form action="{{ route('user.contact.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control shadow-none @error('name') is-invalid @enderror"
                                    placeholder="Enter your name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Number</label>
                                <input type="tel" id="phone" name="phonenumber"
                                    class="form-control shadow-none @error('phonenumber') is-invalid @enderror"
                                    placeholder="Enter your phone number" value="{{ old('phonenumber') }}" required>
                                @error('phonenumber')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea id="message" name="message" class="form-control shadow-none @error('message') is-invalid @enderror"
                                    rows="4" placeholder="Type your message here..." required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="submit" class="btn btn-primary text-center text-white px-4 py-2 w-100" />
                        </form>
                    </div>
                </div>

                <div class="col-lg-6 mt-lg-0 mt-5">
                    <div class="card shadow-lg border-0">
                        <iframe class="rounded"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58836.89578532249!2d89.46710305820314!3d22.828166200000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff9abc698fbea9%3A0x19d86c4a95e15ad3!2sKhulna%20Medical%20College%20Hospital!5e0!3m2!1sen!2sbd!4v1732305333354!5m2!1sen!2sbd"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
