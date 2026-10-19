<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bibit extends Model
{
    use HasFactory;

    protected $table = 'bibits';

    protected $fillable = [
        'nama',
        'harga',
        'stok',
        'gambar',
        'aktif',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'stok' => 'integer',
        'aktif' => 'boolean',
    ];

    public function orderItems()
    {
        return $this->hasMany(
            OrderItem::class,
            'bibit_id'
        );
    }
}
