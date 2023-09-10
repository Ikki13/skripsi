@extends('dashboard.layouts.login')

@section('container')

        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
        {{ session('success') }}
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
        {{ session('error') }}
        </div>
        @endif
        
        @if ($message = Session::get('loginError'))
        <div class="alert alert-danger" role="alert">
        {{ session('loginError') }}
        </div>
        @endif

    <div class="site-blocks-cover" style="background-image: url('/asset/images/hero_1.jpg');">
        <div class="container">
            <div class="row">
            <div class="col-lg-8 mx-auto order-lg-2 align-self-center">
                <div class="site-block-cover-content text-center">
                <h2 class="sub-title"></h2>
                <h1>Selamat Datang Apotek Melati</h1>
                <p>
                    <a href="/produk" class="btn btn-primary px-5 py-3 rounded-20">Beli Sekarang!</a>
                </p>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row align-items-stretch section-overlap">
          <div class="col-md-6 col-lg-4 mb-4  mb-lg-0">
            <div class="banner-wrap bg-primary h-100">
              <a href="https://wa.me/+6287803577666" class="h-100 pt-4">
              <h5 class="pt-4"style=""><strong>KLIK DISINI</h5>
                <p>
                  Untuk Mengobrol Secara <br> Langsung Dengan Apoteker
                </p></strong>
              </a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap h-100">
              <a href="/register" class="h-100 pt-4">
                <h5 class="pt-4"><strong>KLIK DISINI</h5>
                <p>
                  Untuk Daftarkan Diri Anda dan Lakukan Pembelian
                </p></strong>
              </a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="banner-wrap bg-warning h-100">
              <a href="/kontak" class="h-100 pt-4">
                <h5 class="pt-4"><strong>KLIK DISINI</h5>
                <p>
                  Untuk Memberi Masukan <br> pada Kotak Saran
                </p></strong>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Produk</h2>
          </div>
        </div>

        <div class="row">
            @foreach($obat as $data)
          <div class="col-sm-6 col-lg-4 text-center item mb-4">
            @if($data->gambar == null)
            <h1 style="color:black;" class=" img-fluid p-5">Tidak Ada Gambar</h1>
            @else 
            <img src="{{ asset('storage/' . $data->gambar) }}" width="150" alt="Image">
            @endif
            <h3 class="text-dark"><a href="shop-single.html">{{ $data->nama_obat }}</a></h3>
            <p class="price">Rp. {{ number_format($data->harga_jual,0,',','.') }}</p>
          </div>
            @endforeach

        </div>
        <div class="row mt-5">
          <div class="col-12 text-center">
            <a href="/produk" class="btn btn-primary px-4 py-3">Lihat Semua Produk</a>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Produk Baru!</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 owl-carousel">

              @foreach($semuaobat as $data)
              <div class="text-center item mb-4">
                <a href="produk/{{ $data->id }}"> 
                 @if($data->gambar == null)
                <h1 style="color:black;" class=" img-fluid p-5">Tidak Ada Gambar</h1>
                @else 
                <img src="{{ asset('storage/' . $data->gambar) }}" width="150"alt="Image">
                @endif
                </a>
                <h3 class="text-dark"><a href="produk/{{ $data->id }}">{{ $data->nama_obat }}</a></h3>
                <p class="price">Rp. {{ number_format($data->harga_jual,0,',','.') }}</p>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Testimoni</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 no-direction owl-carousel">
        
              <div class="testimony">
                <blockquote>
                  <img src="/asset/images/person_1.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat unde.&rdquo;</p>
                </blockquote>

                <p>&mdash; Kelly Holmes</p>
              </div>
        
              <div class="testimony">
                <blockquote>
                  <img src="/asset/images/person_2.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                    obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                    unde.&rdquo;</p>
                </blockquote>
              
                <p>&mdash; Rebecca Morando</p>
              </div>
        
              <div class="testimony">
                <blockquote>
                  <img src="/asset/images/person_3.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                    obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                    unde.&rdquo;</p>
                </blockquote>
              
                <p>&mdash; Lucas Gallone</p>
              </div>
        
              <div class="testimony">
                <blockquote>
                  <img src="/asset/images/person_4.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                  <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                    obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                    unde.&rdquo;</p>
                </blockquote>
              
                <p>&mdash; Andrew Neel</p>
              </div>
        
            </div>
          </div>
        </div>
      </div>
    </div> -->


@endsection
