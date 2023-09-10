@extends('dashboard.layouts.main')

@section('container')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Pengelola</h1>
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
<a class="btn btn-danger" href="{{ route('user.index') }}" enctype="multipart/form-data"> Batal</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row mt-3">
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Nama</h6>
<input type="text" name="name" value="{{ old('name',$user->name) }}" class="form-control" >
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Email</h6>
<input type="email" name="email" value="{{ old('email',$user->email) }}" class="form-control" >
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Password</h6>
<input type="password" name="password" value="" class="form-control" >
@error('password')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">
<h6>Role</h6>
<select class="form-select" name="is_admin">
    @if(old('is_admin',$user->is_admin) == $user->is_admin)
          @if(old('is_admin',$user->is_admin) == 1 )
          <option selected value="{{ $user->is_admin }}"> Admin </option>
          @else
          <option selected value="{{ $user->is_admin }}"> Kasir </option>
          @endif
          <option value="1" >Admin</option>
          <option value="0">Kasir</option>
    @endif
</select>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="form-group">

<button  type="submit" class="btn btn-primary col-6 me-1">Submit</button>
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