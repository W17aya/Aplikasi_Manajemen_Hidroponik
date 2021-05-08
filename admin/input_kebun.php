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
   $query = mysqli_query($con, "SELECT max(kode_kebun) as id_kebun FROM kebun");
   $data = mysqli_fetch_array($query);
   $kodeKebun = $data['id_kebun'];
  
   // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
   // dan diubah ke integer dengan (int)
   $urutan = (int) substr($kodeKebun, 3, 3);
  
   // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
   $urutan++;
  
   // membentuk kode barang baru
   // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
   // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
   // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
   $huruf = "KB-";
   $kodeKebun = $huruf . sprintf("%03s", $urutan);
   
   $query2 = mysqli_query($con, "SELECT SUM(jumlah_bahan*harga_bahan) AS total FROM `kebun_sementara`") 
   or die(mysqli_error());
   $fetch = mysqli_fetch_array($query2);
   $total = $fetch['total'];


  if (isset($_POST['Submit'])) {
    $kode_kebun = $_POST['kode_kebun'];
      $nama_bahan = $_POST['nama_bahan'];
      $jumlah_bahan = $_POST['jumlah_bahan'];
      $harga_bahan = $_POST['harga_bahan'];

 
    $result = mysqli_query($con, "INSERT INTO kebun_sementara(kode_kebun,nama_bahan,jumlah_bahan,harga_bahan) 
    VALUES('$kode_kebun','$nama_bahan','$jumlah_bahan','$harga_bahan')"); 


    header("location:input_kebun.php");
    }

    else if (isset($_POST['Submit2'])) {
      $kode_kebun = $_POST['kode_kebun'];
      $jumlah_bahan = $_POST['jumlah_bahan'];
      $tanggal_buat = $_POST['tanggal_buat']; 
      $nama_kebun = $_POST['nama_kebun']; 
      $total_harga = $total; 

$result3 = mysqli_query($con, "INSERT INTO rincian_kebun(kode_kebun,nama_bahan,jumlah_bahan,harga_bahan) 
 SELECT kode_kebun,nama_bahan,jumlah_bahan,harga_bahan FROM kebun_sementara ");


mysqli_query($con, "INSERT INTO kebun(kode_kebun,tanggal_buat,nama_kebun,total_harga) 
VALUES('$kode_kebun','$tanggal_buat','$nama_kebun','$total_harga')"); 

mysqli_query($con, "UPDATE rincian_kebun
SET nama_kebun='$nama_kebun', total='$total_harga'   WHERE kode_kebun='$kode_kebun' ");

mysqli_query($con,"DELETE FROM kebun_sementara ");
 
echo "<script>alert('Data Berhasil Disimpan');window.location.href='form_kebun.php';</script>";

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
            <h1 class="h3 mb-0 text-gray-800">Pembuatan Kebun</h1>
                      </div>
                      
        
        <!-- Content Row -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
          <a href="form_kebun.php?; ?>" style="margin-bottom:20px" 
          class="btn btn-primary col-md-2"><span class="fas fa-arrow-left fa-sm text-white-50"></span> Kembali </a>

                    </div>
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-7">
              <div class="card-body">
              <h3 class="panel-title">Tambah Data Pembuatan Kebun</h3>
      
    <div class="card-body">
        <form method="post" action="input_kebun.php" class="form-horizontal">
       
<t<table class="table">
  <tr>
        <td>
              <label  >Nama Bahan</label>       
              <input type="text" class="form-control" name="nama_bahan" 
                  placeholder="" >
        </td>
        <td>
               <label ">Jumlah</label>         
                  <input type="number" class="form-control" name="jumlah_bahan" 
                  placeholder="0" >
        </td>

        <td>
               <label ">Harga</label>         
                  <input type="number" class="form-control" name="harga_bahan" 
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
      <th scope="col">HARGA BAHAN</th>
      <th scope="col">OPSI</th>
    </tr>
  </thead>
  <?php         
          $result2 = mysqli_query($con, "SELECT * FROM kebun_sementara 
          ORDER BY kode_kebun ASC"); 
 
            $no = 1;
            while($data = mysqli_fetch_array($result2)){ 
                ?>
                <tbody>
                <tr align="center">
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama_bahan']; ?></td>
                    <td><?php echo $data['jumlah_bahan']; ?></td>
                    <td>Rp. <?php echo number_format($data['harga_bahan']); ?></td>
                    
                    <td>
                    <a href="hapus_kebun_sementara.php?id=<?php echo $data['id'];?>"
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
<label for="id_nota" class="col-sm-6  control-label">Kode Kebun</label>
 <div class="col-sm-6">
     <input type="text" class="form-control"  value="<?php echo $kodeKebun; ?>" name="kode_kebun" disabled required>
     <input type="hidden" name="kode_kebun" id="kode_kebun" value="<?php echo $kodeKebun; ?>" />

                </div>
</td>

<td>
<div class="form-group">
    <label for="tanggal_buat" class="col-sm-12 control-label">Tanggal Pembuatan </label>
              <div class="col-sm-10">
                  <input type="date" class="form-control" name="tanggal_buat" 
                  >
                  </div>
                  </div>
</td>

<td>
<div class="form-group">
                  <label for="nama_kebun" class="col-sm-10">Nama Kebun</label>   


              <input type="text" class="form-control" name="nama_kebun" 
                  placeholder="Masukkan Nama Kebun" ></div></div>
                  </td>

                  

      </tr>
                  <tr>
                    <td>
                  <input type="submit" name="Submit2" class="btn btn-primary" value="Proses">
          </div>
      </td>
      <td></td>
      <td></td>

      
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
