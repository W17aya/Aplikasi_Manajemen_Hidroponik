<?php

// koneksi database
include 'connection.php';
 
// menangkap data id yang di kirim dari url
$kode_panen = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($con,"DELETE FROM panen WHERE kode_panen='$kode_panen'");
 
// mengalihkan halaman kembali ke index.php
echo "<script>alert('Data Berhasil Dihapus');window.location.href='form_hasil_penanaman.php';</script>";

?>