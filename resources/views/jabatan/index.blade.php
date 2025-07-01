@extends('be.master')
@section('title', 'Data Jabatan')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Data Jabatan</h4>
    <a href="{{ route('jabatan.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Jabatan</a>
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
                    <th>Nama Jabatan</th>
                    <th>Tingkat</th>
                    <th>Gaji Pokok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jabatan as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->kode_jabatan }}</td>
                        <td>{{ $row->nama_jabatan }}</td>
                        <td>{{ ucfirst($row->tingkat) ?? '-' }}</td>
                        <td>Rp {{ number_format($row->gaji_pokok, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('jabatan.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('jabatan.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">Data belum ada</td></tr>
                @endforelse
            </tbody>
        </table>

        {{ $jabatan->links() }}
    </div>
</div>
@endsection
