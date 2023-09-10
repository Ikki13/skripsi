@extends('dashboard.layouts.main')

@section('container')

<main id="main" class="main">

@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif

<div class="pagetitle">
  <h1>Laporan</h1>
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
              <div class="col-sm-12 col">
			  <!-- @isset($pembelian)
              <a class="btn btn-success mb-3" href="/dashboard/laporan/export">Export</a>
			  @endisset
			  @isset($penjualan)
              <a class="btn btn-success mb-3" href="/dashboard/laporan/export">Export</a>
			  @endisset -->
	          <button  type="button"  data-bs-toggle="modal" data-bs-target="#generate_report" class="btn btn-primary mb-3">Pilih Laporan</button>

	

        @isset($pembelian)
			<!--  Sales -->
			<div class="card">
				<div class="card-body mt-3 mb-3">
					<div class="table-responsive">
						<table id="datatable-export" class="table table-hover table-center mb-0">
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal</th>
									<th>Nama Obat</th>
									<th>Pemasok</th>
									<th>Banyak</th>
									<th>Bayar</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($pembelian as $data)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{date_format(date_create($data->created_at),"d M, Y")}}</td>
											<td>{{$data->obat->nama_obat}}</td>
											<td>{{$data->pemasok->nama_pemasok}}</td>
											<td>{{$data->banyak}}</td>
											<td>{{$data->formatRupiah('total')}}</td>
										</tr>
								@endforeach
							</tbody>
						</table>
						<!-- <div class="container-fluid mt-4">
							<p style="margin-right:55px;" class="text-right"><b>Total (Rp) </b>{{ $total_pembelian }}</p>
						</div> -->
					</div>
				</div>
			</div>
			<!-- / sales -->
		@endisset


		@isset($penjualan)
			<!--  Sales -->
			<div class="card">
				<div class="card-body mt-3">
					<div class="table-responsive">
						<table id="datatable-export" class="table table-hover table-center">
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal</th>
									<th>Nama Obat</th>
									<th>Banyak</th>
									<th>Bayar</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($penjualan as $data)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{date_format(date_create($data->created_at),"d M, Y")}}</td>
											<td>{{$data->obat->nama_obat}}</td>
											<td>{{$data->banyak}}</td>
											<td>{{$data->formatRupiah('total')}}</td>
										</tr>
								@endforeach
							</tbody>
						</table>
						@isset($pembelian)
						<div class="container-fluid mt-4">
							<p style="margin-right:55px;" class="text-right"><b>Total (Rp) </b>{{ number_format($total_pembelian,0,',','.') }}</p>
						</div>
						@endisset
						@isset($penjualan)
						<div class="container-fluid mt-4">
							<p style="margin-right:55px;" class="text-right"><b>Total (Rp) </b>{{ number_format($total_penjualan,0,',','.') }}</p>
						</div>
						@endisset
					</div>
				</div>
			</div>
			<!-- / sales -->
		@endisset


		@isset($online)
		<!--  Sales -->
		<div class="card">
			<div class="card-body mt-3">
				<div class="table-responsive">
					<table id="datatable-export" class="table table-hover table-center">
						<thead>
							<tr>
								<th>No</th>
								<th>Tanggal</th>
								<th>Nama Pembeli</th>
								<th>Bayar</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($online as $data)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{date_format(date_create($data->created_at),"d M, Y")}}</td>
										<td>{{$data->name}}</td>
										<td>{{number_format($data->total_price,0,',','.')}}</td>
									</tr>
							@endforeach
						</tbody>
					</table>
					@isset($pembelian)
					<div class="container-fluid mt-4">
						<p style="margin-right:55px;" class="text-right"><b>Total (Rp) </b>{{ number_format($total_pembelian,0,',','.') }}</p>
					</div>
					@endisset
					@isset($penjualan)
					<div class="container-fluid mt-4">
						<p style="margin-right:55px;" class="text-right"><b>Total (Rp) </b>{{ number_format($total_penjualan,0,',','.') }}</p>
					</div>
					@endisset
					@isset($online)
					<div class="container-fluid mt-4">
						<p style="margin-right:55px;" class="text-right"><b>Total (Rp) </b>{{ number_format($total_penjualan,0,',','.') }}</p>
					</div>
					@endisset
				</div>
			</div>
		</div>
		<!-- / sales -->
	@endisset

            </div>
            </div>

          </div>
        </div><!-- End Recent Sales -->

      </div>
    </div><!-- End columns -->

  </div>
</section>

<!-- Generate Modal -->
<div class="modal fade" id="generate_report" tabindex="-1" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Laporan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{route('reports')}}">
					@csrf
					<div class="row form-row">
						<div class="col-12">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>Dari</label>
										<input type="date" name="from_date" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>Sampai</label>
										<input type="date" name="to_date" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Kategori</label>
								<select class="form-select" name="resource"> 
									<option value="pembelian">Pembelian</option>
									<option value="penjualan">Penjualan</option>
									<option value="online">Penjualan Online</option>
								</select>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Generate Modal -->

</main><!-- End #main -->


@endsection