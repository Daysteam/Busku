<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_bus',
        'user_id',
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

    public function ruteUtama():HasOne
    {
        return $this->hasOne(Rute::class)->latestOfMany();
    }
}
