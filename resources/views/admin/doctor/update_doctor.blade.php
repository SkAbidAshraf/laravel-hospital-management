@extends('layouts.admin.master')
@section('title')
    {{ 'Dashboard | Laravel Auth ' }}
@endsection

@section('content')
    <h1 class="mt-4">Update Doctor</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow mt-3" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card my-4 shadow border-0">
        <div class="card-body">
            <form method="POST" action="{{ route('dashboard.doctor.update.submit') }}" id="common_alert"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $doctor->id }}">

                <div class="row">
                    <div class="my-2 col-md-6">
                        <label class="form-label" for="doctor_name">Name</label>
                        <input type="text" class="form-control @error('doctor_name') is-invalid @enderror"
                            name="doctor_name" value="{{ $doctor->doctor_name }}" placeholder="Doctor name"
                            id="doctor_name">
                        @error('doctor_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="my-2 col-md-6">
                        <label class="form-label" for="services_id">Speciality</label>
                        <select class="form-control @error('services_id') is-invalid @enderror" name="services_id"
                            id="services_id">
                            <option value="">Select Doctor's Speciality</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}"
                                    {{ $doctor->services_id == $service->id ? 'selected' : '' }}>
                                    {{ $service->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('services_id')
                            <div class="text-danger pt-1">Select a speciality.</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 my-2">
                        <label class="form-label" for="doctor_image">Picture</label>
                        <input name="doctor_image" type="file"
                            class="form-control @error('doctor_image') is-invalid @enderror">
                        @error('doctor_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <img src="{{ $doctor->doctor_image }}" style="height:80px;" class="mt-3 img-thumbnail img-fluid"
                            alt="Doctor Image">
                    </div>

                    <div class="col-md-6 my-2">
                        <label class="form-label" for="doctor_phonenumber">Phone No</label>
                        <input type="text" class="form-control @error('doctor_phonenumber') is-invalid @enderror"
                            name="doctor_phonenumber" placeholder="Enter phone number"
                            value="{{ $doctor->doctor_phonenumber }}">
                        @error('doctor_phonenumber')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="my-2">
                    <label class="form-label" for="doctor_details">Details</label>
                    <textarea class="form-control @error('doctor_details') is-invalid @enderror" id="ck_editor" rows="10"
                        name="doctor_details">{{ $doctor->doctor_details }}</textarea>
                    @error('doctor_details')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-4">
                    Submit
                </button>
            </form>

        </div>
    </div>
@endsection


