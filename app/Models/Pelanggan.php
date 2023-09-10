<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penjualan;
use App\Models\Obat;

class Pelanggan extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penjualan(){
        return $this->hasMany(Penjualan::class); 
    }

    public function obat(){
        return $this->hasMany(Obat::class); 
    }
    
}
