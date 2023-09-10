<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class SearchController extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('query');

    // Lakukan logika pencarian sesuai dengan kebutuhan Anda
    $obat = Obat::where('nama_obat', 'like', "%$query%")->paginate(6);

    return view('produk.index',[
        'title' => 'Produk'
    ], compact('obat'));
}
}
