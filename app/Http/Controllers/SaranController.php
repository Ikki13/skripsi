<?php

namespace App\Http\Controllers;
use App\Models\Pesan;
use App\Models\Pembelian;
use App\Models\Obat;
use Carbon\Carbon;

use Illuminate\Http\Request;

class SaranController extends Controller
{

    public function index(){

        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis; 

        return view('dashboard.saran',[
            'title' => 'Saran',
            'saran' => Pesan::all()
        ],compact('total_notif','kadaluwarsa','obat_habis'));
    }
}
