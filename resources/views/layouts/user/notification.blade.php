<li class="nav-item dropdown m-3 me-1">
    <a class="nav-link p-0 dropdown-toggle position-relative" id="notificationDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="fas fa-bell fs-5"></i>

        @php
            $notificationCount = auth()->check() ? auth()->user()->unreadNotifications->count() : 0;
        @endphp

        @if ($notificationCount > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-5 bg-danger " style="font-size: 10px">
                {{ $notificationCount }}
            </span>
        @endif
    </a>

    <style>
        .nav-item .dropdown-toggle::after {
            display: none;
        }

        body {
            overflow-x: hidden;
        }

        .dropdown-menu {
            max-width: 100vw;
        }
    </style>

    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
        @forelse (auth()->user()->unreadnotifications as $notification)
            <li class="d-flex justify-content-between align-items-center {{ $loop->last ? '' : 'border-bottom' }} px-2">
                <div class="dropdown-item">
                    <a href="{{ route('user.appointments') }}" style="text-decoration: none; color: black;">
                        {!! $notification->data['message'] ?? 'No message' !!}</a>
                </div>

                <form action="{{ route('user.notificationMarkAsRead', $notification->id) }}" method="POST"
                    style="display:inline;">
                    @csrf
                    <button class="dropdown-item common-btn p-0 pr-2 text-black bg-white shadow-none"
                        type="submit">X</button>
                </form>
            </li>
        @empty
            <li class="d-flex">
                <a class="dropdown-item" href="#">No New Notifications.</a>
            </li>
        @endforelse
    </ul>
</li>
