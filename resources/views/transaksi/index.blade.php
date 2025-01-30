@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 bi bi-list-check me-2"> Daftar Transaksi</h1>

    <!-- Tombol Trigger Modal Create -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
        <i class="bi bi-plus-circle"></i> Tambah Transaksi
    </button>

    <!-- Tabel Transaksi -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID Transaksi</th>
                    <th>Judul Pustaka</th>
                    <th>Nama Anggota</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksi as $t)
                    <tr>
                        <td>{{ $t->id_transaksi }}</td>
                        <td>{{ $t->pustaka->judul_pustaka }}</td>
                        <td>{{ $t->anggota->nama_anggota }}</td>
                        <td>{{ $t->tgl_pinjam }}</td>
                        <td>{{ $t->tgl_kembali }}</td>
                        <td>{{ $t->keterangan }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <button type="button" class="btn btn-warning btn-sm edit-btn" data-bs-toggle="modal"
                                data-bs-target="#editModal" data-id="{{ $t->id_transaksi }}"
                                data-pustaka="{{ $t->id_pustaka }}" data-anggota="{{ $t->id_anggota }}"
                                data-pinjam="{{ $t->tgl_pinjam }}" data-kembali="{{ $t->tgl_kembali }}"
                                data-keterangan="{{ $t->keterangan }}">
                                <i class="bi bi-pencil"></i> Edit
                            </button>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('transaksi.destroy', $t->id_transaksi) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Create -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id_pustaka" class="form-label">Pustaka</label>
                        <select name="id_pustaka" class="form-select" required>
                            @foreach($pustaka as $p)
                                <option value="{{ $p->id_pustaka }}">{{ $p->judul_pustaka }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_anggota" class="form-label">Anggota</label>
                        <select name="id_anggota" class="form-select" required>
                            @foreach($anggota as $a)
                                <option value="{{ $a->id_anggota }}">{{ $a->nama_anggota }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                        <input type="date" name="tgl_pinjam" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                        <input type="date" name="tgl_kembali" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
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

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_id_pustaka" class="form-label">Pustaka</label>
                        <select name="id_pustaka" id="edit_id_pustaka" class="form-select" required>
                            @foreach($pustaka as $p)
                            <option value="{{ $p->id_pustaka }}">{{ $p->judul_pustaka }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_id_anggota" class="form-label">Anggota</label>
                        <select name="id_anggota" id="edit_id_anggota" class="form-select" required>
                            @foreach($anggota as $a)
                            <option value="{{ $a->id_anggota }}">{{ $a->nama_anggota }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                        <input type="date" name="tgl_pinjam" id="edit_tgl_pinjam" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_tgl_kembali" class="form-label">Tanggal Kembali</label>
                        <input type="date" name="tgl_kembali" id="edit_tgl_kembali" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_keterangan" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" id="edit_keterangan" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script untuk Edit Modal -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tangkap event klik tombol edit
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Ambil data dari atribut data-*
                const id = this.getAttribute('data-id');
                const pustakaId = this.getAttribute('data-pustaka');
                const anggotaId = this.getAttribute('data-anggota');
                const tglPinjam = this.getAttribute('data-pinjam');
                const tglKembali = this.getAttribute('data-kembali');
                const keterangan = this.getAttribute('data-keterangan');

                // Update form action dengan ID yang benar
                document.getElementById('editForm').action = `/transaksi/${id}`;

                // Isi nilai form
                document.getElementById('edit_id_pustaka').value = pustakaId;
                document.getElementById('edit_id_anggota').value = anggotaId;
                document.getElementById('edit_tgl_pinjam').value = tglPinjam;
                document.getElementById('edit_tgl_kembali').value = tglKembali;
                document.getElementById('edit_keterangan').value = keterangan;
            });
        });
    });
</script>

@endsection