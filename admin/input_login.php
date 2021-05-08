<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Hidroponik</title>
  <link rel="icon" type="image/png" href="logincss/images/icons/favicon.ico"/>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php include "connection.php";
 
 	// mengambil data barang dengan kode paling besar
   $query = mysqli_query($con, "SELECT max(id) as id_login FROM login");
   $data = mysqli_fetch_array($query);
   $kodelogin = $data['id_login'];
   $kodelogin++;



   


  if (isset($_POST['Submit'])) {
      $nama = $_POST['nama'];
      $no_ktp = $_POST['no_ktp'];
      $alamat = $_POST['alamat'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $tempat_lahir = $_POST['tempat_lahir'];
      $tanggal_lahir = $_POST['tanggal_lahir'];
      $status = $_POST['status'];
      $statuss = "non aktif";

      
    $result = mysqli_query($con, "INSERT INTO login(nama_akun,username,password,tempat_lahir,tgl_lahir,level,status,no_ktp,alamat) 
    VALUES('$nama','$username','$password','$tempat_lahir','$tanggal_lahir','$status','$statuss','$no_ktp','$alamat')"); 

echo "<script>alert('Akun Berhasil Dibuat');window.location.href='index.php';</script>";

    }

   
    ?>



<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">



        <!-- Begin Page Content -->
        <div class="container-fluid">
        
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Akun</h1>
                      </div>
                      
        
        <!-- Content Row -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
          <a href="index.php?; ?>" style="margin-bottom:20px" class="btn btn-primary col-md-2"><span class="fas fa-arrow-left fa-sm text-white-50"></span> Kembali </a>

                    </div>
 
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-7">
              <div class="card-body">
              <h3 class="panel-title">Daftar Akun Baru</h3>
      
    <div class="card-body">
        <form method="post" action="input_login.php" class="form-horizontal">
       
        
                


 

            
          <div class="form-group">
              <label for="nama" class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" 
                  placeholder="Masukkan Nama" ></div></div> 
            
          <div class="form-group">
              <label for="alamat" class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="alamat" 
                  placeholder="Masukkan Alamat" ></div></div> 
            
          <div class="form-group">
              <label for="no_ktp" class="col-sm-2 control-label">No KTP</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="no_ktp" 
                  placeholder="Masukkan No KTP" ></div></div> 

          <div class="form-group">
              <label for="username" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="username" 
                  placeholder="Masukkan Username" ></div></div> 

                  <div class="form-group">
              <label for="total_harga" class="col-sm-4 control-label">Password</label>
              <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" 
                  placeholder="Password" ></div></div> 
                  
          <div class="form-group">
              <label for="tempat_lahir" class="col-sm-2 control-label">Tempat Lahir</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="tempat_lahir" 
                  placeholder="Masukkan Tempat Lahir" ></div></div> 

                  <div class="form-group">
    <label for="tanggal" class="col-sm-2 control-label">Tanggal Lahir </label>
              <div class="col-sm-10">
                  <input type="date" class="form-control" name="tanggal_lahir" 
                  >
                  </div>
                  </div>


                  <div class="form-group">
              <label  class="col-sm-2 control-label">Status</label>
              <div class="col-sm-10">
              <select name="status"  class="form-control">
					<option>Admin</option>
					<option>User</option>

				</select>
                </div>
            </div>


                  

                

<div class="form-group"><div class="col-sm-offset-2 col-sm-10">
                  <label></label>
                <input type="submit" name="Submit" class="btn btn-primary" value="Simpan">
                </div>  
                </div>               

            </form>
              </div>
            </div>

            
                
                  
          </div>

          <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-7">

              


                  </div>
                </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
