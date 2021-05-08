<?php

// koneksi database
include 'connection.php';
 
// menangkap data id yang di kirim dari url
$id_penanaman = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($con,"DELETE FROM penanaman_sementara WHERE id='$id_penanaman'");

 
// mengalihkan halaman kembali ke index.php
header("location:input_penanaman.php");
 
?>