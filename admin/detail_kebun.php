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
            <h1 class="h3 mb-0 text-gray-800">Kebun</h1>
                      </div>
                      
        
        <!-- Content Row -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
          <a href="form_kebun.php?; ?>" style="margin-bottom:20px" class="btn btn-primary col-md-2"><span class="fas fa-arrow-left fa-sm text-white-50"></span> Kembali </a>

                    </div>

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-7">
              <div class="card-body">
              <h3 class="panel-title">Detail Bahan Pembuatan Kebun</h3>
      
    <div class="card-body">
        <form >

                <?php         
$id=$_GET['id'];

$det=mysqli_query( $con, "SELECT * FROM rincian_kebun WHERE kode_kebun='$id'")or die(mysql_error());


          while($data2 = mysqli_fetch_array($det)){
            $kode_kebun = $data2['kode_kebun'];
            $nama_bahan = $data2['nama_bahan'];

            $harga_bahan = $data2['harga_bahan'];
            $jumlah = $data2['jumlah_bahan'];

          }

 


          $det2=mysqli_query( $con, "SELECT * FROM kebun WHERE kode_kebun='$id'")or die(mysql_error());
while($data2 = mysqli_fetch_array($det2)){

  $tanggal_buat = $data2['tanggal_buat'];
  $nama_kebun = $data2['nama_kebun'];
}
              ?>
             <table class="table"  >
                <tr>
			<th>KODE KEBUN</th>
      <td>
        <input type="text" class="form-control"  value="<?php echo $kode_kebun; ?>" 
      name="kode_kebun" disabled required></td>

			<th align="right">TANGGAL PEMBUATAN</th>
      <td align="left">      
        <input type="text" class="form-control"  value="<?php echo $tanggal_buat; ?>" 
      name="tanggal_buat" disabled required></td>
  
			<th align="right">NAMA KEBUN</th>
      <td align="left"><input type="text" class="form-control"  value="<?php echo $nama_kebun; ?>" 
      name="nama_kebun" disabled required></td>
  
		</tr>	


 


                </table>

         <table class="table">
 <thead class="thead-dark">
    <tr align="center" >
      <th scope="col">NO</th>
      <th scope="col">NAMA BAHAN</th>
      <th scope="col">JUMLAH BAHAN</th>
      <th scope="col">HARGA BAHAN</th>
      <th scope="col">TOTAL</th>

    </tr>
  </thead>
          
          
                <tbody>
                <?php include 'connection.php';
          
          $result3 = mysqli_query($con, "SELECT * FROM rincian_kebun 
          WHERE kode_kebun='$id' 
          
          "); 

          $result4 = mysqli_query($con, "SELECT * FROM kebun 
          WHERE kode_kebun='$id' 
          
          "); 
             
            $no = 1;
            while($data3 = mysqli_fetch_array($result3)){ 
              $total = $data3['harga_bahan'] * $data3['jumlah_bahan'];
                ?>
                <tbody>
                <tr align="center" >
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data3['nama_bahan']; ?></td>
                    <td><?php echo $data3['jumlah_bahan']; ?></td>
                    <td><?php echo $data3['harga_bahan']; ?></td>
                    <td><?php echo $total; ?></td>

      
                </tr>    
<?php } ?>



    
  </tbody>


</table>
 <?php
$det2=mysqli_query( $con, "SELECT * FROM kebun WHERE kode_kebun='$id'")or die(mysql_error());
while($data2 = mysqli_fetch_array($det2)){

 
  $total_harga = $data2['total_harga'];
}
              ?>
             <table class="table"  >
                <tr>
			<th  >TOTAL PEMBUATAN</th>
      <td>
        <input type="text" class="form-control col-xl-4 col-lg-4"  value="<?php echo $total_harga; ?>" 
      name="total_harga" disabled required></td>


  
		</tr>	


 


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
