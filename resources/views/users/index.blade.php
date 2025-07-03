@extends('be.master')
@section('title', 'Data User')

@section('content')
<div class="container-fluid animate__animated animate__fadeIn">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0 fw-bold text-dark">
            <i class="fas fa-user-shield me-2 text-primary"></i>Data User Login
        </h4>
        <a href="{{ route('users.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="fas fa-plus me-1"></i> Tambah User
        </a>
        <form method="GET" action="?">
            <input type="text" class="form-control" id="search" name="search" value="{{ request()->search }}">
        </form>
    </div>

    <div class="card border-0 shadow rounded-4">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered align-middle text-nowrap mb-0">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Dibuat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge bg-secondary text-uppercase px-3 py-1">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td>
                                @if ($user->is_approved)
                                    <span class="badge bg-success px-3 py-1">Disetujui</span>
                                @else
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-warning text-dark px-3 py-1">Menunggu</span>
                                        <form action="{{ route('users.approve', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success rounded-pill">
                                                <i class="fas fa-check"></i> Setujui
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm rounded-pill me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                             <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline delete-form">
    @csrf @method('DELETE')
    <button type="button" class="btn btn-danger btn-sm rounded-pill btn-delete" title="Hapus">
        <i class="fas fa-trash"></i>
    </button>
</form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Belum ada data user.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $users->links() }}
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
                text: "Data user akan dihapus secara permanen!",
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
    text: '{{ session('success') }}',
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif
@endsection
