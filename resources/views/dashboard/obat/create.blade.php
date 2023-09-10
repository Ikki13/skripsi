@extends('dashboard.layouts.main')

@section('container')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Obat</h1>
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
<a class="btn btn-danger" href="{{ route('obat.index') }}" enctype="multipart/form-data"> Batal</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('obat.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row mt-3">
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Nama Obat</h6>
<input type="text" name="nama_obat" value="{{ old('nama_obat') }}" class="form-control" >
@error('nama_obat')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Gambar Obat</h6>
<input type="file" name="gambar" value="{{ old('gambar') }}" class="form-control" >
@error('gambar')
<div  class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Deskripsi Obat</h6>
<input type="text" name="deskripsi_obat" value="{{ old('deskripsi_obat') }}" class="form-control" >
@error('deskripsi_obat')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Harga Beli</h6>
<input type="number" name="harga_beli"  class="form-control"  value="{{ old('harga_beli') }}">
@error('harga_beli')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Harga Jual</h6>
<input type="number" name="harga_jual"  class="form-control"  value="{{ old('harga_jual') }}">
@error('harga_jual')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Unit</h6>
<select class="form-select" name="unit_id">
        @foreach ($units as $unit)

        @if(old('unit_id') == $unit->id)
          <option value="{{ $unit->id }} " selected> {{ $unit->unit }} </option>
        @else
          <option value="{{ $unit->id }}"> {{ $unit->unit }} </option>
        @endif

        @endforeach
</select>
</div>
</div>
<div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<button style="margin-left:-15px;"  type="submit" class="btn btn-primary col-6 me-1">Submit</button>
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

@endsection