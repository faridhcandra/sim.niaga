<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-dark-success">
  <!-- Brand Logo -->
  <a href="index.html" class="brand-link">
    <img src="<?php echo base_url();?>assets/dist/img/logos.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text text-white font-weight-light">SIM Pembelian</span>
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
        <a href="#" class="d-block">Bagian Pembelian</a>        
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2" id="mySidebar">
      <ul class="nav navnav-pills nav-sidebar flex-column nav-flat " data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class  with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo site_url('pembelian');?>" class="nav-link">
            <i class="nav-icon fas fa-landmark"></i>
            <p>Halaman Utama</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-hdd"></i>
            <p>
              Data Master
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('pembelian/view_jenisbrng');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Jenis Barang</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Satuan Barang</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="<?php echo site_url('pembelian/view_groupbrng');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Group Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Stok Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('pembelian/view_supplier');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Supplier</p>
                <!-- <p>Leveransir</p> -->
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('pembelian/view_metpemb');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Metode Pembayaran</p>
              </a>
            </li>                             
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shopping-bag"></i>
            <p>
              Verifikasi Data
              <i class="fas fa-angle-left right"></i>                
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('pembelian/v_verpesbaru');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pesanan Baru</p>
                <span class="right badge badge-danger">New</span>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pesanan Datang</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Penerimaan</p>
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
              <a href="<?php echo site_url('pembelian/v_pembelian')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Renc. Pembelian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('pembelian/v_spb')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Surat Pesanan Barang (SPB)</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>MI Keluar</p>
              </a>
            </li>
              <!-- <li class="nav-item">
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
              </li> -->
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
                  <p>Pembelian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penerimaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>MI Keluar</p>
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