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
   $query = mysqli_query($con, "SELECT max(kode_kebun) as id_kebun FROM kebun");
   $data = mysqli_fetch_array($query);
   $kodeKebun = $data['id_kebun'];
  
   // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
   // dan diubah ke integer dengan (int)
   $urutan = (int) substr($kodeKebun, 3, 3);
  
   // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
   $urutan++;
  
   // membentuk kode barang baru
   // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
   // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
   // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
   $huruf = "KB-";
   $kodeKebun = $huruf . sprintf("%03s", $urutan);
   


  if (isset($_POST['Submit'])) {
      $kode_kebun = $_POST['kode_kebun'];
      $nama_kebun = $_POST['nama_kebun'];
      $total_harga = $_POST['total_harga'];

      
    $result = mysqli_query($con, "INSERT INTO kebun(kode_kebun,nama_kebun,total_harga) 
    VALUES('$kode_kebun','$nama_kebun','$total_harga')"); 

 
    header("location:form_kebun.php");
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

<?php include 'header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
        
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Perkebunan</h1>
                      </div>
                      
        
        <!-- Content Row -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
          <a href="form_kebun.php?; ?>" style="margin-bottom:20px" class="btn btn-primary col-md-2"><span class="fas fa-arrow-left fa-sm text-white-50"></span> Kembali </a>

                    </div>
 
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-7">
              <div class="card-body">
              <h3 class="panel-title">Tambah Data Kebun</h3>
      
    <div class="card-body">
        <form method="post" action="input_kebun.php" class="form-horizontal">
       
        
                

        <div class="form-group">
            <label for="id_nota" class="col-sm-6  control-label">Kode Kebun</label>
 <div class="col-sm-2">
     <input type="text" class="form-control"  value="<?php echo $kodeKebun; ?>" name="kode_kebun" disabled required>
     <input type="hidden" name="kode_kebun" id="kode_kebun" value="<?php echo $kodeKebun; ?>" />
        </div>
 

            
          <div class="form-group">
              <label for="nama_kebun" class="col-sm-2 control-label">Nama Kebun</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_kebun" 
                  placeholder="Masukkan Nama Kebun" ></div></div> 

          <div class="form-group">
              <label for="total_harga" class="col-sm-4 control-label">Total Harga Pembuatan</label>
              <div class="col-sm-10">
                  <input type="number" class="form-control" name="total_harga" 
                  placeholder="0" ></div></div> 

                  

                

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
