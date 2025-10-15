@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-white">
                        <h4 class="card-title mb-0">
                            <i class="bi bi-pencil-square me-2"></i>Edit Mata Kuliah
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('matakuliah.update', $mk->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama_mk" class="form-label">Nama Mata Kuliah :</label>
                                <input type="text" id="nama_mk" name="nama_mk"
                                    class="form-control @error('nama_mk') is-invalid @enderror"
                                    value="{{ old('nama_mk', $mk->nama_mk) }}" required>
                                @error('nama_mk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="sks" class="form-label">SKS :</label>
                                <input type="number" id="sks" name="sks"
                                    class="form-control @error('sks') is-invalid @enderror"
                                    value="{{ old('sks', $mk->sks) }}" required>
                                @error('sks')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning w-100">
                                <i class="bi bi-check-circle me-1"></i>Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
