<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pustaka;
use App\Models\Anggota;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        // Ambil data transaksi beserta relasi pustaka dan anggota
        $transaksi = Transaksi::with(['pustaka', 'anggota'])->get();

        // Ambil data pustaka dan anggota untuk dropdown di modal
        $pustaka = Pustaka::all();
        $anggota = Anggota::all();

        // Kirim data ke view
        return view('transaksi.index', compact('transaksi', 'pustaka', 'anggota'));
    }

    public function create()
    {
        $pustaka = Pustaka::all();
        $anggota = Anggota::all();
        return view('transaksi.create', compact('pustaka', 'anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pustaka' => 'required|exists:tbl_pustaka,id_pustaka',
            'id_anggota' => 'required|exists:tbl_anggota,id_anggota',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date',
            'keterangan' => 'nullable|string|max:50',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $pustaka = Pustaka::all();
        $anggota = Anggota::all();
        return view('transaksi.edit', compact('transaksi', 'pustaka', 'anggota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pustaka' => 'required|exists:tbl_pustaka,id_pustaka', // Sesuaikan dengan tabel dan kolom yang benar
            'id_anggota' => 'required|exists:tbl_anggota,id_anggota', // Sesuaikan dengan tabel dan kolom yang benar
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date',
            'tgl_pengembalian' => 'required|date',
            'keterangan' => 'nullable|string|max:50',
        ]);

        // Cari transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id);

        // Update data transaksi
        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function return(Request $request, $id)
    {
        $request->validate([
            'tgl_pengembalian' => 'required|date',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'tgl_pengembalian' => $request->tgl_pengembalian,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dikembalikan!');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}