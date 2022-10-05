<?php

    ini_set( 'display_errors', 1 );   

    error_reporting( E_ALL );    

    $from = "adminmui@muitvkotabekasi.com";    

    $to = "muikotabekasi27@gmail.com ";   

    $subject = $_POST['subject'];    

    $message = $_POST['message'];   

    $headers = "From:" . $_POST['name'];   

    if(mail($to,$subject,$message, $headers)){

      echo "OK";

    } else{

      echo "Pesan email gagal terkirim.";

    }   
?>