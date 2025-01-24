<header>
    <nav class="navbar navbar-light navbar-expand-lg navbar-static-top mb-0 bg-white shadow-lg">
        <div class="container-fluid px-md-5">
            <a class="navbar-brand text-primary fw-bold" href="{{ '/' }}">HealthLink</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item m-2">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link {{ request()->routeIs('user.doctors') ? 'active' : '' }}"
                            href="{{ route('user.doctors') }}">All Doctors</a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link {{ request()->routeIs('user.services') ? 'active' : '' }}"
                            href="{{ route('user.services') }}">Our Services</a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link {{ request()->routeIs('user.bookAppointmentPage') || request()->routeIs('user.bookAppointment') ? 'active' : '' }}"
                            href="{{ route('user.bookAppointmentPage') }}">Book Appointment</a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link {{ request()->routeIs('user.contact') ? 'active' : '' }}"
                            href="{{ route('user.contact') }}">Contact</a>
                    </li>
                </ul>


                <ul class="navbar-nav mb-2 mb-lg-0">
                    @auth('admin')
                        <li class="nav-item m-2 me-1">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item m-2">
                            <a class="nav-link" href="{{ route('admin.logout') }}">Log out</a>
                        </li>
                    @else
                        @guest
                            <li class="nav-item m-2">
                                <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
                                    href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item m-2">
                                <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}"
                                    href="{{ route('register') }}">Register</a>
                            </li>
                        @endguest
                        @auth('web')
                            <li class="nav-item m-2 me-1">
                                <a class="nav-link {{ request()->routeIs('user.appointments') ? 'active' : '' }}"
                                    href="{{ route('user.appointments') }}">My appointments</a>
                            </li>

                            @include('layouts.user.notification')

                            <li class="nav-item m-2">
                                <a class="nav-link" href="{{ route('logout') }}">Log out</a>
                            </li>
                        @endauth
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
