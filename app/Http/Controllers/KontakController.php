<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class KontakController extends Controller
{
    public function index(){
        return view('contact',[
            'title' => 'Kontak'
        ]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
            ]);

            Pesan::create($validatedData);

        return redirect('kontak')
        ->with('success','Berhasil Mengirim Pesan!'); 
    }
}
