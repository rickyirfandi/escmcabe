 <?php 
 $level = $this->session->userdata('level');
 $link1 = $this->uri->segment(1);
 $link2 = $this->uri->segment(2);
  ?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('assets/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Cabeku</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo site_url('Auth/Profile') ?>" class="d-block"> <p><?php echo $this->session->userdata('nama'); ?></p></a>
        
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if ($level=='Manager'): ?>
          <li class="nav-item has-treeview">
            <a href="<?php echo site_url('Manager') ?>" class="nav-link <?php if(($link1=="Manager") and ($link2=="")){echo "active";};?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

           <li class="nav-item has-treeview <?php 
          if(($link1=="Pengiriman") or ($link1=="Permintaan")){echo "menu-open";};?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo site_url('Permintaan') ?>" class="nav-link <?php if($link1=="Permintaan"){echo "active";};?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permintaan Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Pengiriman/jadwal') ?>" class="nav-link <?php if($link1=="Pengiriman" && $link2=="jadwal"){echo "active";};?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jadwal Pengiriman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Pengiriman/validasi') ?>" class="nav-link <?php if($link1=="Pengiriman" && $link2=="validasi"){echo "active";};?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validasi Pengiriman</p>
                </a>
              </li>
            </ul>
          </li>  

          <li class="nav-item has-treeview <?php 
          if(($link1=="Laporan")){echo "menu-open";};?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('Laporan') ?>" class="nav-link <?php if($link1=="Laporan" && $link2==""){echo "active";};?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Laporan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Laporan/Validasi') ?>" class="nav-link <?php if($link1=="Laporan" && $link2=="Validasi"){echo "active";};?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validasi Laporan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php 
          if(($link1=="Akun")){echo "menu-open";};?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Akun Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('Akun/daftar_admin') ?>" class="nav-link <?php if($link2=="daftar_admin"){echo "active";};?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Admin Aktif</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Akun/admin_nonaktif') ?>" class="nav-link <?php if($link2=="admin_nonaktif"){echo "active";};?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Admin Tidak Aktif</p>
                </a>
              </li>
            </ul>
          </li>
           <?php endif ?>

            <?php if ($level=='Admin Produksi'): ?>
          <li class="nav-item has-treeview <?php 
          if(($link1=="AdminProduksi")){echo "menu-open";};?>">
            <a href="<?php echo site_url() ?>" class="nav-link <?php if($link1=="AdminProduksi" && $link2==""){echo "active";};?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
         
          <li class="nav-item has-treeview <?php 
          if(($link1=="produk")){echo "menu-open";};?>">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Produk
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url().'produk/tambah' ?>" class="nav-link <?php if($link1=="produk" && $link2=="tambah"){echo "active";};?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url().'produk' ?>"class="nav-link <?php if($link1=="produk" && $link2==""){echo "active";};?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php 
          if(($link1=="permintaan")){echo "menu-open";};?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>
               Permintaan 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url().'permintaan/tervalidasi' ?>" class="nav-link <?php if($link1=="permintaan" && $link2=="tervalidasi"){echo "active";};?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lihat Permintaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url().'permintaan/riwayat' ?>" class="nav-link <?php if($link1=="permintaan" && $link2=="riwayat"){echo "active";};?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Permintaan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php 
          if(($link1=="penawaran")){echo "menu-open";};?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
               Penawaran
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url().'penawaran/buat' ?>" class="nav-link <?php if($link1=="penawaran" && $link2=="buat"){echo "active";};?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buat Penawaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url().'penawaran/terima' ?>" class="nav-link <?php if($link1=="penawaran" && $link2=="terima"){echo "active";};?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Terima Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url().'penawaran/riwayat' ?>" class="nav-link <?php if($link1=="penawaran" && $link2=="riwayat"){echo "active";};?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Penawaran</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo site_url().'gudang' ?>" class="nav-link <?php if($link1=="gudang" && $link2==""){echo "active";};?>">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Stok Gudang
              </p>
            </a>
          </li>
           <?php endif ?>
           <?php if ($level=='Admin Distribusi'): ?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pengiriman
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Pengiriman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status Pengiriman</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
               Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buat Laporan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>xx</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Optimasi Pengiriman
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'pengiriman/biaya'?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lakukan Optimasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat</p>
                </a>
              </li>
            </ul>
          </li>
           <?php endif ?>

           <?php if ($level=='Pasar'): ?>
          <li class="nav-item has-treeview <?php if($link2==""){echo "menu-open";};?>">
            <a href="<?php echo base_url().'pasar/'?>" class="nav-link <?php if($link2==""){echo "active";};?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
         
          <li class="nav-item has-treeview <?php 
          if(($link2=="keranjang") or ($link2=="pengiriman") or ($link2=="riwayat")){echo "menu-open";};?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'pasar/keranjang'?>" class="nav-link <?php if($link2=="keranjang"){echo "active";};?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Keranjang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'pasar/pengiriman'?>" class="nav-link <?php if($link2=="pengiriman"){echo "active";};?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengiriman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'pasar/riwayat'?>" class="nav-link <?php if($link2=="riwayat"){echo "active";};?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Transaksi</p>
                </a>
              </li>
            </ul>
          </li>

           <?php endif ?>

           <?php if ($level=='Supplier'): ?>
          <li class="nav-item has-treeview <?php if($link2==""){echo "menu-open";};?>">
            <a href="<?php echo base_url().'supplier'?>" class="nav-link <?php if($link2==""){echo "active";};?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
         
          <li class="nav-item has-treeview <?php if($link2=="pengiriman"){echo "menu-open";};?>">
            <a href="<?php echo base_url().'supplier/pengiriman'?>" class="nav-link <?php if($link2=="pengiriman"){echo "active";};?>">
              <i class="nav-icon fas fa-paper-plane"></i>
              <p>
                Pengiriman
              </p>
            </a>
          </li>

          
           <?php endif ?>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
