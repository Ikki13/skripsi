<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <title>Apotek - {{ $title }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Asset -->
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="/asset/fonts/icomoon/style.css">

  <link rel="stylesheet" href="/asset/css/bootstrap.min.css">
  <link rel="stylesheet" href="/asset/css/magnific-popup.css">
  <link rel="stylesheet" href="/asset/css/jquery-ui.css">
  <link rel="stylesheet" href="/asset/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/asset/css/owl.theme.default.min.css">


  <link rel="stylesheet" href="/asset/css/aos.css">

  <link rel="stylesheet" href="/asset/css/style.css">

  <!-- Favicons -->
  <link href="/assets/img/medical-remove.png" rel="icon" type="image/x-icon">
  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <style>
      #go-to-top {
          position: fixed;
          bottom: 20px;
          right: 20px;
          display: none;
      }
      #go-to-top.show {
          display: block;
      }
  </style>
</head>

<body>

    @include('partials.navbar')

    @yield('container')

    <button id="go-to-top">Go to Top</button>

    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#go-to-top').click(function() {
                $('html, body').animate({ scrollTop: 0 }, 'slow');
            });
        });
    </script>
    
  <!-- waktuAlert -->
  <script src="/js/timerAlert.js"></script>

  <!-- Asset -->
  <script src="/asset/js/jquery-3.3.1.min.js"></script>
  <script src="/asset/js/jquery-ui.js"></script>
  <script src="/asset/js/popper.min.js"></script>
  <script src="/asset/js/bootstrap.min.js"></script>
  <script src="/asset/js/owl.carousel.min.js"></script>
  <script src="/asset/js/jquery.magnific-popup.min.js"></script>
  <script src="/asset/js/aos.js"></script>

  <script src="/asset/js/main.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>