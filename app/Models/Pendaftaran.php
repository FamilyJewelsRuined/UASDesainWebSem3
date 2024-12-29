<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'jamaah_id',
        'paket_id',
        'tanggal_daftar',
        'status',
    ];

    public function jamaah()
    {
        return $this->belongsTo(Jamaah::class);
    }

    public function jadwalKeberangkatan()
    {
        return $this->belongsTo(JadwalKeberangkatan::class);
    }
}
