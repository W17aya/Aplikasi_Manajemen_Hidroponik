<?php

// koneksi database
include 'connection.php';
 
// menangkap data id yang di kirim dari url
$kode_penanaman = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($con,"DELETE FROM penanaman WHERE kode_penanaman='$kode_penanaman'");
mysqli_query($con,"DELETE FROM rincian_penanaman WHERE kode_penanaman='$kode_penanaman'");
 
// mengalihkan halaman kembali ke index.php
echo "<script>alert('Data Berhasil Dihapus');window.location.href='form_penanaman.php';</script>";
 
?>