<?php 
	session_start();
	include 'config.php';
	$uname=$_POST['username'];
	$pass=$_POST['password'];
	$pas=md5($pass);
	$query=mysqli_query($conn, "select * from user where username_admin='$uname' and password_admin=md5('$pass')")or die(mysql_error());
	if(mysqli_num_rows($query)==1){
		$_SESSION['username']=$uname;
		header("location:dashboard.php");
	}else{
		header("location:..?pesan=gagal")or die(mysql_error());
	}
 ?>