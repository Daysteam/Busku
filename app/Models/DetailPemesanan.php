<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemesanan_id',
        'nama_penumpang',
        'jenis_kelamin',
        'umur'
    ];

    public function pemesanan():BelongsTo
    {
        return $this->belongsTo(Pemesanan::class);
    }
}
