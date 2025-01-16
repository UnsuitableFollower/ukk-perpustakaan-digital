<?php
// filepath: app/Models/JenisAnggota.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAnggota extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang sesuai
    protected $table = 'tbl_jenis_anggota';

    // Tentukan primary key jika bukan 'id'
    protected $primaryKey = 'id_jenis_anggota';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'kode_jenis_anggota',
        'jenis_anggota',
        'max_pinjam',
        'keterangan',
    ];

    // Jika tidak menggunakan timestamps
    public $timestamps = false;
}