@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Daftar Penerbit</h1>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form method="GET" action="{{ route('penerbit.index') }}" class="d-flex w-50">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari penerbit..."
                value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </form>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="bi bi-plus-circle"></i> Tambah Penerbit
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penerbits as $penerbit)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $penerbit->kode_penerbit }}</td>
                        <td>{{ $penerbit->nama_penerbit }}</td>
                        <td>{{ Str::limit($penerbit->alamat_penerbit, 50) }}</td>
                        <td>
                            <strong>Telepon:</strong> {{ $penerbit->no_telp }}<br>
                            <strong>Email:</strong> {{ $penerbit->email }}
                        </td>
                        <td>
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                data-bs-target="#detailModal{{ $penerbit->id_penerbit }}">
                                <i class="bi bi-eye"></i> Detail
                            </button>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $penerbit->id_penerbit }}">
                                <i class="bi bi-pencil"></i> Edit
                            </button>
                            <form action="{{ route('penerbit.destroy', $penerbit->id_penerbit) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus penerbit ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Detail -->
                    <div class="modal fade" id="detailModal{{ $penerbit->id_penerbit }}" tabindex="-1"
                        aria-labelledby="detailModalLabel{{ $penerbit->id_penerbit }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailModalLabel{{ $penerbit->id_penerbit }}">Detail Penerbit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Kode Penerbit:</strong> {{ $penerbit->kode_penerbit }}</p>
                                    <p><strong>Nama Penerbit:</strong> {{ $penerbit->nama_penerbit }}</p>
                                    <p><strong>Alamat:</strong> {{ $penerbit->alamat_penerbit }}</p>
                                    <p><strong>Telepon:</strong> {{ $penerbit->no_telp }}</p>
                                    <p><strong>Email:</strong> {{ $penerbit->email }}</p>
                                    <p><strong>Fax:</strong> {{ $penerbit->fax ?? 'Tidak tersedia' }}</p>
                                    <p><strong>Website:</strong> <a href="{{ $penerbit->website }}" target="_blank">{{ $penerbit->website }}</a></p>
                                    <p><strong>Kontak:</strong> {{ $penerbit->kontak }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Penerbit -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Penerbit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('penerbit.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="kode_penerbit" class="form-label">Kode Penerbit</label>
                            <input type="text" class="form-control" id="kode_penerbit" name="kode_penerbit" required>
                        </div>
                        <div class="col-md-4">
                            <label for="nama_penerbit" class="form-label">Nama Penerbit</label>
                            <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" required>
                        </div>
                        <div class="col-md-4">
                            <label for="alamat_penerbit" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat_penerbit" name="alamat_penerbit" required>
                        </div>
                        <div class="col-md-4">
                            <label for="no_telp" class="form-label">No. Telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-4">
                            <label for="fax" class="form-label">Fax</label>
                            <input type="text" class="form-control" id="fax" name="fax">
                        </div>
                        <div class="col-md-4">
                            <label for="website" class="form-label">Website</label>
                            <input type="url" class="form-control" id="website" name="website">
                        </div>
                        <div class="col-md-4">
                            <label for="kontak" class="form-label">Kontak</label>
                            <input type="text" class="form-control" id="kontak" name="kontak" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
