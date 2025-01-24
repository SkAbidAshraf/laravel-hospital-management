@extends('layouts.user.master')
@section('title')
    {{ 'Our Services' }}
@endsection

@section('content')
    <section class="contact-section my-5" id="contact">
        <div class="container">
            <h2 class="text-center pt-3 mb-5"><span class="border-bottom border-4 border-primary">{{ $serviceName }}</span>
            </h2>

            <div class="row row-cols-2 row-cols-md-4 g-4 py-6">
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
                    <p class="text-muted col mx-auto text-center w-100 my-5 fs-5">No doctors are available providing this service at this moment.</p>
                @endforelse
            </div>
            <div class="mt-4">
                {{ $doctors->links() }}
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
