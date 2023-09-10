<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Chart;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{

    public function index(){

        if (Auth::check()) {
            // Jika auth admin, tampilkan pemberitahuan
            session()->flash('error', 'Anda adalah Admin tidak bisa melakukan transaksi disini!');
            return redirect('/');

        }  else if (!Auth::guard('pelanggan')->check()) {
            // Jika pengguna bukan pelanggan terautentikasi, tampilkan pemberitahuan
            session()->flash('error', 'Anda Harus Login Terlebih Dahulu Untuk Melakukan Transaksi!');
            return redirect('/');

        }

        $chart = Chart::all();
        $totalchart = $chart->sum('obat.harga_jual');

        return view('chart',[
            'title' => 'Chart',
            'chart' => Chart::latest()->where('pelanggan_id', auth('pelanggan')->user()->id)->get()
        ],compact('totalchart'));
    }

    public function addToCart(Request $request , $id){
        // dd($request->all());

        $validatedData = $request->validate([
            'jumlah' => 'required',
            'harga_beli' => 'required'
            ]);

        $validatedData['pelanggan_id'] = auth('pelanggan')->user()->id;
        $validatedData['obat_id'] = $id;
        $validatedData['harga_beli'] *= $request->jumlah ;

        $drug = Obat::findOrFail($request->obat_id);

        if (!$request->filled('total_harga')) {
            $validatedData['total_harga'] = $drug->harga_jual * $request->jumlah ; // Nilai default jika tidak ada inputan
        }

        if ($drug->stok < $request->jumlah ) {
            return redirect()->back()->with('error', 'Maaf, Stok Obat tidak mencukupi!');
        
        } else if ( $request->jumlah <= 0 ){
            return redirect()->back()->with('error', 'Format Salah!');
        } 
        
        else { 
            
        Chart::create($validatedData);

        $obat = Obat::findOrFail($request->obat_id);
        $obat->stok -= $request->jumlah;
        $obat->save();

        }

        return redirect('keranjang');      
    }
    
    public function deleteCart(Request $request , $id){

        $chart = Chart::FindOrFail($id);
        Chart::destroy($chart->id);

        $product = Obat::find($request->obat_id);
        if ($product) {
            $product->stok += $request->jumlahhidden; // Menambahkan 1 pada stok
            $product->save();
        }

        return redirect('keranjang');      
    } 



}
