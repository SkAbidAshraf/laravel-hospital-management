@extends('layouts.user.master')

@section('title', 'My Appointments')

@section('content')
    <section class="contact-section my-5" id="contact">
        <div class="container">
            <h2 class="text-center pt-3 mb-5"><span class="border-bottom border-4 border-primary">My upcoming
                    Appointments</span>
            </h2>
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
            <div class="card my-4 shadow-lg">
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-striped border table-sm">
                        <thead>
                            <tr>
                                <th class="th-sm">Doctor</th>
                                <th class="th-sm">Date</th>
                                <th class="th-sm">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($upcomingAppointments as $appointment)
                                <tr class="">
                                    <td class="th-sm ">
                                        {{ $appointment->doctor_name }}
                                    </td>
                                    <td class="th-sm ">
                                        {{ $appointment->appointment_date }}
                                    </td>

                                    <td class="th-sm">
                                        <a type="button" onclick="cancel_appointment({!! $appointment->id !!})"
                                            class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <script>
                function cancel_appointment(id) {
                    if (confirm('Are you sure you want to cancel this appointment request?')) {
                        window.location.href = '{{ url('user') }}/' + id + '/cancel';
                    }
                }
            </script>
        </div>
    </section>
@endsection
