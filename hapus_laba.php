<?php

// koneksi database
include 'connection.php';
 
// menangkap data id yang di kirim dari url
$id_laba = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($con,"DELETE FROM laba WHERE id_laba='$id_laba'");

 
// mengalihkan halaman kembali ke index.php

echo "<script>alert('Data Berhasil Dihapus');window.location.href='form_keuntungan.php';</script>";

?>