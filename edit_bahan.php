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
  $kode_bahan = $_POST['kode_bahan'];
  $nama_bahan = $_POST['nama_bahan'];
  $kode_kategori = $_POST['kode_kategori'];
  $stok = $_POST['stok'];

  
$result = mysqli_query($con, "UPDATE bahan
 SET kode_bahan='$kode_bahan', nama_bahan='$nama_bahan', nama_bahan='$nama_bahan', stok='$stok', kode_kategori='$kode_kategori' 
 WHERE kode_bahan='$kode_bahan' ");

header("location:form_bahan.php");
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
            <h1 class="h3 mb-0 text-gray-800">Bahan</h1>
                      </div>
                      
        
        <!-- Content Row -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
          <a href="form_bahan.php?; ?>" style="margin-bottom:20px" class="btn btn-primary col-md-2"><span class="fas fa-arrow-left fa-sm text-white-50"></span> Kembali </a>

                    </div>
 
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-7">
              <div class="card-body">
              <h3 class="panel-title">Edit Data Bahan</h3>
      
    <div class="card-body">
        <form method="post" action="edit_bahan.php" class="form-horizontal">
       
        <?php
$id=$_GET['id'];
$d = mysqli_query($con, "SELECT * FROM bahan 
INNER JOIN kategori ON bahan.kode_kategori = kategori.kode_kategori
WHERE kode_bahan='$id'"); 
while($data=mysqli_fetch_array($d)){
?>					
                

        <div class="form-group">
            <label for="kode_bahan" class="col-sm-6  control-label">Kode Bahan</label>
 <div class="col-sm-2">
     <input type="text" class="form-control"   value="<?php echo $data['kode_bahan'] ?>" name="kode_bahan"  required>
     <input type="hidden" name="kode_bahan" id="kode_bahan"  value="<?php echo $data['kode_bahan'] ?>" />
        </div>
 

            
          <div class="form-group">
              <label for="nama_bahan" class="col-sm-2 control-label">Nama Bahan</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_bahan" 
                  value="<?php echo $data['nama_bahan'] ?>" ></div></div> 

                  <div class="form-group">
              <label  class="col-sm-2 control-label">Kategori</label>
              <div class="col-sm-10">
              <select name="kode_kategori"  class="form-control">
					<option>- Pilih Kategori -</option>
        <?php
				$query = "select * from kategori";
					$hasil = mysqli_query($con,$query);
			while ($qtabel = mysqli_fetch_array($hasil))
				{
				echo '<option value="'.$qtabel['kode_kategori'].'">'.$qtabel['nama_kategori'].'</option>';				
				}
				?>
				</select>
                </div>
            </div>

          <div class="form-group">
              <label for="total_harga" class="col-sm-2 control-label">Stok Bahan</label>
              <div class="col-sm-10">
                  <input type="number" class="form-control" name="stok" 
                  value="<?php echo $data['stok'] ?>" disabled
                    ></div></div> 

     <?php
}
?>             

                

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
