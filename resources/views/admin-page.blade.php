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

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{ url("index.html") }}">Home</a></li>
          <li><a href="{{ url("#about") }}">About</a></li>
          <li><a href="{{ url("#departments") }}">Departments</a></li>
          <li><a href="{{ url("#doctors") }}">Doctors</a></li>
          <li class="drop-down"><a href="{{ url("") }}">Drop Down</a>
            <ul>
              <li><a href="{{ url("#") }}">Drop Down 1</a></li>
              <li class="drop-down"><a href="{{ url("#") }}">Deep Drop Down</a>
                <ul>
                  <li><a href="{{ url("#") }}">Deep Drop Down 1</a></li>
                  <li><a href="{{ url("#") }}">Deep Drop Down 2</a></li>
                  <li><a href="{{ url("#") }}">Deep Drop Down 3</a></li>
                  <li><a href="{{ url("#") }}">Deep Drop Down 4</a></li>
                  <li><a href="{{ url("#") }}">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="{{ url("#") }}">Drop Down 2</a></li>
              <li><a href="{{ url("#") }}">Drop Down 3</a></li>
              <li><a href="{{ url("#") }}">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a href="{{ url("#contact") }}">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <a href="{{ url("#appointment") }}" class="appointment-btn scrollto">Booking Sekarang</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Admin Page</h2>
          <ol>
            <li><a href="{{ url("index.html") }}">Home</a></li>
            <li>Admin Page</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <p>
          <h3>Welcome, Administrator !</h3>
          {{-- @php
              dd($arrmobil);
          @endphp --}}
          <h5>List Mobil - Rental Mobil Angkasa</h5>
          <table border='1'>
            @foreach($arrmobil as $rowmobil)
                <tr>
                    <td>{{ $rowmobil->platnomor }}</td>
                    <td>{{ $rowmobil->namamobil }}</td>
                    <td>{{ $rowmobil->warna }}</td>
                    <td>{{ $rowmobil->tahunmobil }}</td>
                    <td>{{ $rowmobil->status }}</td>
                </tr>
            @endforeach
          </table>
          <br>
          <h5>Input Mobil Baru</h5>
          <form action="/post_tambahmobil" method="post">
            @csrf
            @if ($errors->any())
              @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div><br>
              @endforeach
            @endif
            @if (session()->has('message'))
              <h3>{{ session()->get('message') }}</h1>
            @endif
            <div class="form-row">
              <div class="col-md-4 form-group">
                Plat Nomor Mobil
                <input type="text" name="plattxt" class="form-control" placeholder="L2020BEB"><br>
                Nama Mobil
                <input type="text" name="namamobiltxt" class="form-control" placeholder="Toyota Avanza Veloz 2020"><br>
                Warna
                <input type="text" name="warnatxt" class="form-control" placeholder="Silver"><br>
                Tahun Mobil
                <input type="text" name="tahuntxt" class="form-control" placeholder="2020"><br>
                <button type="submit" class="btn-info" style="border:0; border-radius:50px; width: 200px; height: 50px;">Tambah Mobil</button><br>
              </div>
              </div>
            </form>
          </div>
        </p>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Medilab</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url("#") }}">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url("#") }}">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url("#") }}">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url("#") }}">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url("#") }}">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url("#") }}">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url("#") }}">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url("#") }}">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url("#") }}">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url("#") }}">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

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