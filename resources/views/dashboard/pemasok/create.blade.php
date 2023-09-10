@extends('dashboard.layouts.main')

@section('container')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Pemasok</h1>
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
<a class="btn btn-danger" href="{{ route('pemasok.index') }}" enctype="multipart/form-data"> Batal</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('pemasok.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row mt-3">
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Nama Pemasok</h6>
<input type="text" name="nama_pemasok" value="{{ old('nama_pemasok') }}" class="form-control" >
@error('nama_pemasok')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Alamat</h6>
<input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control" >
@error('alamat')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Telepon</h6>
<input type="text" name="telepon" value="{{ old('telepon') }}" class="form-control" >
@error('telepon')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
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

@endsection