<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon"  href="/assets/img/medical-remove.png">
    <title>Apotek | {{ $title }}</title>
</head>
<body >

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">
      
      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <main  class="form-signin">
      <img class="mt-2 mb-2 mx-auto d-block" src="/assets/img/medical-remove.png" alt="" width="100">
      <h1 class="h5 mb-3 fw-normal text-center ">Registrasi</h1>
      <form action="/register" method="post">
        @csrf
        <div class="form-floating mt-4">
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="nama" autofocus required value="{{ old('name') }}">
          <label for="name">Nama</label>
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email"  required value="{{ old('email') }}">
          <label for="email">Email</label>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="alamat"  required value="{{ old('address') }}">
          <label for="address">Alamat</label>
          @error('address')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="number" name="number" class="form-control @error('number') is-invalid @enderror" id="number" placeholder="Nomor Telepon"  required value="{{ old('number') }}">
          <label for="number">Nomor Telepon</label>
          @error('number')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>

        <button style="background-color:#219ebc; border:none;" class="w-100 btn btn-lg btn-primary" type="submit">Daftar</button>
      </form>
      <small style="margin-bottom:62px; margin-top:10px;" class="d-block text-center">Anda sudah Daftar? <a style="color:#219ebc;" href="/">Silahkan Login</a></small>
    </main>
  </div>
</div>
</div>
</body>
</html>