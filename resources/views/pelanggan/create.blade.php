@extends('dashboard.layouts.login')

@section('container')

@if ($message = Session::get('error'))
<div style="margin-top:30px; margin-left:10px;" class="alert alert-danger alert-dismissible fade show col-lg-11" role="alert">
        {{ session('error') }}
      </div>
@endif

<div style="margin-top:20px; margin-left:20px;" class="pagetitle">
  <h1>Transaksi</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="card-body">
              <h5 class="card-title">{{ $title }}</h5>
              <div class="container">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
</div>
<div class="pull-right">
<a class="btn btn-danger" href="/produk" enctype="multipart/form-data"> Batal</a>
<!-- <button id="tambah-form" type="button" class="btn btn-success ms-2">Tambah Pesanan</button> -->
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form id="form-input" action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<input type="hidden" id="obat_id"  name="obat_id" value="{{ $obat->id }}">
<div class="row mt-3">
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Nama Obat</h6>
<input type="text" readonly data-stok="{{ $obat->stok }}" id="nama_obat" name="nama_obat" value="{{ old('nama_obat',$obat->nama_obat) }}" class="form-control" >
@error('nama_obat')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Stok</h6>
<input type="text" name="stok" id="stok" value="{{ old('stok', $obat->stok) }}"  class="form-control" readonly >
@error('stok')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Harga Jual</h6>
<input type="text" name="harga_jual" id="harga" value="{{ old('harga_jual',$obat->harga_jual) }}"  class="form-control" readonly >
@error('harga_jual')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<input type="hidden" id="beli" name="harga_beli" value="{{ old('harga_beli',$obat->harga_beli) }}">
<input type="hidden" id="total_beli" name="total_beli" value="{{old('total_beli')}}">
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Unit</h6>
<input type="text" name="unit_id" value="{{ old('unit_id',$obat->unit->unit) }}" class="form-control" readonly >
@error('unit_id')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Banyak</h6>
<input type="number" id="banyak" name="banyak" value="{{ old('banyak') }}" class="form-control" >
@error('banyak')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Tanggal Beli</h6>
<input type="date" name="tanggal_jual" value="{{ old('tanggal_jual') }}" class="form-control" >
@error('tanggal_jual')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Total (Rp)</h6>
<input type="text" id="total" name="total" value="{{ old('total') }}" class="form-control" readonly>
@error('total')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="row col-8">
  <input type="hidden" name="status" value="Pending">

  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <button  type="submit" class="btn btn-primary col-6 me-1">Submit</button>
    </div>
  </div>
</form>
</div>
    
            </div>

          </div>
        </div><!-- End Recent Sales -->

      </div>
    </div><!-- End columns -->

  </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">

  $('#banyak').on('change',function(){
    const harga = $('#harga').val();
    const banyak = $('#banyak').val();
    const beli = $('#beli').val();

    const total4 = banyak * harga;
    const total5 = banyak * beli;

    $('#total').val(`${total4}`);
    $('#total_beli').val(`${total5}`);
  })
  

</script>


@endsection