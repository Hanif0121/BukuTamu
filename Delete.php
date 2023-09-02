<?php
include "db_conn.php";

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['delete'])){

    global $conn;
    $idVisitor = $_POST["idVisitor"];
    
    $sql = "DELETE visitorhead, visitorvisit 
    FROM visitorhead 
    JOIN visitorvisit ON visitorhead.idVisitor = visitorvisit.idVisitor 
    WHERE visitorhead.idVisitor = '$idVisitor'";
    $query = mysqli_query($conn, $sql);


    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: lobby.php?status=succes');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: lobby.php?status=failed');
    }

}else {
    die("Failed");
}
?> 