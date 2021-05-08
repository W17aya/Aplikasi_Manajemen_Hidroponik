<?php

// koneksi database
include 'connection.php';
 
// menangkap data id yang di kirim dari url
$id_pembelian = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($con,"DELETE FROM pembelian WHERE id_pembelian='$id_pembelian'");
mysqli_query($con,"DELETE FROM rincian_pembelian WHERE id_pembelian='$id_pembelian'");
 
// mengalihkan halaman kembali ke index.php
echo "<script>alert('Data Berhasil Dihapus');window.location.href='form_pembelian.php';</script>";
 
?>