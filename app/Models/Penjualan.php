<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Obat;
use App\Models\Pelanggan;
use App\Models\Pembelian;
use App\Traits\HasFormatRupiah;

class Penjualan extends Model
{
    use HasFactory;
    use HasFormatRupiah;
    
    protected $guarded = ['id'];

    public function obat(){
        return $this->belongsTo(Obat::class,'obat_id','id'); 
    }

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class,'pelanggan_id','id'); 
    }

    public function pembelian(){
        return $this->belongsTo(Pembelian::class,'pembelian_id','id'); 
    }

}
