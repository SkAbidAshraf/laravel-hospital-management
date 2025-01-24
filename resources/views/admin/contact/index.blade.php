@extends('layouts.admin.master')
@section('title')
    {{ 'Manage Doctor | Laravel Auth ' }}
@endsection

@section('content')
    <h1 class="mt-4">All Messages</h1>

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
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Mobile Number</th>
                        <th class="" colspan="2">Messages</th>
                        <th class="th-sm">Sent</th>
                        <th class="th-sm">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($allContact as $item)
                        <tr class="text-center">
                            <td class="th-sm">{{ $item->name }}</td>
                            <td class="th-sm">{{ $item->phonenumber }}</td>
                            <td class="" colspan="2">{{ $item->message }}</td>
                            <td class="th-sm">{{ $item->created_at }}</td>

                            <td class="th-sm">
                                <a href="{{ route('dashboard.contact.details', $item->id) }}"
                                    class="btn btn-secondary btn-circle btn-sm"><i class="fas
                                    fa-eye"></i></a>

                                <button type="button" onclick="delete_message({!! $item->id !!})"
                                    class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function delete_message(id) {
            if (confirm('Are you sure you want to delete this message?')) {
                window.location.href = '{{ url('dashboard/contact') }}/' + id + '/delete';
            }
        }
    </script>
@endsection
