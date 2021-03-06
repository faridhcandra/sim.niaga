<?php
  $url = $this->uri->segment(2);
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-dark-primary">
  <!-- Brand Logo -->
  <a href="<?php echo site_url('gudang/');?>" class="brand-link text-sm">
    <img src="<?php echo base_url();?>assets/dist/img/logos.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text text-white font-weight-light" style="font-size: 15.5px;">SIM Gudang</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar text-sm">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-2 pb-2 mb-3 d-flex">
      <div class="image mt-2">
        <img src="<?php echo base_url();?>assets/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info text-sm">
        <a href="#" class="d-block">Admin</a>        
        <a href="#" class="d-block">Bagian Gudang</a>        
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2" id="mySidebar">
      <ul class="nav navnav-pills nav-sidebar flex-column nav-flat " data-widget="treeview" role="menu" data-accordion="false" style="font-size: 15px;">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo site_url('gudang')?>" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Halaman Utama</p>
          </a>
        </li>
        <li class="nav-item has-treeview <?php if($url =="v_koderekakt" OR $url =="v_jenisbrngakt" OR $url =="v_barangakt" OR $url =="v_grpmesin") { echo "menu-open";}?>">
          <a href="#" class="nav-link <?php if($url =="v_koderekakt" OR $url =="v_jenisbrngakt" OR $url =="v_barangakt" OR $url =="v_grpmesin") { echo "active";}?>">
            <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
            <i class="nav-icon fas fa-hdd"></i>
            <p>
              Data Master
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('gudang/v_koderekakt');?>" class="nav-link <?php if($url =="v_koderekakt") { echo "active";}?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Kode Rekening Akuntansi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('gudang/v_grpmesin');?>" class="nav-link <?php if($url =="v_grpmesin") { echo "active";}?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Group / Mesin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('gudang/v_jenisbrngakt');?>" class="nav-link <?php if($url =="v_jenisbrngakt") { echo "active";}?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Jenis Barang Akuntansi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('gudang/v_barangakt');?>" class="nav-link <?php if($url =="v_barangakt") { echo "active";}?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Barang</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Barang Akuntansi</p>
              </a>
            </li> -->
          </ul>
        </li>
        <li class="nav-item has-treeview <?php if($url =="v_verpesbaru") { echo "menu-open";}?>">
          <a href="#" class="nav-link <?php if($url =="v_verpesbaru") { echo "active";}?>">
            <i class="nav-icon fas fa-shopping-bag"></i>
            <p>
              Verifikasi Data
              <i class="fas fa-angle-left right"></i>                
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('gudang/v_verpesbaru');?>" class="nav-link <?php if($url =="v_verpesbaru") { echo "active";}?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Pesanan Baru</p>
                <span class="right badge badge-danger">New</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Stok Barang</p>
              </a>
            </li>
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
        <li class="nav-item has-treeview <?php if($url =="v_penerimaan" OR $url =="v_pengetesan" OR $url =="v_bonbarang") { echo "menu-open";}?>">
          <a href="#" class="nav-link <?php if($url =="v_penerimaan" OR $url =="v_pengetesan" OR $url =="v_bonbarang") { echo "active";}?>">
            <!-- <i class="nav-icon fas fa-copy"></i> -->
            <i class="nav-icon fas fa-sync-alt"></i>
            <p>
              Transaksi
              <i class="fas fa-angle-left right"></i>                
            </p>
          </a>
          <ul class="nav nav-treeview">
           <li class="nav-item">
            <a href="<?php echo site_url('gudang/v_penerimaan')?>" class="nav-link <?php if($url =="v_penerimaan") { echo "active";}?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Penerimaan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('gudang/v_pengetesan')?>" class="nav-link <?php if($url =="v_pengetesan") { echo "active";}?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Pengetesan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('gudang/v_bonbarang') ?>" class="nav-link <?php if($url =="v_bonbarang") { echo "active";}?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Bon Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Pengeluaran</p>
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
              <p>Penerimaan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Pengetesan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Bon Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Pengeluaran</p>
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
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon far fa-circle text-success"></i>
          <p>Success</p>
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
          <h4 class="m-0 text-dark"><?php echo $menutitle?></h4>
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