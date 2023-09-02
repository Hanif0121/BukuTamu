<?php
if(isset($_FILES['image'])) {
    $file = $_FILES['image']['tmp_name'];
    $filename = 'Gambar/'.uniqid().'.png';
    move_uploaded_file($file, $filename);
    echo $filename;
}
?>