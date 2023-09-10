@extends('dashboard.layouts.login')

@section('container')
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Produk</strong></div>
        </div>
      </div>
    </div>

        @if ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
        {{ session('error') }}
        </div>
        @endif

        <div class="site-section">
      <div class="container">
        <form action="{{ route('search') }}" method="GET">
        <div class="row">
          <div class="form-group mx-sm-3 mb-2 mx-3">
            <input type="text" class="form-control" name="query" placeholder="Cari...">
          </div>
          <button type="submit" class="btn btn-primary mb-2">Cari</button>
        </div>
        </form>

@if($obat->count())
        <div class="row">
        @foreach($obat as $data)
          <div class="col-sm-6 col-lg-4 text-center item mt-4 mb-4">
            <a href="{{ route('produk.show',$data) }}">
            @if($data->gambar == null) 
              <h1 style="color:black;"  class=" img-fluid p-2">Tidak Ada Gambar</h1>
            @else
            <img src="{{ asset('storage/' . $data->gambar) }}" width="150" alt="Image">
            @endif
            </a>
            <h3 class="text-dark"><a href="{{ route('produk.show',$data) }}">{{ $data->nama_obat }}</a></h3>
            <p class="price">Rp. {{ number_format($data->harga_jual,0,',','.') }}</p>
          </div>
          @endforeach
        </div>
  @else
   <p class="mt-5">No Post Found</p>
  @endif
        <div class="row mt-5 mx-auto">
          <div class="col-md-12 text-center">
              <ul class="justify-content-center">
                {{ $obat->links() }}
              </ul>
          </div>
        </div>
      </div>
    </div>
@endsection