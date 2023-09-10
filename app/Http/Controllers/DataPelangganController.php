<?php


namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pembelian;
use App\Models\Obat;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DataPelangganController extends Controller
{

    public function index(){

        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;    

    return view('dashboard.pelanggan.index',[
        'title' => 'Data Pelanggan',
        'pelanggan' => Pelanggan::all()
    ],compact('total_notif','kadaluwarsa','obat_habis'));
    }
}
