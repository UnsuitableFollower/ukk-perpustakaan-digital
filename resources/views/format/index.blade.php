@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>
            <i class="bi bi-book"></i> Data Format Buku
        </h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="bi bi-plus-circle"></i> Tambah Format
        </button>
    </div>
    
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Kode Format</th>
                <th>Format</th>
                <th>Keterangan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($formats as $key => $format)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $format->kode_format }}</td>
                <td>{{ $format->format }}</td>
                <td>{{ $format->keterangan }}</td>
                <td class="text-center">
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $format->id_format }}">
                        <i class="bi bi-pencil"></i> Edit
                    </button>
                    <form action="{{ route('format.destroy', $format->id_format) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus format ini?')">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $format->id_format }}" tabindex="-1">
                <div class="modal-dialog">
                    <form action="{{ route('format.update', $format->id_format) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <i class="bi bi-pencil-square"></i> Edit Format
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="kode_format_{{ $format->id_format }}">Kode Format</label>
                                    <input type="text" id="kode_format_{{ $format->id_format }}" name="kode_format" class="form-control" value="{{ $format->kode_format }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="format_{{ $format->id_format }}">Format</label>
                                    <input type="text" id="format_{{ $format->id_format }}" name="format" class="form-control" value="{{ $format->format }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan_{{ $format->id_format }}">Keterangan</label>
                                    <textarea id="keterangan_{{ $format->id_format }}" name="keterangan" class="form-control" rows="3">{{ $format->keterangan }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('format.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-plus-circle"></i> Tambah Format
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode_format">Kode Format</label>
                        <input type="text" id="kode_format" name="kode_format" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="format">Format</label>
                        <input type="text" id="format" name="format" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
