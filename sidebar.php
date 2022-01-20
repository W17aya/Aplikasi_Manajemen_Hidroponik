    <!-- Sidebar-->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <i class="bi bi-bag-fill"></i> 
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        
        <div class="fas  ">Hidroponik <br> Farm's</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Master Data -->
      <div class="sidebar-heading">
        MASTER DATA
      </div>

<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Master Data</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Master Data:</h6>
            <a class="collapse-item" href="form_kebun.php">Data Kebun</a>
          </div>
        </div>
      </li>
<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOneS" aria-expanded="true" aria-controls="collapseOneS">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Data Bahan</span>
        </a>
        <div id="collapseOneS" class="collapse" aria-labelledby="headingOneS" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Bahan:</h6>
            <a class="collapse-item" href="form_kategori.php">Kategori Bahan</a>
            <a class="collapse-item" href="form_bahan.php">Data Bahan</a>
          </div>
        </div>
      </li>
<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOneSss" aria-expanded="true" aria-controls="collapseOneSss">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Data Tanaman</span>
        </a>
        <div id="collapseOneSss" class="collapse" aria-labelledby="headingOneSss" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Tanaman:</h6>
            <a class="collapse-item" href="form_tanaman.php">Data Tanaman</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Kegiatan
      </div>

<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Pengeluaran</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pengeluaran:</h6>
            <a class="collapse-item" href="form_pembelian.php">Pembelian Bahan</a>
          <!--  <a class="collapse-item" href="form_pengeluaran.php">Pengeluaran Umum</a> -->
          </div>
        </div>
      </li>
      

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Penanaman</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Penanaman :</h6>
            <a class="collapse-item" href="form_penanaman.php">Penanaman</a>
            <a class="collapse-item" href="form_hasil_penanaman.php">Panen</a>
            
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-database"></i>
          <span>Transaksi</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Transaksi:</h6>
            <a class="collapse-item" href="form_penjualan.php">Penjualan</a>
            <a class="collapse-item" href="form_rugi.php">Kerugian</a>
            <a class="collapse-item" href="form_keuntungan.php">Laba</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Laporan
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
     
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesTw" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-clipboard"></i>
          <span>Laporan Pengeluaran</span>
        </a>
        <div id="collapsePagesTw" class="collapse" aria-labelledby="headingPagesTw" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Cetak Laporan:</h6>
            <a class="collapse-item" href="laporan_pembuatan_kebun.php">Laporan Pembuatan Kebun</a>
            <a class="collapse-item" href="laporan_pembelian.php">Laporan Pembelian</a>
            <a class="collapse-item" href="laporan_penanaman.php">Laporan Penanaman</a>
            <a class="collapse-item" href="laporan_rugi.php">Laporan Kerugian</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesTwo" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-clipboard"></i>
          <span>Laporan Stok</span>
        </a>
        <div id="collapsePagesTwo" class="collapse" aria-labelledby="headingPagesTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Cetak Laporan:</h6>
            <a class="collapse-item" href="laporan_stok_bahan.php">Laporan Stok Bahan</a>
            <a class="collapse-item" href="laporan_stok_tanaman.php">Laporan Stok Tanaman</a>
            <a class="collapse-item" href="laporan_panen.php">Laporan Hasil Panen</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesT" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-clipboard"></i>
          <span>Laporan Keuangan</span>
        </a>
        <div id="collapsePagesT" class="collapse" aria-labelledby="headingPagesT" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Cetak Laporan:</h6>
            <a class="collapse-item" href="laporan_penjualan.php">Laporan Penjualan</a>
            <a class="collapse-item" href="laporan_kerugian.php">Laporan Kerugian</a>
            <a class="collapse-item" href="laporan_laba.php">Laporan Hasil Keuntungan</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesFour" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-chart-bar"></i>
          <span>Grafik</span>
        </a>
        <div id="collapsePagesFour" class="collapse" aria-labelledby="headingPagesFour" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Grafik:</h6>
            <a class="collapse-item" href="laporan_grafik_panen.php">Grafik Hasil Panen</a>
            <a class="collapse-item" href="laporan_grafik_penjualan.php">Grafik Hasil Penjualan</a>
            <!--
            <a class="collapse-item" href="laporan_grafik_penjualan.php">Grafik Penjualan</a>
  -->
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php" >
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Logout</span>
        </a>

      </li>
      <hr class="sidebar-divider">
      <!-- 
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

    
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>

  
      <hr class="sidebar-divider d-none d-md-block">
  -->

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->