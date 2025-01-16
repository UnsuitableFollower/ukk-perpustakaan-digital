<?php
// filepath: app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Anggota;


class DashboardController extends Controller
{
    public function index()
    {
        $totalAnggota = Anggota::count();
        return view('dashboard', compact('totalAnggota'));


    }
}