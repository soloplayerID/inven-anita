<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restock extends Model
{
    use HasFactory;
    protected $table = 'restocks';
    protected $fillable = ['menu_id','quantity','created_at'];
    public function menu()
    {
        return $this->belongsTo(Menu::class,'menu_id');
    }
    public function supplier()
    {
       return $this->belongsTo(Supplier::class,'supplier_id');
    }
}
