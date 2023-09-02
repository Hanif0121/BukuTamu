<!DOCTYPE html>
<html>
<head>
    <title>Contoh Combo Box dan Ajax</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#namakaryawan').change(function(){
                var selectedNama = $(this).val();
                
                // Mengirim permintaan Ajax ke get_devisi.php
                $.ajax({
                    url: 'get_devisi.php',
                    type: 'GET',
                    data: { namakaryawan: selectedNama },
                    dataType: 'json',
                    success: function(response){
                        // Memperbarui nilai value dari input devisi
                        $('#devision').val(response[0]);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        console.log(error);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <label for="namakaryawan" name="whosVisited" class="from-label">whosVisited</label>
    <select id="namakaryawan" name="whosVisited" class="form-select">
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
    <br>
    <label for="devision" class="form-label" style="color: black;">Division</label>
    <input type="text" class="form-control" name="Devisi" id="devision" readonly>
</body>
</html>
