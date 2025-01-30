@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="bi bi-person-fill"> Daftar Anggota</h1>
        <a href="{{ route('anggota.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Anggota
        </a>
    </div>

    <!-- Form Pencarian -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <strong>Pencarian Anggota</strong>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('anggota.index') }}">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Cari Anggota"
                            value="{{ request()->input('search') }}">
                    </div>
                    <div class="col-md-3">
                        <select name="filter" class="form-select">
                            <option value="">Filter Jenis Anggota</option>
                            @foreach ($jenisAnggota as $jenis)
                                <option value="{{ $jenis->id_jenis_anggota }}" 
                                    {{ request()->input('filter') == $jenis->id_jenis_anggota ? 'selected' : '' }}>
                                    {{ $jenis->jenis_anggota }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Anggota -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <strong>Daftar Anggota</strong>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kode Anggota</th>
                        <th>Tempat</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($anggotas as $anggota)
                        <tr>
                            <td>{{ $anggota->id_anggota }}</td>
                            <td>{{ $anggota->nama_anggota }}</td>
                            <td>{{ $anggota->kode_anggota }}</td>
                            <td>{{ $anggota->tempat }}</td>
                            <td>{{ $anggota->tgl_lahir }}</td>
                            <td>{{ $anggota->alamat }}</td>
                            <td>{{ $anggota->no_telp }}</td>
                            <td>{{ $anggota->email }}</td>
                            <td class="text-center">
                                <a href="{{ route('anggota.edit', $anggota->id_anggota) }}" 
                                    class="btn btn-warning btn-sm mb-1">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('anggota.destroy', $anggota->id_anggota) }}" 
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mb-1">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                                <form action="{{ route('anggota.deactivate', $anggota->id_anggota) }}" 
                                    method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary btn-sm">
                                        <i class="bi bi-x-circle"></i> Nonaktifkan
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">Tidak ada data anggota.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Anggota -->
    <div class="modal fade" id="tambahAnggotaModal" tabindex="-1" aria-labelledby="tambahAnggotaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahAnggotaModalLabel">Tambah Anggota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('anggota.store') }}">
                        @csrf

                        <!-- Input fields for adding a member -->
                        <div class="row">
                        <div class="col-md-4 mb-3">
                                <label for="nama_anggota" class="form-label">Nama Anggota</label>
                                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="{{ old('nama_anggota') }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="nama_anggota" class="form-label">Nama Anggota</label>
                                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="{{ old('nama_anggota') }}" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="kode_anggota" class="form-label">Kode Anggota</label>
                                <input type="text" class="form-control" id="kode_anggota" name="kode_anggota" value="{{ old('kode_anggota') }}" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="tempat" class="form-label">Tempat</label>
                                <input type="text" class="form-control" id="tempat" name="tempat" value="{{ old('tempat') }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="no_telp" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" required>
                            </div>
                        </div>

                        <!-- Additional fields for registration -->
                        <!-- (Add the remaining fields from your create form here) -->

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Jenis Anggota -->
    <div class="card mt-5 shadow-sm">
        <div class="card-header bg-primary text-white">
            <strong>Daftar Jenis Anggota</strong>
        </div>
        <div class="card-body table-responsive">
            <a href="{{ route('jenis-anggota.create') }}" class="btn btn-primary mb-3">
                <i class="bi bi-plus-circle"></i> Tambah Jenis Anggota
            </a>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Kode Jenis Anggota</th>
                        <th>Jenis Anggota</th>
                        <th>Maksimal Pinjam</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jenisAnggota as $jenis)
                        <tr>
                            <td>{{ $jenis->id_jenis_anggota }}</td>
                            <td>{{ $jenis->kode_jenis_anggota }}</td>
                            <td>{{ $jenis->jenis_anggota }}</td>
                            <td>{{ $jenis->max_pinjam }}</td>
                            <td>{{ $jenis->keterangan }}</td>
                            <td class="text-center">
                                <a href="{{ route('jenis-anggota.edit', $jenis->id_jenis_anggota) }}" 
                                    class="btn btn-warning btn-sm mb-1">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('jenis-anggota.destroy', $jenis->id_jenis_anggota) }}" 
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Tidak ada data jenis anggota.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
