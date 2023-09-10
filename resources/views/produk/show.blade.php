@extends('dashboard.layouts.login')

@section('container')
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <a
              href="/produk">Produk</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{ $obat->nama_obat }}</strong></div>
        </div>
        @if ($message = Session::get('error'))
        <div style="margin-top:30px; margin-left:10px;" class="alert alert-danger alert-dismissible fade show col-lg-11" role="alert">
                {{ session('error') }}
              </div>
        @endif
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-5 mr-auto">
            <div class="border text-center">
              <form action="/keranjang/{{ $obat->id }}" method="post">
                @csrf
                <input type="hidden" id="obat_id"  name="obat_id" value="{{ $obat->id }}">
                <input type="hidden" id="harga_beli"  name="harga_beli" value="{{ $obat->harga_beli }}">
                  @if($obat->gambar == null)
                      <h1 style="color:black;" class=" img-fluid p-5">Tidak Ada Gambar</h1>
                  @else
                  <img src="{{ asset('storage/' . $obat->gambar) }}" alt="Image" class="img-fluid p-5">
                  @endif
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="text-black">{{ $obat->nama_obat }}</h2>
            <p>{{ $obat->deskripsi_obat }}</p>
            

            <p><strong >Stok {{ $obat->stok }}</strong></p>
            <p><strong class="text-primary h4">Rp. {{ number_format($obat->harga_jual,0,',','.') }}</strong></p>
            <div class="input-group mb-3" style="max-width: 120px;">
              <input name="jumlah" id="jumlah"  type="number" value="{{ old('banyak') }}"  class="form-control text-center"  placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
            </div>
            @error('jumlah')
            <div class="alert alert-danger mt-1 mb-2 col-4">{{ $message }}</div>
            @enderror
            <!-- <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 220px;">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                </div>
                <input type="text" class="form-control text-center" value="1" placeholder=""
                  aria-label="Example text with button addon" aria-describedby="button-addon1">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                </div>
              </div>
    
            </div> -->
              <button type="submit" class="add-to-cart buy-now btn btn-sm height-auto px-4 py-3 btn-primary">
                  Add To Cart
                </button>
              </form>
          </div>
        </div>
      </div>
    </div>
@endsection