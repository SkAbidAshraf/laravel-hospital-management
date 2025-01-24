@extends('layouts.admin.master')
@section('title')
    {{ 'Manage Doctor | Laravel Auth ' }}
@endsection

@section('content')
    <h1 class="mt-4">All Services</h1>

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
            <a href="{{ route('dashboard.services.add') }}" class="btn btn-sm ms-auto btn-primary"> + Add New Service</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th class="th-sm">Id</th>
                        <th class="th-sm">Title</th>
                        <th class="th-sm">Details</th>
                        <th class="th-sm">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($allServices as $item)
                        <tr>
                            <td class="th-sm">{{ $item->id }}</td>
                            <td class="th-sm">{{ $item->title }}</td>
                            <td class="th-sm">
                                @php
                                    echo $item->details;
                                @endphp
                            </td>
                            <td class="th-sm">
                                <div class="text-center d-flex flex-row">
                                    <a href="{{ route('dashboard.services.update', ['id' => $item->id]) }}" type="button"
                                        class="btn btn-info text-white fw-lighter btn-circle btn-sm me-2"><i
                                            class="fas fa-edit fw-lighter"></i></a>
                                    <a type="button" onclick="delete_services({!! $item->id !!})"
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
        function delete_services(id) {
            if (confirm('Are you sure you want to delete this service?')) {
                window.location.href = '{{ url('dashboard/services') }}/' + id + '/delete';
            }
        }
    </script>
@endsection
