@extends('layouts.user.guest')
@section('content')

    <div class="mb-4 text-sm text-center text-gray-600 dark:text-gray-400">
        {{ __('লগিন করতে আপনকে ইমেইল ভেরিফিকেশন করতে হবে।') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 text-center font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('ইমেইল ভেরিফিকেশন লিঙ্ক আপনার ইমেইলে পাঠানো হয়েছে') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('admin.verification.send') }}">
            @csrf

            <div>
                <button type="submit" class="btn btn-info">
                    Send Verification Email
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf

            <button type="submit" class="btn btn-info">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
    @endsection
