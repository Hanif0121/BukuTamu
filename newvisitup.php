<?php
include 'db_conn.php';

function kirim(){
    $namafile = $_FILES['visitorPhotos']['name'];
    $ukuranfile = $_FILES['visitorPhotos']['size'];
    $error = $_FILES['visitorPhotos']['error'];
    $tmpname = $_FILES['visitorPhotos']['tmp_name'];



    // cek apakah gambar yg di upload
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));


    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {

        echo "<script>
            alert('Anda tidak mengupload gambar')
        </script>";
        return false;
    }
    // cek jika ukuran terlalu besar
    if ($ukuranfile > 2000000) {

        echo "<script>
            alert('ukuran gambar terlalu besar')
        </script>";
        return false;
    }
    // lolos pengecekan gambar siap di upload
    // generate nama baru gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpname, './Gambar/' . $namaFileBaru);

    return $namaFileBaru;
}


function tambah($data){
    global $conn;

    $visitorName = $_POST['visitorName'];
	$companyName = $_POST['companyName'];

    
    $visitorPhotos= kirim();
    if (!$visitorPhotos){
        return false;
    }

    // query insert data
    $sql = "INSERT INTO `visitorhead` VALUES ('', '$visitorName', '$companyName', '$visitorPhotos')";
    $query=mysqli_query($conn, $sql);    

    $visitDate =  date('Y-m-d');
    $visitPurpose =  $_POST["visitPurpose"];
    $whosVisited =  $_POST["whosVisited"];
    date_default_timezone_set('Asia/Jakarta');
    $clockIn =  date('H:i:s');
    $clockOut = '';
    $Bulannocaps = date('F');
    $Bulan =  strtoupper($Bulannocaps); 
    $Tahun = date('Y');
    $aktif = $_POST['aktif'];
    $Devisi = $_POST['Devisi'];

    $sql = "SELECT max(idVisitor) AS 'idVisitor' FROM `visitorhead` LIMIT 1";
    $query = mysqli_query($conn, $sql);

    $data = mysqli_fetch_array($query);
    $idVisitor = $data['idVisitor'];

    $sqlvisit = "INSERT INTO `visitorvisit`  VALUES ('', '$visitDate', '$visitPurpose', '$whosVisited', '$Devisi' ,'$clockIn','$clockOut', '$Bulan' , '$Tahun' ,'$aktif','$idVisitor')";
    $query = mysqli_query($conn, $sqlvisit);
    
    

}
?>