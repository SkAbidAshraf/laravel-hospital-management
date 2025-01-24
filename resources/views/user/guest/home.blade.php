@extends('layouts.user.master')
@section('title')
    {{ 'Home' }}
@endsection

@section('content')
    <section class="contact-section mb-5" id="contact">
        <div id="carouselExampleDark" class="carousel carousel-dark slide">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="{{ asset('guest/img/banner.jpg') }}" class="d-block w-100 object-fit-cover"
                        style="height: 30rem; filter: brightness(50%);" alt="...">
                    <div
                        class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100 text-white">
                        <h1 class="mb-4 fs-1">HealthLink</h1> 
                        <p class="fs-4">Access healthcare services 24/7, including consulting professionals, ordering lab
                            tests, and improving wellbeing.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section mb-5" id="contact">
        <div class="container">
            <h2 class="text-center pt-3 mb-5"><span class="border-bottom border-4 border-primary">Consult Our Doctors</span>
            </h2>

            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4 py-6">
                @forelse ($doctors as $doctor)
                    <div class="col">
                        <a href="{{ route('user.doctorDetails', $doctor->id) }}" class="card-link">
                            <div class="card shadow-lg custom-card">
                                <img src="{{ $doctor->doctor_image }}" class="card-img-top object-fit-cover"
                                    alt="Doctor Image" style="height: 20rem;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $doctor->doctor_name }}</h5>
                                    <p>{{ $doctor->service->title }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="text-muted fs-5">No doctors are available at this moment.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="appointment-section py-5 text-light bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto text-primary">
                    <div class="card shadow-lg text-center py-4">
                        <h3><span class="border-bottom border-4 border-primary pb-2">Opening Hours</span></h3>
                        <div class="title-width m-auto my-2 bg-info"></div>
                        <p class="fs-5" style="font-weight:500;">Monday-Friday</p>
                        <p class="fs-5" style="font-weight:500;">24 Hours open</p>
                        <p class="fs-5" style="font-weight:500;">Saturday-Sunday</p>
                        <p class="fs-5" style="font-weight:500;">10:00am -11.00pm</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

<style>
    .custom-card {
        height: auto;
        display: flex;
        color: black;
        flex-direction: column;
        justify-content: space-between;
        transition: transform 0.3s;
    }

    .card-link {
        text-decoration: none;
    }

    .custom-card:hover {
        transform: scale(1.05);
    }
</style>
