<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'tb_transaksi';

    protected $fillable = [
        'no_transaksi',
        'tgl_transaksi',
        'total_bayar',
        'uang_pembeli',
        'kembalian',
    ];

    public $timestamps = true;
}
