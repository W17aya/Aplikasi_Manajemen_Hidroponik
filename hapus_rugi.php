<?php

// koneksi database
include 'connection.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($con,"DELETE FROM rugi WHERE id='$id'");
 
// mengalihkan halaman kembali ke index.php
echo "<script>alert('Data Berhasil Dihapus');window.location.href='form_rugi.php';</script>";

?>