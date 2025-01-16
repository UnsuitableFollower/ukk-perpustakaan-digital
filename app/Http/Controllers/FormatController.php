<?php

namespace App\Http\Controllers;

use App\Models\Format;
use Illuminate\Http\Request;

class FormatController extends Controller
{
    public function index()
    {
        $formats = Format::all();
        return view('format.index', compact('formats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_format' => 'required|unique:tbl_format|max:10',
            'format' => 'required|unique:tbl_format|max:25',
            'keterangan' => 'nullable|max:50',
        ]);

        Format::create($request->all());
        return redirect()->back()->with('success', 'Format berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $format = Format::findOrFail($id);
        $request->validate([
            'kode_format' => 'required|max:10|unique:tbl_format,kode_format,' . $format->id_format . ',id_format',
            'format' => 'required|max:25|unique:tbl_format,format,' . $format->id_format . ',id_format',
            'keterangan' => 'nullable|max:50',
        ]);

        $format->update($request->all());
        return redirect()->back()->with('success', 'Format berhasil diupdate');
    }

    public function destroy($id)
    {
        Format::destroy($id);
        return redirect()->back()->with('success', 'Format berhasil dihapus');
    }
}

