<?php 
$host = "localhost";
$db = "snazmelo_store";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
  die("connection lost" . $conn->connect_error);
}else{
    // print_r("working");
}
$url = "http://localhost/Snazmelo-Store";

?>