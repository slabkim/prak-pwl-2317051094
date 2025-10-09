@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h4 class="card-title mb-0">
                            <i class="bi bi-plus-circle me-2"></i>Buat Mata Kuliah Baru
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('matakuliah.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_mk" class="form-label">Nama Mata Kuliah :</label>
                                <input type="text" id="nama_mk" name="nama_mk" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="sks" class="form-label">SKS :</label>
                                <input type="number" id="sks" name="sks" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">
                                <i class="bi bi-check-circle me-1"></i>Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
