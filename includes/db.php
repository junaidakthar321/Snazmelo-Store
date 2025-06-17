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

function getSnazmeloBaseURL() {
  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'
              || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

  $host = $_SERVER['HTTP_HOST'];
  $uri = $_SERVER['REQUEST_URI'];

  // Find position of the folder "Snazmelo-Store"
  $folder = 'Snazmelo-Store';
  $pos = strpos($uri, $folder);

  // If found, extract up to and including that folder
  if ($pos !== false) {
      $path = substr($uri, 0, $pos + strlen($folder) + 1); // +1 for the trailing slash
      return $protocol . $host . $path;
  }

  // Fallback to root
  return $protocol . $host ;
}


$url = getSnazmeloBaseURL();

?>