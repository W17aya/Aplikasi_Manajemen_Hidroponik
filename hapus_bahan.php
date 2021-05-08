<?php

// koneksi database
include 'connection.php';
 
// menangkap data id yang di kirim dari url
$kode_bahan = $_GET['id'];
  
 
// menghapus data dari database
mysqli_query($con,"DELETE FROM bahan WHERE kode_bahan='$kode_bahan'");
 
// mengalihkan halaman kembali ke index.php

echo "<script>alert('Data Berhasil Dihapus');window.location.href='form_bahan.php';</script>";
 
?>