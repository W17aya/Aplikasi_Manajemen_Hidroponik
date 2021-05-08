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
   $query = mysqli_query($con, "SELECT max(id_laba) as id_laba FROM laba");
   $data = mysqli_fetch_array($query);
   $kodeLaba = $data['id_laba'];
  
   // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
   // dan diubah ke integer dengan (int)
   $urutan = (int) substr($kodeLaba, 3, 3);
  
   // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
   $urutan++;
  
   // membentuk kode barang baru
   // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
   // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
   // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
   $huruf = "TR-";
   $kodeLaba = $huruf . sprintf("%03s", $urutan);
   
  

if (isset($_POST['Submit'])) {
      $id_laba = $_POST['id_laba'];
      $kode_tanaman = $_POST['kode_tanaman'];
      $tanggal_laba = $_POST['tanggal_laba']; 

      $pen = mysqli_query($con, "SELECT * FROM penanaman 
     WHERE kode_tanaman='$kode_tanaman' ");
while ($a = mysqli_fetch_array($pen))
{ $b = $a['total']; 
  $kode_penanaman = $a['kode_penanaman']; 
}

     $pj = mysqli_query($con, "SELECT * FROM penjualan 
     WHERE kode_tanaman='$kode_tanaman' ");
        
      while ($c = mysqli_fetch_array($pj))
      { $d = $c['total_jual']; 
        $kode_penjualan  = $c['kode_penjualan']; 

      }

$total = $d - $b;

mysqli_query($con, "INSERT INTO laba(id_laba,kode_tanaman,kode_penanaman,kode_penjualan,total_laba,tanggal_laba) 
 VALUES('$id_laba','$kode_tanaman','$kode_penanaman','$kode_penjualan','$total','$tanggal_laba')");


echo "<script>alert('Data Berhasil Diproses');window.location.href='form_keuntungan.php';</script>";

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
        
        ?>



        <!-- Begin Page Content -->
        <div class="container-fluid">
        
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Keuntungan Hasil Transaksi</h1>
                      </div>
                      
        
        <!-- Content Row -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
          <a href="form_keuntungan.php?; ?>" style="margin-bottom:20px" class="btn btn-primary col-md-2"><span class="fas fa-arrow-left fa-sm text-white-50"></span> Kembali </a>

                    </div>
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-7">
              <div class="card-body">
              <h3 class="panel-title">Tambah Perhitungan Keuntungan Hasil Transaksi</h3>
      
    <div class="card-body">
        <form method="post" action="input_laba.php" class="form-horizontal">

        <div class="form-group">
            <label for="id_laba" class="col-sm-2  control-label">Id Laba</label>
 <div class="col-sm-2">
     <input type="text" class="form-control"  value="<?php echo $kodeLaba; ?>" name="id_laba" disabled required>
     <input type="hidden" name="id_laba" id="kode_penjualan" value="<?php echo $kodeLaba; ?>" />
        </div>
                </div>

                <div class="form-group">
    <label for="tanggal_laba" class="col-sm-12 control-label">Tanggal </label>
              <div class="col-sm-10">
                  <input type="date" class="form-control" name="tanggal_laba" 
                  >
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
