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
 

if (isset($_POST['Submit'])) {
      $kode_tanaman = $_POST['kode_tanaman'];
      $jumlah_rugi = $_POST['jumlah_rugi']; 
      $status = $_POST['status'];
      $status1="Ready";
      $status2="Habis";

      $q = mysqli_query($con, "SELECT * FROM `tanaman` WHERE kode_tanaman='$kode_tanaman'") or die(mysqli_error());
      $b = mysqli_fetch_array($q);
      $c = $b['stok'];

    if ($c<$jumlah_rugi){
        echo "<script>alert('Maaf Stok Tanaman Kurang!! Stok Tersedia adalah $c pcs');window.location.href='input_rugi.php';</script>";
      }

    else if ($c-$jumlah_rugi==0){
      mysqli_query($con, "UPDATE tanaman
SET stok=stok - '$jumlah_rugi', status='$status2' WHERE kode_tanaman='$kode_tanaman' ");

mysqli_query($con, "INSERT INTO rugi(kode_tanaman,jumlah_rugi,status_rugi) 
 VALUES('$kode_tanaman','$jumlah_rugi','$status')");

echo "<script>alert('Data Berhasil Disimpan');window.location.href='form_rugi.php';</script>";

    }

    else{
      mysqli_query($con, "UPDATE tanaman
SET stok=stok - '$jumlah_rugi', status='$status1' WHERE kode_tanaman='$kode_tanaman' ");

mysqli_query($con, "INSERT INTO rugi(kode_tanaman,jumlah_rugi,status_rugi) 
 VALUES('$kode_tanaman','$jumlah_rugi','$status')");


echo "<script>alert('Data Berhasil Disimpan');window.location.href='form_rugi.php';</script>";

    }
  }
    ?>



<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php include 'sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

<?php include 'header.php'; 
        
        $d = mysqli_query($con, "SELECT * FROM tanaman WHERE kode_tanaman"); 
        while($data=mysqli_fetch_array($d)){}
        ?>



        <!-- Begin Page Content -->
        <div class="container-fluid">
        
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">  Kerugian</h1>
                      </div>
                      
        
        <!-- Content Row -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
          <a href="form_rugi.php?; ?>" style="margin-bottom:20px" class="btn btn-primary col-md-2"><span class="fas fa-arrow-left fa-sm text-white-50"></span> Kembali </a>

                    </div>
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-7">
              <div class="card-body">
              <h3 class="panel-title">Tambah Data Kerugian</h3>
      
    <div class="card-body">
        <form method="post" action="input_rugi.php" class="form-horizontal">



          
          <div class="form-group">
              <label  class="col-sm-2 control-label">Nama Tanaman</label>
              <div class="col-sm-10">
              <select name="kode_tanaman"  class="form-control">
					<option>- Pilih Tanaman -</option>
        <?php
				$query = "select * from tanaman";
					$hasil = mysqli_query($con,$query);
			while ($qtabel = mysqli_fetch_array($hasil))
				{
				echo '<option value="'.$qtabel['kode_tanaman'].'">'.$qtabel['nama_tanaman'].'</option>';				
				}
				?>
				</select>
                </div>
            </div> 
  
          <div class="form-group">
              <label for="jumlah_rugi" class="col-sm-2 control-label">Jumlah Kerugian (Kg)</label>
              <div class="col-sm-10">
                  <input type="number" class="form-control" name="jumlah_rugi" 
                  placeholder="0" ></div></div> 

                  <div class="form-group">
              <label  class="col-sm-2 control-label">Status</label>
              <div class="col-sm-10">
              <select name="status"  class="form-control">
					<option>Busuk</option>
					<option>Rusak</option>
				</select>
                </div>
            </div>  

                  
   </div>



<div class="form-group"><div class="col-sm-offset-2 col-sm-10">
                  <label></label>
                <input type="submit" name="Submit" class="btn btn-primary" value="Simpan Proses">
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
