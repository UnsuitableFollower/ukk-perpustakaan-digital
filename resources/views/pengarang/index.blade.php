@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Manajemen Pengarang</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add Pengarang Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPengarangModal">Tambah
        Pengarang</button>

    <!-- Table -->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>No. Telp</th>
                <th>Email</th>
                <th>Website</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengarangs as $pengarang)
                <tr>
                    <td>{{ $pengarang->kode_pengarang }}</td>
                    <td>{{ $pengarang->nama_pengarang }}</td>
                    <td>{{ $pengarang->no_telp }}</td>
                    <td>{{ $pengarang->email }}</td>
                    <td>{{ $pengarang->website }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#editPengarangModal{{ $pengarang->id_pengarang }}">Edit</button>
                        <form action="{{ route('pengarang.destroy', $pengarang->id_pengarang) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Pengarang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    @include('pengarang.form', ['pengarang' => $pengarang])
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addPengarangModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('pengarang.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pengarang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kode_pengarang" class="form-label">Kode Pengarang</label>
                                <input type="text" class="form-control" id="kode_pengarang" name="kode_pengarang"
                                    maxlength="10" required placeholder="Masukkan kode pengarang">
                            </div>
                            <div class="mb-3">
                                <label for="gelar_depan" class="form-label">Gelar Depan</label>
                                <input type="text" class="form-control" id="gelar_depan" name="gelar_depan"
                                    maxlength="10" placeholder="Contoh: Dr.">
                            </div>
                            <div class="mb-3">
                                <label for="nama_pengarang" class="form-label">Nama Pengarang</label>
                                <input type="text" class="form-control" id="nama_pengarang" name="nama_pengarang"
                                    maxlength="50" required placeholder="Masukkan nama pengarang">
                            </div>
                            <div class="mb-3">
                                <label for="gelar_belakang" class="form-label">Gelar Belakang</label>
                                <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang"
                                    maxlength="10" placeholder="Contoh: Ph.D">
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="no_telp" class="form-label">No. Telp</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" maxlength="15"
                                    placeholder="Masukkan nomor telepon">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" maxlength="30"
                                    placeholder="Masukkan email">
                            </div>
                            <div class="mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="url" class="form-control" id="website" name="website" maxlength="50"
                                    placeholder="Masukkan URL website">
                            </div>
                            <div class="mb-3">
                                <label for="biografi" class="form-label">Biografi</label>
                                <textarea class="form-control" id="biografi" name="biografi" rows="3"
                                    placeholder="Tulis biografi pengarang"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" maxlength="50"
                                    placeholder="Masukkan keterangan tambahan">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection