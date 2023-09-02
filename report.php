<?php include 'db_conn.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Monthly Report</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
</head>


<body>
	<div class="container">
		<center><h2> Monthly Report</h2></center>
		<br>
    
    <div class="float-right">
    
        <?php  
        include 'db_conn.php';
        if(isset($_POST['Bulan']) && isset($_POST['Tahun'])) {
            
            $bulan = $_POST['Bulan'];
            $tahun = $_POST['Tahun'];
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM visitorvisit INNER JOIN visitorhead ON visitorvisit.idVisitor = visitorhead.idVisitor WHERE visitorvisit.Bulan LIKE '%".$bulan."%' AND visitorvisit.Tahun LIKE '%".$tahun."%' LIMIT 1"); $data = mysqli_query($conn, "SELECT * FROM visitorvisit INNER JOIN visitorhead ON visitorvisit.idVisitor = visitorhead.idVisitor WHERE visitorvisit.Bulan LIKE '%".$bulan."%' AND visitorvisit.Tahun LIKE '%".$tahun."%' LIMIT 1");
        } else {
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM visitorvisit INNER JOIN visitorhead ON visitorvisit.idVisitor = visitorhead.idVisitor");
        }
        while($d = mysqli_fetch_array($data)){
         ?>
            
        <?php
        }
         ?>    
         <form method="post" action="reportup.php">
            <input type="hidden" name="Month" id="" value="<?php echo $_POST['Bulan'] ?? ''; ?>">
            <input type="hidden" name="Year" id="" value="<?php echo $_POST['Tahun'] ?? ''; ?>">
            <button type="submit" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp PRINT</button>
         </form>
         <br><br>
         <!-- <a href="laporanup.php" target="_blank" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp PRINT</a> -->
    
		

</div>
        <form action="report.php" method="POST">
            <div class="form-group mx-sm-3 mb-2">
                <select class="" id="bulan" name="Bulan" style="border-radius:3px; height:35px; width :100px;">
                    <option value="JANUARY" <?php if(isset($_POST['Bulan']) && $_POST['Bulan'] == 'JANUARY') echo 'selected'; ?>>January</option>
                    <option value="FEBUARY" <?php if(isset($_POST['Bulan']) && $_POST['Bulan'] == 'FEBUARY') echo 'selected'; ?>>February</option>
                    <option value="MARCH" <?php if(isset($_POST['Bulan']) && $_POST['Bulan'] == 'MARCH') echo 'selected'; ?>>March</option>
                    <option value="APRIL"<?php if(isset($_POST['Bulan']) && $_POST['Bulan'] == 'APRIL') echo 'selected'; ?> >April</option>
                    <option value="MAY" <?php if(isset($_POST['Bulan']) && $_POST['Bulan'] == 'MAY') echo 'selected'; ?>>May</option>
                    <option value="JUNE" <?php if(isset($_POST['Bulan']) && $_POST['Bulan'] == 'JUNE') echo 'selected'; ?>>June</option>
                    <option value="JULY" <?php if(isset($_POST['Bulan']) && $_POST['Bulan'] == 'JULY') echo 'selected'; ?>>July</option>
                    <option value="AUGUST" <?php if(isset($_POST['Bulan']) && $_POST['Bulan'] == 'AUGUST') echo 'selected'; ?>>August</option>
                    <option value="SEPTEMBER" <?php if(isset($_POST['Bulan']) && $_POST['Bulan'] == 'SEPTEMBER') echo 'selected'; ?>>September</option>
                    <option value="OCTOBER" <?php if(isset($_POST['Bulan']) && $_POST['Bulan'] == 'OCTOBER') echo 'selected'; ?>>October</option>
                    <option value="NOVEMBER"<?php if(isset($_POST['Bulan']) && $_POST['Bulan'] == 'NOVEMBER') echo 'selected'; ?> >November</option>
                    <option value="DECEMBER"<?php if(isset($_POST['Bulan']) && $_POST['Bulan'] == 'DECEMBER') echo 'selected'; ?>>December</option>
                </select>
                <select class="" id="tahun" name="Tahun" style="border-radius:3px; height:35px; width :100px;">
                    <option value="2019" <?php if(isset($_POST['Tahun']) && $_POST['Tahun'] == '2019') echo 'selected'; ?>>2019</option>
                    <option value="2020" <?php if(isset($_POST['Tahun']) && $_POST['Tahun'] == '2020') echo 'selected'; ?>>2020</option>
                    <option value="2021" <?php if(isset($_POST['Tahun']) && $_POST['Tahun'] == '2021') echo 'selected'; ?>>2021</option>
                    <option value="2022"<?php if(isset($_POST['Tahun']) && $_POST['Tahun'] == '2022') echo 'selected'; ?> >2022</option>
                    <option value="2023" <?php if(isset($_POST['Tahun']) && $_POST['Tahun'] == '2023') echo 'selected'; ?>>2023</option>
                </select>
                <button type="submit" value="Filter" class="btn btn-primary">Filter</button>
            </div>
        </form>

        


		<table class="table table-bordered">
			<thead>				
				<tr>
                    <th>NO</th>
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

                if(isset($_POST['Bulan']) && isset($_POST['Tahun'])) {
                    $bulan = $_POST['Bulan'];
                    $tahun = $_POST['Tahun'];
                    $no = 1;
                    $data = mysqli_query($conn, "SELECT * FROM visitorvisit INNER JOIN visitorhead ON visitorvisit.idVisitor = visitorhead.idVisitor WHERE visitorvisit.Bulan LIKE '%".$bulan."%' AND visitorvisit.Tahun LIKE '%".$tahun."%'");
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
	</div>
	
	
</body>
</html>