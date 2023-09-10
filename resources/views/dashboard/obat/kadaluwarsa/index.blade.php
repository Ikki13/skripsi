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
              <h5 class="card-title">Daftar Obat Kadaluwarsa</h5>
              <table class="table table-bordered" id="datatable-noexport">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Banyak</th>
                <th>Nama Pemasok</th>
                <th>Kadaluwarsa</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($kadaluwarsa as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->obat->nama_obat }} </td>
            <td>{{ $data->banyak }} </td>
            <td>{{ $data->pemasok->nama_pemasok }} </td>
            <td>{{ date_format(date_create($data->kadaluwarsa),"d M, Y") }} </td>
            <td>
              <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}" class="delete btn btn-danger" ><span data-feather="x-circle"></span></button>
            </td>
          </tr>
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
                  <form action="{{ route('update-kadaluwarsa', $data->id) }}" method="post" class="d-inline">
                              @csrf
                              <button class="delete btn btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
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


<script type="text/javascript" id="javascript">

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
        });
      }, 5000);


  feather.replace();


</script>

@endsection