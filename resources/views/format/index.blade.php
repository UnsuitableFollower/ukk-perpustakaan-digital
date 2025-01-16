@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Data Format</h2>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Format</button>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Format</th>
                <th>Format</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($formats as $key => $format)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $format->kode_format }}</td>
                <td>{{ $format->format }}</td>
                <td>{{ $format->keterangan }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $format->id_format }}">Edit</button>
                    <form action="{{ route('format.destroy', $format->id_format) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
                                <h5 class="modal-title">Edit Format</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Kode Format</label>
                                    <input type="text" name="kode_format" class="form-control" value="{{ $format->kode_format }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Format</label>
                                    <input type="text" name="format" class="form-control" value="{{ $format->format }}" required>
                                </div>
                                <div class="mb-3">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" value="{{ $format->keterangan }}">
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
                    <h5 class="modal-title">Tambah Format</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Kode Format</label>
                        <input type="text" name="kode_format" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Format</label>
                        <input type="text" name="format" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
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
