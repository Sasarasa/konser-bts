<?php
session_start();
$id=$_SESSION['user'];

if (!isset($_SESSION['user']))
  header("location: login.php");
include "koneksi.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  <title>TIKET KONSER BTS</title>
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


    <header class="site-navbar py-5 js-sticky-header site-navbar-target" role="banner">

      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-45"><a href="index.php">Tiket Konser BTS</a></div>

          <div class="mx-auto text-center">

          </div>

          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="logout.php" class="nav-link"><span>logout</span></a></li>
              </ul>
            </nav>
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
                <?php
                $no = $_SESSION['user'];
                $heem = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan, tb_tiket WHERE tb_tiket.no_pelanggan=tb_pelanggan.no_pelanggan AND tb_pelanggan.no_pelanggan='$no'");
                if ($uci = mysqli_fetch_array($heem)) {
                ?>
                  <h1 data-aos="fade-up" data-aos-delay="100">Hai Kak, <?php echo $uci['nama_pelanggan'] ?> </h1>
                
                  <p class="mb-4" data-aos="fade-up" data-aos-delay="200">Nomor tiketmu adalah <?php echo $uci['id_tiket'] ?>. Dengan status tiket <?php echo $uci['konfirmasi'] ?></p>
                  
   
                  <?php
                }
                ?>
                <p class="mb-4" data-aos="fade-up" data-aos-delay="200">Terimakasih</p>
                </div>
                

                  </div>
              </div>
            </div>

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
  <script src="js/jquery.min.js"></script>
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
<script type="text/javascript">
  <?php echo $jsArray; ?>

  function changeValue(id_daya) {
    document.getElementById('harga').value = dtdaya[id_daya].harga;
  };
</script>