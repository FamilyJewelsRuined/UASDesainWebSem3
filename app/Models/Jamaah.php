<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'jamaah';

    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'no_telepon',
        'tanggal_lahir',
        'jenis_kelamin',
        'paspor',
    ];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
