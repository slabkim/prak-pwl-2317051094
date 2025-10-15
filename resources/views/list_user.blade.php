@extends('layouts.app')

@section('content')
    @include('components.user_table')
@endsection

@section('scripts')
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
