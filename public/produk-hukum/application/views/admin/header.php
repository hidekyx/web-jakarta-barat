<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $meta_title; ?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets-admin/css/bootstrap.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets-admin/vendors/iconly/bold.css">

     <link rel="stylesheet" href="<?php echo base_url() ?>assets-admin/js/sweetalert2.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets-admin/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets-admin/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets-admin/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets-admin/vendors/fontawesome/all.min.css">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets-admin/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown me-1">
                                    
                                </li>
                                <li class="nav-item dropdown me-3">
                                    
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">Administrator</h6>
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="<?php echo base_url() ?>assets-admin/images/faces/2.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, <?php echo $this->session->userdata('firstname'); ?>!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('administrator/logout'); ?>"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active" style="background: #f2f5f8;">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo text-center">
                            <a href="index.html"><img src="<?php echo base_url() ?>assets-admin/images/logo/JB.png" alt="Logo" srcset="" style="width: 65%;margin-left: 60%; height: 100%;"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                     
                        <li class="sidebar-item <?php if($this->uri->segment(1) == 'administrator' && $this->uri->segment(2) == null){ ?> active <?php } ?>">
                            <a href="<?php echo site_url('administrator') ?>" class='sidebar-link'>
                                <i class="fa fa-chart-line"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php if($this->uri->segment(1) == 'administrator' && $this->uri->segment(2) == 'kategori'){ ?> active <?php } ?>">
                            <a href="<?php echo site_url('administrator/kategori') ?>" class='sidebar-link'>
                                <i class="fa fa-rss"></i>
                                <span>Kategori</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php if($this->uri->segment(1) == 'administrator' && $this->uri->segment(2) == 'produk-hukum'){ ?> active <?php } ?>">
                            <a href="<?php echo site_url('administrator/produk-hukum') ?>" class='sidebar-link'>
                                <i class="fa fa-band-aid"></i>
                                <span>Produk Hukum</span>
                            </a>
                        </li>

                       <!--  <li class="sidebar-item <?php if($this->uri->segment(2) == 'master'){ ?> active <?php } ?> has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fa fa-rss"></i>
                                <span>Master Data</span>
                            </a>
                            <ul class="submenu <?php if($this->uri->segment(2) == 'master'){ ?> active <?php } ?>">
                                <li class="submenu-item <?php if($this->uri->segment(3) == 'kategori-berita'){ ?> active <?php } ?>">
                                    <a href="<?php echo site_url('manajemen/master/kategori-berita') ?>">- Kategori Berita</a>
                                </li>

                               
                            </ul>
                        </li> -->


                        <!-- <li class="sidebar-item active has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Master Data</span>
                            </a>
                            <ul class="submenu active">
                                <li class="submenu-item active">
                                    <a href="layout-default.html">Default Layout</a>
                                </li>
                                
                            </ul>
                        </li> -->                 

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>