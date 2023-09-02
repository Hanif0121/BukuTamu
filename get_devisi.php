<?php
// Koneksi ke database
include 'db_conn.php';

// Ambil data devisi berdasarkan nama
$nama = $_GET['namakaryawan'];
$query = "SELECT Devisi FROM karyawan WHERE Nama_Karyawan = '$nama'";
$result = mysqli_query($conn, $query);

if ($result) {
    // Format hasil ke dalam array
    $devisi = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $devisi[] = $row['Devisi'];
    }

    // Mengembalikan hasil dalam format JSON
    echo json_encode($devisi);
} else {
    // Handle the case when no data is found
    echo json_encode([]);
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
