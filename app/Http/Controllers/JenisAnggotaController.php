<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\JenisAnggota;
use Illuminate\Http\Request;

class JenisAnggotaController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::all();
        $jenisAnggota = JenisAnggota::all();
        return view('anggota.index', compact('anggotas', 'jenisAnggota'));
    }

    public function create()
    {
        return view('jenis_anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_jenis_anggota' => 'required|max:20',
            'jenis_anggota' => 'required|max:15',
            'max_pinjam' => 'required|max:5',
            'keterangan' => 'nullable|max:50',
        ]);

        JenisAnggota::create($request->all());
        return redirect()->route('jenis-anggota.index')->with('success', 'Jenis Anggota created successfully.');
    }

    public function destroy(JenisAnggota $jenisAnggota)
    {
        $jenisAnggota->delete();
        return redirect()->route('jenis-anggota.index')->with('success', 'Jenis Anggota deleted successfully.');
    }
}