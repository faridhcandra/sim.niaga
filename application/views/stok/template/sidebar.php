<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-dark-danger text-sm">
  <!-- Brand Logo -->
  <a href="<?php echo base_url();?>" class="brand-link">
    <img src="<?php echo base_url();?>assets/dist/img/logos.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text text-white font-weight-light" style="font-size: 15.5px;">SIM Stok Barang</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-2 pb-2 mb-3 d-flex">
      <div class="image mt-2">
        <img src="<?php echo base_url();?>assets/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info text-sm">
        <a href="#" class="d-block">Admin</a>        
        <a href="#" class="d-block">Unit Weaving</a>        
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2" id="mySidebar">
      <ul class="nav navnav-pills nav-sidebar flex-column nav-flat " data-widget="treeview" role="menu" data-accordion="false" style="font-size: 15px;">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo site_url('stok')?>" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Halaman Utama</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
            <i class="nav-icon fas fa-hdd"></i>
            <p>
              Data Master
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Jenis Barang</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="<?php echo site_url('stok/view_satuan');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Satuan Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('stok/view_barang');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Barang</p>
              </a>
            </li>              
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shopping-bag"></i>
            <p>
              Pemesanan
              <i class="fas fa-angle-left right"></i>                
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('stok/view_pesbaru');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pesanan Baru</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengecekan</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="<?php echo site_url('stok/view_pesselesai');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pesanan Selesai</p>
                <span class="right badge badge-danger">New</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <!-- <i class="nav-icon fas fa-copy"></i> -->
            <i class="nav-icon fas fa-sync-alt"></i>
            <p>
              Transaksi
              <i class="fas fa-angle-left right"></i>                
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('stok/view_stok');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Stok Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('stok/view_barangmasuk');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Barang Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('stok/view_barangkeluar');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Barang Keluar</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Laporan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Barang Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Barang Keluar</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">Dokumentasi</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>Panduan Penggunaan</p>
          </a>
        </li>
        <li class="nav-header">Labels</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">Important</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Warning</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p>Informational</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?php echo $menutitle?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><?php echo $menu?></a></li>
            <li class="breadcrumb-item active"><?php echo $submenu ?></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->