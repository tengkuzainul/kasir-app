<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'tb_transaksi';

    protected $fillable = [
        'user_id', 'total_harga', 'kd_transaksi'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->kd_transaksi = $model->getRandomString();
        });
    }

    public function generateRandomString($length = 6)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characterslength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $characterslength - 1)];
        }
        return $randomString . "" . date("YmdHis");
    }

    public function getRandomString()
    {
        $str = $this->generateRandomString();
        return $str;
    }

    public function barang()
    {
        return $this->hasMany(TransaksiItem::class, 'transaksi_id');
    }

    public $timestamps = true;
}
