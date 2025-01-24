@extends('layouts.user.master')
@section('title', 'Book Appointment')

@section('content')
    <section class="contact-section p-5" id="contact">
        <div class="container">
            <div class="text-center fs-3 pt-3 mb-4">
                <span class="border-bottom border-4 border-primary">
                    Book an appointment now</span>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow col-lg-8 mx-auto" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show shadow  col-lg-8 mx-auto" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card shadow-lg py-3 border-0">
                        <div class="card-body">
                            <div class="row mx-2">
                                <form class="form" action="{{ route('user.appointment.submit') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="text-gray fs-6">Patient Name</label>
                                            <input class="form-control shadow-none" value="{{ $user->name }}"
                                                id="name" type="text" disabled name="patient_name" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Enter Your Contact Number</label>
                                            <input type="tel" name="patient_phonenumber"
                                                class="form-control shadow-none @error('patient_phonenumber') is-invalid @enderror"
                                                placeholder="Enter your phone number"
                                                value="{{ old('patient_phonenumber') }}">
                                            @error('patient_phonenumber')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            @if ($hasDoctorId)
                                                <label class="text-gray fs-6">Doctor</label>
                                                <input hidden value="{{ $doctor->doctor_name }}"
                                                    class="form-control shadow-none" name="doctor_name" />
                                                <input disabled type="text"
                                                    class="form-control shadow-none @error('doctor_name') is-invalid @enderror"
                                                    placeholder="{{ $doctor->doctor_name }} ({{ $doctor->service->title }})" />
                                                @error('doctor_name')
                                                    <div class="text-danger pt-1">Select a speciality.</div>
                                                @enderror
                                            @else
                                                <label class="text-gray fs-6">Select Doctor</label>
                                                <select
                                                    class="form-control shadow-none rounded-2 @error('doctor_name') is-invalid @enderror"
                                                    name="doctor_name">
                                                    <option value="" disabled selected>Click to Select Doctor
                                                    </option>
                                                    @foreach ($doctors as $doctor)
                                                        <option value="{{ $doctor->doctor_name }}"
                                                            {{ old('doctor_name') == $doctor->doctor_name ? 'selected' : '' }}>
                                                            {{ $doctor->doctor_name }} ({{ $doctor->service->title }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('doctor_name')
                                                    <div class="text-danger pt-1">Select a speciality.</div>
                                                @enderror
                                            @endif
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="">Select the date of the doctor's visit</label>
                                            <input type="date" name="appointment_date"
                                                class="form-control shadow-none @error('appointment_date') is-invalid @enderror"
                                                value="{{ old('appointment_date') }}">
                                            @error('appointment_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End appointment Section -->
@endsection
