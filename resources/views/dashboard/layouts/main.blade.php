<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>Dashboard - {{ $title }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Terbaru Datatables -->

  <link rel="stylesheet" href="'/asset2/plugins/DataTables/datatables.css'">
  <link rel="stylesheet" href="'assets/css/app.css'">

  <!-- DataTables -->
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

  <!-- Favicons -->
  <link href="/assets/img/medical-remove.png" rel="icon" type="image/x-icon">
  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->


      <!-- Datatables css -->
      <link rel="stylesheet" href="{{asset('asset2/plugins/DataTables/datatables.css')}}">
  

</head>

<body>

    @include('dashboard.partials.header')
    @include('dashboard.partials.sidebar')

    @yield('container')

    @include('dashboard.partials.footer')

  <!-- waktuAlert -->
  <script src="/js/timerAlert.js"></script>

	<!-- jQuery -->
	<script src="/asset2/js/jquery-3.2.1.min.js"></script>
  <script src="/asset2/plugins/DataTables/datatables.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/assets/vendor/quill/quill.min.js"></script>
  <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Datatables -->

  <script src="/asset2/js/datatables-customizer.js"></script>
  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

  <script>
    feather.replace();
  </script>

</body>

</html>