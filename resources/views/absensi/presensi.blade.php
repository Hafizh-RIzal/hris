@extends('be.master')
@section('title', 'Isi Absensi')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-4 bg-white bg-opacity-75 animate__animated animate__fadeIn">

                <div class="card-header bg-gradient-success text-white rounded-top-4">
                    <h5 class="mb-0"><i class="fas fa-clipboard-check me-2"></i>Form Absensi Hari Ini</h5>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success rounded-pill text-center">{{ session('success') }}</div>
                    @elseif (session('info'))
                        <div class="alert alert-warning rounded-pill text-center">{{ session('info') }}</div>
                    @elseif (session('error'))
                        <div class="alert alert-danger rounded-pill text-center">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('absensi.simpan') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama</label>
                            <input type="text" class="form-control rounded-3 shadow-sm" value="{{ $karyawan->nama_lengkap }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control rounded-3 shadow-sm" value="{{ now()->toDateString() }}" readonly>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Jam Masuk</label>
                                <input type="time" name="jam_masuk" class="form-control rounded-3 shadow-sm"
                                       value="{{ now()->format('H:i') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Jam Keluar</label>
                                <input type="time" name="jam_keluar" class="form-control rounded-3 shadow-sm"
                                       value="{{ old('jam_keluar') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Catatan</label>
                            <textarea name="catatan" class="form-control rounded-3 shadow-sm"
                                      rows="2" placeholder="Opsional">{{ old('catatan') }}</textarea>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success rounded-pill px-4">
                                <i class="fas fa-save me-1"></i> Simpan Absensi
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
