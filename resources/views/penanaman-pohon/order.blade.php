<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'kode_pesanan',
        'user_id',
        'nama',
        'email',
        'alamat',
        'total',
        'metode_pembayaran',
        'status_pembayaran',
        'status_donasi',
        'program_penghijauan_id',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'total' => 'decimal:2',
        'program_penghijauan_id' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }

    public function items()
    {
        return $this->hasMany(
            OrderItem::class,
            'order_id'
        );
    }

    public function programPenghijauan()
    {
        return $this->belongsTo(
            ProgramPenghijauan::class,
            'program_penghijauan_id'
        );
    }
}