<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $obat = Obat::latest()->paginate(12);
          return view('produk.index',[
            'title' => 'Produk',
            'obat' => $obat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if (Auth::check()) {
            // Jika auth admin, tampilkan pemberitahuan
            session()->flash('error', 'Anda adalah Admin tidak bisa melakukan transaksi disini!');
            return redirect('/produk');

        }  else if (!Auth::guard('pelanggan')->check()) {
            // Jika pengguna bukan pelanggan terautentikasi, tampilkan pemberitahuan
            session()->flash('error', 'Anda Harus Login Terlebih Dahulu Untuk Melakukan Transaksi!');
            return redirect('/produk');

        }
        
        $obat = Obat::findOrFail($id);
        return view('produk.show',[
            'title' => 'Detail Produk',
            'obat' => $obat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit(Obat $obat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        //
    }
}
