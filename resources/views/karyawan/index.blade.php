@extends('be.master')
@section('title', 'Data Karyawan')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Data Karyawan</h4>
    <a href="{{ route('karyawan.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Karyawan</a>
</div>

{{-- @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm d-flex align-items-center" role="alert">
        <i class="fas fa-check-circle me-2 fs-5"></i>
        <div>{{ session('success') }}</div>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif --}}

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="table-dark">
    <tr>
        <th>NIP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Telepon</th>
        <th>No KTP</th>
        <th>NPWP</th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
        <th>TTL</th>
        <th>Jabatan</th>
        <th>Departemen</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @forelse ($data as $k)
        <tr>
            <td>{{ $k->nip }}</td>
            <td>{{ $k->nama_lengkap }}</td>
            <td>{{ $k->email }}</td>
            <td>{{ $k->telepon ?? '-' }}</td>
            <td>{{ $k->no_ktp ?? '-' }}</td>
            <td>{{ $k->npwp ?? '-' }}</td>
            <td>{{ $k->alamat ?? '-' }}</td>
            <td>{{ $k->jenis_kelamin ?? '-' }}</td>
            <td>
                {{ $k->tempat_lahir ?? '-' }},
                {{ $k->tanggal_lahir ? date('d-m-Y', strtotime($k->tanggal_lahir)) : '-' }}
            </td>
            <td>{{ $k->jabatan->nama_jabatan ?? '-' }}</td>
            <td>{{ $k->departemen->nama_departemen ?? '-' }}</td>
            <td>
                <a href="{{ route('karyawan.edit', $k->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                <form action="{{ route('karyawan.destroy', $k->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="12" class="text-center">Data kosong</td></tr>
    @endforelse
</tbody>
        </table>
    </div>
</div>
@endsection
