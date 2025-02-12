<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DDC extends Model
{
    use HasFactory;

    protected $table = 'tbl_ddc';
    protected $primaryKey = 'id_ddc';
    protected $fillable = ['id_rak', 'kode_ddc', 'ddc', 'keterangan'];

    public function rak()
    {
        return $this->belongsTo(Rak::class, 'id_rak');
    }
}