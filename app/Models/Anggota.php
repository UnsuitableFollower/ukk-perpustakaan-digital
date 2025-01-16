<?php
// filepath: app/Models/Anggota.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang sesuai
    protected $table = 'tbl_anggota';

    // Tentukan primary key jika bukan 'id'
    protected $primaryKey = 'id_anggota';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'id_jenis_anggota',
        'kode_anggota',
        'nama_anggota',
        'tempat',
        'tgl_lahir',
        'alamat',
        'no_telp',
        'email',
        'tgl_daftar',
        'masa_aktif',
        'fa',
        'keterangan',
        'foto',
        'username',
        'password',
    ];

    // Jika tidak menggunakan timestamps
    public $timestamps = false;
}