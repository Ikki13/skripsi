<?php

use Carbon\Carbon;
use App\Models\Obat;
use App\Models\Unit;
use App\Models\Order;
use App\Models\Pemasok;
use App\Models\Category;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\DetailController;

//Buat Dashboard
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DeleteChartController;
use App\Http\Controllers\ListInvoiceController;
use App\Http\Controllers\DataPelangganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//LandingPage
Route::get('/',function(){

    $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
    $total_kadaluwarsa = $kadaluwarsa->count();
    $obat_habis = Obat::where('stok', '<=', 0)->get();
    $total_obat_habis = $obat_habis->count();
    $total_notif = $total_kadaluwarsa + $total_obat_habis;


    $obat = Obat::latest()->paginate(3);
    $semuaobat = Obat::latest()->paginate(5);
    return view('home',[
        'title' => 'Home',
        'obat' => $obat,
        'semuaobat' => $semuaobat,
        'penjualan' => Penjualan::latest()->paginate(1)
    ],compact('total_notif','obat_habis','total_kadaluwarsa','kadaluwarsa'));
})->name('home');

//login
Route::post('/authenticate', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);
Route::get('/logout', [LoginController::class,'logout']);

Route::get('/dashboard',function(){
    $kadaluwarsa = Pembelian::whereDate('kadaluwarsa','<=',Carbon::now())->get();
    $total_kadaluwarsa = $kadaluwarsa->count();
    $obat_habis = Obat::where('stok', '<=', 0)->get();
    $total_obat_habis = $obat_habis->count();
    $total_notif = $total_kadaluwarsa + $total_obat_habis;
    $title = 'Apotek';
    $penjualan = Penjualan::all();
    $total_pelanggan = $penjualan->count('nama_pembeli');
    $total_obat = Obat::all();
    $total_obats = $total_obat->sum('stok');
    $unit = Unit::all();
    $total_unit = $unit->count();
    $pemasok = Pemasok::all();
    $total_pemasok = $pemasok->count();
    $pembelian = Pembelian::all();
    $total_pembelian = $pembelian->sum('total');
    $total_penjualan = $penjualan->sum('total');
    $order = Order::all();
    $laba = $penjualan->sum('total_beli');
    $laba_online = $order->sum('total_beli');
    $laba_beli = $laba + $laba_online;
    $total_beli_pelanggan = $order->sum('total_price');
    $penjualan_total = $total_penjualan + $total_beli_pelanggan;
    $total_pendapatan = $total_penjualan - $total_pembelian;
    $laba = $penjualan_total - $laba_beli;

    return view('dashboard.index',compact('kadaluwarsa','title','total_penjualan','total_obats','total_obat','total_unit','total_pemasok','total_pembelian','total_pelanggan','total_pendapatan','total_kadaluwarsa','obat_habis','total_notif','laba','penjualan_total'));
})->middleware('auth');

//Obat
Route::get('/dashboard/obat/kadaluwarsa',[ObatController::class,'kadaluwarsa'])->name('kadaluwarsa')->middleware('auth');
Route::get('/dashboard/obat/habis',[ObatController::class,'habis'])->name('habis')->middleware('auth');
Route::post('/dashboard/obat/kadaluwarsa',[ObatController::class,'hapus'])->name('habis')->middleware('auth');
Route::resource('/dashboard/obat',ObatController::class)->middleware('auth');

//Unit
Route::resource('/dashboard/unit',UnitController::class)->middleware('auth');

//Pemasok
Route::resource('/dashboard/pemasok',PemasokController::class)->middleware('auth');

//Penjualan
Route::resource('/dashboard/penjualan',PenjualanController::class)->middleware('auth');
Route::get('/dashboard/penjualan-pelanggan',[PenjualanController::class,'pelanggan'])->middleware('auth')->name('pelanggan');
Route::put('/dashboard/penjualan-pelanggan/{id}',[PenjualanController::class,'pelangganupdate'])->middleware('auth')->name('penjualan-pelanggan');
Route::delete('/dashboard/penjualan-pelanggan/{id}',[PenjualanController::class,'destroypelanggan'])->middleware('auth')->name('delete-pelanggan');

//Pembelian
Route::resource('/dashboard/pembelian',PembelianController::class)->middleware('auth');
Route::post('/dashboard/obat/{id}/kadaluwarsa',[PembelianController::class,'updateKadaluwarsa'])->name('update-kadaluwarsa')->middleware('auth');
//User
Route::resource('/dashboard/user',UserController::class)->middleware('auth');

//Laporan
Route::get('/dashboard/laporan',[LaporanController::class,'index'])->name('reports')->middleware('auth');
Route::post('/dashboard/laporan',[LaporanController::class,'getData'])->middleware('auth');

//Pelanggan
Route::resource('/pelanggan',PelangganController::class);
Route::get('/pelanggan/invoice/{id}',[PelangganController::class,'konfirmasi'])->middleware('auth:pelanggan');

//Register
Route::get('/register', [RegisterController::class,'index'])->middleware('guest:pelanggan');
Route::post('/register', [RegisterController::class,'store']);

//List Invoice
Route::get('/list-invoice', [ListInvoiceController::class,'index'])->middleware('auth:pelanggan');
Route::get('/list-invoice/detail/{id}', [ListInvoiceController::class,'detail'])->middleware('auth:pelanggan');

//List Obat
Route::get('/list-obat', [ListInvoiceController::class,'obat'])->middleware('auth:pelanggan');

//DataPelanggan
Route::get('/dashboard/pelanggan',[DataPelangganController::class,'index'])->middleware('auth');

//DataPelanggan
Route::get('/kontak',[KontakController::class,'index']);
Route::post('/kontak',[KontakController::class,'store']);

//Chart
Route::resource('/keranjang',ChartController::class);
Route::post('/keranjang/{id}',[ChartController::class,'addToCart']);

//Produk
Route::resource('/produk',ProdukController::class);

//About
Route::get('/tentang',function(){
    return view('about',[
        'title' => 'Tentang'
    ]);
});

//Search
Route::get('/search', [SearchController::class,'search'])->name('search');

//Saran
Route::get('/dashboard/saran', [SaranController::class,'index']);

//Checkout
Route::get('/checkout',[CheckoutController::class,'index'])->middleware('auth:pelanggan');
Route::post('/checkout',[CheckoutController::class,'checkout'])->middleware('auth:pelanggan')->name('checkout');




