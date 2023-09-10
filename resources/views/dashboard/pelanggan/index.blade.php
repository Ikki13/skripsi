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
  <h1>Pelanggan</h1>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="card-body ">
              <h5 class="card-title">Daftar Pelanggan</h5>
              <table class="table table-bordered " id="datatable-noexport">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($pelanggan as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->name }} </td>
            <td>{{ $data->email}} </td>
            <td>{{ $data->address }} </td>
            <td>{{ $data->number }} </td>
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
                  <form action="{{ route('pemasok.destroy',$data) }}" method="post" class="d-inline">
                              @method('delete')
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
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script>
    feather.replace();
</script>


@endsection