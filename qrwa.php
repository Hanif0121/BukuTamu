<?php
// https://www.malasngoding.com
// memanggil library php qrcode
include "phpqrcode/qrlib.php"; 
 
// isi qrcode yang ingin dibuat. akan muncul saat di scan
$data = "https://wa.me/6287885786766"; // Ganti dengan nomor WhatsApp Anda

QRcode::png($data); 
 
// perintah untuk membuat qrcode dan menampilkannya secara langsung dengan format .PNG
?>
