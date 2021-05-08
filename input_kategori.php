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
   $query = mysqli_query($con, "SELECT max(kode_kategori) as id_kategori FROM kategori");
   $data = mysqli_fetch_array($query);
   $kodeKategori = $data['id_kategori'];
  
   // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
   // dan diubah ke integer dengan (int)
   $urutan = (int) substr($kodeKategori, 3, 3);
  
   // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
   $urutan++;
  
   // membentuk kode barang baru
   // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
   // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
   // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
   $huruf = "KG-";
   $kodeKategori = $huruf . sprintf("%03s", $urutan);
   


  if (isset($_POST['Submit'])) {
      $kode_kategori = $_POST['kode_kategori'];
      $nama_kategori = $_POST['nama_kategori'];


      
    $result = mysqli_query($con, "INSERT INTO kategori(kode_kategori,nama_kategori) 
    VALUES('$kode_kategori','$nama_kategori')"); 

echo "<script>alert('Data Berhasil Disimpan');window.location.href='form_kategori.php';</script>";




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
            <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
                      </div>
                      
        
        <!-- Content Row -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
          <a href="form_kategori.php?; ?>" style="margin-bottom:20px" class="btn btn-primary col-md-2"><span class="fas fa-arrow-left fa-sm text-white-50"></span> Kembali </a>

                    </div>
 
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-7">
              <div class="card-body">
              <h3 class="panel-title">Tambah Data Kategori</h3>
      
    <div class="card-body">
        <form method="post" action="input_kategori.php" class="form-horizontal">
       
        
                

        <div class="form-group">
            <label for="kode_kategori" class="col-sm-6  control-label">Kode Kategori</label>
 <div class="col-sm-2">
     <input type="text" class="form-control"  value="<?php echo $kodeKategori; ?>" name="kode_kategori" disabled required>
     <input type="hidden" name="kode_kategori" id="kode_kategori" value="<?php echo $kodeKategori; ?>" />
        </div>
 

            
          <div class="form-group">
              <label for="nama_kategori" class="col-sm-2 control-label">Nama Kategori</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_kategori" 
                  placeholder="Masukkan Nama Kategori" ></div></div> 
          


          

                  

                

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
