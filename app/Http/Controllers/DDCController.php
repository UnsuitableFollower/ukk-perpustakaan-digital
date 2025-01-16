<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DDC;
use App\Models\Rak;

class DDCController extends Controller
{
    public function index()
    {
        $ddc = DDC::with('rak')->get(); // Mengambil relasi dengan Rak
        return view('ddc.index', compact('ddc'));
    }

    public function create()
    {
        $rak = Rak::all(); // Ambil semua Rak untuk dropdown
        return view('ddc.create', compact('rak'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_rak' => 'required|exists:tbl_rak,id_rak',
            'kode_ddc' => 'required|unique:tbl_ddc,kode_ddc|max:10',
            'ddc' => 'required|unique:tbl_ddc,ddc|max:100',
            'keterangan' => 'nullable|max:1000',
        ]);

        DDC::create($request->all());
        return redirect()->route('ddc.index')->with('success', 'DDC berhasil ditambahkan.');
    }

    public function edit($id_ddc)
    {
        $ddc = DDC::findOrFail($id_ddc);
        $rak = Rak::all(); // Dropdown Rak
        return view('ddc.edit', compact('ddc', 'rak'));
    }

    public function update(Request $request, $id_ddc)
    {
        $request->validate([
            'id_rak' => 'required|exists:tbl_rak,id_rak',
            'kode_ddc' => 'required|max:10|unique:tbl_ddc,kode_ddc,' . $id_ddc . ',id_ddc',
            'ddc' => 'required|max:100|unique:tbl_ddc,ddc,' . $id_ddc . ',id_ddc',
            'keterangan' => 'nullable|max:1000',
        ]);

        $ddc = DDC::findOrFail($id_ddc);
        $ddc->update($request->all());
        return redirect()->route('ddc.index')->with('success', 'DDC berhasil diperbarui.');
    }

    public function destroy($id_ddc)
    {
        $ddc = DDC::findOrFail($id_ddc);
        $ddc->delete();
        return redirect()->route('ddc.index')->with('success', 'DDC berhasil dihapus.');
    }
}
