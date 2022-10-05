<!DOCTYPE html>
<html lang="en">
<?php
include 'config.php';
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Video Streaming - MUI-TV</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet">
    #editor {
      height: 375px;
    }

    .ql-omega:after {
      content: "Ω";
    }
  </link>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png"  width = "100"alt="">
        <span class="d-none d-lg-block">MUI-TV</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block  ps-2">Admin MUI-TV</span>
            <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
          </a><!-- End Profile Iamge Icon -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <?php
        if($_POST['add'] == "streaming"){  
          ?>
          <li class="nav-item">
            <a class="nav-link " href="streaming.php">
              <i class="bi bi-badge-hd"></i>
              <span>Video Streaming</span>
            </a>
          </li>
          <?php
        }else{
          ?>
          <li class="nav-item">
            <a class="nav-link collapsed" href="streaming.php">
              <i class="bi bi-badge-hd"></i>
              <span>Video Streaming</span>
            </a>
          </li>
          <?php
        }
      ?>
      <?php
        if($_POST['add'] == "kategori"){  
          ?>
          <li class="nav-item">
            <a class="nav-link" href="kategori_berita.php">
              <i class="bi bi-journal-text"></i>
              <span>Kategori Berita</span>
            </a>
          </li>
          <?php
        }else{
          ?>
          <li class="nav-item">
            <a class="nav-link collapsed" href="kategori_berita.php">
              <i class="bi bi-journal-text"></i>
              <span>Kategori Berita</span>
            </a>
          </li>
          <?php
        }
      ?>
      <?php
        if($_POST['add'] == "berita"){  
          ?>
          <li class="nav-item">
            <a class="nav-link" href="berita.php">
              <i class="bi bi-journal-album "></i>
              <span>Berita</span>
            </a>
          </li>
          <?php
        }else{
          ?>
          <li class="nav-item">
            <a class="nav-link collapsed" href="berita.php">
              <i class="bi bi-journal-album "></i>
              <span>Berita</span>
            </a>
          </li>
          <?php
        }
      ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="media_sosial.php">
          <i class="bi bi-people-fill"></i>
          <span>Link Media Sosial</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="komentar.php">
          <i class="bi bi-chat-square-text-fill"></i>
          <span>Komentar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="keluar.php">
          <i class="bi bi-power"></i>
          <span>Keluar</span>
        </a>
      </li>
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Kelola Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Kelola Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
     <div class="row">
        <div class="col-md-12">
          <?php   include './config.php';
            $add = $_POST['add'];
            if($add == "streaming"){   
          ?>
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Tambah Data Video Streaming</h5>
                  <form class="row g-3" action="tambah_act.php" method="post">
                  <input type="hidden" name="add" id="add" value="<?php echo $add;?>"/>
                  <div class="col-12">
                      <label for="judul" class="form-label">Judul</label>
                      <input type="text" class="form-control" id="judul" name="judul"/>
                    </div>
                    <div class="col-12">
                      <label for="link_channel" class="form-label">Link</label>
                      <input type="text" class="form-control" id="link_channel" name="link_channel">
                    </div>
                    <div class="col-12">
                      <label for="description" class="form-label">Deskripsi</label>
                      <input type="text" class="form-control" id="description" name="description">
                    </div>

                    <div class="col-md-6">
                      <label for="time_from_show" class="form-label">Awal Jam Tayang</label>
                      <input type="time" class="form-control" id="time_from_show" name="time_from_show">
                    </div>
                    <div class="col-md-6">
                      <label for="time_to_show" class="form-label">Akhir Jam Tayang</label>
                      <input type="time" class="form-control" id="time_to_show" name="time_to_show">
                    </div>
                    <div class="col-12">
                      <label for="link_channel_web" class="form-label">Link Embed</label>
                      <input type="text" class="form-control" id="link_channel_web" name="link_channel_web">
                    </div>
                    
                    <div class="text-center">
                      <button class="btn btn-danger"><a href="./streaming.php">Batal</a></button>
                      <button type="sumbit" class="btn btn-primary">Tambah Data</button>
                    </div>
                  </form><!-- Vertical Form -->
                </div>
              </div>

            </div>
          <?php
            }else if($add == "berita"){
              ?>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Tambah Data Berita</h5>
                  <form class="row g-3" action="tambah_act.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="add" id="add" value="<?php echo $add;?>"/>
                    <div class="col-12">
                      <label for="judul" class="form-label">Judul</label>
                      <input type="text" class="form-control" id="judul" name="judul"/>
                    </div>
                    <div class="col-12">
                      <label for="tanggal" class="form-label">Tanggal</label>
                      <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                    <div class="col-12">
                      <label for="image_src" class="form-label">Image</label>
                      <input type="file" class="form-control" id="image_src" name="image_src">
                    </div>
                    <div class="col-12">
                      <label for="kategori_code" class="form-label">Kategori</label>
                      <select class="form-control" name="kategori_code" id="kategori_code">
                      <?php
                        $sql = mysqli_query($conn, "select * from master_data where tipe = 'kategori' order by kode asc");
                        while($row = mysqli_fetch_array($sql))
                        {
                          ?>
                            <option class="form-control" value="<?php echo $row['kode'];?>"><?php echo $row['nama'];?></option>
                          <?php
                        }
                      ?>
                      </select>
                      <!-- <input type="text" class="form-control" id="kategori_code" name="kategori_code"> -->
                    </div>
                    <div class="col-12">
                      <div class="col-12">
                        <label for="berita" class="form-label">Berita</label>
                        <div id="editor">
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <textarea style="display:none" id="berita" name="berita"></textarea>
                    </div>
                    <div class="text-center">
                      <button class="btn btn-danger"><a href="./streaming.php">Batal</a></button>
                      <button type="sumbit" class="btn btn-primary">Tambah Data</button>
                    </div>
                  </form><!-- Vertical Form -->
                </div>
              </div>
            <?php
          }else if($add == "kategori"){
            ?>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tambah Data Kategori Berita</h5>
                <form class="row g-3" action="tambah_act.php" method="post">
                  <input type="hidden" name="add" id="add" value="<?php echo $add;?>"/>
                  <div class="col-12">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori"/>
                  </div>
                  <div class="col-12">
                      <label for="deskripsi" class="form-label">Deskripsi</label>
                      <textarea  class="form-control" id="deskripsi" name="deskripsi"></textarea>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-danger"><a href="./kategori_berita.php">Batal</a></button>
                    <button type="sumbit" class="btn btn-primary">Tambah Data</button>
                  </div>
                </form><!-- Vertical Form -->
              </div>
            </div>
          <?php
          }
        ?>
          </div>  
     </div>
    </section>

  </main><!-- End #main -->
</div>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>MUI-TV</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    var toolbarOptions = [
      [{ 'font': [] }],
      ['bold', 'italic', 'underline'],
      ['blockquote', 'code-block'],
      [{ 'list': 'ordered'}, { 'list': 'bullet' }],
      [{ 'align': [] }],
      ['omega']
    ];

    var quill = new Quill('#editor', {
      modules: {
        toolbar: toolbarOptions
      },
      theme: 'snow'
    });
    quill.on('text-change', function(delta, oldDelta, source) {
      var myEditor = document.querySelector('#editor')
      var html = myEditor.children[0].innerHTML
      console.log(html)
      $("#berita").val(html);
    });
  </script>
</body>

</html> 