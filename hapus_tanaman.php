<?php

// koneksi database
include 'connection.php';
 
// menangkap data id yang di kirim dari url
$kode_tanaman = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($con,"DELETE FROM tanaman WHERE kode_tanaman='$kode_tanaman'");
 
// mengalihkan halaman kembali ke index.php
echo "<script>alert('Data Berhasil Dihapus');window.location.href='form_tanaman.php';</script>";
 
?>