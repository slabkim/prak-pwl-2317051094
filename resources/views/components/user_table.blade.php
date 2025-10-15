<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Daftar Pengguna</h4>
            <a href="{{ route('user.create') }}" class="btn btn-light">
                <i class="bi bi-plus-circle me-1"></i>Tambah Pengguna
            </a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>NPM</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user as $users)
                        <tr>
                            <td>{{ $users->id }}</td>
                            <td>{{ $users->nama }}</td>
                            <td>{{ $users->npm }}</td>
                            <td>{{ $users->nama_kelas }}</td>
                            <td>
                                <a href="{{ route('user.edit', $users->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form id="delete-form-{{ $users->id }}"
                                    action="{{ route('user.destroy', $users->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger"
                                        onclick="confirmDelete('{{ $users->id }}')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data pengguna</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus pengguna ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notification -->
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert"
        aria-live="assertive" aria-atomic="true" style="font-size: 1.2rem; min-width: 400px; max-width: 600px;">
        <div class="d-flex">
            <div class="toast-body" style="padding: 1rem 1.5rem;">
                <i class="bi bi-check-circle me-2"></i><span id="toastMessage"></span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close" style="font-size: 1.2rem;"></button>
        </div>
    </div>
</div>
