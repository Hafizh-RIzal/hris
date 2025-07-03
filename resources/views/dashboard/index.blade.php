@extends('be.master')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
    <!-- Selamat Datang Card -->
    <div class="row justify-content-center mb-4">
        <div class="col-lg-10 col-xl-8">
            <div class="card border-0 shadow-lg rounded-4 bg-white animate__animated animate__fadeIn">
                <div class="card-body p-4">
                    <h3 class="mb-3 d-flex align-items-center">
                        <i class="fas fa-home me-2 text-primary"></i>
                        Selamat Datang, {{ auth()->user()->name }}!
                        <span class="badge bg-secondary ms-2 text-capitalize">{{ auth()->user()->role }}</span>
                    </h3>
                    <p class="text-muted fs-6 mb-0">
                        Ini adalah halaman <strong>Dashboard HRIS</strong> Anda. Gunakan menu navigasi di kiri untuk mulai mengelola:
                    </p>
                    <ul class="text-muted mt-2 mb-0">
                        @if(auth()->user()->role === 'admin')
                            <li>Pengguna</li>
                            <li>Karyawan</li>
                            <li>Jabatan</li>
                            <li>Departemen</li>
                        @elseif(auth()->user()->role === 'hrd')
                            <li>Karyawan</li>
                            <li>Jabatan</li>
                            <li>Departemen</li>
                        @else
                            <li>Data sesuai akses peran Anda.</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik Card -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4 animate__animated animate__fadeInUp">
        @if(auth()->user()->role === 'admin')
        <div class="col">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-primary text-white rounded-circle p-3">
                        <i class="fas fa-users-cog fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Total Users</h6>
                        <h4 class="fw-bold">{{ \App\Models\User::count() }}</h4>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="col">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-success text-white rounded-circle p-3">
                        <i class="fas fa-user-tie fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Total Karyawan</h6>
                        <h4 class="fw-bold">{{ \App\Models\Karyawan::count() }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-warning text-white rounded-circle p-3">
                        <i class="fas fa-briefcase fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Total Jabatan</h6>
                        <h4 class="fw-bold">{{ \App\Models\Jabatan::count() }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-info text-white rounded-circle p-3">
                        <i class="fas fa-building fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Total Departemen</h6>
                        <h4 class="fw-bold">{{ \App\Models\Departemen::count() }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
