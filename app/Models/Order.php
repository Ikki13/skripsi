<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelanggan;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelanggan_id', 'name', 'email', 'address', 'phone','total_price', 'status','tanggal_jual','banyak','total_beli'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id');
    }

}
