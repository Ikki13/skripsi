@extends('dashboard.layouts.main')

@section('container')

<main id="main" class="main">

@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif

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
              <h5 class="card-title">Daftar Obat Habis</h5>
              <table class="table table-bordered" id="datatable-noexport">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Stok</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Unit</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($obat_habis as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->nama_obat}}</td>
            <td>{{ $data->stok }}</td>
            <td>{{ $data->formatRupiah('harga_jual') }}</td>
            <td>{{ $data->formatRupiah('harga_beli') }}</td>
            <td>{{ $data->unit->unit }} </td>
          </tr>
          <!-- Modal -->
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

<script type="text/javascript" id="javascript">

</script>

@endsection