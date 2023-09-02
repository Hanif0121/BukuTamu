<?php
include "db_conn.php";
function tambah($data){
    global $conn;
    $idVisit = $_POST["idVisit"];
	$visitDate = $_POST["visitDate"];
	$visitPurpose = $_POST["visitPurpose"];
	$whosVisited = $_POST["whosVisited"];
	$clockIn = $_POST["clockIn"];
    date_default_timezone_set('Asia/Jakarta');
    $clockOut =  date('H:i:s');
    $aktif = $_POST["aktif"];
    $sql = "UPDATE `visitorvisit` SET visitDate='$visitDate', visitPurpose='$visitPurpose', whosVisited='$whosVisited', clockIn='$clockIn', clockOut='$clockOut', aktif='$aktif' WHERE idVisit='$idVisit'";
    $query = mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}
?> 