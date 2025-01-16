<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index(Request $request)
    {
        $query = Penerbit::query();

        if ($request->filled('search')) {
            $query->where('nama_penerbit', 'like', '%' . $request->search . '%')
                ->orWhere('kode_penerbit', 'like', '%' . $request->search . '%');
        }
        
        $penerbits = $query->get();

        $penerbits = Penerbit::all();
        return view('penerbit.index', compact('penerbits'));    
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_penerbit' => 'required|unique:tbl_penerbit,kode_penerbit|max:10',
            'nama_penerbit' => 'required|unique:tbl_penerbit,nama_penerbit|max:50',
            'alamat_penerbit' => 'required|max:50',
            'no_telp' => 'required|max:15',
            'email' => 'required|email|max:30',
            'fax' => 'nullable|max:15',
            'website' => 'nullable|url|max:50',
            'kontak' => 'required|max:50',
        ]);

        Penerbit::create($request->all());

        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_penerbit' => 'required|max:10|unique:tbl_penerbit,kode_penerbit,' . $id . ',id_penerbit',
            'nama_penerbit' => 'required|max:50|unique:tbl_penerbit,nama_penerbit,' . $id . ',id_penerbit',
            'alamat_penerbit' => 'required|max:50',
            'no_telp' => 'required|max:15',
            'email' => 'required|email|max:30',
            'fax' => 'nullable|max:15',
            'website' => 'nullable|url|max:50',
            'kontak' => 'required|max:50',
        ]);

        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update($request->all());

        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();
    
        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil dihapus!');
    }
    
}
