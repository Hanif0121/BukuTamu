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
    <title>Dashboard Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<style>
		#snap {
			display: none;
		}
	</style>
  <script>
        $(document).ready(function(){
            $('#nama').change(function(){
                var selectedNama = $(this).val();
                
                // Mengirim permintaan Ajax ke get_devisi.php
                $.ajax({
                    url: 'devisi.php',
                    type: 'GET',
                    data: { nama: selectedNama },
                    dataType: 'json',
                    success: function(response){
                        // Memperbarui nilai value dari input devisi
                        $('#devisi').val(response[0]);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        console.log(error);
                    }
                });
            });
        });
    </script>

    
         <script>
        $(document).ready(function(){
    $('.namakaryawan').change(function(){
        var selectedNama = $(this).val();
        var currentDiv = $(this).closest('.modal-body').find('.devision');
        
        // Mengirim permintaan Ajax ke get_devisi.php
        $.ajax({
            url: 'get_devisi.php',
            type: 'GET',
            data: { namakaryawan: selectedNama },
            dataType: 'json',
            success: function(response){
                // Memperbarui nilai value dari input devisi
                currentDiv.val(response[0]);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                console.log(error);
            }
        });
    });
});
    </script>
    <link rel="stylesheet" href="Lobby.css">
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
                <li class="nav-item active">
                    <a class="nav-link" href="javascript:void(0);"><i class="fas fa-tachometer-alt"></i>Check In</a>
                </li>
                <li class="nav-item">
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
    <div class="container-fluid">
        <h3>Visit</h3>
        <div class="lingkaran" href="newvisit.php"></a></div>
        <a  href="#" data-toggle="modal" data-target="#createVisitor"><i class="fa fa-plus" aria-hidden="true" style="color: white; margin-left: 68px; margin-top: -23px; display: flex; text-decoration: none;"></i></a>
        <div class="modal fade" id="createVisitor" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
      
        <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Creater Visitor</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
          
            <!-- Modal body -->
                <div class="modal-body">
                  <form role="form" action="" method="POST"  enctype="multipart/form-data">      

                      <label for="" class="form-label" style="color: black;">Visitor Name</label> <br>
					            <input type="text" class="form-control" name="visitorName"  required>

				
					            <label for="" class="form-label" style="color: black;">Company Name</label>
					            <input type="text" class="form-control" name="companyName" required>
                      <br>
                      <div id="video-container" style="margin-left :135px;">
                        <video id="video" width="200" height="100" autoplay></video>
                      </div>

                      <div class="d-grid gap-2 col-6 mx-auto">
                      <button class="btn btn-success btn-sm" id="toggle">Turn On</button> 
	                    <button class="btn btn-warning btn-sm" id="snap">Capture</button>
                      </div>

	                    

                      <br><br>
					            <label for="" class="form-label" style="color: black;">Visitor Photos</label>
					            <input type="file" class="form-control" name="visitorPhotos" required>

                      <label for="" class="form-label" style="color: black;">Visit Purpose</label>
                      <input type="text" class="form-control" name="visitPurpose" required>
            
                    <label for="nama" name="whosVisited" class="from-label">whosVisited</label>
                        <select id="nama" name="whosVisited" class="form-select">
                         <option value=""></option> 
                        <?php 
                        include 'db_conn.php';
                        $DevisiData = mysqli_query($conn, "SELECT * FROM karyawan") ;
                        while ($Devisi=mysqli_fetch_array($DevisiData)) {
                        ?>
                        <option value="<?php echo $Devisi['Nama_Karyawan'] ?>"><?php echo $Devisi['Nama_Karyawan']?></option>
                        <!-- Tambahkan opsi nama lainnya sesuai kebutuhan -->
                        <?php 
                        }
                        ?>
                   </select>

                    <br>
                    <label for="devisi" class="form-label" style="color: black;">Division</label>
                    <input type="text" class="form-control" name="Devisi" id="devisi"  readonly>

                    <input type="hidden" name="aktif" value="0">
              
                </div>

          <!-- Modal footer -->
                <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="upload">Create</button>
                </form>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>   
              </div>
            </div>
          </div>
    
    
      </div>
    <br>
    <div class="container-fluid">
      <form action="lobby.php" method="get">
        <label>Cari :</label>
        <input type="text" name="cari">
        <input type="submit" value="Cari">
      </form>
 
      <?php 
      if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        echo "<b>Hasil pencarian : ".$cari."</b>";
      }
      ?>
      <br><br>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        // import file database.php untuk menggunakan fungsi di dalamnya
        include "db_conn.php";
          if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            $sql = mysqli_query($conn, "SELECT * from visitorhead   where visitorName  like '%".$cari."%' ");				
          }else{
            $sql = mysqli_query($conn, "SELECT * from visitorhead ORDER BY idVisitor desc");		
          }
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
              <a href="#" type="button" class="btn btn-secondary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $data['idVisitor']; ?>">Check In</a>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Profile<?php echo $data['idVisitor']; ?>"> Profile</button>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete<?php echo $data['idVisitor']; ?>">Delete</button>
              </div>
            </div>  
          </div>




          <div class="modal fade" id="myModal<?php echo $data['idVisitor']; ?>" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
      
        <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Create Visit <?php echo $data['visitorName']; ?></h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
          
            <!-- Modal body -->
                <div class="modal-body">
                  <form role="form" action="newvisitorup.php" method="POST">   
                    <input type="hidden" name="idVisitor" id="" value="<?php echo $data['idVisitor']; ?>">
                  
                  <label for="" class="form-label" style="color: black;">Visit Purpose</label>
                  <input type="text" class="form-control" name="visitPurpose" required>
            
            
                  <label for="namakaryawan" name="whosVisited" class="from-label">whosVisited</label>
  <select class="namakaryawan form-select" name="whosVisited">
    <option value=""></option> 
    <?php 
    include 'db_conn.php';
    $DataDevisi = mysqli_query($conn, "SELECT * FROM karyawan");
    while ($DevisiKaryawan = mysqli_fetch_array($DataDevisi)) {
    ?>
    <option value="<?php echo $DevisiKaryawan['Nama_Karyawan'] ?>"><?php echo $DevisiKaryawan['Nama_Karyawan']?></option>
    <!-- Tambahkan opsi nama lainnya sesuai kebutuhan -->
    <?php 
    }
    ?>
</select>
<label for="devision" class="form-label" style="color: black;">Division</label>
<input type="text" class="devision form-control" name="Devisi" readonly>
            
                  <input type="hidden" name="aktif" value="0">
              
                </div>

          <!-- Modal footer -->
                <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="create" >Create</button>
                </form>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>   
              </div>
            </div>
          </div>





          
          <div class="modal fade" id="Profile<?php echo $data['idVisitor']; ?>" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
      
        <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Profile <?php echo $data['visitorName']; ?></h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
          
            <!-- Modal body -->
                <div class="modal-body">   
                <?php
                  $idVisit = $data['idVisitor']; 
                  $history = "SELECT * FROM visitorhead LEFT JOIN visitorvisit ON visitorhead.idVisitor = visitorvisit.idVisitor WHERE visitorhead.idVisitor = '$idVisit'";
                  $queryProfile = mysqli_query($conn, $history);
                  $Profile = mysqli_fetch_array($queryProfile);
                ?>
                  <label for="">Visitor Name</label><br>
                  <input type="text"  class="form-control" value="<?php echo $Profile['visitorName']; ?>" disabled><br>
                  <label for="">Company Name</label><br>
                  <input type="text"  class="form-control" value="<?php echo $Profile['companyName']; ?>" disabled><br>
                  <label for="">Visitor Photos</label><br>
                  <img src="Gambar/<?php echo $Profile['visitorPhotos'];?>" class="img-thumbnail"  alt="..." > <br><br><br>

                <table class="table table-striped">
                  <thead>
                      <tr>
                          <th scope="col">Visit Date</th>
                          <th scope="col">Visit Purpose</th>
                          <th scope="col">Whos Visited</th>
                          <th scope="col">Devision</th>
                          <th scope="col">Check In</th>
                          <th scope="col">Check Out</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                          mysqli_data_seek($queryProfile, 0); // set kursor data kembali ke baris pertama
                          while($Profile = mysqli_fetch_array($queryProfile)) {
                      ?>
                      <tr>
                          <td><?php echo $Profile['visitDate']; ?></td>
                          <td><?php echo $Profile['visitPurpose']; ?></td>
                          <td><?php echo $Profile['whosVisited']; ?></td>
                          <td><?php echo $Profile['Devisi']; ?></td>
                          <td><?php echo $Profile['clockIn']; ?></td>
                          <td><?php echo $Profile['clockOut']; ?></td>
                      </tr>
                      <?php
                          }
                      ?>
                  </tbody>
              </table>

                
                </div>

          <!-- Modal footer -->
                <div class="modal-footer">
          
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>   
              </div>
            </div>
          </div>
          
          <div class="modal fade" id="Delete<?php echo $data['idVisitor']; ?>" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
      
        <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Delete <?php echo $data['visitorName']; ?></h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
          
            <!-- Modal body -->
                <div class="modal-body">   
                <?php
                  $idVisit = $data['idVisitor']; 
                  $Hapus = "SELECT * FROM visitorhead where visitorhead.idVisitor = '$idVisit'";
                  $Delete = mysqli_query($conn, $Hapus);
                  $DELETE = mysqli_fetch_array($Delete);
                ?>
                <form action="Delete.php" method="post">
                  <input type="hidden" name="idVisitor" id="" value="<?php echo $DELETE['idVisitor'] ?>">
                <h4>Are you sure you want to delete <?php echo $DELETE['visitorName']; ?></h4>
                

                
                </div>

          <!-- Modal footer -->
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                </form>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                </div>   
              </div>
            </div>
          </div>
          <?php

}
?>
    <script>
		var video = document.querySelector("#video");
		var canvas = document.createElement("canvas");
		var context = canvas.getContext("2d");
		var isStreaming = false;

		document.querySelector("#toggle").addEventListener("click", function() {
			if (!isStreaming) {
				navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
					video.srcObject = stream;
					video.play();
					isStreaming = true;
					document.querySelector("#toggle").innerText = "Turn Off";
					document.querySelector("#snap").style.display = "block";
				}).catch(function(error) {
					console.log("Error getting user media: " + error);
				});
			} else {
				video.pause();
				video.srcObject = null;
				isStreaming = false;
				document.querySelector("#toggle").innerText = "Turn On";
				document.querySelector("#snap").style.display = "none";
				document.querySelector("#output").src = "#";
			}
		});

		document.querySelector("#snap").addEventListener("click", function() {
			if (isStreaming) {
				canvas.width = video.videoWidth;
				canvas.height = video.videoHeight;
				context.drawImage(video, 0, 0, canvas.width, canvas.height);
				canvas.toBlob(function(blob) {
					var formData = new FormData();
					formData.append("image", blob, "image.jpg");
					$.ajax({
						type: "POST",
						url: "save.php",
						data: formData,
						processData: false,
						contentType: false,
						success: function(msg) {
							alert("Image saved: " + msg);
							document.querySelector("#file-input").value = "";
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.log("Error saving image: " + textStatus + ", " + errorThrown);
						}
					});
					var url = URL.createObjectURL(blob);
					document.querySelector("#output").src = url;
					document.querySelector("#output").style.display = "block";
					document.querySelector("#file-input").files = [blob];
				});
			} else {
				document.querySelector("#output").src = "#";
				document.querySelector("#output").style.display = "none";
				document.querySelector("#file-input").value = "";
			}
		});
	</script>
    <script src="lobby.js"></script>
  </body>
</html>