@php
    $user = auth()->user();
@endphp

<div class="d-flex flex-column p-3 h-100">
    <h5 class="text-white mb-4 fw-bold"><i class="fas fa-bars me-2"></i>Menu Navigasi</h5>
    <ul class="nav nav-pills flex-column gap-1">

        <li class="nav-item">
            <a href="{{ route('dashboard.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('dashboard.*') ? 'active bg-primary text-white' : 'text-light' }}">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>

        @if ($user->role === 'admin')
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('users.*') ? 'active bg-primary text-white' : 'text-light' }}">
                <i class="fas fa-users-cog me-2"></i> Data Users
            </a>
        </li>
        @endif

        @if (in_array($user->role, ['admin', 'hrd']))
        <li class="nav-item">
            <a href="{{ route('jabatan.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('jabatan.*') ? 'active bg-primary text-white' : 'text-light' }}">
                <i class="fas fa-briefcase me-2"></i> Data Jabatan
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('departemen.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('departemen.*') ? 'active bg-primary text-white' : 'text-light' }}">
                <i class="fas fa-building me-2"></i> Data Departemen
            </a>
        </li>
        @endif

        <li class="nav-item">
            <a href="{{ route('karyawan.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('karyawan.*') ? 'active bg-primary text-white' : 'text-light' }}">
                <i class="fas fa-user-tie me-2"></i> Data Karyawan
            </a>
        </li>
    </ul>
</div>


<style>
    .nav-pills .nav-link {
        border-radius: 0.5rem;
        transition: all 0.2s ease-in-out;
    }
    .nav-pills .nav-link:hover {
        background-color: #0d6efd;
        color: #fff !important;
    }
</style>
