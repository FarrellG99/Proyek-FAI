<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Page</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset("/assets/img/favicon.png") }}" rel="icon">
  <link href="{{ asset("/assets/img/apple-touch-icon.png") }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset("/assets/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
  <link href="{{ asset("/assets/vendor/icofont/icofont.min.css") }}" rel="stylesheet">
  <link href="{{ asset("/assets/vendor/boxicons/css/boxicons.min.css") }}" rel="stylesheet">
  <link href="{{ asset("/assets/vendor/venobox/venobox.css") }}" rel="stylesheet">
  <link href="{{ asset("/assets/vendor/animate.css/animate.min.css") }}" rel="stylesheet">
  <link href="{{ asset("/assets/vendor/remixicon/remixicon.css") }}" rel="stylesheet">
  <link href="{{ asset("/assets/vendor/owl.carousel/assets/owl.carousel.min.css") }}" rel="stylesheet">
  <link href="{{ asset("/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css") }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset("/assets/css/style.css") }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab - v2.0.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="{{ url("mailto:contact@example.com") }}">contact@example.com</a>
        <i class="icofont-phone"></i> +1 5589 55488 55
        <i class="icofont-google-map"></i> A108 Adam Street, NY
      </div>
      <div class="social-links">
        <a href="{{ url("#") }}" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="{{ url("#") }}" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="{{ url("#") }}" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="{{ url("#") }}" class="skype"><i class="icofont-skype"></i></a>
        <a href="{{ url("#") }}" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="{{ url("index.html") }}">Rental Mobil Angkasa</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="{{ url("index.html") }}" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      @if (!Auth::check()) 
        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li><a href="{{ url("/") }}">Home</a></li>
            <li><a href="{{ url("about") }}">About</a></li>
            <li><a href="{{ url("search") }}">Search</a></li>
            <li><a href="{{ url("login") }}">Login</a></li>
            <li><a href="{{ url("register") }}">Register</a></li>
            <li><a href="{{ url("contactus") }}">Contact Us</a></li>
          </ul>
        </nav><!-- .nav-menu -->
      @else 
        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li><a href="{{ url("/") }}">Home</a></li>
            <li><a href="{{ url("search") }}">Search</a></li>
            <li><a href="{{ url("booking") }}">Booking</a></li>
            <li><a href="{{ url("history") }}">History</a></li>
            <li><a href="{{ url("profile") }}">Profile</a></li>
            <li><a href="{{ url("logout") }}">Logout</a></li>
          </ul>
        </nav><!-- .nav-menu -->
      @endif
    </div>
  </header><!-- End Header -->

  <main id="main" style="margin-top: 100px;">
    <section class="inner-page">
        @yield("isipage"); 
    </section>
  </main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container d-md-flex py-4">
      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>Medilab</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="{{ url("#") }}" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="{{ url("#") }}" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="{{ url("#") }}" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="{{ url("#") }}" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="{{ url("#") }}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
</footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="{{ url("#") }}" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset("/assets/vendor/jquery/jquery.min.js") }}"></script>
  <script src="{{ asset("/assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
  <script src="{{ asset("/assets/vendor/jquery.easing/jquery.easing.min.js") }}"></script>
  <script src="{{ asset("/assets/vendor/php-email-form/validate.js") }}"></script>
  <script src="{{ asset("/assets/vendor/venobox/venobox.min.js") }}"></script>
  <script src="{{ asset("/assets/vendor/waypoints/jquery.waypoints.min.js") }}"></script>
  <script src="{{ asset("/assets/vendor/counterup/counterup.min.js") }}"></script>
  <script src="{{ asset("/assets/vendor/owl.carousel/owl.carousel.min.js") }}"></script>
  <script src="{{ asset("/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js") }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset("/assets/js/main.js") }}"></script>

</body>

</html>