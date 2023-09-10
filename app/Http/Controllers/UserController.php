<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Obat;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = User::get();
        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;

            return view('dashboard.user.index',[
                'title' => 'User'
            ],compact('user','total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));
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

        return view('dashboard.user.create',[
            'title' => 'Tambah Pengelola'
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'is_admin' => 'required'
            ]);

            $validatedData['password'] = Hash::make($validatedData['password']);

            User::create($validatedData);
            return redirect()->route('user.index')
            ->with('success','Akun Pengguna Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
        $total_kadaluwarsa = $kadaluwarsa->count();
        $total_obat = Obat::all();
        $obat_habis = Obat::where('stok', '<=', 0)->get();
        $total_obat_habis = $obat_habis->count();
        $total_notif = $total_kadaluwarsa + $total_obat_habis;

        return view('dashboard.user.edit',[
            'title' => 'Edit Pengelola',
            'user' => $user
        ],compact('total_kadaluwarsa','total_obat','kadaluwarsa','obat_habis','total_notif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => '',
            'is_admin' => 'required'
            ]);

            $validateData['password'] = Hash::make($validateData['password']);

            User::where('id',$user->id)
            ->update($validateData);

            return redirect()->route('user.index')
            ->with('success','Akun Pengguna Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect()->route('user.index')
        ->with('success','Akun Pengguna Berhasil Dihapus');
    }
}
