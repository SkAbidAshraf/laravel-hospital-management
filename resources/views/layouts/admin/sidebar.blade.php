<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion bg-white shadow" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link mt-3 {{ request()->routeIs('dashboard') ? 'text-primary' : 'text-dark' }}"
                    href="{{ route('dashboard') }}">
                    Dashboard
                </a>


                <a class="nav-link mt-1 {{ request()->routeIs('dashboard.services.*') ? 'text-primary collapse' : 'text-dark collapsed' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseServices" aria-expanded="false"
                    aria-controls="collapseServices">
                    <div>Services</div>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div id="collapseServices"
                    class="collapse {{ request()->routeIs('dashboard.services.*') ? 'show' : '' }}"
                    aria-labelledby="headingServices" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->routeIs('dashboard.services.manage') ? 'text-primary' : 'text-dark' }}"
                            href="{{ route('dashboard.services.manage') }}">All Services</a>
                        <a class="nav-link {{ request()->routeIs('dashboard.services.add') ? 'text-primary' : 'text-dark' }}"
                            href="{{ route('dashboard.services.add') }}">Add Service</a>
                    </nav>
                </div>


                <a class="nav-link mt-1 {{ request()->routeIs('dashboard.doctor.*') ? 'text-primary collapse' : 'text-dark collapsed' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseDoctors" aria-expanded="false"
                    aria-controls="collapseDoctors">
                    <div>Doctors</div>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div id="collapseDoctors" class="collapse {{ request()->routeIs('dashboard.doctor.*') ? 'show' : '' }}"
                    aria-labelledby="headingDoctors" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->routeIs('dashboard.doctor.manage') ? 'text-primary' : 'text-dark' }}"
                            href="{{ route('dashboard.doctor.manage') }}">All Doctors</a>
                        <a class="nav-link {{ request()->routeIs('dashboard.doctor.add') ? 'text-primary' : 'text-dark' }}"
                            href="{{ route('dashboard.doctor.add') }}">Add Doctor</a>
                    </nav>
                </div>

                <a class="nav-link mt-1 {{ request()->routeIs('dashboard.appointment.*') ? 'text-primary collapse' : 'text-dark collapsed' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseAppointments"
                    aria-expanded="false" aria-controls="collapseAppointments">
                    <div>Appointments</div>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div id="collapseAppointments"
                    class="collapse {{ request()->routeIs('dashboard.appointment.*') ? 'show' : '' }}"
                    aria-labelledby="headingDoctors" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->routeIs('dashboard.appointment.manage') ? 'text-primary' : 'text-dark' }}"
                            href="{{ route('dashboard.appointment.manage') }}">Pending</a>
                        <a class="nav-link {{ request()->routeIs('dashboard.appointment.approved') ? 'text-primary' : 'text-dark' }}"
                            href="{{ route('dashboard.appointment.approved') }}">Approved</a>
                    </nav>
                </div>

                <a class="nav-link mt-1 {{ request()->routeIs('dashboard.admins.requests') || request()->routeIs('dashboard.users.*') ? 'text-primary collapse' : 'text-dark collapsed' }}"
                    href="#" data-bs-toggle="collapse" data-bs-target="#collapseUserManagement"
                    aria-expanded="false" aria-controls="collapseUserManagement">
                    <div>User Management</div>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div id="collapseUserManagement"
                    class="collapse {{ request()->routeIs('dashboard.admins.requests') || request()->routeIs('dashboard.users.*') ? 'show' : '' }}"
                    aria-labelledby="headingDoctors" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->routeIs('dashboard.admins.requests') ? 'text-primary' : 'text-dark' }}"
                            href="{{ route('dashboard.admins.requests') }}">Admin Requests</a>
                        <a class="nav-link {{ request()->routeIs('dashboard.users.manage') ? 'text-primary' : 'text-dark' }}"
                            href="{{ route('dashboard.users.manage') }}">All Users</a>
                    </nav>
                </div>

                <a class="nav-link mt-1 {{ request()->routeIs('dashboard.contact.manage') ? 'text-primary' : 'text-dark' }}"
                    href="{{ route('dashboard.contact.manage') }}">
                    Messages
                </a>
            </div>
        </div>
    </nav>
</div>
