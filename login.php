<?php
   session_start();
   require_once("connection.php");
   $username = $_POST['username'];
   $pass = $_POST['password'];
   $level = $_POST['level'];
   $cekuser = mysqli_query($con, "SELECT * FROM login WHERE username = '$username'");
   $cek = mysqli_num_rows($cekuser);


   if($cek > 0){
 
    $data = mysqli_fetch_assoc($cekuser);
   
    // cek jika user login sebagai admin
    if($data['level']=="admin"){
   
      // buat session login dan username
      $_SESSION['username'] = $username;
      $_SESSION['level'] = "admin";
      // alihkan ke halaman dashboard admin
      header("location:admin/index.php");
   
    // cek jika user login sebagai pegawai
    }else if($data['level']=="user"){
      // buat session login dan username
      $_SESSION['username'] = $username;
      $_SESSION['level'] = "user";
      // alihkan ke halaman dashboard pegawai
      header("location:dashboard.php");
   
    }else{
   
      // alihkan ke halaman login kembali
      header("location:index.php?pesan=gagal");
    }	
  }else{
    header("location:index.php?pesan=gagal");
  }
?>