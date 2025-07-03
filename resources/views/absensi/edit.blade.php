@extends('be.master')
@section('title', 'Edit Absensi')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-4 bg-white bg-opacity-75 animate__animated animate__fadeIn">
                <div class="card-header bg-gradient-warning text-white rounded-top-4 d-flex align-items-center">
                    <i class="fas fa-pen-to-square fa-lg me-2"></i>
                    <h5 class="mb-0">Edit Data Absensi</h5>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('absensi.update', $absensi->id) }}" method="POST" class="needs-validation" novalidate>
                        @csrf @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-semibold"><i class="fas fa-user me-1"></i> Nama Karyawan</label>
                            <select name="karyawan_id" class="form-select rounded-3 shadow-sm" required>
                                <option value="">-- Pilih Karyawan --</option>
                                @foreach ($karyawan as $k)
                                    <option value="{{ $k->id }}" {{ old('karyawan_id', $absensi->karyawan_id) == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_lengkap }} ({{ $k->nip }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold"><i class="fas fa-calendar-day me-1"></i> Tanggal</label>
                            <input type="date" name="tanggal" class="form-control rounded-3 shadow-sm"
                                   value="{{ old('tanggal', $absensi->tanggal) }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold"><i class="fas fa-sign-in-alt me-1"></i> Jam Masuk</label>
                                <input type="time" name="jam_masuk" class="form-control rounded-3 shadow-sm"
                                       value="{{ old('jam_masuk', $absensi->jam_masuk) }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold"><i class="fas fa-sign-out-alt me-1"></i> Jam Keluar</label>
                                <input type="time" name="jam_keluar" class="form-control rounded-3 shadow-sm"
                                       value="{{ old('jam_keluar', $absensi->jam_keluar) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold"><i class="fas fa-clipboard-check me-1"></i> Status</label>
                            <select name="status" class="form-select rounded-3 shadow-sm" required>
                                @foreach (['Hadir', 'Terlambat', 'Izin', 'Sakit', 'Alpha'] as $status)
                                    <option value="{{ $status }}" {{ old('status', $absensi->status) == $status ? 'selected' : '' }}>
                                        {{ $status }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold"><i class="fas fa-sticky-note me-1"></i> Catatan</label>
                            <textarea name="catatan" class="form-control rounded-3 shadow-sm"
                                      rows="3" placeholder="Catatan tambahan...">{{ old('catatan', $absensi->catatan) }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('absensi.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-warning rounded-pill px-4">
                                <i class="fas fa-save me-1"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
