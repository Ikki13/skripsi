@extends('dashboard.layouts.login')

@section('container')

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="/">Home</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black">Keranjang</strong>
            </div>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif


<div class="site-section">
    <div class="container">

        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    @if($chart->count())
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Gambar</th>
                                <th class="product-name">Nama Obat</th>
                                <th class="product-price">Harga</th>
                                <th class="product-quantity">Jumlah</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chart as $data)
                            <tr>
                                <td class="product-thumbnail">
                                    @if($data->obat->gambar == null)
                                    <h1 style="color:black;" class=" img-fluid">Tidak Ada Gambar</h1>
                                    @else
                                    <img src="{{ asset('storage/' . $data->obat->gambar) }}" width="150" alt="Image">
                                    @endif
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black">{{ $data->obat->nama_obat }}</h2>
                                </td>
                                <td id="harga" class="price" value="{{ $data->obat->harga_jual }}"> Rp.
                                    {{ number_format($data->obat->harga_jual,0,',','.') }}</td>
                                <td>
                                    <div class="input-group mb-3" style="max-width: 120px;">
                                        <input name="banyak" id="banyak" type="number" value="{{$data->jumlah }}"
                                            class="form-control text-center banyak" placeholder=""
                                            aria-label="Example text with button addon" aria-describedby="button-addon1"
                                            disabled>
                                    </div>
                                </td>
                                <input type="hidden" class="beli" name="harga_beli"
                                    value="{{ old('harga_beli',$data->obat->harga_jual) }}">
                                </form>
                                <td>
                                    <form action="{{ route('keranjang.destroy', $data->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <input type="hidden" id="jumlahhidden" name="jumlahhidden"
                                            value="{{ $data->jumlah }}">
                                        <input type="hidden" id="obat_id" name="obat_id" value="{{ $data->obat->id }}">
                                        <button type="submit" class="btn btn-primary height-auto btn-sm">X</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    {{-- <div class="col-md-6">
            <button id="update-cart-btn" class="btn btn-outline-success btn-md btn-block">Update Cart</button>
            </div> --}}
                    <div class="col-md-6">
                        <a href="/produk" class="btn btn-outline-primary btn-md btn-block">Lanjutkan Belanja</a>
                    </div>
                </div>
                <div class="row">
                </div>
            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <button class="btn btn-primary btn-lg btn-block"
                                onclick="window.location='/checkout'">Checkout</button>
                            @else
                            <h1>Anda Belum Menambahkan Data.</h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- <div class="site-section bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="text-white mb-4">Kantor</h2>
          </div>
          <div class="col-lg-4">
            <div class="p-4 bg-white mb-3 rounded">
              <span class="d-block text-black h6 text-uppercase">New York</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="p-4 bg-white mb-3 rounded">
              <span class="d-block text-black h6 text-uppercase">London</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="p-4 bg-white mb-3 rounded">
              <span class="d-block text-black h6 text-uppercase">Canada</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>
          </div>
        </div>
      </div>
      
    </div> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $('.banyak').on('change', function () {
        const harga = $('.harga').val();
        const banyak = $('.banyak').val();
        const beli = $('.beli').val();

        const total4 = banyak * harga;
        const total5 = banyak * beli;

        $('.total').val(`${total4}`);
        $('.total_beli').val(`${total5}`);
    })
</script>




@endsection
