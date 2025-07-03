@php $user = auth()->user(); @endphp

<nav class="sidebar bg-dark text-white vh-100 d-flex flex-column p-3 shadow-lg position-fixed" style="width: 260px;">
    {{-- User Info --}}
    <div class="d-flex align-items-center mb-4">
        <i class="fas fa-user-circle fa-2x me-2 text-white-50"></i>
        <div>
            <div class="fw-bold">{{ $user->name }}</div>
            <small class="text-white-50 text-uppercase">{{ $user->role }}</small>
        </div>
    </div>

    <hr class="border-secondary">

    {{-- Navigation --}}
    <ul class="nav nav-pills flex-column mb-auto gap-2">
        <li class="nav-item">
            <a href="{{ route('dashboard.index') }}" class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('dashboard.*') ? 'active' : 'text-white' }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>

        @if ($user->role === 'admin')
        <li>
            <a href="{{ route('users.index') }}" class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('users.*') ? 'active' : 'text-white' }}">
                <i class="fas fa-users-cog"></i> Data Users
            </a>
        </li>
        @endif

        @if (in_array($user->role, ['admin', 'hrd']))
        <li>
            <a href="{{ route('jabatan.index') }}" class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('jabatan.*') ? 'active' : 'text-white' }}">
                <i class="fas fa-briefcase"></i> Data Jabatan
            </a>
        </li>
        <li>
            <a href="{{ route('departemen.index') }}" class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('departemen.*') ? 'active' : 'text-white' }}">
                <i class="fas fa-building"></i> Data Departemen
            </a>
        </li>
        @endif

        <li>
            <a href="{{ route('karyawan.index') }}" class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('karyawan.*') ? 'active' : 'text-white' }}">
                <i class="fas fa-user-tie"></i> Data Karyawan
            </a>
        </li>

        {{-- @if ($user->role === 'karyawan')
        <li>
            <a href="{{ route('absensi.karyawan-form') }}" class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('absen.create') ? 'active' : 'text-white' }}">
                <i class="fas fa-fingerprint"></i> Absen Masuk
            </a>
        </li>
        <li>
            <a href="{{ route('absensi.riwayat') }}" class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('absen.riwayat') ? 'active' : 'text-white' }}">
                <i class="fas fa-history"></i> Riwayat Absen
            </a>
        </li>
        @endif --}}

        @if ($user->role === 'hrd')
        <li>
            <a href="{{ route('absensi.index') }}" class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('absen.index') ? 'active' : 'text-white' }}">
                <i class="fas fa-calendar-check"></i> Rekap Absensi
            </a>
        </li>
        @endif
    </ul>

    <hr class="border-secondary mt-auto">

    {{-- Logout --}}
    <form action="{{ route('logout') }}" method="POST" class="w-100">
        @csrf
        <button class="btn btn-outline-light w-100 d-flex align-items-center gap-2">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </form>
</nav>
