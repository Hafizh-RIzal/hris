@extends('be.master')
@section('title', 'Data Absensi')

@section('content')
<div class="container-fluid animate__animated animate__fadeIn">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0 fw-bold text-dark">
            <i class="fas fa-calendar-check me-2 text-success"></i>Data Absensi Karyawan
        </h4>
        <a href="{{ route('absensi.create') }}" class="btn btn-success rounded-pill px-4 shadow-sm">
            <i class="fas fa-plus me-1"></i> Tambah Absensi
        </a>
    </div>

    <div class="card border-0 shadow rounded-4">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered align-middle text-nowrap mb-0">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Status</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $absensi)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $absensi->karyawan->nama_lengkap ?? '-' }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($absensi->tanggal)->format('d M Y') }}</td>
                            <td class="text-center">{{ $absensi->jam_masuk ?? '-' }}</td>
                            <td class="text-center">{{ $absensi->jam_keluar ?? '-' }}</td>
                            <td class="text-center">
                                @php
                                    $badgeClass = match($absensi->status) {
                                        'Hadir' => 'success',
                                        'Terlambat' => 'warning text-dark',
                                        'Izin' => 'info',
                                        'Sakit' => 'primary',
                                        'Alpha' => 'danger',
                                        default => 'secondary',
                                    };
                                @endphp
                                <span class="badge bg-{{ $badgeClass }} px-3 py-1">{{ $absensi->status }}</span>
                            </td>
                            <td>{{ $absensi->catatan ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('absensi.edit', $absensi->id) }}" class="btn btn-warning btn-sm rounded-pill me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data absensi ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-pill" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">Belum ada data absensi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
