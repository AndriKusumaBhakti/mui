<?php
  ini_set( 'display_errors', 1 );   
  error_reporting( E_ALL );  
  $to = "andrikusumabhakti@gmail.com";    
  $from = "mail@muitvkotabekasi.com";    
  $subject = "Testing";    
  $message = "PHP mail berjalan dengan baik";   
  $headers = "From: Andri";    
  if(mail($to,$subject,$message, $headers)){
    echo "Pesan email sudah terkirim.";
  } else{
    echo "Pesan email gagal terkirim.";
  }   
?>
