<!DOCTYPE html>

<html lang="en">



<head>

  <meta charset="utf-8">

  <meta content="width=device-width, initial-scale=1.0" name="viewport">



  <title>MUI-TV</title>

  <meta content="" name="description">

  <meta content="" name="keywords">



  <!-- Favicons -->

  <link href="assets/img/favicon.png" rel="icon">

  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">



  <!-- Google Fonts -->

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">



  <!-- Vendor CSS Files -->

  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">



  <!-- Template Main CSS File -->

  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================

  * Template Name: Bootslander - v4.8.2

  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/

  * Author: BootstrapMade.com

  * License: https://bootstrapmade.com/license/

  ======================================================== -->

</head>



<body>



<header id="header" class="fixed-top d-flex align-items-center header-transparent">

    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo">

      <h1><a href="./assets/img/about.png"></img><img src="./assets/img/about.png"><span></span></a></h1>

        <!-- Uncomment below if you prefer to use an image logo -->

        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      </div>



      <nav id="navbar" class="navbar">

        <ul>

          <li><a class="nav-link scrollto" href="index.php">Home</a></li>

          <li><a class="nav-link scrollto active" href="./berita.php">Berita</a></li>

          <li><a class="nav-link scrollto" href="index.php#about">Tentang Kami</a></li>

          <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li>

          <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>

          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>

            <ul>

              <li><a href="#">Drop Down 1</a></li>

              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>

                <ul>

                  <li><a href="#">Deep Drop Down 1</a></li>

                  <li><a href="#">Deep Drop Down 2</a></li>

                  <li><a href="#">Deep Drop Down 3</a></li>

                  <li><a href="#">Deep Drop Down 4</a></li>

                  <li><a href="#">Deep Drop Down 5</a></li>

                </ul>

              </li>

              <li><a href="#">Drop Down 2</a></li>

              <li><a href="#">Drop Down 3</a></li>

              <li><a href="#">Drop Down 4</a></li>

            </ul>

          </li> -->

          <li><a class="nav-link scrollto" href="index.php#contact">Kontak</a></li>

        </ul>

        <i class="bi bi-list mobile-nav-toggle"></i>

      </nav><!-- .navbar -->



    </div>

  </header><!-- End Header -->

  <section id="hero">

</section>

  <main id="main">

    <section id="features" class="features"> 

      <form action="berita.php" method="get"></form>

      <div class="container">

          <div class="section-title" data-aos="fade-up">

            <h2>Berita</h2>

            <p style="color:green;">Berita</p>

          </div>

          <div class="btn-group" role="group" aria-label="Basic example" style="display: inline-block;overflow: auto;">

          <?php

            include "./connect.php";

            $codeK = '';

            $result1 = $conn -> query("SELECT * FROM master_data WHERE tipe = 'kategori'");

            while($row1 = mysqli_fetch_assoc($result1)) {

          ?>  

          <form action="berita.php?id=<?php echo $row1["kode"];?>" method="post" class="btn-group mb-2"><input class="btn btn-success" type="submit" value="<?php echo $row1['nama']; ?>" /></form>

          <?php

            }

          ?>

            </div>

          <?php

            $nomor = 1;

            $result = "";

            if(isset($_GET['id']) && $_GET['id'] != '001'){

              $code = $_GET['id'];

              $result = $conn -> query("SELECT * FROM berita WHERE kategori_code = $code");

            }else{

              $result = $conn -> query("SELECT * FROM berita ORDER BY tanggal desc");

            }

            while($row = mysqli_fetch_assoc($result)) {

            if($nomor == 1){

            ?>

            <div class="row">

              <div class="card-group">

                <div class="col pb-3">

                  <div class="card text-blue">

                    <img style="max-width:200px;max-height:200px;" class="rounded mx-auto" src="./img/<?php echo $row['image_src'];?>" class="card-img pt-4" alt="...">

                    <div class="card-img-overlay card-body">

                      <a href="./beritadetail.php?id=<?php echo $row['id'];?>"><h5 class="card-title text-center"><?php echo $row['judul'];?></h5></a>

                    </div>

                    <div class="card-footer text-center"><?php echo $row['tanggal'];?></div>

                  </div>

                </div>

              </div>

            </div>

            <?php }else if($nomor%2 == 0){?>

            <div class="row">

              <div class="col pb-3">

                <div class="card text-blue">

                  <img style="max-width:200px;max-height:200px;" class="rounded mx-auto"  src="./img/<?php echo $row['image_src'];?>" class="card-img pt-4" alt="...">

                  <div class="card-img-overlay card-body">

                      <a href="./beritadetail.php?id=<?php echo $row['id'];?>"><h5 class="card-title text-center"><?php echo $row['judul'];?></h5></a>

                  </div>

                  <div class="card-footer text-center"><?php echo $row['tanggal'];?></div>

                </div>

              </div>

              <?php }else{ ?>

              <div class="col pb-3">

                <div class="card text-blue">

                  <img style="max-width:200px;max-height:200px;" class="rounded mx-auto" src="./img/<?php echo $row['image_src'];?>" class="card-img pt-4" alt="...">

                  <div class="card-img-overlay card-body">

                      <a href="./beritadetail.php?id=<?php echo $row['id'];?>"><h5 class="card-title text-center"><?php echo $row['judul'];?></h5></a>

                  </div>

                  <div class="card-footer text-center"><?php echo $row['tanggal'];?></div>

                </div>

              </div>

            </div>

          <?php } 

          $nomor++;

        }?>

          </div>

      </form>

      </section><!-- End Features Section -->

              </main>

  <!-- ======= Footer ======= -->

  <footer id="footer">

    <div class="container">

      <div class="copyright">

        &copy; Copyright <strong><span>MUI-TV</span></strong>. All Rights Reserved

      </div>

      <div class="credits">

        <!-- All the links in the footer should remain intact. -->

        <!-- You can delete the links only if you purchased the pro version. -->

        <!-- Licensing information: https://bootstrapmade.com/license/ -->

        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->

        Designed by <a href="https://bootstrapmade.com/">MUI-TV</a>

      </div>

    </div>

  </footer><!-- End Footer -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>



  <!-- Vendor JS Files -->

  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <script src="assets/vendor/aos/aos.js"></script>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <script src="assets/vendor/php-email-form/validate.js"></script>



  <!-- Template Main JS File -->

  <script src="assets/js/main.js"></script>

</body>



</html>