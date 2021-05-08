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
   $query = mysqli_query($con, "SELECT max(id_pembelian) as id_pembelian FROM pembelian");
   $data = mysqli_fetch_array($query);
   $kodeBarang = $data['id_pembelian'];
  
   // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
   // dan diubah ke integer dengan (int)
   $urutan = (int) substr($kodeBarang, 3, 3);
  
   // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
   $urutan++;
  
   // membentuk kode barang baru
   // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
   // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
   // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
   $huruf = "PB-";
   $kodeBarang = $huruf . sprintf("%03s", $urutan);
   
   $query2 = mysqli_query($con, "SELECT SUM(sub_total) AS total FROM `beli_sementara`") or die(mysqli_error());
   $fetch = mysqli_fetch_array($query2);
   $totall = $fetch['total'];



  if (isset($_POST['Submit'])) {
      $id_pembelian = $_POST['id_pembelian'];
      $kode_bahan = $_POST['kode_bahan'];
      $harga = $_POST['harga'];
      $jumlah = $_POST['jumlah'];
      $sub_total= $jumlah * $harga;
   

    mysqli_query($con, "INSERT INTO beli_sementara(id_pembelian,kode_bahan,harga,jumlah,sub_total) 
    VALUES('$id_pembelian','$kode_bahan','$harga','$jumlah','$sub_total')"); 

 
    header("location:input_pembelian.php");
    }

    else if (isset($_POST['Submit2'])) {
      $id_pembelian = $_POST['id_pembelian'];
      $kode_bahan = $_POST['kode_bahan'];
      $harga = $_POST['harga'];
      $tanggal = $_POST['tanggal']; 
      $no_nota = $_POST['no_nota']; 



      mysqli_query($con, "UPDATE bahan, beli_sementara
SET bahan.stok= bahan.stok + beli_sementara.jumlah, bahan.harga_bahan= beli_sementara.harga
WHERE bahan.kode_bahan=beli_sementara.kode_bahan ");

 //pemindahan data dari tabel smentara
mysqli_query($con, "INSERT INTO rincian_pembelian(id_pembelian,kode_bahan,harga,jumlah) 
 SELECT id_pembelian,kode_bahan,harga,jumlah FROM beli_sementara ");

//tambah data tanggal dan no nota
mysqli_query($con, "UPDATE rincian_pembelian
 SET no_nota='$no_nota', tanggal='$tanggal' WHERE id_pembelian='$id_pembelian' ");

//simpan ke tabel pembelian
mysqli_query($con, "INSERT INTO pembelian(id_pembelian,tanggal,no_nota,total) 
VALUES('$id_pembelian','$tanggal','$no_nota','$totall')"); 




//delete
mysqli_query($con,"DELETE FROM beli_sementara ");
 
echo "<script>alert('Data Berhasil Disimpan');window.location.href='form_pembelian.php';</script>";

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
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-7">
              <div class="card-body">
              <h3 class="panel-title">Tambah Data Pembelian</h3>
      
    <div class="card-body">
        <form method="post" action="input_pembelian.php" class="form-horizontal">
       
        
                

           
 

          <div class="form-group">
              <label  class="col-sm-2 control-label">Nama Bahan</label>
              <div class="col-sm-10">
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
                </div>
            </div> 
  
          <div class="form-group">
              <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
              <div class="col-sm-10">
                  <input type="number" class="form-control" name="jumlah" 
                  placeholder="0" ></div></div> 

          <div class="form-group">
              <label for="harga" class="col-sm-2 control-label">Harga</label>
              <div class="col-sm-10">
                  <input type="number" class="form-control" name="harga" 
                  placeholder="0" ></div></div> 

                  
   </div>

            <div class="form-group"><div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="Submit" class="btn btn-primary" value="Tambah Bahan">

                    </div>
                </div>
                <table class="table">
  <thead class="thead-dark">
    <tr align="center">
      <th scope="col">NO</th>
      <th scope="col">NAMA BAHAN</th>
      <th scope="col">JUMLAH</th>
      <th scope="col">HARGA</th>
      <th scope="col">TOTAL</th>
      <th scope="col">OPSI</th>
    </tr>
  </thead>
  <?php         
          $result2 = mysqli_query($con, "SELECT * FROM beli_sementara 
          INNER JOIN bahan ON beli_sementara.kode_bahan = bahan.kode_bahan
          ORDER BY id_pembelian ASC"); 
 
            $no = 1;
            while($data = mysqli_fetch_array($result2)){ 
                ?>
                <tbody>
                <tr align="center">
                    <td><?php echo $no++; ?></td>
                    <td>
                    <?php 
                    echo $data['nama_bahan']; 

                    

                    ?></td>
                    <td><?php echo $data['jumlah']; ?></td>
                    <td><?php echo number_format($data['harga']); ?></td>
                    <td><?php echo number_format($data['sub_total']); ?></td>   

                    <td>
                    <a href="hapus_beli_sementara.php?id=<?php echo $data['id'];?>"
                    onclick="return confirm('Yakin mau di hapus?');" class="fas fa-trash fa-sm text-blue-50" title="Hapus"></a>

                    </td> 
            </tr> 
 
          <?php
        } 
        ?>
<tr align="center">
		<td></td>
		<td >Total</td>
		<td >=</td>
		<td ></td>
		<td align="center">

			<?php
	
					$query2 = mysqli_query($con, "SELECT SUM(sub_total) AS total FROM `beli_sementara`") or die(mysqli_error());
					$fetch = mysqli_fetch_array($query2);
			?>
				<label class="text-danger"><?php echo number_format($fetch['total']); ?></label>
		
    </td>
    <td></td>
	</tr>
    
  </tbody>
</table>
<div class="row">
<div class="form-group">
            <label for="id_pembelian" class="col-sm-7  control-label">Id Pembelian</label>
 <div class="col-sm-6">
     <input type="text" class="form-control"  value="<?php echo $kodeBarang; ?>" name="id_pembelian" disabled required>
     <input type="hidden" name="id_pembelian" id="id_pembelian" value="<?php echo $kodeBarang; ?>" />
        </div>
                </div>
<div class="form-group">
    <label for="tanggal" class="col-sm-14 control-label">Tanggal </label>
              <div class="col-sm-14">
                  <input type="date" class="form-control" name="tanggal" 
                  placeholder="Masukan Alamat...">
                  </div>
                  </div>
        
              <div class="form-group">
              <label for="no_nota" class="col-sm-10 control-label">No Nota (Opsional)</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="no_nota" 
                  placeholder="Masukan Nomor Nota">
              </div>
                </div>





</div>
<div class="form-group"><div class="col-sm-offset-2 col-sm-10">
                  <label></label>
                <input type="submit" name="Submit2" class="btn btn-primary" value="Simpan Proses">
                </div>  
                </div>               

            </form>
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
