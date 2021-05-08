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
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script type="text/javascript" src="vendor/chartjs/Chart.js"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php include 'sidebar.php'; 
        include 'connection.php';
 


 

  ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

<?php include 'header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Laporan Penjualan</h1>
           </div>
           

   

          <div class="row">

           
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
      
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Penjualan</h6>
                  
                </div>
             
                <div class="card-body ">
                  <form action="cetak_penjualan.php" method="get" target="_blank">
<table class="table">
  <tr>
  <td>
      <div class="form-group">Dari Tanggal</div>
</td>
  <td align="center" width="5%">
      <div class="form-group">:</div>
</td>
  <td>
      <div class="form-group">
        <input type="date" class="form-control" name="tanggal_a" required>
      </div>
</td>
  </tr>
  <tr>
  <td>
      <div class="form-group">Sampai Tanggal</div>
</td>
  <td align="center" width="5%">
      <div class="form-group">:</div>
</td>
  <td>
      <div class="form-group">
        <input type="date" class="form-control" name="tanggal_b" required>
      </div>
</td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td>
      <input type="submit" name="cetak_penjualan" class="btn btn-primary" value="Cetak">
    </td>
  </tr>

</table>
  </form>
                

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
