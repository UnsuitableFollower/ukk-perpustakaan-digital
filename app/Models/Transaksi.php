<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'tgl_transaksi';

    // Primary key
    protected $primaryKey = 'id_transaksi';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'id_pustaka',
        'id_anggota',
        'tgl_pinjam',
        'tgl_kembali',
        'tgl_pengembalian',
        'fp',
        'keterangan'
    ];

    // Relasi ke model Pustaka
    public function pustaka()
    {
        return $this->belongsTo(Pustaka::class, 'id_pustaka', 'id_pustaka');
    }

    // Relasi ke model Anggota
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id_anggota');
    }
}