<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelanggan;
use App\Models\Obat;

class Chart extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function obat(){
        return $this->belongsTo(Obat::class,'obat_id','id'); 
    }

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class,'pelanggan_id','id'); 
    }
}
