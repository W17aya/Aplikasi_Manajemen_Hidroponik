<?php

// koneksi database
include 'connection.php';
 
// menangkap data id yang di kirim dari url
$kode_kebun = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($con,"DELETE FROM kebun WHERE kode_kebun='$kode_kebun'");
mysqli_query($con,"DELETE FROM rincian_kebun WHERE kode_kebun='$kode_kebun'");
 
// mengalihkan halaman kembali ke index.php

echo "<script>alert('Data Berhasil Dihapus');window.location.href='form_kebun.php';</script>";
?>