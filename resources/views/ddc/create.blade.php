@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah DDC</h1>
    <form action="{{ route('ddc.store') }}" method="POST">
        @csrf
        @include('ddc.form', ['ddc' => new \App\Models\DDC()])
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('ddc.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
