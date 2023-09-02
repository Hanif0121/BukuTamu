<?php
include "fpdf.php";
//membuat objek baru bernama pdf
$pdf = new FPDF();
//membuat halaman baru
$pdf->AddPage();
//menyeting jenis font, bold, dan ukuran
$pdf->SetFont('Arial','B',16);
//menyeting tata letak tulisan
$pdf->Cell(40,10,'Hello World!');
//menampilkan tulisan
$pdf->Output();
?>