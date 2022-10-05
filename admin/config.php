<?php 
    $servername = "srv55.niagahoster.com";
    $username = "n1585592_mui";
    $password = "MUI310822";
    $dbname = "n1585592_mui_connect";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>