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
                                            <th><i class="bi bi-hash me-1"></i>ID</th>
                                            <th><i class="bi bi-book me-1"></i>Nama Mata Kuliah</th>
                                            <th><i class="bi bi-clock me-1"></i>SKS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mks as $mk)
                                            <tr>
                                                <td>{{ $mk->id }}</td>
                                                <td>{{ $mk->nama_mk }}</td>
                                                <td>
                                                    <span class="badge bg-info">{{ $mk->sks }}</span>
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
@endsection
