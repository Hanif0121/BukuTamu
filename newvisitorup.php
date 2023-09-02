<?php
include "db_conn.php";

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['create'])){

    global $conn;
    $idVisitor = $_POST["idVisitor"];
	$visitDate =  date('Y-m-d');
    $visitPurpose =  $_POST["visitPurpose"];
    $whosVisited =  $_POST["whosVisited"];
    date_default_timezone_set('Asia/Jakarta');
    $clockIn =  date('H:i:s');
    $clockOut = '';
    $Bulannocaps = date('F');
    $Bulan =  strtoupper($Bulannocaps); 
    $Tahun = date('Y');
    $aktif = $_POST["aktif"];
    $Devisi = $_POST["Devisi"];
    $sql = "INSERT INTO `visitorvisit`  VALUES ('', '$visitDate', '$visitPurpose', '$whosVisited', '$Devisi' ,'$clockIn','$clockOut', '$Bulan' , '$Tahun' ,'$aktif','$idVisitor')";
    $query = mysqli_query($conn, $sql);
    
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: checkout.php?status=succes');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: checkout.php?status=failed');
    }

}else {
    die("Failed");
}
?> 