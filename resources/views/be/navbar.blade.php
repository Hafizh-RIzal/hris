<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top px-3">
    <div class="container-fluid">

        {{-- Sidebar toggle button (only on mobile) --}}
        <button class="btn btn-dark d-lg-none me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
            <i class="fas fa-bars"></i>
        </button>

        {{-- Brand / Logo --}}
        <a class="navbar-brand fw-bold" href="{{ route('dashboard.index') }}">
            <i class="fas fa-cogs me-2"></i> HRIS Panel
        </a>

        {{-- Collapse toggler for right side --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavbar" aria-controls="topNavbar" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Right menu --}}
        <div class="collapse navbar-collapse justify-content-end" id="topNavbar">
            @auth
            <ul class="navbar-nav align-items-center gap-3">

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light d-flex align-items-center gap-2">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li>

            </ul>
            @endauth
        </div>
    </div>
</nav>
