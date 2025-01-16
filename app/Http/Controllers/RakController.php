<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rak;

class RakController extends Controller
{
    public function index()
    {
        $rak = Rak::all();
        return view('rak.index', compact('rak'));
    }

    public function create()
    {
        return view('rak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_rak' => 'required|unique:tbl_rak,kode_rak|max:10',
            'rak' => 'required|unique:tbl_rak,rak|max:25',
            'keterangan' => 'nullable|max:5000',
        ]);

        Rak::create($request->all());
        return redirect()->route('rak.index')->with('success', 'Rak berhasil ditambahkan.');
    }

    public function edit($id_rak)
    {
        $rak = Rak::findOrFail($id_rak);
        return view('rak.edit', compact('rak'));
    }

    public function update(Request $request, $id_rak)
    {
        $request->validate([
            'kode_rak' => 'required|max:10|unique:tbl_rak,kode_rak,' . $id_rak . ',id_rak',
            'rak' => 'required|max:25|unique:tbl_rak,rak,' . $id_rak . ',id_rak',
            'keterangan' => 'nullable|max:5000',
        ]);

        $rak = Rak::findOrFail($id_rak);
        $rak->update($request->all());
        return redirect()->route('rak.index')->with('success', 'Rak berhasil diperbarui.');
    }

    public function destroy($id_rak)
    {
        $rak = Rak::findOrFail($id_rak);
        $rak->delete();
        return redirect()->route('rak.index')->with('success', 'Rak berhasil dihapus.');
    }
}
