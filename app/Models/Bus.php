<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_bus',
        'nama_bus',
        'jumlah_kursi',
        'tipe_bus',
        'image'
    ];

    public function rute():HasMany
    {
        return $this->hasMany(Rute::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
