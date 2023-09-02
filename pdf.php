<?php
require_once __DIR__ . '/fpdf/fpdf.php';

class PDF extends FPDF {
   // Fungsi untuk mengatur header
   function Header() {
       // Masukkan kode untuk header di sini
       // Misalnya, logo dan teks header
       $this->Image('Gambar/logobakrie.png', 10, 10, 30);
       $this->SetFont('Arial', 'B', 12);
       $this->Cell(0, 10, 'Bakrie Pipe Industries', 0, 0, 'C');
       $this->Ln(20); // Jarak antara header dan konten
   }

   // Fungsi untuk mengatur footer
   function Footer() {
       // Masukkan kode untuk footer di sini
       // Misalnya, nomor halaman
       $this->SetY(-15); // Posisi dari bawah halaman
       $this->SetFont('Arial', 'I', 8);
       $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
   }

   // Fungsi untuk mengatur konten
   function Content() {
       // Masukkan kode untuk konten di sini
       // Misalnya, tabel data
       $this->SetFont('Arial', 'B', 12);
       $this->Cell(0, 10, 'Monthly Report', 0, 1, 'C');

       // Tambahkan kode HTML yang Anda berikan di dalam <div class="main"></div>
       $html = '
           <table class="table table-bordered">
               <thead>
                   <tr>
                       <th style="text-align: center;">NO</th>
                       <th style="text-align: center;">Visitor Name</th>
                       <th style="text-align: center;">Company Name</th>
                       <th>Photos</th>
                       <th style="text-align: center;">Visit Date</th>
                       <th style="text-align: center;">Visit Purpose</th>
                       <th style="text-align: center;">Whos Visited</th>
                       <th style="text-align: center;">Check In</th>
                       <th style="text-align: center;">Check Out</th>
                   </tr>
               </thead>
               <tbody>';

       include 'db_conn.php';

       if (isset($_POST['Month']) && isset($_POST['Year'])) {
           $bulan = $_POST['Month'];
           $tahun = $_POST['Year'];
           $no = 1;
           $data = mysqli_query($conn, "SELECT * FROM visitorvisit INNER JOIN visitorhead ON visitorvisit.idVisitor = visitorhead.idVisitor WHERE visitorvisit.Bulan LIKE '%" . $bulan . "%' AND visitorvisit.Tahun LIKE '%" . $tahun . "%'");
       } else {
           $no = 1;
           $data = mysqli_query($conn, "SELECT * FROM visitorvisit INNER JOIN visitorhead ON visitorvisit.idVisitor = visitorhead.idVisitor");
       }

       while ($d = mysqli_fetch_array($data)) {
           $html .= '
               <tr>
                   <td style="text-align:center;  vertical-align: middle;">' . $no++ . '</td>
                   <td style="text-align:center;  vertical-align: middle;">' . $d['visitorName'] . '</td>
                   <td style="text-align:center;  vertical-align: middle;">' . $d['companyName'] . '</td>
                   <td style="text-align:center;  vertical-align: middle;"><img src="Gambar/' . $d['visitorPhotos'] . '" width="70px" height="70px" ></td>
                   <td style="text-align:center;  vertical-align: middle;">' . $d['visitDate'] . '</td>
                   <td style="text-align:center;  vertical-align: middle;">' . $d['visitPurpose'] . '</td>
                   <td style="text-align:center;  vertical-align: middle;">' . $d['whosVisited'] . '</td>
                   <td style="text-align:center;  vertical-align: middle;">' . $d['clockIn'] . '</td>
                   <td style="text-align:center;  vertical-align: middle;">' . $d['clockOut'] . '</td>
               </tr>';
       }

       $html .= '
               </tbody>
           </table>';

       // Konversi HTML menjadi PDF menggunakan FPDF
       $this->SetFont('Arial', '', 12);
       $this->WriteHTML($html);
   }

   // Fungsi untuk menulis HTML ke PDF
   function WriteHTML($html) {
       $html = strip_tags($html);

       // Pemisahan tag <br> menjadi baris baru
       $html = str_replace('<br>', "\n", $html);

       // Pemisahan tag <p> menjadi baris baru
       $html = str_replace('<p>', "\n", $html);

       // Pemisahan tag <hr> menjadi garis horizontal
       $html = str_replace('<hr>', '-----------------', $html);

       // Memisahkan tag <table> menjadi baris-baris tabel
       $html = str_replace('</table>', "\n", $html);
       $html = str_replace('<tr>', "\n", $html);
       $html = str_replace('</tr>', "\n", $html);
       $html = str_replace('<td>', '', $html);
       $html = str_replace('</td>', "\t", $html);

       // Menulis teks ke PDF
       $this->Write(5, $html);
   }
}

$pdf = new PDF();
$pdf->AliasNbPages(); // Digunakan untuk menampilkan total halaman di footer
$pdf->AddPage();
$pdf->Header();
$pdf->Content();
$pdf->Footer();
$pdf->Output();
?>
