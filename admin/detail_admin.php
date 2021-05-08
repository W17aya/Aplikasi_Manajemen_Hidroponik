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
<?php include "connection.php"; ?>



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
            <h1 class="h3 mb-0 text-gray-800">Data Akun</h1>
                      </div>
                      
        
        <!-- Content Row -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
          <a href="form_admin.php?; ?>" style="margin-bottom:20px" class="btn btn-primary col-md-2"><span class="fas fa-arrow-left fa-sm text-white-50"></span> Kembali </a>

                    </div>

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-7">
              <div class="card-body">
              <h3 class="panel-title">Detail Akun </h3>
      
    <div class="card-body">
        <form >

                <?php         
$id=$_GET['id'];

$det=mysqli_query( $con, "SELECT * FROM login WHERE id='$id'")or die(mysql_error());


          while($data2 = mysqli_fetch_array($det)){
            $id = $data2['id'];
            $username = $data2['username'];
            $level = $data2['level'];

          }

 



              ?>
            

         <table class="table">
 <thead class="thead-dark">
    <tr align="center" >
      <th scope="col">NO</th>
      <th scope="col">NAMA</th>
      <th scope="col">USERNAME</th>
      <th scope="col">TEMPAT LAHIR</th>
      <th scope="col">TANGGAL LAHIR</th>
      <th scope="col">LEVEL</th>
      <th scope="col">STATUS</th>

    </tr>
  </thead>
          
          
                <tbody>
                <?php include 'connection.php';
          
          $result3 = mysqli_query($con, "SELECT * FROM login 
          WHERE id='$id' 
          
          "); 
          
            $no = 1;
            while($data3 = mysqli_fetch_array($result3)){ 

                ?>
                <tbody>
                <tr align="center" >
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data3['nama_akun']; ?></td>
                    <td><?php echo $data3['username']; ?></td>
                    <td><?php echo $data3['tempat_lahir']; ?></td>
                    <td><?php echo $data3['tgl_lahir']; ?></td>
                    <td><?php echo $data3['level']; ?></td>
                    <td><?php echo $data3['status']; ?></td>

      
                </tr>    

 
          <?php
        } 
        ?>


    
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
