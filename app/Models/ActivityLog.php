<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;
    protected $table ='activity_log';
    protected $fillable = ['causer_id'];
    public function userActi()
    {
        return $this->belongsTo(User::class,'causer_id');
    }
}
