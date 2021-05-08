<?php

// koneksi database
include 'connection.php';
 
// menangkap data id yang di kirim dari url
$id_akun = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($con,"DELETE FROM login WHERE id='$id_akun'");

 
// mengalihkan halaman kembali ke index.php

echo "<script>alert('Data Berhasil Dihapus');window.location.href='form_user.php';</script>";

?>