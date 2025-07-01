<div class="d-flex flex-column p-3">
    <h5 class="text-white mb-4">Menu</h5>
    <ul class="nav nav-pills flex-column">

   <li class="nav-item mb-2">
    <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
    </a>
</li>

<li class="nav-item mb-2">
    <a href="{{ route('jabatan.index') }}" class="nav-link {{ request()->routeIs('jabatan.*') ? 'active' : '' }}">
        <i class="fas fa-briefcase me-2"></i> Data Jabatan
    </a>
</li>

<li class="nav-item mb-2">
    <a href="{{ route('departemen.index') }}" class="nav-link {{ request()->routeIs('departemen.*') ? 'active' : '' }}">
        <i class="fas fa-building me-2"></i> Data Departemen
    </a>
</li>

<li class="nav-item mb-2">
    <a href="{{ route('karyawan.index') }}" class="nav-link {{ request()->routeIs('karyawan.*') ? 'active' : '' }}">
        <i class="fas fa-user-tie me-2"></i> Data Karyawan
    </a>
</li>


        <hr class="border-light">

        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-danger">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
        </li>

    </ul>
</div>
