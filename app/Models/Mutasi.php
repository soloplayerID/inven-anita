<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;
    protected $table = 'mutasi';
    protected $fillable = [
        'id_mutasi',
        'tgl_mutasi',
        'nama_barang',
        'stok_awal',
        'barang_masuk',
        'barang_keluar',
        'stok_akhir',
        'produk_id'
    ];
}