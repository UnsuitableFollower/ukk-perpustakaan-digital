
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Jenis Anggota') }}</div>

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

                    <form action="{{ route('jenis-anggota.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kode_jenis_anggota">Kode Jenis Anggota</label>
                            <input type="text" name="kode_jenis_anggota" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_anggota">Jenis Anggota</label>
                            <input type="text" name="jenis_anggota" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="max_pinjam">Max Pinjam</label>
                            <input type="text" name="max_pinjam" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection