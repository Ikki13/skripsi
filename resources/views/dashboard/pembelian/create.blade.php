@extends('dashboard.layouts.main')

@section('container')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Pembelian Obat</h1>
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
<a class="btn btn-danger" href="{{ route('pembelian.index') }}" enctype="multipart/form-data"> Batal</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form id="form-pembelian" action="{{ route('pembelian.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row mt-3">
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Nama Pemasok</h6>
<select class="form-select" name="pemasok_id">
        @foreach ($pemasoks as $pemasok)

        @if(old('pemasok_id') == $pemasok->id)
          <option value="{{ $pemasok->id }} " selected> {{ $pemasok->nama_pemasok }} </option>
        @else
          <option value="{{ $pemasok->id }}"> {{ $pemasok->nama_pemasok }} </option>
        @endif

        @endforeach
</select>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Obat Yang di Pilih</h6>
<select class="form-select" name="obat_id" id="obat_id">
        <option selected value="0"></option>
        @foreach ($obat as $obats)
        @if(old('obat_id') == $obats->id)
          <option selected data-price="{{ $obats->harga_beli }}" data-unit="{{ $obats->unit->unit }}" data-stok="{{ $obats->stok }}" value="{{ $obats->id }} " > {{ $obats->nama_obat }} </option>
        @else
        <option  data-price="{{ $obats->harga_beli }}" data-unit="{{ $obats->unit->unit }}" data-stok="{{ $obats->stok }}" value="{{ $obats->id }} " > {{ $obats->nama_obat }} </option>
        @endif
        @endforeach
</select>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Stok</h6>
<input type="text" name="stok" id="stok" value="{{ old('stok') }}" class="form-control" readonly >
@error('stok')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Harga Beli</h6>
<input type="text" name="harga_beli" id="harga" value="{{ old('harga_beli') }}"  class="form-control" readonly >
@error('harga_beli')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Unit</h6>
<input type="text" name="unit_id" value=" {{ old('unit_id') }} " class="form-control" readonly >
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
<h6>Kadaluwarsa</h6>
<input type="date" name="kadaluwarsa" value="{{ old('kadaluwarsa') }}" class="form-control" >
@error('kadaluwarsa')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Tanggal Beli</h6>
<input type="date" name="tanggal_beli" value="{{ old('tanggal_beli') }}" class="form-control" >
@error('tanggal_beli')
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
<div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<button id="submit" style="margin-left:-15px;"  type="submit" class="btn btn-primary col-6">Submit</button>
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

</main><!-- End #main -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
        $('#obat_id').on('change', function(){
  // ambil data dari elemen option yang dipilih
  const price = $('#obat_id option:selected').data('price');
  const unit = $('#obat_id option:selected').data('unit');
  const stok = $('#obat_id option:selected').data('stok');
  const banyak = $('#banyak').val();
  
  // kalkulasi total harga
  const total = price;
  const total2 = unit;
  const total3 = stok;
  
  // tampilkan data ke element
  $('[name=stok]').val(`${total3}`);
  $('[name=unit_id]').val(`${total2}`);
  
  $('#harga').val(`${total}`);
});

  $('#banyak').on('change',function(){
    const price = $('#obat_id option:selected').data('price');
    const banyak = $('#banyak').val();
    
    const total4 = banyak * price;

    $('#total').val(`${total4}`);
  });

</script>


@endsection