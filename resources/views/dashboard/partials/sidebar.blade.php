  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard') ? 'text-primary bg-light' : '' }}" href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/penjualan*') ? 'text-primary bg-light' : '' }}" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bag"></i><span>Penjualan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        @if(Request::is('dashboard/penjualan*'))
        <ul id="charts-nav" class="nav-content ">
        @else
        <ul id="charts-nav" class="nav-content collapse ">
        @endif
          <li>
            <a href="/dashboard/penjualan/create">
            @if(Request::is('dashboard/penjualan/create'))
              <i class="bi bi-circle"></i><span class="text-primary">Tambah Penjualan</span>
            @else
              <i class="bi bi-circle"></i><span>Tambah Penjualan</span>
            @endif
            </a>
          </li>
          <li>
            <a href="/dashboard/penjualan">
            @if(Request::is('dashboard/penjualan'))
              <i class="bi bi-circle"></i><span class="text-primary">Lihat Penjualan Offline</span>
            @else
              <i class="bi bi-circle"></i><span>Lihat Penjualan Offline</span>
            @endif
            </a>
          </li>
          <li>
            <a href="/dashboard/penjualan-pelanggan">
            @if(Request::is('dashboard/penjualan-pelanggan'))
              <i class="bi bi-circle"></i><span class="text-primary">Lihat Penjualan Online</span>
            @else
              <i class="bi bi-circle"></i><span>Lihat Penjualan Online</span>
            @endif
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/pembelian*') ? 'text-primary bg-light' : ''  }}" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-wallet"></i><span>Pembelian</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        @if(Request::is('dashboard/pembelian*'))
        <ul id="icons-nav" class="nav-content ">
        @else
        <ul id="icons-nav" class="nav-content collapse ">
        @endif
          <li>
            <a href="/dashboard/pembelian/create">
            @if(Request::is('dashboard/pembelian/create'))
              <i class="bi bi-circle"></i><span class="text-primary">Tambah Pembelian</span>
            @else
              <i class="bi bi-circle"></i><span>Tambah Pembelian</span>
            @endif
            </a>
          </li>
          <li>
            <a href="/dashboard/pembelian">
            @if(Request::is('dashboard/pembelian'))
            <i class="bi bi-circle"></i><span class="text-primary">Lihat Pembelian</span>
            @else
              <i class="bi bi-circle"></i><span>Lihat Pembelian</span>
            @endif
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/laporan*') ? 'text-primary bg-light' : '' }}" data-bs-target="#laporan-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-file-text"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        @if(Request::is('dashboard/laporan*'))
        <ul id="laporan-nav" class="nav-content ">
        @else
        <ul id="laporan-nav" class="nav-content collapse ">
        @endif
          <li>
            <a href="/dashboard/laporan">
            @if(Request::is('dashboard/laporan'))
              <i class="bi bi-circle"></i><span class="text-primary">Lihat Laporan</span>
            @else
              <i class="bi bi-circle"></i><span>Lihat Laporan</span>
            @endif
            </a>
          </li>
        </ul>
      </li><!-- End Laporan Nav -->

      @can('admin')
      <li class="nav-heading">Admin</li>

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/obat*') ? 'text-primary bg-light' : '' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-capsule"></i><span>Obat</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        @if(Request::is('dashboard/obat*'))
        <ul id="components-nav" class="nav-content">
        @else
        <ul id="components-nav" class="nav-content collapse ">
        @endif
         <li>
            <a href="/dashboard/obat/create">
            @if(Request::is('dashboard/obat/create'))
              <i class="bi bi-circle"></i><span class="text-primary">Tambah Obat</span>
            @else
              <i class="bi bi-circle"></i><span>Tambah Obat</span>
            @endif
            </a>
          </li>
          <li>
            <a href="/dashboard/obat">
            @if(Request::is('dashboard/obat'))
              <i class="bi bi-circle"></i><span class="text-primary">Lihat Obat</span>
            @else
              <i class="bi bi-circle"></i><span>Lihat Obat</span>
            @endif
            </a>
          </li>
          <li>
            <a href="/dashboard/obat/kadaluwarsa">
            @if(Request::is('dashboard/obat/kadaluwarsa'))
              <i class="bi bi-circle"></i><span class="text-primary">Obat Kadaluwarsa</span>
            @else
              <i class="bi bi-circle"></i><span>Obat Kadaluwarsa</span>
            @endif
            </a>
          </li>
          <li>
            <a href="/dashboard/obat/habis">
            @if(Request::is('dashboard/obat/habis'))
              <i class="bi bi-circle"></i><span class="text-primary">Obat Habis</span>
            @else
              <i class="bi bi-circle"></i><span>Obat Habis</span>
            @endif
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/unit*') ? 'text-primary bg-light' : '' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="">
          <i class="bi bi-tags-fill"></i><span>Unit</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        @if(Request::is('dashboard/unit*'))
        <ul id="forms-nav" class="nav-content ">
        @else
        <ul id="forms-nav" class="nav-content collapse ">
        @endif
          <li>
            <a href="/dashboard/unit/create">
            @if(Request::is('dashboard/unit/create'))
              <i class="bi bi-circle"></i><span class="text-primary">Tambah Unit</span>
            @else
              <i class="bi bi-circle"></i><span>Tambah Unit</span>
            @endif
            </a>
          </li>
          <li>
            <a href="/dashboard/unit">
            @if(Request::is('dashboard/unit'))
              <i class="bi bi-circle"></i><span class="text-primary">Lihat Unit</span>
            @else
              <i class="bi bi-circle"></i><span>Lihat Unit</span>
            @endif
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/pemasok*') ? 'text-primary bg-light' : '' }}" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="">
          <i class="bi bi-building"></i><span>Pemasok</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        @if(Request::is('dashboard/pemasok*'))
        <ul id="tables-nav" class="nav-content ">
        @else
        <ul id="tables-nav" class="nav-content collapse ">
        @endif
          <li>
            <a href="/dashboard/pemasok/create">
            @if(Request::is('dashboard/pemasok/create'))
              <i class="bi bi-circle"></i><span class="text-primary">Tambah Pemasok</span>
            @else
              <i class="bi bi-circle"></i><span>Tambah Pemasok</span>
            @endif
            </a>
          </li>
          <li>
            <a href="/dashboard/pemasok">
            @if(Request::is('dashboard/pemasok'))
              <i class="bi bi-circle"></i><span class="text-primary">Lihat Pemasok</span>
            @else
            <i class="bi bi-circle"></i><span>Lihat Pemasok</span>
            @endif
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/user*') ? 'text-primary bg-light' : '' }}" data-bs-target="#kasir-nav" data-bs-toggle="collapse" href="">
          <i class="bi bi-people"></i><span>Data Pengelola</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        @if(Request::is('dashboard/user*'))
        <ul id="kasir-nav" class="nav-content ">
        @else
        <ul id="kasir-nav" class="nav-content collapse ">
        @endif
          <li>
            <a href="/dashboard/user/create">
            @if(Request::is('dashboard/user/create'))
              <i class="bi bi-circle"></i><span class="text-primary">Tambah User</span>
            @else
              <i class="bi bi-circle"></i><span>Tambah User</span>
            @endif
            </a>
          </li>
          <li>
            <a href="/dashboard/user">
            @if(Request::is('dashboard/user'))
              <i class="bi bi-circle"></i><span class="text-primary">Lihat User</span>
            @else
              <i class="bi bi-circle"></i><span>Lihat User</span>
            @endif
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/pelanggan') ? 'text-primary bg-light' : '' }}" href="/dashboard/pelanggan">
          <i class="bi bi-people"></i>
          <span>Data Pelanggan</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/saran') ? 'text-primary bg-light' : '' }}" href="/dashboard/saran">
          <i class="bi bi-people"></i>
          <span>Kotak Saran</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endcan
    </ul>

  </aside><!-- End Sidebar-->