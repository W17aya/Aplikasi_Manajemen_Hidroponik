<?php

// koneksi database
include 'connection.php';
 
// menangkap data id yang di kirim dari url
$kode_kategori = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($con,"DELETE FROM kategori WHERE kode_kategori='$kode_kategori'");
 
// mengalihkan halaman kembali ke index.php

echo "<script>alert('Data Berhasil Dihapus');window.location.href='form_kategori.php';</script>";
?>