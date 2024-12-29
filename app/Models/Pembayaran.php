<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'daftar_id',
        'metode_pembayaran',
        'jumlah_pembayaran',
        'tanggal_pembayaran',
    ];

    public function daftar()
    {
        return $this->belongsTo(Daftar::class);
    }
}
