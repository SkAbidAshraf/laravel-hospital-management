<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @hasSection('title')
            @yield('title') | HealthLink
        @else
            HealthLink
        @endif
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />

    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    <style>
        .swalstyle {
            width: 350px !important;
            height: 250px !important;
            font-size: 10px !important;
            line-height: 2.8 !important;
        }

        .btn-close:focus {
            box-shadow: 0 0 0 rgba(0, 0, 0, 0);
        }

        .navbar-toggler:focus {
            text-decoration: none;
            outline: 0;
            box-shadow: 0 0 0 rgba(0, 0, 0, 0);
        }
    </style>
</head>

<body>

    <main style="min-height: 100vh; display:flex; flex-direction:column;">
        @include('layouts.user.navigation')

        @yield('content')

        @include('layouts.user.footer')
    </main>

    {{-- <script src="{{ asset('guest/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('guest/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('guest/js/custom.js') }}"></script>
    <script src="{{ asset('admin/js/ajax_alert.js') }}"></script> --}}
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js" type="text/javascript"></script> --}}
    {{-- <script>
        CKEDITOR.replace('summary-ckeditor');
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>

</body>

</html>
