@extends('be.master')
@section('title', 'Data Departemen')

@section('content')
<div class="container-fluid animate__animated animate__fadeIn">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0 fw-bold text-dark">
            <i class="fas fa-building me-2 text-primary"></i>Data Departemen
        </h4>
        <a href="{{ route('departemen.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="fas fa-plus me-1"></i> Tambah Departemen
        </a>
    </div>

    <div class="card border-0 shadow rounded-4">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered align-middle text-nowrap mb-0">
                <thead class="table-dark text-center">
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
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="fw-semibold text-uppercase">{{ $row->kode_departemen }}</td>
                            <td>{{ $row->nama_departemen }}</td>
                            <td>{{ $row->lokasi ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('departemen.edit', $row->id) }}" class="btn btn-sm btn-warning rounded-pill me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('departemen.destroy', $row->id) }}" method="POST" class="d-inline delete-form">
    @csrf @method('DELETE')
    <button type="button" class="btn btn-sm btn-danger rounded-pill btn-delete" title="Hapus">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Data departemen belum tersedia.</td>
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
                text: "Data departemen akan dihapus permanen!",
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
