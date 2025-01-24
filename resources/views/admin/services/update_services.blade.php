@extends('layouts.admin.master')
@section('title')
    {{ 'Dashboard | Laravel Auth ' }}
@endsection

@section('content')
    <h1 class="mt-4">Update Service</h1>

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

    <div class="card my-4 shadow border-0">
        <div class="card-body">

            <form method="POST" action="{{ route('dashboard.services.update.submit') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $servicesDetails->id }}">
                <div class="my-4">
                    <label>Service Header</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ $servicesDetails->title }}" placeholder="Service Header">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4">
                    <label>Write a Description of the Service </label>
                    <textarea class="form-control" id="ck_editor" row="10" name="details">{{ $servicesDetails->details }}</textarea>
                </div>
                @error('details')
                    <div class="text-danger pt-1">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary mt-4">
                    Submit
                </button>
            </form>

        </div>
    </div>
@endsection
