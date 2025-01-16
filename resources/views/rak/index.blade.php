@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Daftar Rak</h1>
        <a href="{{ route('rak.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Rak
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Daftar Rak</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Kode Rak</th>
                            <th>Rak</th>
                            <th>Keterangan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rak as $item)
                            <tr>
                                <td>{{ $item->id_rak }}</td>
                                <td>{{ $item->kode_rak }}</td>
                                <td>{{ $item->rak }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td class="text-center">
                                    <a href="{{ route('rak.edit', $item->id_rak) }}" class="btn btn-warning btn-sm me-2">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('rak.destroy', $item->id_rak) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Yakin ingin menghapus rak ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data rak.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
