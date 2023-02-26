<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $fillable = ['name','kategori_id','deskripsi','stock','stok_awal','harga','gambar'];
    public function restock()
    {
       return $this->hasMany(Restock::class);
    }
    public function order()
    {
       return $this->belongsTo(Order::class);
    }
    public function kategori()
    {
       return $this->belongsTo(Kategori::class,'kategori_id');
    }
}
