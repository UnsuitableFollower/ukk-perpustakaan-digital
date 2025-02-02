<?php
// filepath: app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anggota;
use App\Models\Pustaka;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTransaksi = Transaksi::count();
        $totalAnggota = Anggota::count();
        $totalBuku = Pustaka::count();
        $peminjamanAktif = Transaksi::whereNull('tgl_pengembalian')->count();

        return view('dashboard', compact('totalAnggota', 'totalBuku', 'totalTransaksi', 'peminjamanAktif'));


    }
}