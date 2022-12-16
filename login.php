<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login Cek Nomor Tiket</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container-fluid">
        <div class="d-flex align-items-center">
        <div class="site-logo mr-auto w-45"><a href="index.php">Tiket Konser BTS</a></div>



          <div class="ml-auto w-25">
            <div class="ml-auto w-25">
              <nav class="site-navigation position-relative text-right" role="navigation">
                <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                  <li class="cta"><a href="admin" class="nav-link"><span>Administrasi</span></a></li>
                </ul>
              </nav>
              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
            </div>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>

    </header>

    <div class="intro-section" id="home-section">

      <div class="slide-1" style="background-image: url('images/bg.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1 data-aos="fade-up" data-aos-delay="100">SELAMAT DATANG</h1>
                  <p class="mb-4" data-aos="fade-up" data-aos-delay="200">Silahkan daftar terlebih dahulu jika anda tidak mempunyai akun</p>
                  <p data-aos="fade-up" data-aos-delay="300"><a href="registrasi.php" class="btn btn-primary py-3 px-5 btn-pill">Registrasi</a></p>

                </div>

                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                  <form action="proseslog.php" method="post" class="form-box">
                    <?php
                    if (isset($_GET['pesan'])) {
                      if ($_GET['pesan'] == "gagal") {
                        echo "<div class='alert'>Akun tidak ditemukan !</div>";
                      }
                    }
                    ?>
                    <h3 class="h4 text-black mb-4">Login Disini</h3>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Nomor Handphone" name="hp" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>

                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-pill" value="Masuk" name="submit">
                    </div>
                  </form>

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="site-section pb-0">

      <div class="future-blobs">
        <div class="blob_2">
          <img src="images/blob_2.svg" alt="Image">
        </div>
        <div class="blob_1">
          <img src="images/blob_1.svg" alt="Image">
        </div>
      </div>
      <div class="container">
        <div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="">
          <div class="col-lg-7 text-center">
            <h2 class="section-title">Why Choose Us</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12"  data-aos="fade-left" data-aos-delay="200">
            <img src="images/1.jpg" alt="Image" class="img-fluid">
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-12"  data-aos="fade-left" data-aos-delay="200">
            <img src="images/2.jpg" alt="Image" class="img-fluid">
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-lg-12"  data-aos="fade-left" data-aos-delay="200">
            <img src="images/3.jpg" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div> <!-- .site-wrap -->
  <div class="container">
    <div class="row pt-1 mt-1 text-center">
      <div class="col-md-12">
        <div class="border-top pt-5">
          <p>
            Copyright &copy;<script>
              document.write(new Date().getFullYear());
            </script> <i class="icon-heart" aria-hidden="true"></i> by <a href="" target="_blank"></a>
          </p>
        </div>
      </div>

    </div>
  </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>


  <script src="js/main.js"></script>

</body>

</html>