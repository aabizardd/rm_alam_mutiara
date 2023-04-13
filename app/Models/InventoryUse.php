<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryUse extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_inventory',
        'stok_berubah',
        'status',
        'keterangan',
        'id_user',
    ];

    protected $table = 'inventory_use';
}