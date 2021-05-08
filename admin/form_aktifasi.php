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
            <h1 class="h3 mb-0 text-gray-800">Data Akun Belum Aktivasi</h1>
                      </div>

        
        <!-- Content Row -->
         
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-7">

              <table class="table">
  <thead class="thead-dark">
    <tr align="center">
      <th scope="col">ID AKUN</th>
      <th scope="col">NAMA AKUN</th>
      <th scope="col">USERNAME</th>
      <th scope="col">TEMPAT LAHIR</th>
      <th scope="col">LEVEL</th>
      <th scope="col">STATUS</th>
      <th scope="col">OPSI</th>
    </tr>
  </thead>
  <?php include 'connection.php';
         
          $result =  mysqli_query($con, "SELECT * FROM login WHERE level='user' AND level='user'  AND status='non aktif' ORDER BY id ASC"); 
            $no = 1;
            while($data = mysqli_fetch_array($result)){ 
                ?>
                <tbody>
                <tr align="center">
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['level']; ?></td>
                    <td><?php echo $data['status']; ?></td>

                    <td>
                    
      <a href="edit_aktifasi.php?id=<?php echo $data['id']; ?>" 
       class="fas fa-edit fa-sm text-blue-50" title="Edit"></a>
                    
                    </td>   
            </tr> 
 
          <?php
        } 
        ?>
  
    
  </tbody>
</table>


                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

           
                <!-- Card Body -->
                <div class="card-body">
                  
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
