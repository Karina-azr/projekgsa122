<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bibit extends Model
{
    protected $table = 'bibit';

    protected $fillable = [
        'nama',
        'harga',
        'deskripsi',
        'gambar',
        'stok',
        'aktif',
    ];

    protected $casts = [
        'harga' => 'integer',
        'stok' => 'integer',
        'aktif' => 'boolean',
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
