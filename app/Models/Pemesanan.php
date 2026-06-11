<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rute_id',
        'jumlah_tiket',
        'total_harga',
        'status',
        'kode_pemesanan',
        'qr_code'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function detailPemesanan():HasMany
    {
        return $this->hasMany(DetailPemesanan::class);
    }

    public function rute():BelongsTo
    {
        return $this->belongsTo(Rute::class);
    }
}

