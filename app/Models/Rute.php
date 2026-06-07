<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rute extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'bus_id',
        'kota_tujuan',
        'kota_asal',
        'tanggal_berangkat',
        'jam_berangkat',
        'harga'
    ];

    public function bus():BelongsTo
    {
        return $this->belongsTo(Bus::class);
    }

    public function pemesanan():HasMany
    {
        return $this->hasMany(Pemesanan::class);
    }
}
