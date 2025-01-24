@extends('layouts.admin.master')
@section('title')
    {{ 'Manage Doctor | Laravel Auth ' }}
@endsection

@section('content')
    <h1 class="mt-4">Upcoming Appointments</h1>

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

    <div class="card my-4 shadow">
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th class="th-sm">Patient name</th>
                        <th class="th-sm">Doctor name</th>
                        <th class="th-sm">Patient Mobile Number</th>
                        <th class="th-sm">Date</th>
                        <th class="th-sm">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr class="text-center">
                            <td class="th-sm">{{ $appointment->patient_name }}</td>
                            <td class="th-sm">{{ $appointment->doctor_name }}</td>
                            <td class="th-sm">{{ $appointment->patient_phonenumber }}</td>
                            <td class="th-sm">{{ $appointment->created_at }}</td>
                            <td class="th-sm">

                                <button type="button" onclick="delete_appointment({!! $appointment->id !!})"
                                    class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function delete_appointment(id) {
            if (confirm('Are you sure you want to delete this appointment?')) {
                window.location.href = '{{ url('dashboard/appointment') }}/' + id + '/delete';
            }
        }
    </script>
@endsection
