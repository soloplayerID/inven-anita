<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectPayment extends Model
{
    use HasFactory;
    protected $table = 'notification';
    protected $fillable = [
        'order_id', 'gross_amount', 'transaction_status','transaction_id','status_code','status_message','payment_type','signature_key','fraud_status'
        ,'pdf_url','finish_redirect_url'
    ];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public $timestamps = \true;
    public const PAYMENT_CHANNELS = [
        'gopay','ShopeePay'
    ];
    public const CHALLENGE = 'challenge';
    public const SUCCESS = 'success';
    public const SETTLEMENT = 'settlement';
    public const PENDING = 'pending';
    public const DENY = 'deny';
    public const EXPIRE = 'expire';
    public const CANCEL = 'cancel';

}
