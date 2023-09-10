<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Obat;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unit::all();
        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;

            return view('dashboard.unit.index',[
                'title' => 'Unit'
            ],compact('unit','total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));
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

        return view('dashboard.unit.create',[
            'title' => 'Tambah Unit'
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
            'unit' => 'required',
            ]);

            Unit::create($validatedData);
            return redirect()->route('unit.index')
            ->with('success','Unit Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {

        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;

        return view('dashboard.unit.edit',[
            'title' => 'Edit Unit',
            'unit' => $unit
        ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $validateData = $request->validate([
            'unit' => 'required',
            ]);

            Unit::where('id',$unit->id)
            ->update($validateData);

            return redirect()->route('unit.index')
            ->with('success','Unit Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        Unit::destroy($unit->id);

        return redirect()->route('unit.index')
        ->with('success','Unit Berhasil Dihapus');
    }
}
