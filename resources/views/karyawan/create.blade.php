@extends('be.master')
@section('title', 'Tambah Karyawan')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card border-0 shadow-lg rounded-4 bg-white bg-opacity-75 animate__animated animate__fadeIn">
                <div class="card-header bg-gradient-primary text-white rounded-top-4 d-flex align-items-center">
                    <i class="fas fa-user-plus fa-lg me-2"></i>
                    <h5 class="mb-0">Tambah Karyawan</h5>
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

                    <form action="{{ route('karyawan.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="row">
                            <!-- Kiri -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold"><i class="fas fa-id-card me-1"></i> NIP</label>
                                    <input type="text" name="nip" class="form-control rounded-3 shadow-sm" value="{{ old('nip') }}" placeholder="Nomor Induk Pegawai" required autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold"><i class="fas fa-user me-1"></i> Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control rounded-3 shadow-sm" value="{{ old('nama_lengkap') }}" placeholder="Nama lengkap sesuai KTP" required autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold"><i class="fas fa-envelope me-1"></i> Email</label>
                                    <input type="email" name="email" class="form-control rounded-3 shadow-sm" value="{{ old('email') }}" placeholder="nama@email.com" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold"><i class="fas fa-phone me-1"></i> Telepon</label>
                                    <input type="number" name="telepon" class="form-control rounded-3 shadow-sm" value="{{ old('telepon') }}" placeholder="08xxxxxxxxxx">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold"><i class="fas fa-id-card-clip me-1"></i> No KTP</label>
                                    <input type="number" name="no_ktp" class="form-control rounded-3 shadow-sm" value="{{ old('no_ktp') }}" placeholder="Nomor KTP">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold"><i class="fas fa-file-invoice-dollar me-1"></i> NPWP</label>
                                    <input type="number" name="npwp" class="form-control rounded-3 shadow-sm" value="{{ old('npwp') }}" placeholder="Nomor NPWP">
                                </div>
                            </div>

                            <!-- Kanan -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold"><i class="fas fa-venus-mars me-1"></i> Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select rounded-3 shadow-sm" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold"><i class="fas fa-map-pin me-1"></i> Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control rounded-3 shadow-sm" value="{{ old('tempat_lahir') }}" placeholder="Kota Lahir" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold"><i class="fas fa-calendar-day me-1"></i> Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control rounded-3 shadow-sm" value="{{ old('tanggal_lahir') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold"><i class="fas fa-home me-1"></i> Alamat</label>
                                    <textarea name="alamat" class="form-control rounded-3 shadow-sm" rows="3" placeholder="Alamat lengkap...">{{ old('alamat') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold"><i class="fas fa-briefcase me-1"></i> Jabatan</label>
                                    <select name="id_jabatan" class="form-select rounded-3 shadow-sm" required>
                                        <option value="">-- Pilih Jabatan --</option>
                                        @foreach ($jabatan as $j)
                                            <option value="{{ $j->id }}" {{ old('id_jabatan') == $j->id ? 'selected' : '' }}>
                                                {{ $j->nama_jabatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold"><i class="fas fa-building me-1"></i> Departemen</label>
                                    <select name="id_departemen" class="form-select rounded-3 shadow-sm" required>
                                        <option value="">-- Pilih Departemen --</option>
                                        @foreach ($departemen as $d)
                                            <option value="{{ $d->id }}" {{ old('id_departemen') == $d->id ? 'selected' : '' }}>
                                                {{ $d->nama_departemen }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('karyawan.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
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
