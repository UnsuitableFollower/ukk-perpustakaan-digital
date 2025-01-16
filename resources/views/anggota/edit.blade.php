<!-- filepath: resources/views/anggota/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Anggota') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('anggota.update', $anggota->id_anggota) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama_anggota" class="form-label">Nama Anggota</label>
                            <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="{{ $anggota->nama_anggota }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="kode_anggota" class="form-label">Kode Anggota</label>
                            <input type="text" class="form-control" id="kode_anggota" name="kode_anggota" value="{{ $anggota->kode_anggota }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="tempat" class="form-label">Tempat</label>
                            <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $anggota->tempat }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $anggota->tgl_lahir }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $anggota->alamat }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="no_telp" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $anggota->no_telp }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $anggota->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="tgl_daftar" class="form-label">Tanggal Daftar</label>
                            <input type="date" class="form-control" id="tgl_daftar" name="tgl_daftar" value="{{ $anggota->tgl_daftar }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="masa_aktif" class="form-label">Masa Aktif</label>
                            <input type="date" class="form-control" id="masa_aktif" name="masa_aktif" value="{{ $anggota->masa_aktif }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="fa" class="form-label">FA</label>
                            <select class="form-control" id="fa" name="fa" required>
                                <option value="Y" {{ $anggota->fa == 'Y' ? 'selected' : '' }}>Y</option>
                                <option value="T" {{ $anggota->fa == 'T' ? 'selected' : '' }}>T</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $anggota->keterangan }}">
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $anggota->username }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection