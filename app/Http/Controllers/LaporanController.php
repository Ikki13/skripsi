<?php

namespace App\Http\Controllers;
use App\Models\Laporan;
use App\Models\Obat;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PenjualanExport;

use Illuminate\Http\Request;

class LaporanController extends Controller
{

    public function index(){
        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;
        return view ('dashboard.laporan.index',[
            'title' => 'Laporan'
        ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','total_notif','total_obat_habis','obat_habis'));
    }

    public function getData(Request $request){
        $this->validate($request,[
            'from_date'=>'required',
            'to_date'=>'required',
            'resource'=>'required',
        ]);
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        if ($request->resource == 'obat'){
            $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
            $total_kadaluwarsa = $kadaluwarsa->count();
            $obat = Obat::whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date))->get();
            $total_obat = $obat->count();
            $total_stok =$obat->sum('stok');
            $title = "Laporan Jumlah Obat";
            return view('dashboard.laporan.index',compact('kadaluwarsa','obat','title','total_obat','total_stok','total_kadaluwarsa'));
        }
        if($request->resource == "pembelian"){
            $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
            $total_kadaluwarsa = $kadaluwarsa->count();
            $title = "Laporan Pembelian Obat";
            $total_obat = Obat::all();
            $obat_habis = Obat::where('stok', '<=', 0)->get();
            $total_obat_habis = $obat_habis->count();
            $total_notif = $total_kadaluwarsa + $total_obat_habis;
            $pembelian = Pembelian::whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date))->get();
            $total_pembelian = $pembelian->sum('total');
            return view('dashboard.laporan.index',compact('kadaluwarsa','title','pembelian','total_pembelian','total_kadaluwarsa','total_obat','obat_habis','total_obat_habis','total_notif'));
        }
        if($request->resource == 'penjualan'){
            $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
            $total_kadaluwarsa = $kadaluwarsa->count();
            $title = "Laporan Penjualan Obat";
            $total_obat = Obat::all();
            $obat_habis = Obat::where('stok', '<=', 0)->get();
            $total_obat_habis = $obat_habis->count();
            $total_notif = $total_kadaluwarsa + $total_obat_habis;
            $penjualan = Penjualan::whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date))->get();
            $order = Order::whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date))->get();
            $total_penjualan = $penjualan->sum('total');
            return view('dashboard.laporan.index',compact('order','total_notif','kadaluwarsa','total_obat','title','penjualan','total_penjualan','total_kadaluwarsa','obat_habis','total_obat_habis'));
        }

        if($request->resource == 'online'){
            $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
            $total_kadaluwarsa = $kadaluwarsa->count();
            $title = "Laporan Penjualan Obat";
            $total_obat = Obat::all();
            $obat_habis = Obat::where('stok', '<=', 0)->get();
            $total_obat_habis = $obat_habis->count();
            $total_notif = $total_kadaluwarsa + $total_obat_habis;
            $online = Order::whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date))->get();
            $total_penjualan = $online->sum('total_price');
            return view('dashboard.laporan.index',compact('online','total_notif','kadaluwarsa','total_obat','title','total_penjualan','total_kadaluwarsa','obat_habis','total_obat_habis'));
        }
    }

}
