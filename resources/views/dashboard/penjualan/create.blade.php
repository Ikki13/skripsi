@extends('dashboard.layouts.main')

@section('container')

<main id="main" class="main">

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show col-lg-12" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif

<div class="pagetitle">
  <h1>Penjualan Obat</h1>
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
<a class="btn btn-danger" href="{{ route('penjualan.index') }}" enctype="multipart/form-data"> Batal</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('penjualan.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row mt-3">
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Obat Yang di Pilih</h6>
<select class="form-select" name="obat_id" id="obat_id">
          <option value="0"></option>
        @foreach ($obat as $obats)
        @if(old('obat_id') == $obats->id)
          <option selected value="{{ $obats->id }}"  data-price="{{ $obats->harga_jual }}" data-unit="{{ $obats->unit->unit }}" data-stok="{{ $obats->stok }}" data-beli="{{ $obats->harga_beli }}" > {{ $obats->nama_obat }} </option>
          @else
          <option value="{{ $obats->id }}"  data-price="{{ $obats->harga_jual }}" data-unit="{{ $obats->unit->unit }}" data-stok="{{ $obats->stok }}" data-beli="{{ $obats->harga_beli }}" > {{ $obats->nama_obat }} </option>
          @endif
        @endforeach
</select>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Stok</h6>
<input type="text" name="stok" id="stok" value="{{ old('stok') }}"  class="form-control" readonly >
@error('stok')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Harga Jual</h6>
<input type="text" name="harga_jual" id="harga" value="{{ old('harga_jual') }}"  class="form-control" readonly >
@error('harga_jual')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<input type="hidden" id="beli" name="harga_beli" value="{{ old('harga_beli') }}">
<input type="hidden" id="total_beli" name="total_beli" value="{{old('total_beli')}}">
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Unit</h6>
<input type="text" name="unit_id" value="{{ old('unit_id') }}" class="form-control" readonly >
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
<h6>Tanggal Jual</h6>
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
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Status</h6>
<select class="form-select" id="status" name="status">
                  <option value="Belum Bayar" selected>Belum Bayar</option>
                  <option value="Sudah Bayar">Sudah Bayar</option>
                  <option value="Pending">Pending</option>
</select>
</div>
</div>
<div>
  <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
      <button style="margin-left:-15px;" type="submit" class="btn btn-primary col-6 me-1">Submit</button>
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
  const beli = $('#obat_id option:selected').data('beli');
  const banyak = $('#banyak').val();
  
  // kalkulasi total harga
  const total = price;
  const total1 = beli;
  const total2 = unit;
  const total3 = stok;
  
  // tampilkan data ke element
  $('[name=stok]').val(`${total3}`);
  $('[name=unit_id]').val(`${total2}`);
  $('[name=harga_beli]').val(`${total1}`);

  $('#harga').val(`${total}`);
});

  $('#banyak').on('change',function(){
    const price = $('#obat_id option:selected').data('price');
    const beli = $('#obat_id option:selected').data('beli');
    const banyak = $('#banyak').val();

    const total4 = banyak * price;
    const total5 = banyak * beli;

    $('#total').val(`${total4}`);
    $('#total_beli').val(`${total5}`);
  })
</script>




@endsection