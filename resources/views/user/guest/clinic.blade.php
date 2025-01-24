@extends('layouts.user.master')
@section('title')
    {{ 'About Us' }}
@endsection

@section('content')
    <main>
        <!-- Start Our Clinic section -->
        <section class="clinic-section py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h1 style="font-weight: 700" class="mt-5">Why us?</h1>
                        <div class="title-width bg-info my-3 mb-5"></div>
                        <p>
                            Here are just a few reasons why you should choose our Lambda
                            Medical Clinic urgent care clinic as your primary location for
                            healthcare needs:
                        </p>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Patient-Centered
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Decisions and operations sustain and enhance patients’
                                        dignity and welfare.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Caring
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Relationships between staff and patients promote
                                        continuity of care and support patient self-care and
                                        wellness.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Mutually respectful
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        We recognize and appreciate each individual’s
                                        contributions to achieving the Clinic’s mission and to
                                        creating a rewarding and pleasant workplace.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h1 style="font-weight: 700" class="mt-5">Our Skills</h1>
                        <div class="title-width bg-info my-3 mb-5"></div>
                        <p>
                            The more you tighten your grip, Tarkin, the more star systems
                            will slip through your fingers. I have traced the Rebel spies to
                            her. Now she is my only link to finding their secret base.
                            Alderaan? I’m not going to Alderaan. I’ve got to go home.
                        </p>
                        <div class="clinic-progress my-3">
                            <div class="progress">
                                <div class="progress-bar bg-info py-3" role="progressbar" style="width: 90%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    Surgery
                                </div>
                            </div>
                            <div class="progress my-3">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">
                                    Emergency Department
                                </div>
                            </div>
                            <div class="progress my-3">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">
                                    Hospital Medicine
                                </div>
                            </div>
                            <div class="progress my-3">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 40%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">
                                    Aged Care
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Start appointment Section -->

        <section class="appointment-page-contact text-light pb-5" id="appointment">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="card mt-5 py-5 pb-5 px-2">
                            <h1 class="text-center">About Our Clinic</h1>
                            <div class="title-width m-auto my-4 bg-info"></div>
                            <div class="row">
                                <p class="px-5 text-center">
                                    Lambda Medical Clinic offers you and your family a variety
                                    of services, whether it’s urgent care services or a quick
                                    check-up. Sickness and fever are easily overcome at our
                                    clinic with the help of trained physicians and medical
                                    assistants. Our walk-in clinic is open everyday with
                                    extended hours for a majority of your medical needs. We have
                                    Board Certified Physicians on site at all times, as well as
                                    experienced and compassionate nurses.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Start Footer Sectin -->
    </main>
@endsection
