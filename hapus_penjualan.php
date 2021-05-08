<?php

// koneksi database
include 'connection.php';
 
// menangkap data id yang di kirim dari url
$kode_penjualan = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($con,"DELETE FROM penjualan WHERE kode_penjualan='$kode_penjualan'");
 
// mengalihkan halaman kembali ke index.php
echo "<script>alert('Data Berhasil Dihapus');window.location.href='form_penjualan.php';</script>";

?>