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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  
  <main id="main">
    <section id="hero" class="hero"></section> 
    <section id="features" class="features"> 
      <div class="container">
          <div class="section-title" data-aos="fade-up">
            <h2>Berita</h2>
            <p style="color:green;">Berita</p>
          </div>
          <?php 
             include "./connect.php";
             $nomor = 1;
             $judul = "";
             $tanggal="";
             $berita="";
             $srcimg="";
             $id = $_GET['id'];
             $result = $conn -> query("SELECT * FROM berita WHERE id=$id");
             while($row = mysqli_fetch_assoc($result)) {
                $judul = $row["judul"];
                $tanggal = $row["tanggal"];
                $berita = $row["berita"];
                $srcimg = $row["image_src"];
            }
            mysqli_error($conn);
          ?>
          <div class="text-center">
              
         <h5> <strong><?php echo $judul;?></strong></h5>
              <img style="max-height:200px;background-color:blue;" class="rounded mx-auto" src="./img/<?php echo $srcimg?>" class="card-img pt-4" alt="...">
          </div>
          <div class="rounded-2">
              <div class="border">
                <span><?php echo $berita?></span>
              </div>
              <div class="text-end" style="font-size:10px;padding-top:30px">
              <?php echo $tanggal?>
              </div>
          </div>
      </div>
      <div class="container">
        <div class="mb-4" style="height:100px ">
        <h6>Bagikan :</h6>
          <a href="https://twitter.com/share?url=https://muitvkotabekasi.com/beritadetail.php?id=<?php echo $id?>&text=<?php echo $judul?>"><i class="fa fa-twitter fa-2x" style="color:blue;" aria-hidden="true"></i></a></span>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://muitvkotabekasi.com/beritadetail.php?id=<?php echo $id?>"><i class="fa fa-facebook-square fa-2x " style="color:blue" aria-hidden="true"></i></a>
          <a href="whatsapp://send?text=https://muitvkotabekasi.com/beritadetail.php?id=<?php echo $id?>"><i class="fa fa-whatsapp fa-2x " aria-hidden="true"></i></a>
        </div>
      </div>
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Komentar</h2>
        </div>
        <div class="rounded-2">
                  <div class="comment mb-4">
          <?php
              $komen = $conn -> query("SELECT * FROM komentar WHERE berita_id=$id");
              while($rowkomen = mysqli_fetch_assoc($komen)) {
                  ?>
                  <div>
                    <div class="comment-card">
                    <div class="container-card">
                      <div class="nama"><?php echo $rowkomen["nama"];?></h6>
                      <div class="tgl"><?php echo $rowkomen["tanggal"];?></div>
                      <div class="isi"><?php echo $rowkomen["komentar"];?></div>
                    </div>
                  </div>
                  </div>
                  <?php if ( $rowkomen["lain"] !== ''){?>
                  <div class="mt-3 right">
                    <div class="comment-card">
                    <div class="container-card">
                      <div class="nama"><?php echo "Admin"?></h6>
                      <div class="isi"><?php echo $rowkomen["lain"];?></div>
                    </div>
                  </div>
                  </div>
                  <div class="mt-5">
                  <?php }?>
                  </div>
                 <?php
              }
              mysqli_error($conn);
            ?> 
          </div>                
         </div>
      </div>
      <section id="komen" class="komen">

       </section>
      <section id="contact" class="contact">
      <div class="container">
      <div class="section-title" data-aos="fade-up">
            <h2>Tulis Komentar</h2>
          </div>
      <div>
          <form action="forms/komentar.php" method="post" role="form" class="php-email-form">
          <input type="hidden" name="id" id="id" value="<?php echo $id?>" />
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Tulis Komentar" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Komentar Anda Telah Terkirim. Terimakasih!</div>
              </div>
              <div class="text-center"><button type="submit">Kirim Komentar</button></div>
            </form>
          </div>
      </div>
          </section>
    </section><!-- End Features Section -->
              </main>
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>MUI-TV Kota Bekasi</span></strong>. All Rights Reserved
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