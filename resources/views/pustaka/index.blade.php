@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4 ">Daftar Pustaka</h1>

    <!-- Pesan Sukses -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Pustaka</button>

    <!-- Tabel Data -->
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Judul</th>
                <th>ISBN</th>
                <th>Tahun</th>
                <th>Harga</th>
                <th>Kondisi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pustakas as $index => $pustaka)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pustaka->kode_pustaka }}</td>
                    <td>{{ $pustaka->judul_pustaka }}</td>
                    <td>{{ $pustaka->isbn }}</td>
                    <td>{{ $pustaka->tahun_terbit }}</td>
                    <td>Rp{{ number_format($pustaka->harga_buku, 0, ',', '.') }}</td>
                    <td>{{ $pustaka->kondisi_buku }}</td>
                    <td>
                        @if($pustaka->gambar)
                            <img src="{{ asset('storage/' . $pustaka->gambar) }}" alt="Gambar {{ $pustaka->judul_pustaka }}"
                                style="width: 100px; height: auto;">
                        @else
                            <span>Tidak ada gambar</span>
                        @endif
                    </td>
                    <td>
                        <!-- Tombol Edit -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $pustaka->id_pustaka }}">
                            <i class="bi bi-pencil-fill"></i> Edit
                        </button>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('pustaka.destroy', $pustaka->id_pustaka) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data pustaka.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Modal Tambah -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('pustaka.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Pustaka</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Input Fields -->
                        <div class="mb-3">
                            <label for="id_ddc" class="form-label">DDC</label>
                            <select class="form-select" id="id_ddc" name="id_ddc" required>
                                @foreach($ddcs as $ddc)
                                    <option value="{{ $ddc->id_ddc }}">{{ $ddc->kode_ddc }} - {{ $ddc->ddc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_format" class="form-label">Format</label>
                            <select class="form-select" id="id_format" name="id_format" required>
                                <option value="" disabled selected>Pilih Format</option>
                                @foreach($formats as $format)
                                    <option value="{{ $format->id_format }}">{{ $format->format }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kode_pustaka" class="form-label">Kode Pustaka</label>
                            <input type="number" class="form-control" id="kode_pustaka" name="kode_pustaka" required>
                        </div>
                        <div class="mb-3">
                            <label for="judul_pustaka" class="form-label">Judul Pustaka</label>
                            <input type="text" class="form-control" id="judul_pustaka" name="judul_pustaka" required>
                        </div>
                        <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="text" class="form-control" id="isbn" name="isbn" required>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                            <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
                        </div>
                        <div class="mb-3">
                            <label for="keyword" class="form-label">Keyword</label>
                            <input type="text" class="form-control" id="keyword" name="keyword">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan_fisik" class="form-label">Keterangan Fisik</label>
                            <input type="text" class="form-control" id="keterangan_fisik" name="keterangan_fisik"
                                maxlength="100">
                        </div>

                        <div class="mb-3">
                            <label for="keterangan_tambahan" class="form-label">Keterangan Tambahan</label>
                            <input type="text" class="form-control" id="keterangan_tambahan" name="keterangan_tambahan">
                        </div>
                        <div class="mb-3">
                            <label for="abstraksi" class="form-label">Abstraksi</label>
                            <textarea class="form-control" id="abstraksi" name="abstraksi"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="harga_buku" class="form-label">Harga Buku</label>
                            <input type="number" class="form-control" id="harga_buku" name="harga_buku" required>
                        </div>
                        <div class="mb-3">
                            <label for="kondisi_buku" class="form-label">Kondisi Buku</label>
                            <select class="form-select" id="kondisi_buku" name="kondisi_buku" required>
                                <option value="Baru">Baru</option>
                                <option value="Bekas">Bekas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="fp" class="form-label">FP</label>
                            <select class="form-select" id="fp" name="fp" required>
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jml_pinjam" class="form-label">Jumlah Pinjam</label>
                            <input type="number" class="form-control" id="jml_pinjam" name="jml_pinjam">
                        </div>

                        <div class="mb-3">
                            <label for="denda_terlambat" class="form-label">Denda Terlambat</label>
                            <input type="number" class="form-control" id="denda_terlambat" name="denda_terlambat">
                        </div>

                        <div class="mb-3">
                            <label for="denda_hilang" class="form-label">Denda Hilang</label>
                            <input type="number" class="form-control" id="denda_hilang" name="denda_hilang">
                        </div>
                        <div class="mb-3">
                            <label for="id_pengarang" class="form-label">Pengarang</label>
                            <select class="form-select" id="id_pengarang" name="id_pengarang" required>
                                <option value="">Pilih Pengarang</option>
                                @foreach($pengarangs as $pengarang)
                                    <option value="{{ $pengarang->id_pengarang }}">{{ $pengarang->nama_pengarang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_penerbit" class="form-label">Penerbit</label>
                            <select class="form-select" id="id_penerbit" name="id_penerbit" required>
                                <option value="">Pilih Penerbit</option>
                                @foreach($penerbits as $penerbit)
                                    <option value="{{ $penerbit->id_penerbit }}">{{ $penerbit->nama_penerbit }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
@foreach ($pustakas as $item)
    <div class="modal fade" id="editModal{{ $item->id_pustaka }}" tabindex="-1" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Pustaka</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pustaka.update', $item->id_pustaka) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <!-- Kode Pustaka -->
                        <div class="mb-3">
                            <label for="kode_pustaka" class="form-label">Kode Pustaka</label>
                            <input type="text" class="form-control" name="kode_pustaka" value="{{ $item->kode_pustaka }}"
                                required>
                        </div>

                        <!-- DDC -->
                        <div class="mb-3">
                            <label for="id_ddc" class="form-label">DDC</label>
                            <select class="form-select" name="id_ddc" required>
                                @foreach ($ddcs as $ddcItem)
                                    <option value="{{ $ddcItem->id_ddc }}" {{ $ddcItem->id_ddc == $item->id_ddc ? 'selected' : '' }}>
                                        {{ $ddcItem->kode_ddc }} - {{ $ddcItem->ddc }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Format -->
                        <div class="mb-3">
                            <label for="id_format" class="form-label">Format</label>
                            <select class="form-select" name="id_format" required>
                                @foreach ($formats as $format)
                                    <option value="{{ $format->id_format }}" {{ $format->id_format == $item->id_format ? 'selected' : '' }}>
                                        {{ $format->format }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Judul Pustaka -->
                        <div class="mb-3">
                            <label for="judul_pustaka" class="form-label">Judul Pustaka</label>
                            <input type="text" class="form-control" name="judul_pustaka" value="{{ $item->judul_pustaka }}"
                                required>
                        </div>

                        <!-- ISBN -->
                        <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="text" class="form-control" name="isbn" value="{{ $item->isbn }}">
                        </div>

                        <!-- Tahun Terbit -->
                        <div class="mb-3">
                            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                            <input type="text" class="form-control" name="tahun_terbit" value="{{ $item->tahun_terbit }}">
                        </div>

                        <!-- Keyword -->
                        <div class="mb-3">
                            <label for="keyword" class="form-label">Keyword</label>
                            <input type="text" class="form-control" name="keyword" value="{{ $item->keyword }}">
                        </div>

                        <!-- Keterangan Fisik -->
                        <div class="mb-3">
                            <label for="keterangan_fisik" class="form-label">Keterangan Fisik</label>
                            <input type="text" class="form-control" name="keterangan_fisik"
                                value="{{ $item->keterangan_fisik }}">
                        </div>

                        <!-- Keterangan Tambahan -->
                        <div class="mb-3">
                            <label for="keterangan_tambahan" class="form-label">Keterangan Tambahan</label>
                            <input type="text" class="form-control" name="keterangan_tambahan"
                                value="{{ $item->keterangan_tambahan }}">
                        </div>

                        <!-- Abstraksi -->
                        <div class="mb-3">
                            <label for="abstraksi" class="form-label">Abstraksi</label>
                            <textarea class="form-control" name="abstraksi" rows="3">{{ $item->abstraksi }}</textarea>
                        </div>

                        <!-- Harga Buku -->
                        <div class="mb-3">
                            <label for="harga_buku" class="form-label">Harga Buku</label>
                            <input type="number" class="form-control" name="harga_buku" value="{{ $item->harga_buku }}">
                        </div>

                        <!-- Kondisi Buku -->
                        <div class="mb-3">
                            <label for="kondisi_buku" class="form-label">Kondisi Buku</label>
                            <select class="form-select" name="kondisi_buku" required>
                                <option value="Baru" {{ $item->kondisi_buku == 'Baru' ? 'selected' : '' }}>Baru</option>
                                <option value="Bekas" {{ $item->kondisi_buku == 'Bekas' ? 'selected' : '' }}>Bekas</option>
                            </select>
                        </div>

                        <!-- Gambar -->
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar (Opsional)</label>
                            <input type="file" class="form-control" name="gambar">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar" class="img-fluid mt-2"
                                    width="100">
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@endsection