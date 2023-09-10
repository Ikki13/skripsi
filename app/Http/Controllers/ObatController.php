<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pembelian;
use App\Models\Unit;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;

            return view('dashboard.obat.index',[
                'title' => 'Obat'
            ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));

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

        return view('dashboard.obat.create',[
            'title' => 'Tambah Obat',
            'units' => Unit::all()
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
            'nama_obat' => 'required',
            'harga_jual' => 'required',
            'deskripsi_obat' => 'required',
            'harga_beli' => 'required',
            'unit_id' => 'required',
            'gambar' => 'image|file|max:1024'
            ]);

            if($request->gambar) {
            $file = $request->gambar->getClientOriginalName();
            $image = $request->gambar->storeAs('post-images', $file);
            $validatedData['gambar'] = $image;
        }

            Obat::create($validatedData);
            return redirect()->route('obat.index')
            ->with('success','Obat Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit(Obat $obat)
    {
        $this->authorize('admin');

        $kadaluwarsa = Obat::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;
        
        return view('dashboard.obat.edit',[
            'title' => 'Edit Obat',
            'obat' => $obat,
            'units' => Unit::all()
        ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));
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
        $validateData = $request->validate([
            'nama_obat' => 'required',
            'harga_jual' => 'required',
            'deskripsi_obat' => 'required',
            'harga_beli' => 'required',
            'unit_id' => 'required',
            'gambar' => 'image|file|max:1024'
            ]);

        if($request->file('gambar')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $file = $request->gambar->getClientOriginalName();
            $validateData['gambar'] = $request->file('gambar')->storeAs('post-images',$file);
        }

            
            Obat::where('id',$obat->id)
            ->update($validateData);


            return redirect()->route('obat.index')
            ->with('success','Obat Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        if($obat->gambar){
            Storage::delete($obat->gambar);
        }

        Obat::destroy($obat->id);

        return redirect()->route('obat.index')
        ->with('success','Obat Berhasil Dihapus');
    }

    public function hapus(Pembelian $pembelian)
    {
        Pembelian::destroy($pembelian->id);

        return redirect()->route('obat.index')
        ->with('success','Obat Berhasil Dihapus');
    }

    public function kadaluwarsa(){
        
        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;

        return view('dashboard.obat.kadaluwarsa.index',[
            'title' => 'Kadaluwarsa'
        ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));
    }

    public function habis(){

        $total_obat = Obat::all();
        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;

        return view('dashboard.obat.habis.index',[
            'title' => 'Habis'
        ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));
    }

}
