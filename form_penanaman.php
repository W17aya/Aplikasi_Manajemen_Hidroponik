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
function Indonesia2Tgl($tanggal){
  $namaBln = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni",
       "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
 
  $tgl=substr($tanggal,8,2);
  $bln=substr($tanggal,5,2);
  $thn=substr($tanggal,0,4);
 
  if($bln=="00"){
   return "INVALID";
  }
 
  $tanggal ="$tgl ".$namaBln[$bln]." $thn";
  return $tanggal;
 }
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
        
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Penanaman</h1>
                      </div>
     
        
        <!-- Content Row -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
          <a href="<?='input_penanaman.php'; ?>" style="margin-bottom:20px" class="btn btn-primary col-md-2">
          <span class="fas fa-plus fa-sm text-white-50"></span> Tambah Data</a>

                    </div>
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-7">
              <!-- Search -->
              <br/>
              <form method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
 
            <div class="input-group">
              <input type="text" name="cari" class="form-control bg-light border-0 small" placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2">

                <input type="submit" name="carii" value="cari" class="btn btn-primary">
         

            </div>
          </form>
          <br/>
<!-- Search -->
              <table class="table">
  <thead class="thead-dark">
    <tr align="center" >
      <th scope="col">NO</th>
      <th scope="col">ID PENANAMAN</th>
      <th scope="col">TANGGAL PENANAMAN</th>
      <th scope="col">NAMA KEBUN</th>
      <th scope="col">OPSI</th>
    </tr>
  </thead>
  <?php include 'connection.php';
          if (!ISSET($_POST['carii'])){

          $result = mysqli_query($con, "SELECT * FROM penanaman 
          INNER JOIN kebun ON penanaman.kode_kebun = kebun.kode_kebun ORDER BY kode_penanaman ASC
          "); 
 
            $no = 1;
            while($data = mysqli_fetch_array($result)){ 
                ?>
                <tbody>
                <tr align="center" >
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['kode_penanaman']; ?></td>
                    <td><?php echo Indonesia2Tgl($data['tanggal_penanaman']); ?></td>
                    <td><?php echo $data['nama_kebun']; ?></td>
       <td>
       <a href="edit_penanaman.php?id=<?php echo $data['kode_penanaman']; ?>" 
       class="fas fa-edit fa-sm text-blue-50" title="Edit"></a>

       <a href="cetak_rincian_penanaman.php?id=<?php echo $data['kode_penanaman'];?>"
      class="fas fa-download fa-sm text-blue-50" title="Cetak Rincian Penanaman"></a>

       <a href="detail_penanaman.php?id=<?php echo $data['kode_penanaman'];?>"
      class="fas fa-search-plus fa-sm text-blue-50" title="Rincian"></a>

       <a href="hapus_penanaman.php?id=<?php echo $data['kode_penanaman'];?>"
      onclick="return confirm('Yakin mau di hapus?');" class="fas fa-trash fa-sm text-blue-50" title="Hapus"></a>

       </td>
                </tr>    

 
          <?php
        } }
        ?>

        <?php
          if (ISSET($_POST['carii'])){
            $cari = $_POST['cari'];
          $result = mysqli_query($con, "SELECT * FROM penanaman 
          INNER JOIN kebun ON penanaman.kode_kebun = kebun.kode_kebun WHERE kode_penanaman LIKE '%$cari%'
          "); 
 
            $no = 1;
            while($data = mysqli_fetch_array($result)){ 
                ?>
                <tbody>
                <tr align="center" >
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['kode_penanaman']; ?></td>
                    <td><?php echo Indonesia2Tgl($data['tanggal_penanaman']); ?></td>
                    <td><?php echo $data['nama_kebun']; ?></td>
       <td>
       <a href="edit_penanaman.php?id=<?php echo $data['kode_penanaman']; ?>" 
       class="fas fa-edit fa-sm text-blue-50" title="Edit"></a>

       <a href="cetak_rincian_penanaman.php?id=<?php echo $data['kode_penanaman'];?>"
      class="fas fa-download fa-sm text-blue-50" title="Cetak Rincian Penanaman"></a>
      
       <a href="detail_penanaman.php?id=<?php echo $data['kode_penanaman'];?>"
      class="fas fa-search-plus fa-sm text-blue-50" title="Rincian"></a>

       <a href="hapus_penanaman.php?id=<?php echo $data['kode_penanaman'];?>"
      onclick="return confirm('Yakin mau di hapus?');" class="fas fa-trash fa-sm text-blue-50" title="Hapus"></a>

       </td>
                </tr>    

 
          <?php
        } }
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
