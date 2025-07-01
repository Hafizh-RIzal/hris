@extends('be.master')
@section('title', 'Tambah Departemen')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-4 bg-white bg-opacity-75 animate__animated animate__fadeIn">
                <div class="card-header bg-gradient-primary text-white rounded-top-4 d-flex align-items-center">
                    <i class="fas fa-building fa-lg me-2"></i>
                    <h5 class="mb-0">Tambah Departemen</h5>
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

                    <form action="{{ route('departemen.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold"><i class="fas fa-barcode me-1"></i> Kode Departemen</label>
                            <input type="text" name="kode_departemen" class="form-control rounded-3 shadow-sm"
                                   value="{{ old('kode_departemen') }}" maxlength="10" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold"><i class="fas fa-id-badge me-1"></i> Nama Departemen</label>
                            <input type="text" name="nama_departemen" class="form-control rounded-3 shadow-sm"
                                   value="{{ old('nama_departemen') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold"><i class="fas fa-location-dot me-1"></i> Lokasi</label>
                            <input type="text" name="lokasi" class="form-control rounded-3 shadow-sm"
                                   value="{{ old('lokasi') }}">
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('departemen.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success rounded-pill px-4">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
