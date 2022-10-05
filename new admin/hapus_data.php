<?php 
	include './config.php';
	$form_db = $_GET['from'];
	$id = $_GET['id'];
	$halaman = "dashboard";
	if($form_db == "kategori"){
		$form_db = "master_data";
		$halaman = "kategori_berita";
	}else if($form_db == "streaming"){
		$form_db = "m_channel_youtobe";
		$halaman = "streaming";
	}else if($form_db == "berita"){
		$form_db = "berita";
		$halaman = "berita";
	}else if($form_db == "komentar"){
		$form_db = "komentar";
		$halaman = "komentar";
	}
	$query_to_db = "DELETE FROM $form_db WHERE id = '$id'";
	if(mysqli_query($conn, $query_to_db)){
		header("Location: https://admin.muitvkotabekasi.com/$halaman.php");
	} else{
		header("Location: https://admin.muitvkotabekasi.com/$halaman.php?pesan=gagal_hapus");
	}
 ?>