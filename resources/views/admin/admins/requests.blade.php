@extends('layouts.admin.master')
@section('title')
    {{ 'Manage Doctor | Laravel Auth ' }}
@endsection

@section('content')
    <h1 class="mt-4">Admin Requests</h1>

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
                        <th class="th-sm">Id</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Email</th>
                        <th class="th-sm">Created At</th>
                        <th class="th-sm">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($admins as $admin)
                        <tr>
                            <td class="th-sm">{{ $admin->id }}</td>
                            <td class="th-sm">{{ $admin->name }}</td>
                            <td class="th-sm">{{ $admin->email }}</td>
                            <td class="th-sm text-center">{{ $admin->created_at }}</td>

                            <td class="th-sm text-center">
                                <div class="text-center d-flex flex-row">

                                    <a type="button" onclick="approve_admin_request({!! $admin->id !!})"
                                        class="btn btn-info text-white btn-sm me-2">
                                        <i class="fas fa-check"></i>
                                    </a>

                                    <a type="button" onclick="delete_admin_request({{ $admin->id }})"
                                        class="btn btn-danger text-white btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function approve_admin_request(id) {
            if (confirm('Are you sure you want to approve this admin request?')) {
                window.location.href = '{{ url('dashboard/admins') }}/' + id + '/approve';
            }
        };

        function delete_admin_request(id) {
            if (confirm('Are you sure you want to delete this admin request?')) {
                window.location.href = '{{ url('dashboard/admins') }}/' + id + '/delete';
            }
        }
    </script>
@endsection
