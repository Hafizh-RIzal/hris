@extends('be.master')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-lg rounded-4 bg-white animate__animated animate__fadeIn">
                <div class="card-body">
                    <h3 class="mb-3">
                        <i class="fas fa-home me-2 text-primary"></i>
                        Selamat Datang, {{ auth()->user()->name }}!
                        <small class="text-muted">({{ auth()->user()->role }})</small>
                    </h3>
                    <p class="text-muted">
                        Ini adalah halaman dashboard utama sistem HRIS.
                        Silakan gunakan menu di sebelah kiri untuk mulai mengelola data
                        @if(auth()->user()->role === 'admin')
                            pengguna, karyawan, jabatan, dan departemen.
                        @elseif(auth()->user()->role === 'hrd')
                            karyawan, jabatan, dan departemen.
                        @else
                            yang tersedia sesuai peran Anda.
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
