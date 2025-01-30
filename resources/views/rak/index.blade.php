@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">
            <i class="bi bi-grid-3x3-gap"></i> Daftar Rak
        </h1>
        <a href="{{ route('rak.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Rak
        </a>
    </div>

    <!-- Alert Success -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Rak Table -->
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-bookmarks-fill"></i> Daftar Rak</h5>
            <span class="badge bg-light text-dark">
                <i class="bi bi-archive"></i> {{ $rak->count() }} Total
            </span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th><i class="bi bi-hash"></i> ID</th>
                            <th><i class="bi bi-upc-scan"></i> Kode Rak</th>
                            <th><i class="bi bi-box-seam"></i> Rak</th>
                            <th><i class="bi bi-info-circle"></i> Keterangan</th>
                            <th><i class="bi bi-gear"></i> Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rak as $item)
                            <tr>
                                <td class="text-center">{{ $item->id_rak }}</td>
                                <td class="text-center">{{ $item->kode_rak }}</td>
                                <td>{{ $item->rak }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <!-- Edit Button -->
                                        <a href="{{ route('rak.edit', $item->id_rak) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('rak.destroy', $item->id_rak) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus rak ini?')">
                                                <i class="bi bi-trash3-fill"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    <i class="bi bi-exclamation-circle-fill"></i> Belum ada data rak.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
