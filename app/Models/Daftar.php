<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;

    // Jika Anda menggunakan tabel yang berbeda dari konvensi, tambahkan ini:
    // protected $table = 'daftar'; // ganti 'daftar' dengan nama tabel yang sesuai

    // Jika Anda memiliki kolom yang dapat diisi massal
    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'no_telepon',
        'tanggal_lahir',
        'jenis_kelamin',
    ];

    public function pembayarans()
{
    return $this->hasMany(Pembayaran::class);
}

}
