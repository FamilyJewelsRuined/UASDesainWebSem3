<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKeberangkatan extends Model
{
    use HasFactory;

// Explicitly define the table name if it doesn't follow the default naming convention
protected $table = 'jadwalkeberangkatan';


    protected $fillable = [
        'paket_id',
        'tanggal_keberangkatan',
        'tanggal_kepulangan',
        'kuota',
        'status',
    ];

    public function paketUmroh()
    {
        return $this->belongsTo(PaketUmroh::class, 'paket_id');
    }
    

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
