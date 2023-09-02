<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'db_conn.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($conn,"SELECT * from admin where username='$username' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:lobby.php");
}else{
	header("location:index.php?login=failed");
	echo "login Gagal";
}
?>