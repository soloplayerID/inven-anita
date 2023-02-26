<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    // protected $fillable = [
    //     'petugas_id',
    //     'produk_id',
    //     'name_customer',
    //     'meja_customer',
    //     'jenis_pembayaran',
    //     'code_transaksi',
    //     'order_id',
    //     'quantity',
    //     'harga_satuan',
    //     'jumlah_harga',
    //     'note',
    //     'snap_token',
    //     'url_midtrans',
    //     'status',
    //     'harga_satuan',
    //     'jumlah_harga',
    //     'note',
    // ];
    protected $guarded = [];
    public function nameMenu()
    {
        return $this->belongsTo(Menu::class,'produk_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'petugas_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
