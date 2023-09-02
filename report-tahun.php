<?php include 'db_conn.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Annual Report</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
</head>


<body>
	<div class="container">
		<center><h2> Annual Report</h2></center>
		<br>
    
    <div class="float-right">
    
        <?php  
        include 'db_conn.php';
        if(isset($_POST['Tahun'])) {
            $tahun = $_POST['Tahun'];
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM visitorvisit INNER JOIN visitorhead ON visitorvisit.idVisitor = visitorhead.idVisitor WHERE visitorvisit.Tahun LIKE '%".$tahun."%' LIMIT 1");
        } else {
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM visitorvisit INNER JOIN visitorhead ON visitorvisit.idVisitor = visitorhead.idVisitor");
        }
        while($d = mysqli_fetch_array($data)){
         ?>
            
        <?php
        }
         ?>    
         <form method="post" action="report-tahunan.php">
            <input type="hidden" name="Year" id="" value="<?php echo $_POST['Tahun'] ?? ''; ?>">
            <button type="submit" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp PRINT</button>
         </form>
         <br><br>
         <!-- <a href="laporanup.php" target="_blank" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp PRINT</a> -->
    
		

</div>
        <form action="report-tahun.php" method="POST">
            <div class="form-group mx-sm-3 mb-2">
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

                if(isset($_POST['Tahun'])) {
                    $tahun = $_POST['Tahun'];
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
	</div>
	
	
</body>
</html>