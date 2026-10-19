<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramPenghijauan extends Model
{
    protected $table = 'program_penghijauan';

    protected $fillable = [
        'nama_program',
        'lokasi',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'target_pohon',
        'pohon_tertanam',
        'status',
        'waktu_mulai',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'waktu_mulai' => 'datetime',
    ];
}
