<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'address',
        'isi_laporan',
        'gambar_bukti',
    ];
}