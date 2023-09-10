@extends('dashboard.layouts.main')

@section('container')

<main id="main" class="main">

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show col-lg-12" role="alert">
        {{ session('success') }}
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

            <div class="card-body col-12">
              <h5 class="card-title">Daftar Penjualan Obat</h5>
              <a class="btn btn-success mb-3" href="{{ route('penjualan.create') }}"> Jual Obat</a>
              <table class="table table-bordered " id="datatable-noexport">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Pembeli</th>
                <th>Harga Jual</th>
                <th>Banyak</th>
                <th>Status</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
        @foreach ($penjualan as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->name }} </td>
            <td>{{ number_format($data->total_price,0,',','.') }} </td>
            <td>{{ $data->banyak }} </td>
            @if($data->status == 'Sudah Bayar')
            <td><button type="button" data-bs-toggle="modal" data-bs-target="#status{{ $data->id }}"  class=" btn btn-success"><span>{{ $data->status }}</span></button></td>
            @elseif($data->status == 'Pending')
            <td><button type="button" data-bs-toggle="modal" data-bs-target="#status{{ $data->id }}"  class=" btn btn-warning"><span>{{ $data->status }}</span></button></td>
            @else
            <td><button type="button" data-bs-toggle="modal" data-bs-target="#status{{ $data->id }}"  class=" btn btn-danger"><span>{{ $data->status }}</span></button></td>
            @endif
            <td>
                      <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}" class="delete btn btn-danger" ><span data-feather="x-circle"></span></button>
										</div>
            </td>
          </tr>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Menghapus Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <img style="margin-left:180px; margin-bottom:20px;" width="100" src="/img/danger.png" alt="">
                  <p class="text-center">Apakah Anda Yakin Ingin Menghapus? <br> Proses Ini Tidak Bisa Dibatalkan!</p> 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  <form action="{{ route('delete-pelanggan',$data) }}" method="post" class="d-inline">
                              @method('delete')
                              @csrf
                              @foreach($orderitem as $data)
                              <input type="hidden" id="jumlahhidden"  name="jumlahhidden" value="{{ $data->order->banyak}}">
                              <input type="hidden" name="obat_id" value="{{ $data->obat_id}}">
                              @endforeach
                              <button class="delete btn btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
            </div>
          </div>



          <!-- Modal Status -->
          <div class="modal fade" id="status{{ $data->id }}" tabindex="-1" aria-labelledby="statusmodal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="statusmodal">Status Pembayaran</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/dashboard/penjualan-pelanggan/ {{ $data->id }}" method="post" class="d-inline">
                @method('put')
                @csrf
                <div class="modal-body">
                  <select class="form-select" name="status" id="status">
                  <option value="Pending">Pending</option>
                  <option value="Sudah Bayar">Sudah Bayar</option>
                  <option value="Belum Bayar">Belum Bayar</option>
                  </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                              <button class="delete btn btn-success">Simpan</button>
                            </div>
                          </div>
                </form>
            </div>
          </div>
          @endforeach 
        </tbody>
    </table>

            </div>

          </div>
        </div><!-- End Recent Sales -->

      </div>
    </div><!-- End columns -->

  </div>
</section>

</main><!-- End #main -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script>
    feather.replace();
</script>

<script type="text/javascript" id="javascript">

</script>

@endsection