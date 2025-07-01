@extends('be.master')
@section('title', 'Data Departemen')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Data Departemen</h4>
    <a href="{{ route('departemen.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Departemen</a>
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
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Departemen</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->kode_departemen }}</td>
                        <td>{{ $row->nama_departemen }}</td>
                        <td>{{ $row->lokasi ?? '-' }}</td>
                        <td>
                            <a href="{{ route('departemen.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('departemen.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">Data belum tersedia</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
