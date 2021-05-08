<?php include "connection.php";
 
  if (isset($_POST['Submit'])) {
      $nim = $_POST['nim'];
      $nama = $_POST['nama'];
      $alamat = $_POST['alamat'];
      $email = $_POST['email'];
      $telepon = $_POST['telepon']; 
 
    $result = mysqli_query($con, "INSERT INTO mahasiswa(nim,nama,alamat,email,telepon) VALUES('$nim','$nama','$alamat','$email','$telepon')"); 
 
    header("location:show.php");
    }
    ?> 
 
<?php include "header.php" ?> <div class="row">   <div class="col-md-12">
    <div class="card">
    <div class="card-header">
        <h3 class="panel-title">Tambah Data Mahasiswa</h3>
    </div>       <div class="card-body">
        <form method="post" action="add.php" class="form-horizontal">
            <div class="form-group">
 <label for="nim" class="col-sm-2 control-label">NIM</label>
 <div class="col-sm-10">
     <input type="text" class="formcontrol" name="nim" placeholder="Masukan NIM..." required>
    </div>
</div> 
 
          <div class="form-group">
              <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" 
                  placeholder="Masukan Nama Lengkap..." required>
                </div>
            </div> 
 
          <div class="form-group">
              <label for="alamat" class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="alamat" 
                  placeholder="Masukan Alamat..." required>
                  </div>
                    </div> 
 
          <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" 
                  placeholder="Masukan email..." required></div></div> 
 
          <div class="form-group">
              <label for="telepon" class="col-sm-2 control-label">Telepon</label>
              <div class="col-sm-10">
                  <input type="number" class="form-control" name="telepon" 
                  placeholder="Masukan telepon..." required>
                </div>
            </div>
            <div class="form-group"><div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="Submit" class="btn btn-primary" value="Simpan">
                      <input type="reset" name="reset" class="btn btn-warning" value="Reset">
                    </div>
                </div>
            </form>
        </div>
</div>
                </div> 
          </div> <?php include "footer.php" ?> 