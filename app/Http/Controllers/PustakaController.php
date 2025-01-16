<?php

namespace App\Http\Controllers;

use App\Models\Pustaka;
use App\Models\DDC;
use App\Models\Pengarang;
use App\Models\Penerbit;
use App\Models\Format;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PustakaController extends Controller
{
    /**
     * Tampilkan daftar pustaka.
     */
    public function index()
    {
        $pustakas = Pustaka::all();
        $ddcs = DDC::all();
        $formats = Format::all();
        $pengarangs = Pengarang::all();
        $penerbits = Penerbit::all();

        return view('pustaka.index', compact('pustakas', 'pengarangs', 'penerbits', 'ddcs', 'formats'));
    }

    /**
     * Tambah pustaka baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_pustaka' => 'required|numeric',
            'id_ddc' => 'required|exists:tbl_ddc,id_ddc',
            'id_format' => 'required|exists:tbl_format,id_format',
            'judul_pustaka' => 'required|string|max:100',
            'isbn' => 'nullable|string|max:20',
            'tahun_terbit' => 'nullable|string|max:5',
            'keyword' => 'nullable|string|max:50',
            'keterangan_fisik' => 'nullable|string|max:100', // Tambahkan validasi
            'keterangan_tambahan' => 'nullable|string|max:100',
            'abstraksi' => 'nullable|string',
            'harga_buku' => 'nullable|numeric',
            'kondisi_buku' => 'required|string|in:Baru,Bekas',
            'fp' => 'required|in:0,1',
            'jml_pinjam' => 'nullable|numeric',
            'denda_terlambat' => 'nullable|numeric',
            'denda_hilang' => 'nullable|numeric',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        // Proses upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('pustaka_images', 'public');
        }

        Pustaka::create($data);

        return redirect()->back()->with('success', 'Data pustaka berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_pustaka' => 'required|numeric',
            'id_ddc' => 'required|exists:tbl_ddc,id_ddc',
            'id_format' => 'required|exists:tbl_format,id_format',
            'judul_pustaka' => 'required|string|max:100',
            'isbn' => 'nullable|string|max:20',
            'tahun_terbit' => 'nullable|string|max:5',
            'keyword' => 'nullable|string|max:50',
            'keterangan_fisik' => 'nullable|string|max:100',
            'keterangan_tambahan' => 'nullable|string|max:100',
            'abstraksi' => 'nullable|string',
            'harga_buku' => 'nullable|numeric',
            'kondisi_buku' => 'required|string|in:Baru,Bekas',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $pustaka = Pustaka::findOrFail($id);

        $pustaka->fill($request->except('gambar'));

        if ($request->hasFile('gambar')) {
            if ($pustaka->gambar && Storage::exists('public/' . $pustaka->gambar)) {
                Storage::delete('public/' . $pustaka->gambar);
            }
            $pustaka->gambar = $request->file('gambar')->store('pustaka_images', 'public');
        }

        $pustaka->save();

        return redirect()->back()->with('success', 'Data pustaka berhasil diperbarui.');
    }



    /**
     * Hapus pustaka.
     */
    public function destroy(Pustaka $pustaka)
    {
        // Hapus file gambar jika ada
        if ($pustaka->gambar && Storage::exists('public/' . $pustaka->gambar)) {
            Storage::delete('public/' . $pustaka->gambar);
        }

        $pustaka->delete();

        return redirect()->back()->with('success', 'Data pustaka berhasil dihapus.');
    }
}


