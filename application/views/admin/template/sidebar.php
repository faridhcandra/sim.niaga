<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-orange">
  <!-- Brand Logo -->
  <a href="index.html" class="brand-link navbar-orange text-sm">
    <img src="<?php echo base_url();?>assets/dist/img/logos.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text text-white font-weight-light" style="font-size: 15.5px;">Sistem Infomasi Niaga</span>
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
        <a href="#" class="d-block">Administrator</a>        
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2" id="mySidebar">
      <ul class="nav navnav-pills nav-sidebar flex-column nav-flat " data-widget="treeview" role="menu" data-accordion="false" style="font-size: 15px;">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="#l" class="nav-link">
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
            <li class="nav-item">
              <a href="<?php echo site_url('admin/v_bagian');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Bagian</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="<?php echo site_url('admin/v_unit');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Unit</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('admin/v_kabupaten');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kabupaten</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('admin/v_provinsi');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Provinsi</p>
              </a>
            </li>                
          </ul>
        </li>          
        <li class="nav-header">Pengaturan</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users-cog"></i>
            <p>User Management</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('admin/v_perusahaan');?>" class="nav-link">
            <i class="nav-icon fas fa-school"></i>
            <p>Perusahaan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('admin/v_jabatan');?>" class="nav-link">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>Jabatan</p>
          </a>
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