<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_toko',
        'deskripsi_toko',
        'alamat_toko',
        'whatsapp',
        'status_toko',
    ];

    protected $table = 'stores';
}
