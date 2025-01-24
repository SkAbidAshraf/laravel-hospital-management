@extends('layouts.admin.master')
@section('title')
    {{ 'Manage Doctor | Laravel Auth ' }}
@endsection

@section('content')
    <h1 class="mt-4">Message Details</h1>

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
            <button type="submit" onclick="delete_message({!! $contact->id !!})"
                href="{{ route('dashboard.doctor.add') }}" class="btn btn-sm ms-auto btn-danger">
                <i class="fas fa-trash"></i> Delete Message</button>
        </div>
        <div class="card-body">

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-3 col-form-label">Sent by</label>
                <div class="col-sm-10 col-9">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value="{{ $contact->name }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-3 col-form-label">Phone no.</label>
                <div class="col-sm-10 col-9">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value="{{ $contact->phonenumber }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-3 col-form-label">Sent at</label>
                <div class="col-sm-10 col-9">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                        value="{{ $contact->created_at }}">
                </div>
            </div>

            <div class="mb-1 row">
                <label for="staticEmail" class="col-sm-2 col-3 col-form-label">Message</label>
            </div>
            <div class="col-12 border rounded p-3">
                {{ $contact->message }}
            </div>

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
