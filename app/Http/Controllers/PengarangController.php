<?php

namespace App\Http\Controllers;

use App\Models\Pengarang;
use Illuminate\Http\Request;

class PengarangController extends Controller
{
    public function index()
    {
        $pengarangs = Pengarang::all();
        return view('pengarang.index', compact('pengarangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_pengarang' => 'required|unique:tbl_pengarang,kode_pengarang|max:10',
            'gelar_depan' => 'nullable|max:10',
            'nama_pengarang' => 'required|unique:tbl_pengarang,nama_pengarang|max:50',
            'gelar_belakang' => 'nullable|max:10',
            'no_telp' => 'nullable|max:15',
            'email' => 'nullable|email|max:30',
            'biografi' => 'nullable',
            'website' => 'nullable|url|max:50',
            'keterangan' => 'nullable|max:50',
        ]);

        Pengarang::create($request->all());
        return redirect()->back()->with('success', 'Pengarang berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $pengarang = Pengarang::findOrFail($id);

        $request->validate([
            'kode_pengarang' => "required|unique:tbl_pengarang,kode_pengarang,$id,id_pengarang|max:10",
            'gelar_depan' => 'nullable|max:10',
            'nama_pengarang' => "required|unique:tbl_pengarang,nama_pengarang,$id,id_pengarang|max:50",
            'gelar_belakang' => 'nullable|max:10',
            'no_telp' => 'nullable|max:15',
            'email' => 'nullable|email|max:30',
            'biografi' => 'nullable',
            'website' => 'nullable|url|max:50',
            'keterangan' => 'nullable|max:50',
        ]);

        $pengarang->update($request->all());
        return redirect()->back()->with('success', 'Pengarang berhasil diubah.');
    }

    public function destroy($id)
    {
        Pengarang::destroy($id);
        return redirect()->back()->with('success', 'Pengarang berhasil dihapus.');
    }
}

