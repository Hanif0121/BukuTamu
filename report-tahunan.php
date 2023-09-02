
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Annual Report</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- CSS for repeating header -->
    <style>
    </style>
</head>


<body>

<!-- Header -->
<div class="page-header">
    <img src="Gambar/logobakrie.png" alt="" width="150px">
    <center><h2>BAKRIE PIPE INDUSTRIES</h2></center>
    <center><p>Jl. Raya, RT.004/RW.003, Pejuang, Kecamatan Medan Satria, Kota Bks, Jawa Barat 17131</p></center>
    <hr>
</div>

<br><br>
<div class="container">

<center><h2>GUEST DATA ANNUAL REPORT ON <?php include 'db_conn.php';

if(isset($_POST['Year'])) {
    $tahun = $_POST['Year'];
    $no = 1;
    $data = mysqli_query($conn, "SELECT * FROM visitorvisit INNER JOIN visitorhead ON visitorvisit.idVisitor = visitorhead.idVisitor WHERE   visitorvisit.Tahun LIKE '%".$tahun."%' LIMIT 1");
}else {
    $no = 1;
    $data = mysqli_query($conn, "SELECT * FROM visitorvisit INNER JOIN visitorhead ON visitorvisit.idVisitor = visitorhead.idVisitor");
} while($d = mysqli_fetch_array($data)){
    ?> <?php echo $d['Tahun']?> <?php } ?> </h2></center>
<br><br>
<div class="main">
  <table class="table table-bordered">
    <thead>				
      <tr>
        <th style="text-align: center;">NO</th>
        <th style="text-align: center;">Visitor Name</th>
        <th style="text-align: center;">Company Name</th>
        <th style="text-align: center;">Visit Date</th>
        <th style="text-align: center;">Visit Purpose</th>
        <th style="text-align: center;">Whos Visited</th>
        <th style="text-align: center;">Division</th>				
        <th style="text-align: center;">Check In</th>			
        <th style="text-align: center;">Check Out</th>	
      </tr>				
    </thead>
    <tbody>
      <?php
      include 'db_conn.php';

      if( isset($_POST['Year'])) {
        $tahun = $_POST['Year'];
        $no = 1;
        $data = mysqli_query($conn, "SELECT * FROM visitorvisit INNER JOIN visitorhead ON visitorvisit.idVisitor = visitorhead.idVisitor WHERE visitorvisit.Tahun LIKE '%".$tahun."%'");
      }else {
        $no = 1;
        $data = mysqli_query($conn, "SELECT * FROM visitorvisit INNER JOIN visitorhead ON visitorvisit.idVisitor = visitorhead.idVisitor");
      }
      
      while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td style="text-align:center;  vertical-align: middle;"><?php echo $no++; ?></td>
        <td style="text-align:center;  vertical-align: middle;"><?php echo $d['visitorName'] ?> </td>
        <td style="text-align:center;  vertical-align: middle;"><?php echo $d['companyName'] ?> </td>
        <td style="text-align:center;  vertical-align: middle;"><?php echo $d['visitDate'] ?></td>	
        <td style="text-align:center;  vertical-align: middle;"><?php echo $d['visitPurpose'] ?></td>
        <td style="text-align:center;  vertical-align: middle;"><?php echo $d['whosVisited'] ?></td>
        <td style="text-align:center;  vertical-align: middle;"><?php echo $d['Devisi'] ?></td>
        <td style="text-align:center;  vertical-align: middle;"><?php echo $d['clockIn'] ?></td>	
        <td style="text-align:center;  vertical-align: middle;"><?php echo $d['clockOut'] ?></td>				
      </tr>
      <?php
      }
      ?>				
    </tbody>
  </table>
  <br>
  <div class="mengetahui" align="right">
      
    <h6 style="text-decoration:bold;">Bekasi, <?php echo date('d-m-Y')?></h6>
    <p style="margin-right:24px;">Head of security</p> <br><br><br>
    <p style="margin-right:7px;">(Daffa Rahwiyansa)</p>
  </div>
</div>

<script>

window.print();

</script>

</body>

</html>