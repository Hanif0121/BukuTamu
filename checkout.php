
<?php
require 'checkoutup.php';
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



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Check Out</title>
    <link rel="stylesheet" href="checkout.css">
  </head>
  <body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <nav class="navbar navbar-expand-custom navbar-mainbg">
        <a class="navbar-brand navbar-logo">Bakrie Pipe Industri</a>
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
                <li class="nav-item">
                    <a class="nav-link" href="lobby.php"><i class="fas fa-tachometer-alt"></i>Check In</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="checkout.php"><i class="far fa-address-book"></i>Check Out</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="report.php"><i class="far fa-clone"></i>Monthly report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="report-tahun.php"><i class="far fa-clone"></i>Annual report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"  data-toggle="modal" data-target="#logout"><i class="far fa-calendar-alt"></i>Logout </a>
                </li>
                <div class="modal fade" id="logout" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
      
        <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Logout</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
          
            <!-- Modal body -->
                <div class="modal-body">
                   <h5>are you sure you want to logout</h5>      
                </div>

          <!-- Modal footer -->
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger" name="upload"><a href="logout.php" style="color:white; text-decoration:none; ">Logout</a></button>
                </form>
                  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                </div>   
              </div>
            </div>
          </div>
             
            </ul>
        </div>
    </nav>
    <br><br>
  
    <br>    
    <div class="container-fluid"> 
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        // import file database.php untuk menggunakan fungsi di dalamnya
        include "db_conn.php";
        $sql = mysqli_query($conn , "SELECT * FROM visitorvisit INNER JOIN visitorhead ON visitorvisit.idVisitor = visitorhead.idVisitor WHERE visitorvisit.aktif=0");
        while($data=mysqli_fetch_array($sql)){
        ?>
        <div class="col">
          <div class="card h-100">
            <img src="Gambar/<?php echo $data['visitorPhotos']; ?>" class="card-img-top" alt="..." style="border-radius: 50%; height: 13vw; width: 13vw; margin-left: 9.5vw;">
              <div class="card-body">
                <h5 class="card-title"><?php echo $data['visitorName']; ?></h5>
                <p class="card-text"><?php echo $data['companyName']; ?></p>
              </div>
              <div class="card-footer">
              <a href="#" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#profil<?php echo $data['idVisit']; ?>">Profile
              </a>
                <a href="#" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $data['idVisit']; ?>">Check Out
              </a>

              </div>
          </div>
        </div>

        <div class="modal fade" id="profil<?php echo $data['idVisit']; ?>" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
      
        <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Profile <?php echo $data['visitorName'] ?></h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
          
            <!-- Modal body -->
                <div class="modal-body">
                  <form role="form" action="" method="POST">
                    <?php
                    $idVisit = $data['idVisit']; 
                    $Profile = "SELECT * FROM visitorvisit INNER JOIN visitorhead  ON visitorvisit.idVisitor = visitorhead.idVisitor WHERE visitorvisit.idVisit='$idVisit'";
                    $queryProfile = mysqli_query($conn, $Profile);
                    $PROFILE = mysqli_fetch_array($queryProfile);
                    ?>   
                   <label for="">Visitor Name</label><br>
                  <input type="text"  class="form-control" value="<?php echo $PROFILE['visitorName']; ?>" disabled><br>
                  <label for="">Company Name</label><br>
                  <input type="text"  class="form-control" value="<?php echo $PROFILE['companyName']; ?>" disabled><br>
                  <label for="">Visitor Photos</label><br>
                  <img src="Gambar/<?php echo $PROFILE['visitorPhotos'];?>" class="img-thumbnail"  alt="..." style="width:150px; height:150px;"> <br><br><br>
                  <table class="table table-striped">
                  <thead>
                      <tr>
                          <th scope="col">Visit Date</th>
                          <th scope="col">Visit Purpose</th>
                          <th scope="col">Whos Visited</th>
                          <th scope="col">Devision</th>
                          <th scope="col">Check In</th>
                      </tr>
                  </thead>
                  <tbody>

                      <tr>
                          <td><?php echo $PROFILE['visitDate']; ?></td>
                          <td><?php echo $PROFILE['visitPurpose']; ?></td>
                          <td><?php echo $PROFILE['whosVisited']; ?></td>
                          <td><?php echo $PROFILE['Devisi']; ?></td>
                          <td><?php echo $PROFILE['clockIn']; ?></td>
                      </tr>
                  </tbody>
              </table>

                </div>

          <!-- Modal footer -->
                <div class="modal-footer">
                </form>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>   
              </div>
            </div>
          </div>


        <div class="modal fade" id="myModal<?php echo $data['idVisit']; ?>" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
      
        <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Checkout <?php echo $data['visitorName'] ?></h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
          
            <!-- Modal body -->
                <div class="modal-body">
                  <form role="form" action="" method="POST">
                    <?php
                    $idVisit = $data['idVisit']; 
                    $edit = "SELECT * FROM visitorvisit INNER JOIN visitorhead  ON visitorvisit.idVisitor = visitorhead.idVisitor WHERE visitorvisit.idVisit='$idVisit'";
                    $queryEdit = mysqli_query($conn, $edit);
                    $Edit = mysqli_fetch_array($queryEdit);
                    ?>   

                <input type="hidden" class="form-control" name="idVisit" value="<?php echo $Edit['idVisit'];  ?>" >

                <h5>Are you sure you want to check out <?php echo $Edit['visitorName'] ?> ?</h5>                


                <!-- <label for="" class="form-label" style="color: black;">Visitor Date</label> <br> -->
                <input type="hidden" class="form-control" name="visitDate" value="<?php echo $Edit['visitDate'];  ?>" >
            
                <!-- <label for="" class="form-label" style="color: black;">Visit Purpose</label> -->
                <input type="hidden" class="form-control" name="visitPurpose" value="<?php echo $Edit['visitPurpose'];  ?>" >
            
                <!-- <label for="" class="form-label" style="color: black;">Who Visited</label> -->
                <input type="hidden" class="form-control" name="whosVisited" value="<?php echo $Edit['whosVisited'];  ?>" >
            
                <!-- <label for="" class="form-label" style="color: black;">Clock In</label> -->
                <input type="hidden" class="form-control" name="clockIn" value="<?php echo $Edit['clockIn'];  ?>" >    
                
                <input type="hidden" name="aktif" value="1">
                
                </div>

          <!-- Modal footer -->
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger" name="upload">OUT</button>
                </form>
                  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                </div>   
              </div>
            </div>
          </div>
    <?php
    }
    ?>
      </div>
        
    <script src="checkout.js"></script>
  </body>
</html>