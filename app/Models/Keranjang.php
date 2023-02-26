<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjangs';
    protected $fillable = [
        'produk_id',
        'petugas_id',
        'quantity',
        'harga_satuan',
        'jumlah_harga',
        'note',
    ];
    public function menuName()
    {
        return $this->BelongsTo(Menu::class,'produk_id');
    }
}
