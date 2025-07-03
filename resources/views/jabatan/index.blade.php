@extends('be.master')
@section('title', 'Data Jabatan')

@section('content')
<div class="container-fluid animate__animated animate__fadeIn">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0 fw-bold text-dark">
            <i class="fas fa-briefcase me-2 text-primary"></i>Data Jabatan
        </h4>
        <a href="{{ route('jabatan.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="fas fa-plus me-1"></i> Tambah Jabatan
        </a>
    </div>

    <div class="card border-0 shadow rounded-4">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered align-middle text-nowrap mb-0">
                <thead class="table-dark text-center">
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
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td><span class="fw-semibold text-uppercase">{{ $row->kode_jabatan }}</span></td>
                            <td>{{ $row->nama_jabatan }}</td>
                            <td>
                                <span class="badge bg-info text-dark text-capitalize px-3 py-1">
                                    {{ $row->tingkat }}
                                </span>
                            </td>
                            <td>Rp {{ number_format($row->gaji_pokok, 2, ',', '.') }}</td>
                            <td class="text-center">
                                <a href="{{ route('jabatan.edit', $row->id) }}" class="btn btn-warning btn-sm rounded-pill me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                               <form action="{{ route('jabatan.destroy', $row->id) }}" method="POST" class="d-inline delete-form">
    @csrf @method('DELETE')
    <button type="button" class="btn btn-danger btn-sm rounded-pill btn-delete" title="Hapus">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Data jabatan belum tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($jabatan->hasPages())
        <div class="card-footer px-4 py-3 bg-white border-top">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    Total: {{ $jabatan->total() }} jabatan
                </small>
                {{ $jabatan->links('pagination::bootstrap-5') }}
            </div>
        </div>
        @endif
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
                text: "Data jabatan akan dihapus permanen!",
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
