@extends('layouts.admin.master')

@section('title')
    {{ 'Manage Doctor | Laravel Auth ' }}
@endsection

@section('content')
    <h1 class="mt-4">All Doctors</h1>

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
        <div class="card-header d-flex pt-2">
            <a href="{{ route('dashboard.doctor.add') }}" class="btn btn-sm ms-auto btn-primary"> + Add New Doctor</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th class="th-sm">#</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Speciality</th>
                        <th class=" text-nowrap">Phone</th>
                        <th class="th-sm">Details</th>
                        <th class="th-sm">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($doctors as $doctor)
                        <tr class="text-center">
                            <td class="th-sm">{{ $doctor->id }}</td>
                            <td class="th-sm ">
                                {{ $doctor->doctor_name }}
                            </td>
                            <td class="th-sm ">
                                <img src="{{ $doctor->doctor_image }}" style="height:80px;" class="mb-3 ronded object-cover"
                                    alt="Doctor Image">
                            </td>
                            <td class="th-sm">{{ $doctor->service->title }}</td>
                            <td class="">{{ $doctor->doctor_phonenumber }}</td>
                            <td class="th-sm text-left formatted-text">
                                {!! Str::limit(strip_tags($doctor->doctor_details), 200, '...') !!}
                            </td>

                            <td class="th-sm">
                                <div class="text-center d-flex flex-row mx-auto">
                                    <a href="{{ route('dashboard.doctor.update', ['id' => $doctor->id]) }}" type="button"
                                        class="btn btn-info text-white btn-sm me-2"><i class="fas fa-edit"></i></a>

                                    <a onclick="delete_doctor({!! $doctor->id !!})"
                                        class="btn btn-danger btn-circle btn-sm fw-lighter"><i
                                            class="fas fa-trash fw-lighter"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function delete_doctor(id) {
            if (confirm('Are you sure you want to delete this doctor?')) {
                window.location.href = '{{ url('dashboard/doctor') }}/' + id + '/delete';
            }
        }
    </script>
@endsection
