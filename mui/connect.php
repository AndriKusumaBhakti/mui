<?php

// $servername = "localhost";

// $username = "root";

// $password = "";

// $dbname = "mui";



$servername = "151.106.118.1";

$username = "u1589478_mui";

$password = "MUI310822";

$dbname = "u1589478_mui_connect";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

  die("Connection failed: " . $conn->connect_error);

}
?>