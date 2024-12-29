<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketUmroh extends Model
{
    use HasFactory;
    // Explicitly define the correct table name
    protected $table = 'paketumroh';

    // Add fillable attributes if needed
    protected $fillable = [
        'nama_paket',   // Make sure 'nama_paket' is in the fillable array
        'deskripsi',
        'harga',
        'durasi_hari',
        'fasilitas',
    ];
}
