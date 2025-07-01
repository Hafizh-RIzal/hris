@extends('be.master')
@section('title', 'Edit Jabatan')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-4 bg-white bg-opacity-75 animate__animated animate__fadeIn">
                <div class="card-header bg-gradient-primary text-white rounded-top-4 d-flex align-items-center">
                    <i class="fas fa-edit fa-lg me-2"></i>
                    <h5 class="mb-0">Edit Jabatan</h5>
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

                    <form action="{{ route('jabatan.update', $jabatan->id) }}" method="POST" class="needs-validation" novalidate>
                        @csrf @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-semibold"><i class="fas fa-barcode me-1"></i>Kode Jabatan</label>
                            <input type="text" name="kode_jabatan" class="form-control rounded-3 shadow-sm"
                                   value="{{ old('kode_jabatan', $jabatan->kode_jabatan) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold"><i class="fas fa-id-badge me-1"></i>Nama Jabatan</label>
                            <input type="text" name="nama_jabatan" class="form-control rounded-3 shadow-sm"
                                   value="{{ old('nama_jabatan', $jabatan->nama_jabatan) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold"><i class="fas fa-layer-group me-1"></i>Tingkat</label>
                            <select name="tingkat" class="form-select rounded-3 shadow-sm" required>
                                <option value="">-- Pilih Tingkat --</option>
                                @foreach (['junior', 'middle', 'senior', 'lead'] as $level)
                                    <option value="{{ $level }}"
                                        {{ old('tingkat', $jabatan->tingkat) == $level ? 'selected' : '' }}>
                                        {{ ucfirst($level) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold"><i class="fas fa-money-bill-wave me-1"></i>Gaji Pokok</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-light text-muted">Rp</span>
                                <input type="number" name="gaji_pokok" class="form-control rounded-end-3"
                                       value="{{ old('gaji_pokok', $jabatan->gaji_pokok) }}" required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('jabatan.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary rounded-pill px-4">
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
