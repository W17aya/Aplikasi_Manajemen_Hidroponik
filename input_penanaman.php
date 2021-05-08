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
   $query = mysqli_query($con, "SELECT max(kode_penanaman) as kode_penanaman FROM penanaman");
   $data = mysqli_fetch_array($query);
   $kodeBarang = $data['kode_penanaman'];
  
   // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
   // dan diubah ke integer dengan (int)
   $urutan = (int) substr($kodeBarang, 4, 4);
  
   // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
   $urutan++;
  
   // membentuk kode barang baru
   // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
   // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
   // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
   $huruf = "PNM-";
   $kodeBarang = $huruf . sprintf("%03s", $urutan);
   
   $query2 = mysqli_query($con, "SELECT SUM(jumlah_bahan*harga) AS total FROM `penanaman_sementara`") or die(mysqli_error());
   $fetch = mysqli_fetch_array($query2);
   $total = $fetch['total'];


   

  if (isset($_POST['Submit'])) {
      $kode_penanaman = $_POST['kode_penanaman'];
      $kode_bahan = $_POST['kode_bahan'];
      $jumlah_bahan = $_POST['jumlah_bahan'];

      $q = mysqli_query($con, "SELECT * FROM `bahan` WHERE kode_bahan='$kode_bahan'") or die(mysqli_error());
      $b = mysqli_fetch_array($q);
      $c = $b['stok'];
 
    if ($c<$jumlah_bahan){

      echo "<script>alert('Maaf Stok Bahan Kurang!! Stok Tersedia adalah $c pcs');window.location.href='input_penanaman.php';</script>";
    }
    else{
    $result = mysqli_query($con, "INSERT INTO penanaman_sementara(kode_penanaman,kode_bahan,jumlah_bahan) 
    VALUES('$kode_penanaman','$kode_bahan','$jumlah_bahan')"); 

mysqli_query($con, "UPDATE penanaman_sementara, bahan
SET penanaman_sementara.harga=bahan.harga_bahan  WHERE penanaman_sementara.kode_bahan=bahan.kode_bahan ");
    
    header("location:input_penanaman.php");
    }
    }

    else if (isset($_POST['Submit2'])) {
      $kode_penanaman = $_POST['kode_penanaman'];
      $jumlah_bahan = $_POST['jumlah_bahan'];
      $tanggal_penanaman = $_POST['tanggal_penanaman']; 
      $kode_kebun = $_POST['kode_kebun']; 
      $tutal = $total; 

      mysqli_query($con, "UPDATE bahan, penanaman_sementara
      SET bahan.stok= bahan.stok - penanaman_sementara.jumlah_bahan WHERE bahan.kode_bahan=penanaman_sementara.kode_bahan ");

 $result3 = mysqli_query($con, "INSERT INTO rincian_penanaman(kode_penanaman,kode_bahan,jumlah_bahan,harga) 
 SELECT kode_penanaman,kode_bahan,jumlah_bahan,harga FROM penanaman_sementara ");


mysqli_query($con, "INSERT INTO penanaman(kode_penanaman,tanggal_penanaman,kode_kebun,total) 
VALUES('$kode_penanaman','$tanggal_penanaman','$kode_kebun','$tutal')"); 

mysqli_query($con, "UPDATE rincian_penanaman
SET kode_kebun='$kode_kebun'   WHERE kode_penanaman='$kode_penanaman' ");

mysqli_query($con,"DELETE FROM penanaman_sementara ");
 
echo "<script>alert('Data Berhasil Disimpan');window.location.href='form_penanaman.php';</script>";

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
          <a href="form_penanaman.php?; ?>" style="margin-bottom:20px" 
          class="btn btn-primary col-md-2"><span class="fas fa-arrow-left fa-sm text-white-50"></span> Kembali </a>

                    </div>
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-7">
              <div class="card-body">
              <h3 class="panel-title">Tambah Data Penanaman</h3>
      
    <div class="card-body">
        <form method="post" action="input_penanaman.php" class="form-horizontal">
       
<t<table class="table">
  <tr>
        <td>
              <label  >Nama Bahan</label>       
              <select name="kode_bahan"  class="form-control">
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
                  <input type="number" class="form-control" name="jumlah_bahan" 
                  placeholder="0" >
        </td>
  </tr>
<tr>
<td>
                      <input type="submit" name="Submit" class="btn btn-primary" value="Tambah">

</td>
<td></td>
</tr>

</table>


            </div>

                <table class="table" >
  <thead class="thead-dark">
    <tr align="center">
      <th scope="col">NO</th>
      <th scope="col">NAMA BAHAN</th>
      <th scope="col">JUMLAH BAHAN</th>

      <th scope="col">OPSI</th>
    </tr>
  </thead>
  <?php         
          $result2 = mysqli_query($con, "SELECT * FROM penanaman_sementara 
          INNER JOIN bahan ON penanaman_sementara.kode_bahan = bahan.kode_bahan
          ORDER BY kode_penanaman ASC"); 
 
            $no = 1;
            while($data = mysqli_fetch_array($result2)){ 
                ?>
                <tbody>
                <tr align="center">
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama_bahan']; ?></td>
                    <td><?php echo $data['jumlah_bahan']; ?></td>
                    
                    <td>
                    <a href="hapus_penanaman_sementara.php?id=<?php echo $data['id'];?>"
                    onclick="return confirm('Yakin mau di hapus?');" 
                    class="fas fa-trash fa-sm text-blue-50" title="Hapus"></a>
                    </td> 
            </tr> 
 
          <?php
        } 
        ?>

    
  </tbody>
</table>

<table class="table">
<tbody>
<tr>
<td>
<div class="form-group">
            <label for="kode_penanaman" class="col-sm-8  control-label">Kode Penanaman</label>
 <div class="col-sm-6">
     <input type="text" class="form-control"  value="<?php echo $kodeBarang; ?>" name="kode_penanaman" disabled required>
     <input type="hidden" name="kode_penanaman" id="kode_penanaman" value="<?php echo $kodeBarang; ?>" />
        </div>
                </div>
</td>

<td>
<div class="form-group">
    <label for="tanggal_penanaman" class="col-sm-12 control-label">Tanggal Penanaman </label>
              <div class="col-sm-10">
                  <input type="date" class="form-control" name="tanggal_penanaman" 
                  >
                  </div>
                  </div>
</td>

<td>
<div class="form-group">
                  <label class="col-sm-10">Nama Kebun</label>   

              <select name="kode_kebun"  class="form-control col-sm-10">
					<option>- Pilih Kebun -</option>
        <?php 
				$query2 = "select * from kebun";
					$hasil2 = mysqli_query($con,$query2);
			while ($qtabel2 = mysqli_fetch_array($hasil2))
				{
				echo '<option value="'.$qtabel2['kode_kebun'].'">'.$qtabel2['nama_kebun'].'</option>';				
				}
        ?>
   
				</select>
                  </div>
                  </td>

                  

      </tr>
                  <tr>
                    <td>
                  <input type="submit" name="Submit2" class="btn btn-primary" value="Proses">
          </div>
      </td>

      
      </tr>
               

            </form>
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
