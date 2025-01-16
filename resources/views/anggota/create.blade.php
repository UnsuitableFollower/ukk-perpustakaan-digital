@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Tambah Anggota') }}</div>

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

                    <form method="POST" action="{{ route('anggota.store') }}">
                        @csrf

                        <!-- Row 1: 3 input fields in one row -->
                        <div class="row">
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

                        <!-- Row 2: 3 input fields in one row -->
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

                        <!-- Row 3: 2 input fields in one row -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="tgl_daftar" class="form-label">Tanggal Daftar</label>
                                <input type="date" class="form-control" id="tgl_daftar" name="tgl_daftar" value="{{ old('tgl_daftar') }}" required>
                            </div>
                        </div>

                        <!-- Row 4: 2 input fields in one row -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="masa_aktif" class="form-label">Masa Aktif</label>
                                <input type="date" class="form-control" id="masa_aktif" name="masa_aktif" value="{{ old('masa_aktif') }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="fa" class="form-label">FA</label>
                                <select class="form-control" id="fa" name="fa" required>
                                    <option value="Y" {{ old('fa') == 'Y' ? 'selected' : '' }}>Y</option>
                                    <option value="T" {{ old('fa') == 'T' ? 'selected' : '' }}>T</option>
                                </select>
                            </div>
                        </div>

                        <!-- Row 5: 2 input fields in one row -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan') }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
                            </div>
                        </div>

                        <!-- Row 6: 2 input fields in one row -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="id_jenis_anggota" class="form-label">Jenis Anggota</label>
                                <select class="form-control" id="id_jenis_anggota" name="id_jenis_anggota" required>
                                    @foreach ($jenisAnggotas as $jenisAnggota)
                                        <option value="{{ $jenisAnggota->id_jenis_anggota }}">{{ $jenisAnggota->jenis_anggota }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
