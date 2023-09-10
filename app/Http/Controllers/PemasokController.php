<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use App\Models\Pembelian;
use App\Models\Obat;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pemasok = Pemasok::latest()->get();
        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;

            return view('dashboard.pemasok.index',[
                'title' => 'Pemasok'
            ],compact('pemasok','total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));
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

        return view('dashboard.pemasok.create',[
            'title' => 'Tambah Pemasok'
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
            'nama_pemasok' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            ]);

            Pemasok::create($validatedData);
            return redirect()->route('pemasok.index')
            ->with('success','Pemasok Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasok $pemasok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemasok $pemasok)
    {

        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;

        return view('dashboard.pemasok.edit',[
            'title' => 'Edit Pemasok',
            'pemasok' => $pemasok
        ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemasok $pemasok)
    {
        $validateData = $request->validate([
            'nama_pemasok' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            ]);

            Pemasok::where('id',$pemasok->id)
            ->update($validateData);

            return redirect()->route('pemasok.index')
            ->with('success','Pemasok Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemasok $pemasok)
    {
        Pemasok::destroy($pemasok->id);

        return redirect()->route('pemasok.index')
        ->with('success','Pemasok Berhasil Dihapus');
    }
}
