<?php

// koneksi database
include 'connection.php';
 
// menangkap data id yang di kirim dari url
$id_pembelian = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($con,"DELETE FROM beli_sementara WHERE id='$id_pembelian'");

 
// mengalihkan halaman kembali ke index.php
header("location:input_pembelian.php");
 
?>