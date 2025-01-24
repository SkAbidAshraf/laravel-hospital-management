<nav class="sb-topnav navbar navbar-expand bg-white  shadow">
    <button class="btn btn-link btn-sm mx-2" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <a class="navbar-brand ps-3 text-primary fw-bold" href="{{ route('home') }}">HealthLink</a>

    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

    </div>

    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <button class="btn btn-primary" id="logout-button"
            onclick="window.location.href = '{{ route('admin.logout') }}'">
            Log out</button>
    </ul>
</nav>
