@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="bi bi-bookmarks-fill"></i> Daftar DDC</h1>
        <a href="{{ route('ddc.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah DDC
        </a>
    </div>

    <!-- Success Message -->
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Kode DDC</th>
                    <th>DDC</th>
                    <th>Rak</th>
                    <th>Keterangan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ddc as $item)
                <tr>
                    <td>{{ $item->id_ddc }}</td>
                    <td>{{ $item->kode_ddc }}</td>
                    <td>{{ $item->ddc }}</td>
                    <td>
                        <span class="badge bg-info text-dark">
                            {{ $item->rak->rak ?? 'Rak tidak ditemukan' }}
                        </span>
                    </td>
                    <td>{{ $item->keterangan }}</td>
                    <td class="text-center">
                        <!-- Edit Button -->
                        <a href="{{ route('ddc.edit', $item->id_ddc) }}" class="btn btn-warning btn-sm me-1" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <!-- Delete Form -->
                        <form action="{{ route('ddc.destroy', $item->id_ddc) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus DDC ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Tidak ada data DDC.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
