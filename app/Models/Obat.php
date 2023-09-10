<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Suplier; 
use Illuminate\Support\Carbon;
use App\Models\Pemasok;
use App\Traits\HasFormatRupiah;

class Obat extends Model
{
    use HasFactory;
    use HasFormatRupiah;
    protected $guarded = ['id'];
    
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id','id'); 
    }

    public function pemasok(){
        return $this->belongsTo(Pemasok::class,'pemasok_id','id'); 
    }

}
