<?php
    include "../connect.php";
    $beritaid = $_POST["id"];
    $nama = $_POST["name"];
    $email = $_POST["email"];
    $komentar = $_POST["message"];
    $parenkomentar = 'a';
    $datetime = new DateTime(); 
    $tanggal = $datetime->format('Y-m-d G:i:s');
    $sql = "INSERT INTO komentar () VALUES ('','$beritaid','$parenkomentar','$komentar','$nama','$email','$tanggal', '')";

    // try{
    //     $result = mysqli_query($conn, $sql); 
    // } catch (mysqli_sql_exception $e) { 
    //     var_dump($e);
    //     exit; 
    // } 
    if(mysqli_query($conn, $sql)){
        echo "OK";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    // echo $nama;
    // echo $beritaid;
    // echo $email;
    // echo $komentar;
?>
