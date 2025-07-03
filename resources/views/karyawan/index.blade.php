@extends('be.master')
@section('title', 'Data Karyawan')

@section('content')
<div class="container-fluid animate__animated animate__fadeIn">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0 fw-bold text-dark">
            <i class="fas fa-users me-2 text-primary"></i>Data Karyawan
        </h4>
        <a href="{{ route('karyawan.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="fas fa-plus me-1"></i> Tambah Karyawan
        </a>
    </div>

    <div class="card border-0 shadow rounded-4">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered align-middle text-nowrap mb-0">
                <thead class="table-dark text-center">
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
                            <td class="text-center fw-semibold">{{ $k->nip }}</td>
                            <td>{{ $k->nama_lengkap }}</td>
                            <td>{{ $k->email }}</td>
                            <td>{{ $k->telepon ?? '-' }}</td>
                            <td>{{ $k->no_ktp ?? '-' }}</td>
                            <td>{{ $k->npwp ?? '-' }}</td>
                            <td>{{ $k->alamat ?? '-' }}</td>
                            <td>
                                @if ($k->jenis_kelamin == 'Laki-laki')
                                    <span class="badge bg-primary px-3 py-1">Laki-laki</span>
                                @elseif ($k->jenis_kelamin == 'Perempuan')
                                    <span class="badge bg-danger px-3 py-1">Perempuan</span>
                                @else
                                    <span class="badge bg-secondary px-3 py-1">-</span>
                                @endif
                            </td>
                            <td>
                                {{ $k->tempat_lahir ?? '-' }},
                                {{ $k->tanggal_lahir ? \Carbon\Carbon::parse($k->tanggal_lahir)->format('d-m-Y') : '-' }}
                            </td>
                            <td>{{ $k->jabatan->nama_jabatan ?? '-' }}</td>
                            <td>{{ $k->departemen->nama_departemen ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('karyawan.edit', $k->id) }}" class="btn btn-warning btn-sm rounded-pill me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                               <form action="{{ route('karyawan.destroy', $k->id) }}" method="POST" class="d-inline delete-form">
    @csrf @method('DELETE')
    <button type="button" class="btn btn-danger btn-sm rounded-pill btn-delete" title="Hapus">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="text-center text-muted py-4">Data karyawan belum tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const form = this.closest('form');

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data karyawan akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Sukses',
    text: @json(session('success')),
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif
@endsection
