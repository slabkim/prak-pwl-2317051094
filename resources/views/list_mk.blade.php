@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title mb-0">
                            <i class="bi bi-book-fill me-2"></i>Daftar Mata Kuliah
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('matakuliah.create') }}" class="btn btn-success">
                                <i class="bi bi-plus-circle me-1"></i>Tambah Mata Kuliah Baru
                            </a>
                        </div>

                        @if ($mks->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th><i class="bi bi-book me-1"></i>Nama Mata Kuliah</th>
                                            <th><i class="bi bi-clock me-1"></i>SKS</th>
                                            <th><i class="bi bi-gear me-1"></i>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mks as $mk)
                                            <tr>
                                                <td>{{ $mk->nama_mk }}</td>
                                                <td>
                                                    <span class="badge bg-info">{{ $mk->sks }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('matakuliah.edit', $mk->id) }}"
                                                        class="btn btn-sm btn-warning me-1">
                                                        <i class="bi bi-pencil"></i> Edit
                                                    </a>
                                                    <form id="delete-form-{{ $mk->id }}"
                                                        action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            onclick="confirmDelete('{{ $mk->id }}')">
                                                            <i class="bi bi-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="bi bi-info-circle display-4 text-muted mb-3"></i>
                                <h5 class="text-muted">Belum ada data Mata Kuliah</h5>
                                <p class="text-muted">Silakan tambahkan Mata Kuliah baru untuk memulai.</p>
                            </div>
                        @endif
                    </div>
                </div>
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
                    Apakah Anda yakin ingin menghapus mata kuliah ini?
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

    <script>
        function confirmDelete(id) {
            const deleteForm = document.getElementById('delete-form-' + id);
            const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();

            document.getElementById('confirmDeleteBtn').onclick = function() {
                deleteForm.submit();
            };
        }

        // Toast untuk pesan sukses atau error
        @if (session('success'))
            document.addEventListener('DOMContentLoaded', function() {
                const toast = new bootstrap.Toast(document.getElementById('successToast'));
                document.getElementById('toastMessage').textContent = '{{ session('success') }}';
                toast.show();
            });
        @endif

        @if ($errors->any())
            document.addEventListener('DOMContentLoaded', function() {
                const toast = new bootstrap.Toast(document.getElementById('successToast'));
                document.getElementById('toastMessage').textContent =
                    'Terjadi kesalahan: @foreach ($errors->all() as $error){{ $error }} @endforeach';
                document.getElementById('successToast').classList.remove('bg-success');
                document.getElementById('successToast').classList.add('bg-danger');
                toast.show();
            });
        @endif
    </script>
@endsection
