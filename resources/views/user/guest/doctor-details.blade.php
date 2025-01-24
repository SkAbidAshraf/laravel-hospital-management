@extends('layouts.user.master')
@section('title')
    {{ 'Our Services' }}
@endsection

@section('content')
    <section class="contact-section my-5" id="contact">
        <div class="container">
            <h2 class="text-center pt-3 mb-5"><span class="border-bottom border-4 border-primary">Doctor Details</span>
            </h2>

            <div class="row py-6 gx-3">
                <div class="col-md-6">
                    <img class="card-img-top border shadow mb-5 mb-md-0 float-md-end d-block mx-auto"
                        src="{{ $doctor->doctor_image }}" alt="{{ $doctor->doctor_name }}"
                        style="width: 100%; object-fit-cover; height: auto;" />
                </div>
                <div class="col-md-6 text-center text-md-start">
                    <div class="small mb-1 fs-3">Specialty: {{ $doctor->service->title }}</div>
                    <h3 class="display-5 fw-semibold">{{ $doctor->doctor_name }}</h3>
                    <div class="small mb-1 fs-3">Phone No: {{ $doctor->doctor_phonenumber }}</div>
                    <p class="mb-1 fs-4">
                        {!! $doctor->doctor_details !!}
                    </p>

                    <a href="{{ route('user.bookAppointment', $doctor->id) }}" class="btn btn-primary">Book
                        Appointment</a>
                </div>
            </div>
        </div>
    </section>
@endsection
