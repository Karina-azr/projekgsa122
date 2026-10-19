<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'kode_pesanan',
        'user_id',
        'nama',
        'email',
        'alamat',
        'program_penghijauan_id',
        'total',
        'metode_pembayaran',
        'status_pembayaran',
        'status_donasi',
    ];

    protected $casts = [
        'total' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
