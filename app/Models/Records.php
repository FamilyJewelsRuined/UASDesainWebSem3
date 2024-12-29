<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
    use HasFactory;

    protected $fillable = ['field1', 'field2', 'field3'];

    public function paketUmroh()
    {
        return $this->belongsTo(PaketUmroh::class, 'field2');
    }
}
