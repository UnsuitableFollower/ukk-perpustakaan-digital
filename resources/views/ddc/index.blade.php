@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar DDC</h1>
        <a href="{{ route('ddc.create') }}" class="btn btn-primary">Tambah DDC</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Kode DDC</th>
                    <th>DDC</th>
                    <th>Rak</th>
                    <th>Keterangan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ddc as $item)
                    <tr>
                        <td>{{ $item->id_ddc }}</td>
                        <td>{{ $item->kode_ddc }}</td>
                        <td>{{ $item->ddc }}</td>
                        <td>{{ $item->rak->rak ?? 'Rak tidak ditemukan' }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td class="text-center">
                            <a href="{{ route('ddc.edit', $item->id_ddc) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                            <form action="{{ route('ddc.destroy', $item->id_ddc) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus DDC ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
