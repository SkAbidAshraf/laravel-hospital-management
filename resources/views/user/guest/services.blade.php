@extends('layouts.user.master')
@section('title')
    {{ 'Our Services' }}
@endsection

@section('content')
    <section class="contact-section my-5" id="contact">
        <div class="container">
            <h2 class="text-center pt-3 mb-5"><span class="border-bottom border-4 border-primary">Services We Provide</span>
            </h2>

            <div class="row row-cols-2 row-cols-md-3 row-cols-xl-4 g-4 py-6">
                @forelse ($allServices as $service)
                    <div class="col">
                        <a href="{{ route('user.serviceDoctors', $service->id) }}" class="card-link">
                            <div class="card shadow-lg custom-card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $service->title }} ({{ $service->doctors()->count() }})
                                    </h5>
                                    <p class="card-text">
                                        {!! ($service->details) !!}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="text-muted fs-5">No services are available at this moment.</p>
                @endforelse
            </div>
            <div class="mt-4">
                {{ $allServices->links() }}
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
