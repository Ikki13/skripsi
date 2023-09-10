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
  <h1>Pembelian Obat</h1>
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
              <h5 class="card-title">Invoice</h5>
              <div class="pull-right">
              <a class="btn btn-danger" href="/dashboard/pembelian/" enctype="multipart/form-data"> Kembali</a>
              <a href="#" class="btn btn-primary" onclick="window.print()">PRINT</a>
              </div>
              <center>

                  <div class="main" bgcolor="#f6f6f6" style="color: #333; height: 100%; width: 50%;">
        <table bgcolor="#f6f6f6" cellspacing="0" style="border-collapse: collapse; padding: 40px; width: 100%;" width="100%">
            <tbody>
                <tr>
                    <td width="5px" style="padding: 0;"></td>
                    <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                        <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <td style="padding: 0;">
                                        <a
                                            href="#"
                                            style="color: #348eda;"
                                            target="_blank"
                                        >
                                            <img
                                                src="/assets/img/medical-remove.png"
                                                alt=""
                                                style="height: 50px; max-width: 100%; width: 157px;"
                                                height="50"
                                                width="157"
                                            />
                                        </a>
                                    </td>
                                    <td style="color: #999; font-size: 12px; padding: 0; text-align: center;" align="right">
                                        Apotek Melati<br />No. Pembayaran :
                                        {{ $pembelian->id }}<br />
                                        {{ $pembelian->created_at }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="5px" style="padding: 0;"></td>
                </tr>
    
                <tr>
                    <td width="5px" style="padding: 0;"></td>
                    <td bgcolor="#FFFFFF" style="border: 1px solid #000; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                        <table width="100%" style="background: #f9f9f9; border-bottom: 1px solid #eee; border-collapse: collapse; color: #999;">
                            <tbody>
                                <tr>
                                    <td width="50%" style="padding: 15px;"><strong style="color: #333; font-size: 24px;">Pembelian Obat</strong></td>
                                    <td align="right" width="50%" style="padding: 20px;"><span class="il"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="padding: 0;"></td>
                    <td width="5px" style="padding: 0;"></td>
                </tr>
                <tr>
                    <td width="5px" style="padding: 0;"></td>
                    <td style="border: 1px solid #000; border-top: 0; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                        <table cellspacing="0" style="border-collapse: collapse; border-left: 1px solid #000; margin: 0 auto; max-width: 600px;">
                            <tbody>
                                <tr>
                                    <td valign="top"  style="padding: 20px;">
                                        <h3
                                            style="
                                                border-bottom: 1px solid #000;
                                                color: #000;
                                                font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
                                                font-size: 18px;
                                                font-weight: bold;
                                                line-height: 1.2;
                                                margin: 0;
                                                margin-bottom: 15px;
                                                padding-bottom: 5px;
                                            "
                                        >
                                            Ringkasan
                                        </h3>
                                        <table cellspacing="0" style="border-collapse: collapse; margin-bottom: 40px;">
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 10px 200px 10px 0px;  ">Pemasok</td>
                                                    <td align="right" style="padding: 5px 0;">{{ $pembelian->pemasok->nama_pemasok }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 10px 200px 10px 0px;  ">Nama Obat</td>
                                                    <td align="right" style="padding: 5px 0;">{{ $pembelian->obat->nama_obat }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 10px 200px 10px 0px;  ">Banyak</td>
                                                    <td align="right" style="padding: 5px 0;"> {{ $pembelian->banyak }}</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="padding: 10px 200px 10px 0px; "  >Tanggal Beli</td>
                                                    <td align="right" style="padding:0px 0px 9px 0px;"> {{ $pembelian->tanggal_beli }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 5px 0;">Harga </td>
                                                    <td align="right" style="padding: 5px 0;" ><span style="">{{ $pembelian->formatRupiah('harga_beli') }}</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="mb-4" style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;">Total Bayar</td>
                                                    <td align="right" style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;"> {{ $pembelian->formatRupiah('total') }} </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="5px" style="padding: 0;"></td>
                </tr>
    
                <tr style="color: #666; font-size: 12px;">
                    <td width="5px" style="padding: 10px 0;"></td>
                    <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                        <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <td width="40%" valign="top" style="padding: 10px 0;">
                                        <h4 style="margin-left: 20px;">Terima Kasih</h4>
                                    </td>
                                    <td width="10%" style="padding: 10px 0;">&nbsp;</td>
                                    <td width="40%" valign="top" style="padding: 10px 0;">
                                        <h4 style="margin: 0; font-size:16px;"><span class="il">Apotek Melati</span> Makassar</h4>
                                        <p style="color: #666; font-size: 12px; font-weight: normal; margin-bottom: 10px;">
                                            <a href="#">Jl. Borong Raya No.51/95, Batua, Kec. Manggala, Kota Makassar, Sulawesi Selatan 90233</a>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="5px" style="padding: 10px 0;"></td>
                </tr>
            </tbody>
        </table>
              </center>

</div>
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