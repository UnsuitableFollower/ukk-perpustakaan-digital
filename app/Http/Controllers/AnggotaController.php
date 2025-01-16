<?php
// filepath: app/Http/Controllers/AnggotaController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\JenisAnggota;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $anggotas = Anggota::all();
        $jenisAnggota = JenisAnggota::all();

        // Mendapatkan query pencarian dan filter jenis anggota
        $search = $request->input('search');
        $filter = $request->input('filter');

        // Membangun query untuk anggota berdasarkan pencarian dan filter
        $anggotas = Anggota::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama_anggota', 'like', "%{$search}%")
                    ->orWhere('kode_anggota', 'like', "%{$search}%")
                    ->orWhere('tempat', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->when($filter, function ($query, $filter) {
                return $query->where('id_jenis_anggota', $filter);
            })
            ->get();

        return view('anggota.index', compact('anggotas', 'jenisAnggota'));
    }

    public function create()
    {
        $jenisAnggotas = JenisAnggota::all();
        return view('anggota.create', compact('jenisAnggotas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_anggota' => 'required|string|max:50',
            'kode_anggota' => 'required|string|max:20',
            'tempat' => 'required|string|max:20',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:50',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|string|email|max:30',
            'tgl_daftar' => 'required|date',
            'masa_aktif' => 'required|date',
            'fa' => 'required|in:Y,T',
            'keterangan' => 'nullable|string|max:45',
            'username' => 'required|string|max:50',
            'password' => 'required|string|max:50',
        ]);

        Anggota::create($request->all());

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        $jenisAnggotas = JenisAnggota::all();
        return view('anggota.edit', compact('anggota', 'jenisAnggotas'));
    }

    public function deactivate($id)
    {
        $anggota = Anggota::find($id);
        $anggota->fa = 'T'; // Menandakan nonaktif
        $anggota->save();
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dinonaktifkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_anggota' => 'required|string|max:50',
            'kode_anggota' => 'required|string|max:20',
            'tempat' => 'required|string|max:20',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:50',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|string|email|max:30',
            'tgl_daftar' => 'required|date',
            'masa_aktif' => 'required|date',
            'fa' => 'required|in:Y,T',
            'keterangan' => 'nullable|string|max:45',
            'username' => 'required|string|max:50',
            'password' => 'nullable|string|max:50',
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->all());

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }
}