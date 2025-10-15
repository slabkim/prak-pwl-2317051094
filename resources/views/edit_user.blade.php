@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-warning text-white">
                <h4 class="mb-0">Edit Pengguna</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger rounded-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" name="nama"
                            class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $user->nama) }}"
                            placeholder="Masukkan nama lengkap" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="npm" class="form-label">NPM</label>
                        <input type="text" id="npm" name="npm"
                            class="form-control @error('npm') is-invalid @enderror" value="{{ old('npm', $user->npm) }}"
                            placeholder="Masukkan NPM" required>
                        @error('npm')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kelas_id" class="form-label">Kelas</label>
                        <select name="kelas_id" id="kelas_id" class="form-select @error('kelas_id') is-invalid @enderror"
                            required>
                            <option value="">-- Pilih Kelas --</option>
                            @foreach ($kelas as $kelasItem)
                                <option value="{{ $kelasItem->id }}"
                                    {{ old('kelas_id', $user->kelas_id) == $kelasItem->id ? 'selected' : '' }}>
                                    {{ $kelasItem->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-save me-1"></i> Update
                        </button>
                        <a href="{{ url('/user') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
