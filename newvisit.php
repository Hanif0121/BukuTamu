<?php
require 'newvisitup.php';
if(isset($_POST["upload"])){
	if( tambah($_POST) < 0){
        echo "
            <script>
                alert  ('no data added!');
                document.location.href = 'lobby.php';
            </script>
        ";
    } else {
        echo "<script>
        alert  ('data has been added!');
        document.location.href = 'lobby.php';
    </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="newvisit.css">

</head>
<body>

    <div class="sigin">
        <form action="" method="POST" enctype="multipart/form-data">
            <h1 align="center" style="color:black;">New Visitor</h1><br>
        <div class="mb-8"> 
                    <label for="" class="form-label" style="color: black;">Visitor Name</label> <br>
					<input type="text" class="form-control" name="visitorName"  required>
                </div>
				<div class="mb-8">
					<label for="" class="form-label" style="color: black;">Company Name</label>
					<input type="text" class="form-control" name="companyName" required>
				</div>
				<div class="mb-8">
					<label for="" class="form-label" style="color: black;">Identity Card</label>
					<input type="file" class="form-control" name="identitycard" required>
				</div>
                
				<div class="mb-8">
					<label for="" class="form-label" style="color: black;">Visitor Photos</label>
					<input type="file" class="form-control" name="visitorPhotos" required>
				</div>
                <br>
                <button class="btn btn-success" href="index.php"><a href="lobby.php">Back</a></button>
                <button type="submit" class="btn btn-success" name="upload">Send</button>
        </form>
    </div>

</body>
</html>
