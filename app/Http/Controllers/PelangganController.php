<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Pembelian;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Auth::check()) {
            // Jika auth admin, tampilkan pemberitahuan
            session()->flash('error', 'Anda adalah Admin tidak bisa melakukan transaksi disini!');
            return redirect('/');

        }  else if (!Auth::guard('pelanggan')->check()) {
            // Jika pengguna bukan pelanggan terautentikasi, tampilkan pemberitahuan
            session()->flash('error', 'Anda Harus Login Terlebih Dahulu Untuk Melakukan Transaksi!');
            return redirect('/');

        }

        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;
        
        return view("pelanggan.create",[
            'title' => 'Beli Obat',
            'obat' => Obat::all()
    ],compact('total_notif','kadaluwarsa','obat_habis'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'obat_id' => 'required',
            'harga_jual' => 'required',
            'total_beli' => 'required',
            'banyak' => 'required',
            'tanggal_jual' => 'required',
            'total' => 'required',
            'status' => 'required'
            ]);

        $validatedData['pelanggan_id'] = auth('pelanggan')->user()->id;

            $drug = Obat::findOrFail($request->obat_id);

            if ($drug->stok < $request->banyak) {
                return redirect()->back()->with('error', 'Maaf, Stok Obat tidak mencukupi!');

            } else {

                Penjualan::create($validatedData);
            
                $obat = Obat::findOrFail($request->obat_id);
                $obat->stok -= $request->banyak;
                $obat->save();
            }

            return redirect('/list-invoice')
            ->with('invoice','Pembelian Berhasil');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {
            // Jika auth admin, tampilkan pemberitahuan
            session()->flash('error', 'Anda adalah Admin tidak bisa melakukan transaksi disini!');
            return redirect('/');

        }  else if (!Auth::guard('pelanggan')->check()) {
            // Jika pengguna bukan pelanggan terautentikasi, tampilkan pemberitahuan
            session()->flash('error', 'Anda Harus Login Terlebih Dahulu Untuk Melakukan Transaksi!');
            return redirect('/');

        }

        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;
        $obat = Obat::findOrFail($id);
        
        try {
            return view("pelanggan.create",[
                'title' => 'Beli Obat',
                'obat' => $obat,
                'medicine' => Obat::all()
        ],compact('total_notif','kadaluwarsa','obat_habis'));
        } catch (ModelNotFoundException $exception) {
            return abort(404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }

    public function konfirmasi($id){
        
        $penjualan = Penjualan::findOrFail($id);
        return view('pelanggan.show',[
            'title' => 'Invoice Obat',
            'user' => $penjualan
        ]);
    }
}
