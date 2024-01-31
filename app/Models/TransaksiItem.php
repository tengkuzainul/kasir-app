<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiItem extends Model
{
    use HasFactory;

    protected $table = 'transaksi_items';

    protected $fillable = [
        'transaksi_id',
        'barang_id',
        'nama',
        'harga',
        'qty',
    ];
}
