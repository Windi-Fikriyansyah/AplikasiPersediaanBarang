<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href=https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/ekko-lightbox/ekko-lightbox.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-lightblue">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="" class="nav-link text-white">Welcome To CV. Tunas Barokah</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="<?= base_url() ?>home/profile/<?= $this->fungsi->user_login()->id_admin ?>" role="button">
            <i class="fas fa-user-circle"></i> <?= $this->fungsi->user_login()->nama; ?>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?= base_url('auth/logout') ?>" role="button">
            <i class="fas fa-sign-out-alt"></i> Keluar
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-lightblue elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url('home') ?>" class="brand-link">
        <img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Tunas Barokah</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= base_url('home') ?>" class="nav-link <?= $this->uri->segment(1) == 'home' ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Home
                </p>
              </a>
            </li>


            <li class="nav-header">MASTER</li>
			<?php if ($this->fungsi->user_login()->level == 1) { ?>
            <li class="nav-item">
              <a href="<?= base_url('admin') ?>" class="nav-link <?= $this->uri->segment(1) == 'admin' ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-user-plus"></i>
                <p>
                  Data Pengguna
                </p>
              </a>
            </li>
			
            <li class="nav-item">
              <a href="<?= base_url('pegawai') ?>" class="nav-link <?= $this->uri->segment(1) == 'pegawai' ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Pegawai
                </p>
              </a>
            </li>
			<?php } ?>
			<?php if ($this->fungsi->user_login()->level == 2) { ?>
            <li class="nav-item <?= $this->uri->segment(1) == 'kategori' ||
                                  $this->uri->segment(1) == 'satuan' ||
                                  $this->uri->segment(1) == 'bahan' ? 'menu-open' : ''; ?>">
              <a href="#" class="nav-link <?= $this->uri->segment(1) == 'kategori' ||
                                            $this->uri->segment(1) == 'satuan' ||
                                            $this->uri->segment(1) == 'bahan' ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-folder-open"></i>
                <p>
                  Data Barang
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">3</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('kategori') ?>" class="nav-link <?= $this->uri->segment(1) == 'kategori' ? 'active' : ''; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('satuan') ?>" class="nav-link <?= $this->uri->segment(1) == 'satuan' ? 'active' : ''; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Satuan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('bahan') ?>" class="nav-link <?= $this->uri->segment(1) == 'bahan' ? 'active' : ''; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Bahan</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('distributor') ?>" class="nav-link <?= $this->uri->segment(1) == 'distributor' ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-archive"></i>
                <p>
                  Data Distributor
                </p>
              </a>
            </li>

            <li class="nav-header">TRANSAKSI</li>
            <li class="nav-item">
              <a href="<?= base_url('barangmasuk/data_barangmasuk') ?>" class="nav-link <?= $this->uri->segment(1) == 'barangmasuk' ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-file-import"></i>
                <p>Barang Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('barangkeluar') ?>" class="nav-link">
                <i class="nav-icon fas fa-file-export"></i>
                <p>Barang Keluar</p>
              </a>
            </li>
			<?php } ?>
            <!-- //cara mengatur agar hanya pimpinan yg bisa liat laporan -->
            <?php if ($this->fungsi->user_login()->level == 1) { ?>
              <li class="nav-header">LAPORAN</li>
              <li class="nav-item">
                <a href="<?= base_url('laporan_barangmasuk') ?>" class="nav-link">
                  <i class="fas fa-paste nav-icon"></i>
                  <p>Barang Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('laporan_barangkeluar') ?>" class="nav-link">
                  <i class="fas fa-paste nav-icon"></i>
                  <p>Barang Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('laporan_persediaan') ?>" class="nav-link">
                  <i class="fas fa-file-medical-alt nav-icon"></i>
                  <p>Persediaan Barang</p>
                </a>
              </li>
              
            <?php } ?>
            <br>
            <li class="nav-item">
              <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Keluar
                </p>
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
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $judul ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('home/index') ?>">Home</a></li>
                <li class="breadcrumb-item active"><?= $judul ?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">