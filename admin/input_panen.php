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
   $query = mysqli_query($con, "SELECT max(kode_panen) as kode_panen FROM panen");
   $data = mysqli_fetch_array($query);
   $kodePanen = $data['kode_panen'];
  
   // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
   // dan diubah ke integer dengan (int)
   $urutan = (int) substr($kodePanen, 3, 3);
  
   // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
   $urutan++;
  
   // membentuk kode barang baru
   // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
   // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
   // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
   $huruf = "PN-";
   $kodePanen = $huruf . sprintf("%03s", $urutan);
   


if (isset($_POST['Submit'])) {
      $kode_panen = $_POST['kode_panen'];
      $kode_penanaman = $_POST['kode_penanaman'];
      $kode_tanaman = $_POST['kode_tanaman'];
      $tanggal_panen = $_POST['tanggal_panen']; 
      $jumlah = $_POST['jumlah']; 
      $status = "Ready" ;



      mysqli_query($con, "UPDATE tanaman
SET stok=stok + '$jumlah', status='$status' WHERE kode_tanaman='$kode_tanaman' ");


mysqli_query($con, "INSERT INTO panen(kode_panen,kode_penanaman,kode_tanaman,jumlah,tanggal_panen) 
 VALUES('$kode_panen','$kode_penanaman','$kode_tanaman','$jumlah','$tanggal_panen')");


echo "<script>alert('Data Berhasil Disimpan');window.location.href='form_hasil_penanaman.php';</script>";
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
            <h1 class="h3 mb-0 text-gray-800">  Panen</h1>
                      </div>
                      
        
        <!-- Content Row -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
          <a href="form_hasil_penanaman.php?; ?>" style="margin-bottom:20px" class="btn btn-primary col-md-2"><span class="fas fa-arrow-left fa-sm text-white-50"></span> Kembali </a>

                    </div>
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-7">
              <div class="card-body">
              <h3 class="panel-title">Tambah Data Panen</h3>
      
    <div class="card-body">
        <form method="post" action="input_panen.php" class="form-horizontal">

        <div class="form-group">
            <label for="kode_panen" class="col-sm-2  control-label">Kode Panen</label>
 <div class="col-sm-2">
     <input type="text" class="form-control"  value="<?php echo $kodePanen; ?>" name="kode_panen" disabled required>
     <input type="hidden" name="kode_panen" id="kode_panen" value="<?php echo $kodePanen; ?>" />
        </div>
                </div>

                <div class="form-group">
    <label for="tanggal_panen" class="col-sm-2 control-label">Tanggal </label>
              <div class="col-sm-10">
                  <input type="date" class="form-control" name="tanggal_panen" 
                  >
                  </div>
                  </div>

          <div class="form-group">
              <label  class="col-sm-2 control-label">Kode Penanaman</label>
              <div class="col-sm-10">
              <select name="kode_penanaman"  class="form-control">
					<option>- Pilih Kode Penanaman -</option>
        <?php
				$query = "select * from penanaman";
					$hasil = mysqli_query($con,$query);
			while ($qtabel = mysqli_fetch_array($hasil))
				{
				echo '<option value="'.$qtabel['kode_penanaman'].'">'.$qtabel['kode_penanaman'].'</option>';				
				}
				?>
				</select>
                </div>
            </div> 
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
              <label for="jumlah" class="col-sm-2 control-label">Jumlah (Kg)</label>
              <div class="col-sm-10">
                  <input type="number" class="form-control" name="jumlah" 
                  placeholder="0" ></div></div> 

                  

                  
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
