@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Rak</h2>
    <form action="{{ route('rak.update', $rak->id_rak) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kode_rak" class="form-label">Kode Rak</label>
            <input type="text" class="form-control" id="kode_rak" name="kode_rak" value="{{ $rak->kode_rak }}" required>
        </div>
        <div class="mb-3">
            <label for="rak" class="form-label">Nama Rak</label>
            <input type="text" class="form-control" id="rak" name="rak" value="{{ $rak->rak }}" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ $rak->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('rak.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
