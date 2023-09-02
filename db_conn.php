<?php
$servername = "localhost";
$database = "kerjaprojek2";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);


if(!$conn){
  die("Koneksi Gagal : ".mysqli_connect_error());
}else {
  
}
?>
