<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="../../images/favicon.png" type="image/png">
    <title>Condominio Grano</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Prata&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../../css/animate.css">
    
    <link rel="stylesheet" href="../../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../css/magnific-popup.css">

    <link rel="stylesheet" href="../../css/aos.css">

    <link rel="stylesheet" href="../../css/ionicons.min.css">
        
        <link rel="stylesheet" href="../../css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="../../css/nouislider.css">

    
    <link rel="stylesheet" href="../../css/flaticon.css">
    <link rel="stylesheet" href="../../css/icomoon.css">
    <link rel="stylesheet" href="../../css/style.css">
  </head>
  <body> 
        
  <div class="main-section">
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
          <a href="{{ route('grano') }}"><img src="../../images/logograno.png" alt="logo-grano"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
          </button>
          <div class="collapse navbar-collapse" id="ftco-nav">
            @if(Auth::guest())
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="{{ route('login') }}" style="font-size: 1em; font-weight: bold;" class="nav-link icon d-flex align-items-center"><i class="ion-ios-redo"></i> / Entrar</a></li>
              <li class="nav-item"><a href="{{ route('register') }}" style="font-size: 1em; font-weight: bold;" class="nav-link icon d-flex align-items-center"><i class="ion-ios-person"></i> + Registro</a></li>
            </ul>
            @else
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="{{ route('login') }}" style="font-size: 1em; font-weight: bold;" class="nav-link icon d-flex align-items-center"><i class="ion-ios-redo"></i> / Entrar</a></li>
            </ul>
            @endif
          </div>
          </div>
      </nav>
      
    <!-- END nav -->

    @yield('content')

      <footer class="ftco-section ftco-section-2" style="background-color: black; color: white;">
        <div class="col-md-12 text-center">
          <p class="mb-0" style="font-size: 1em;">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>
              document.write(new Date().getFullYear());

            </script> Todos los derechos reservados | Esta plantilla fue creada con <i class="icon-heart" aria-hidden="true"></i> por <a style="font-weight: bold;" href="https://colorlib.com" target="_blank">Colorlib</a> y <a style="font-weight: bold;" href="http://methodologic.com.ve" target="_blank">Methodologic</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </footer>

  </div>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../../js/popper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/jquery.easing.1.3.js"></script>
  <script src="../../js/jquery.waypoints.min.js"></script>
  <script src="../../js/jquery.stellar.min.js"></script>
  <script src="../../js/owl.carousel.min.js"></script>
  <script src="../../js/jquery.magnific-popup.min.js"></script>
  <script src="../../js/aos.js"></script>

  <script src="../../js/nouislider.min.js"></script>
  <script src="../../js/moment-with-locales.min.js"></script>
  <script src="../../js/bootstrap-datetimepicker.min.js"></script>
  <script src="../../js/main.js"></script>
    
  </body>
</html>