@extends('be.master')
@section('title', 'Tambah User')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-4 bg-white bg-opacity-75 animate__animated animate__fadeIn">
                <div class="card-header bg-gradient-primary text-white rounded-top-4 d-flex align-items-center">
                    <i class="fas fa-user-plus fa-lg me-2"></i>
                    <h5 class="mb-0">Tambah User Login</h5>
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

                    <form action="{{ route('users.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold"><i class="fas fa-user me-1"></i>Nama</label>
                            <input type="text" name="name" class="form-control rounded-3 shadow-sm" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold"><i class="fas fa-envelope me-1"></i>Email</label>
                            <input type="email" name="email" class="form-control rounded-3 shadow-sm" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold"><i class="fas fa-lock me-1"></i>Password</label>
                            <input type="password" name="password" class="form-control rounded-3 shadow-sm" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold"><i class="fas fa-user-tag me-1"></i>Role</label>
                            <select name="role" class="form-select rounded-3 shadow-sm" required>
                                <option value="">-- Pilih Role --</option>
                                @foreach (['admin', 'hrd', 'manager'] as $role)
                                    <option value="{{ $role }}" {{ old('role') == $role ? 'selected' : '' }}>
                                        {{ ucfirst($role) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
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
