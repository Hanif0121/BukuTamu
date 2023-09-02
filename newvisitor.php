<?php
require 'newvisitorup.php';
if(isset($_POST["upload"])){
	if( tambah($_POST) < 0){
        echo "
            <script>
                alert  ('no data added!');
                document.location.href = 'checkout.php';
            </script>
        ";
    } else {
        echo "<script>
        alert  ('data has been added!');
        document.location.href = 'checkout.php';
    </script>";
    }
}
?>

<?php
include 'db_conn.php';
$idVisitor = (int) $_GET['idVisitor']; 
$sql = "SELECT * FROM visitorhead WHERE visitorhead.idVisitor='$idVisitor'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
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
  <link rel="stylesheet" href="newvisitor.css">

</head>
<body>

    <div class="sigin">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="idVisitor" id="" value="<?php echo $data['idVisitor']; ?>">
            <h3 style="color:black;" align="center">New Visit</h3><br>
            <h6 style="color:black;">Name : <?php echo $data['visitorName']; ?></h6><br>
            <div class="mb-8">
                <label for="" class="form-label" style="color: black;">Visit Purpose</label>
                <input type="text" class="form-control" name="visitPurpose">
            </div>
            <div class="mb-8">
                <label for="" class="form-label" style="color: black;">Who Visited</label>
                <input type="text" class="form-control" name="whosVisited">
            </div>
            <input type="hidden" name="aktif" value="0">
            <br>
            <button type="button"><a href="lobby.php" style="color:black; text-decoration:none;">Back</a></button>
            <button type="submit" class="btn btn-success" name="upload">Send</button>
        </form>
    </div>
</body>
</html>

