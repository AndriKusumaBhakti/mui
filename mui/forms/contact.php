<?php

  // ini_set( 'display_errors', 1 );   

  // error_reporting( E_ALL );  

  // $from = $_POST['email'];    

  // $to = "muikotabekasi27@gmail.com";    

  // $subject = $_POST['subject'];    

  // $message = $_POST['message'];   

  // $headers = "From:" . $_POST['name'];    

  // mail($to,$subject,$message, $headers);    

  // // echo "Pesan email sudah terkirim.";

  // header("location:../index.php");



  ini_set( 'display_errors', 1 );   

  error_reporting( E_ALL );  

  $to = "muikotabekasi27@gmail.com";    

  $from = "srv117.niagahoster.com";    

  $subject = $_POST['subject'];    

  $message = $_POST['message'];   

  $headers = "From: ". $_POST['name'] . "-".$_POST['email'];    

  if(mail($to,$subject,$message, $headers)){

    echo "OK";

  } else{

    echo "Pesan email gagal terkirim.";

  }   

?>

