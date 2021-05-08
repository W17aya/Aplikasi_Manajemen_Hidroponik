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
  $kode_penanaman = $_POST['kode_penanaman'];
  $kode_bahan = $_POST['kode_bahan'];
  $jumlah_bahan = $_POST['jumlah_bahan'];
  $kode_kebun = $_POST['kode_kebun']; 
 
  $queryq = mysqli_query($con, "SELECT SUM(jumlah_bahan*harga) AS totall FROM `rincian_penanaman` 
  WHERE kode_penanaman='$kode_penanaman' ") or die(mysqli_error());
  $fetch = mysqli_fetch_array($queryq);
  $total = $fetch['totall'];



mysqli_query($con, "INSERT INTO rincian_penanaman(kode_penanaman,kode_bahan,jumlah_bahan,kode_kebun) 
VALUES('$kode_penanaman','$kode_bahan','$jumlah_bahan','$kode_kebun')");

mysqli_query($con, "UPDATE rincian_penanaman, bahan
SET rincian_penanaman.harga=bahan.harga_bahan  WHERE rincian_penanaman.kode_bahan=bahan.kode_bahan ");

 
 mysqli_query($con, "UPDATE penanaman
 SET  total='$total'  WHERE kode_penanaman='$kode_penanaman' ");

mysqli_query($con, "UPDATE bahan
SET stok= bahan.stok -'$jumlah_bahan' WHERE kode_bahan='$kode_bahan' ");

header("location:form_penanaman.php");


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
            <h1 class="h3 mb-0 text-gray-800">Penanaman</h1>
                      </div>
                      
        
        <!-- Content Row -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
          <a href="form_penanaman.php?; ?>" style="margin-bottom:20px" class="btn btn-primary col-md-2"><span class="fas fa-arrow-left fa-sm text-white-50"></span> Kembali </a>

                    </div>

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-7">
              <div class="card-body">
              <h3 class="panel-title">Tambah Pemakaian Bahan untuk Penanaman</h3>
      
    <div class="card-body">
        








              
              <?php         

$id=$_GET['id'];
$det=mysqli_query( $con, "SELECT * FROM penanaman WHERE kode_penanaman='$id'")or die(mysql_error());


          while($data2 = mysqli_fetch_array($det)){


?>
<form method="post" action="edit_penanaman.php" >


    <table class="table"  >
    <tr>
			<th>KODE PENANAMAN</th>
      <td>
      <input type="text" class="form-control"  value="<?php echo $data2['kode_penanaman']; ?>" name="kode_penanaman" disabled required>
     <input type="hidden" name="kode_penanaman" id="kode_penanaman" value="<?php echo $data2['kode_penanaman']; ?>" />
    </td>

    			<th align="right">TANGGAL PENANAMAN</th>
      <td align="left">      
        <input type="text" class="form-control"  value="<?php echo $data2['tanggal_penanaman']; ?>" 
      name="tanggal_penanaman" disabled required></td>
  
			<th align="right">KODE KEBUN</th>
      <td align="left">
      <input type="text" class="form-control"  value="<?php echo $data2['kode_kebun']; ?>" name="kode_kebun" disabled required>
     <input type="hidden" name="kode_kebun" id="kode_kebun" value="<?php echo $data2['kode_kebun']; ?>" /> 
  </td>

  
		</tr>	





                </table>
<?php
  }
?>




         <table class="table">
 <thead class="thead-dark">
    <tr align="center" >
      <th scope="col">NO</th>
      <th scope="col">NAMA BAHAN</th>
      <th scope="col">JUMLAH BAHAN</th>

    </tr>
    </thead>
  <?php         
          $result2 = mysqli_query($con, "SELECT * FROM rincian_penanaman 
          INNER JOIN bahan ON rincian_penanaman.kode_bahan = bahan.kode_bahan
          WHERE kode_penanaman='$id'"); 
 
            $no = 1;
            while($data = mysqli_fetch_array($result2)){ 
                ?>
                <tbody>
                <tr align="center">
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama_bahan']; ?></td>
                    <td><?php echo $data['jumlah_bahan']; ?></td>

            </tr> 



          <?php
        } 
        ?>

   
    
  </tbody>
</table>



        <h3 class="panel-title">Tambah Data Bahan untuk Penanaman</h3>
    

  <tr>
        <td>
              <label  >Nama Bahan</label>       
              <select name="kode_bahan" id="kode_bahan"  class="form-control">
					<option>- Pilih Bahan -</option>
        <?php
				$query = "select * from bahan";
					$hasil = mysqli_query($con,$query);
			while ($qtabel = mysqli_fetch_array($hasil))
				{
				echo '<option value="'.$qtabel['kode_bahan'].'">'.$qtabel['nama_bahan'].'</option>';				
				}
				?>
				</select>
        </td>


        <td>
               <label ">Jumlah</label>         
                  <input type="number" class="form-control" name="jumlah_bahan" id="jumlah_bahan"
                  placeholder="0" >
        </td>
  </tr>
<tr>
<td>
                      <input type="submit" name="Submit" class="btn btn-primary" value="Tambah">

</td>
<td></td>
</tr>


        </form>

            </div>

           
              </div>
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
