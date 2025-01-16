<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;

    protected $table = 'tbl_penerbit';

    protected $fillable = [
        'kode_penerbit',
        'nama_penerbit',
        'alamat_penerbit',
        'no_telp',
        'email',
        'fax',
        'website',
        'kontak',
    ];
}

