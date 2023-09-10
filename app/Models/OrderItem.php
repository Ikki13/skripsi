<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Obat;

class OrderItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'pelanggan_id', 'obat_id', 'order_id','banyak'
    ]; 

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id', 'id');
    }
}
