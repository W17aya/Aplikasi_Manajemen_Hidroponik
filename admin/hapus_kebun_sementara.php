<?php

// koneksi database
include 'connection.php';
 
// menangkap data id yang di kirim dari url
$kode_kebun = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($con,"DELETE FROM kebun_sementara WHERE id='$kode_kebun'");

 
// mengalihkan halaman kembali ke index.php
header("location:input_kebun.php");
 
?>