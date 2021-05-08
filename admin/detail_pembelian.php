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

    $jumlah = mysqli_query($con, "SELECT * FROM rincian_pembelian");

    mysqli_query($con, "UPDATE bahan
 SET stok= stok + '$jumlah' WHERE nama_bahan='$id_pembelian' ");
    

 
    header("location:input_pembelian.php");
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
            <h1 class="h3 mb-0 text-gray-800">Pembelian</h1>
                      </div>
                      
        
        <!-- Content Row -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
          <a href="form_pembelian.php?; ?>" style="margin-bottom:20px" class="btn btn-primary col-md-2"><span class="fas fa-arrow-left fa-sm text-white-50"></span> Kembali </a>

                    </div>

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-7">
              <div class="card-body">
              <h3 class="panel-title">Detail Pembelian Bahan</h3>
      
    <div class="card-body">
        <form >

                <?php         

              $id=$_GET['id'];

$det=mysqli_query( $con, "SELECT * FROM rincian_pembelian WHERE id_pembelian='$id'")or die(mysql_error());


          while($data2 = mysqli_fetch_array($det)){
            $id_pembelian = $data2['id_pembelian'];
            $no_nota = $data2['no_nota'];
            $tanggal = $data2['tanggal'];
            $kode_bahan = $data2['kode_bahan'];
            $harga = number_format($data2['harga']);
            $jumlah = $data2['jumlah'];

          }

$det2=mysqli_query( $con, "SELECT * FROM pembelian WHERE id_pembelian='$id'")or die(mysql_error());
while($data2 = mysqli_fetch_array($det2)){

  
  $total = number_format($data2['total']);
}
              ?>
             <table class="table"  >
                <tr>
			<th>ID PEMBELIAN</th>
      <td>
      <div class="col-sm-6">
      <input type="text" class="form-control"  value="<?php echo $id_pembelian; ?>" 
      name="id_pembelian" disabled required>
      </div>
    </td>

			<th>TANGGAL PEMBELIAN</th>
      <td>
      <div class="col-sm-10">
      <input type="text" class="form-control"  value="<?php echo $tanggal; ?>" 
      name="tanggal" disabled required>
      </div>
      </td>
  
		</tr>	
    <tr>
			<th>NO NOTA</th>
      <td>
      <div class="col-sm-10">
      <input type="text" class="form-control"  value="<?php echo $no_nota; ?>" 
      name="id_pembelian" disabled required>
      </div>
      </td>
      <th>TOTAL PEMBELIAN</th>
      <td>
      <div class="col-sm-10">
      <input type="text" class="form-control"  value=" <?php  echo $total; ?>" 
      name="id_pembelian" disabled required>
      </div>
     </td>

		</tr>	




                </table>

         <table class="table">
 <thead class="thead-dark">
    <tr align="center" >
      <th scope="col">NO</th>
      <th scope="col">NAMA BAHAN</th>
      <th scope="col">HARGA</th>
      <th scope="col">JUMLAH</th>
      <th scope="col">TOTAL</th>
    </tr>
  </thead>
  <?php include 'connection.php';
          
          $result = mysqli_query($con, "SELECT * FROM rincian_pembelian 
           INNER JOIN bahan ON rincian_pembelian.kode_bahan = bahan.kode_bahan
          WHERE id_pembelian='$id' 
          
          "); 
          
            $no = 1;
            while($data3 = mysqli_fetch_array($result)){ 

                ?>
                <tbody>
                <tr align="center" >
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data3['nama_bahan']; ?></td>
                    <td><?php echo number_format($data3['harga']); ?></td>
                    <td><?php echo $data3['jumlah']; ?></td>
                    <td><?php echo number_format($data3['harga']*$data3['jumlah']); ?></td>
       

      
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
