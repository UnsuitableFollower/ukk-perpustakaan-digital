@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4"><i class="bi bi-person-lines-fill"></i> Manajemen Pengarang</h1>

    <!-- Success Message -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Add Pengarang Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPengarangModal">
        <i class="bi bi-plus-circle"></i> Tambah Pengarang
    </button>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>No. Telp</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengarangs as $pengarang)
                <tr>
                    <td>{{ $pengarang->kode_pengarang }}</td>
                    <td>{{ $pengarang->nama_pengarang }}</td>
                    <td>{{ $pengarang->no_telp }}</td>
                    <td>{{ $pengarang->email }}</td>
                    <td>
                        <a href="{{ $pengarang->website }}" target="_blank" class="text-primary">
                            <i class="bi bi-link-45deg"></i> {{ $pengarang->website }}
                        </a>
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#editPengarangModal{{ $pengarang->id_pengarang }}" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <form action="{{ route('pengarang.destroy', $pengarang->id_pengarang) }}" method="POST"
                            class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengarang ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editPengarangModal{{ $pengarang->id_pengarang }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('pengarang.update', $pengarang->id_pengarang) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header bg-warning">
                                    <h5 class="modal-title text-white"><i class="bi bi-pencil-square"></i> Edit Pengarang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    @include('pengarang.form', ['pengarang' => $pengarang])
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-warning">
                                        <i class="bi bi-save-fill"></i> Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Tidak ada data pengarang.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addPengarangModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('pengarang.store') }}" method="POST">
                @csrf
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white"><i class="bi bi-plus-circle"></i> Tambah Pengarang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @include('pengarang.form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save-fill"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
