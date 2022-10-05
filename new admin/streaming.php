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
      <li class="nav-item">
        <a class="nav-link" href="streaming.php">
          <i class="bi bi-badge-hd"></i>
          <span>Video Streaming</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="kategori_berita.php">
          <i class="bi bi-journal-text"></i>
          <span>Kategori Berita</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="berita.php">
          <i class="bi bi-journal-album "></i>
          <span>Berita</span>
        </a>
      </li>
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
        <a class="nav-link collapsed" href="#" onclick="if(confirm('Apakah anda yakin ingin keluar ??')){ location.href='keluar.php'}"  target="_blank">
          <i class="bi bi-power"></i>
          <span>Keluar</span>
        </a>
      </li>
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Streaming Video</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Streaming Video</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
     <div class="row">
     <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title"><span>Streaming Video</span></h5>
                  <form action="tambah_data.php" method="post">
                    <input type="hidden" name="add" id="add" value="<?php echo 'streaming';?>"/>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                  </form>
                  <br>
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-3">Link</th>
                        <th class="col-md-3">Link Embed</th>
                        <th class="col-md-2">Judul</th>
                        <th class="col-md-3">Deskripsi</th>
                        <th class="col-md-2">Jam Tanyang</th>
                        <th class="col-md-1">Aksi</th>
                      </tr>
                    </thead>


                    <tbody>
                    <?php 
                      $brg=mysqli_query($conn, "select * from m_channel_youtobe");
                      $no=1;
                      while($b=mysqli_fetch_array($brg)){
                        ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><a href = "<?php echo $b['link_channel'] ?>"><?php echo $b['link_channel'] ?></a></td>
                          <td><a href = "<?php echo $b['link_channel_web'] ?>"><?php echo $b['link_channel_web'] ?></a></td>
                          <td><?php echo $b['judul'] ?></td>
                          <td><?php echo $b['description'] ?></td>
                          <td><?php echo $b['time_from_show'];?> - <?php echo $b['time_to_show'];?></td>
                          <td>
                            <form action="edit_data.php" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo $b['id'];?>"/>
                                <input type="hidden" name="update" id="update" value="<?php echo 'streaming';?>"/>
                                <button type="submit" class="bi bi-pencil-square"></button>
                            </form>
                            <form action="hapus_data.php" method="get">
                                <input type="hidden" name="id" id="id" value="<?php echo $b['id'];?>"/>
                                <input type="hidden" name="from" id="from" value="<?php echo 'streaming';?>"/>
                                <button type="submit"  class="bi bi-trash-fill"></button>
                            </form>
                          </td>
                        </tr>		
                        <?php 
                      }
                    ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div>
     </div>
    </section>

  </main><!-- End #main -->
  <div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Barang Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_brg_act.php" method="post">
					<div class="form-group">
						<label>Nama Barang</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Barang ..">
					</div>
					<div class="form-group">
						<label>Jenis</label>
						<input name="jenis" type="text" class="form-control" placeholder="Jenis Barang ..">
					</div>
					<div class="form-group">
						<label>Suplier</label>
						<input name="suplier" type="text" class="form-control" placeholder="Suplier ..">
					</div>
					<div class="form-group">
						<label>Harga Modal</label>
						<input name="modal" type="text" class="form-control" placeholder="Modal per unit">
					</div>	
					<div class="form-group">
						<label>Harga Jual</label>
						<input name="harga" type="text" class="form-control" placeholder="Harga Jual per unit">
					</div>	
					<div class="form-group">
						<label>Jumlah</label>
						<input name="jumlah" type="text" class="form-control" placeholder="Jumlah">
					</div>																	

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>