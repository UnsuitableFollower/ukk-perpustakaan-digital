@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Rak</h2>
    <form action="{{ route('rak.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kode_rak" class="form-label">Kode Rak</label>
            <input type="text" class="form-control" id="kode_rak" name="kode_rak" required>
        </div>
        <div class="mb-3">
            <label for="rak" class="form-label">Nama Rak</label>
            <input type="text" class="form-control" id="rak" name="rak" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('rak.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
