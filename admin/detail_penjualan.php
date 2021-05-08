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
<?php include "connection.php";  ?>



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
            <h1 class="h3 mb-0 text-gray-800">Penjualan</h1>
                      </div>
                      
        
        <!-- Content Row -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
          <a href="form_penjualan.php?; ?>" style="margin-bottom:20px" class="btn btn-primary col-md-2"><span class="fas fa-arrow-left fa-sm text-white-50"></span> Kembali </a>

                    </div>

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-7">
              <div class="card-body">
              <h3 class="panel-title">Detail Penjualan</h3>
      
    <div class="card-body">
        <form >

                <?php         

              $id=$_GET['id'];

$det=mysqli_query( $con, "SELECT * FROM penjualan 
INNER JOIN tanaman ON penjualan.kode_tanaman = tanaman.kode_tanaman
WHERE kode_penjualan='$id'")or die(mysql_error());


          while($data2 = mysqli_fetch_array($det)){
            $kode_penjualan = $data2['kode_penjualan'];
            $nama_tanaman = $data2['nama_tanaman'];
            $harga = $data2['harga_satuan'];
            $tanggal_jual = $data2['tanggal_jual'];
            $total = $data2['total_jual'];
            $jumlah = $data2['jumlah'];
            $no = 1;
          }

?>

         <table class="table">
    <tr  >
      <th scope="col">NO</th>
      <td>:</td>
      <td><?php echo $no++; ?></td>
      <tr>
      <th scope="col">KODE PENJUALAN</th>
      <td>:</td>
      <td><?php echo $kode_penjualan; ?></td>
      </tr>
      <tr>
      <th scope="col">NAMA TANAMAN</th>
      <td>:</td>
      <td><?php echo $nama_tanaman; ?></td>
      </tr>
      <tr>
      <th scope="col">TANGGAL PENJUALAN</th>
      <td>:</td>
      <td><?php echo $tanggal_jual; ?></td>
      </tr>
      <tr>
      <th scope="col">JUMLAH</th>
      <td>:</td>
      <td><?php echo $jumlah; ?> Kg</td>
      </tr>
      <tr>
      <th scope="col">HARGA SATUAN</th>
      <td>:</td>
      <td>Rp. <?php echo number_format($harga); ?></td>
      </tr>
      <tr>
      <th scope="col">TOTAL PENJUALAN</th>
      <td>:</td>
      <td>Rp. <?php echo number_format($total); ?></td>
      </tr>




    
  </tbody>
</table>
 


</form>

</div>
              

           
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
