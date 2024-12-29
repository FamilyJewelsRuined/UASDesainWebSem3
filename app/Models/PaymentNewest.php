<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentNewest extends Model
{
    use HasFactory;

    protected $fillable = [
        'daftar_id',
        'amount',
        'payment_method',
        'status',
    ];

    public function daftar()
    {
        return $this->belongsTo(Daftar::class, 'daftar_id');
    }
    
}
