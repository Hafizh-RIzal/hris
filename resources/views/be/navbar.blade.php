<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="#">Sistem Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="topNavbar">
        <ul class="navbar-nav ms-auto align-items-center">

            @auth
            <li class="nav-item d-flex align-items-center text-white px-2">
                <i class="fas fa-user-circle me-2"></i>
                {{ auth()->user()->name }} ({{ auth()->user()->role }})
            </li>

            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link text-danger" style="text-decoration: none;">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </li>
            @endauth

        </ul>
    </div>
</nav>
