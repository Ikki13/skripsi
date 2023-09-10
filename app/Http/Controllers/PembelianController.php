<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Pemasok;
use App\Models\Obat;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Carbon\Carbon;


class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $pembelian = Pembelian::latest()->get();
        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;

            return view('dashboard.pembelian.index',[
                'title' => 'Pembelian'
            ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif','pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;

        return view('dashboard.pembelian.create',[
            'title' => 'Tambah Pembelian',
            'pemasoks' => Pemasok::all(),
            'obat' => Obat::all()
        ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));
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
            'harga_beli' => 'required',
            'banyak' => 'required',
            'pemasok_id' => 'required',
            'kadaluwarsa' => '',
            'tanggal_beli' => 'required',
            'total' => 'required'
            ]);

            Pembelian::create($validatedData);
            
            $obat = Obat::find($request->obat_id);
            $obat->stok += $request->banyak;
            $obat->save();

        return redirect()->route('pembelian.index')
        ->with('success','Produk Berhasil Ditambahkan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $title = "Invoice Pembelian";
        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;
        $pembelian = Pembelian::findOrFail($id);
        return view('dashboard.pembelian.show',[
            'pembelian' => $pembelian
        ],compact('title','total_notif','kadaluwarsa','obat_habis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;
        
    return view('dashboard.pembelian.edit',[
            'title' => 'Edit Pembelian',
            'pembelian' => $pembelian,
            'pemasoks' => Pemasok::all(),
            'obat' => Obat::all()
        ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $pembelian)
    {

            $obat = Obat::find($request->obat_id);
            $obat->stok -= $request->banyak;
            $obat->save(); 

            $kadaluwarsa = DB::table('pembelians')->where('id', $pembelian)->first();
            DB::table('pembelians')->where('id', $pembelian)->update(['kadaluwarsa' => null]);

            return redirect()->route('pembelian.index')
            ->with('success','Produk Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Pembelian $pembelian)
    {
        
        $data_pembelian = Pembelian::select('id','obat_id','banyak')->get();

        foreach ($data_pembelian as $pembelians) 
            $details = Pembelian::where('id', $pembelians->id)->get();
            foreach ($details as $detail) {

                if($detail->kadaluwarsa == null){
                    $produk = Obat::findOrFail($detail->obat_id);
                    $produk->stok == $detail->banyak;
                    $produk->save();
                } else {
                $produk = Obat::findOrFail($detail->obat_id);
                $produk->stok -= $detail->banyak;
                $produk->save();
                }
            } 

        Pembelian::destroy($pembelian->id);

        return redirect()->route('pembelian.index')
->with('success','Produk Berhasil Dihapus');
    }

    public function updateKadaluwarsa($pembelian)
    {

        $kadaluwarsa = DB::table('pembelians')->where('id', $pembelian)->first();
        DB::table('pembelians')->where('id', $pembelian)->update(['kadaluwarsa' => null]);

        $data_pembelian = Pembelian::select('id','obat_id','banyak')->get();

        foreach ($data_pembelian as $pembelian) 
            $details = Pembelian::where('id', $pembelian->id)->get();
            foreach ($details as $detail) {
                $produk = Obat::find($detail->obat_id);
                $produk->stok -= $detail->banyak;
                $produk->save();
            }
        

        return redirect('/dashboard/obat/kadaluwarsa')->with('success', 'Kadaluwarsa Obat berhasil diubah');
    }

}
