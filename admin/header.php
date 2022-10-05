<?php 
	session_start();
	include 'cek.php';
	include 'config.php';
	?>
<!DOCTYPE html>
<html>
<head>
	<title>MUI-TV Kota Bekasi</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>	
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="https://admin.youngs-export.com/index_admin.php" class="navbar-brand">MUI-TV Kota Bekasi</a>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy , <?php echo $_SESSION['username']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Beranda</a></li>
			<li><a href="jadwal_video.php"><span class="glyphicon glyphicon-time"></span>  Jadwal Video Streaming</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-th-list"></span>  Kategori Berita</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-tags"></span>  Berita</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-file"></span>  Link Media Sosial</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-inbox"></span>  Komentar</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Keluar</a></li>			
		</ul>
	</div>
	<div class="col-md-10">