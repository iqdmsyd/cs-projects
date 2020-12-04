<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Informasi Manajemen: E-Commerce PT. KAI </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo base_url() ?>\files\assets\images\favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\bower_components\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\bower_components\font-awesome\css\font-awesome.min.css">
    <!-- sweet alert framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\bower_components\sweetalert\css\sweetalert.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\assets\icon\themify-icons\themify-icons.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\assets\icon\feather\css\feather.css">
    <!-- Syntax highlighter Prism css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\assets\pages\prism\prism.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\assets\pages\notification\notification.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\assets\css\jquery.mCustomScrollbar.css">

    <!-- Custom css/js -->
    <?php if (!empty($isImport)): ?>
        <!-- jquery file upload Frame work -->
        <link href="<?php echo base_url() ?>files\assets\pages\jquery.filer\css\jquery.filer.css" type="text/css" rel="stylesheet">
        <link href="<?php echo base_url() ?>files\assets\pages\jquery.filer\css\themes\jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet">
    <?php endif; ?>

    <?php if (!empty($isTransaction)): ?>
        <!-- Select 2 css -->
        <link rel="stylesheet" href="<?php echo base_url() ?>\files\bower_components\select2\css\select2.min.css">
        <!-- Multi Select css -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\bower_components\bootstrap-multiselect\css\bootstrap-multiselect.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\bower_components\multiselect\css\multi-select.css">
        <!-- Data table css -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\assets\pages\data-table\css\buttons.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>\files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
    <?php endif; ?>

    <?php if (!empty($isAnalytics)): ?>

    <?php endif; ?>

    <style>
        #chartdiv, #chartdiv2 {
          width: 100%;
          height: 300px;
        }
    </style>

</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- Navbar header start -->
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo" style="background-color: #1B68B1">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="<?php echo base_url() ?>">
                            <img class="img-fluid" width="60%" src="<?php echo base_url() ?>\files\assets\images\SIM CPE KAI.png" alt="Theme-Logo">
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <!-- <img src="<?php echo base_url() ?>\files\assets\images\avatar-4.jpg" class="img-radius" alt="User-Profile-Image"> -->
                                        <span><?php echo $this->session->userdata('nama_lengkap') ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="<?php echo base_url("user/profile"); ?>">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url("logout"); ?>">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar header end -->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- Sidebar start -->
                    <nav class="pcoded-navbar" pcoded-header-position="relative">
                        <div class="pcoded-inner-navbar main-menu" style="background-color: #154777">
                            <div class="pcoded-navigatio-lavel"><?php echo $this->session->userdata('nama_tipe_user'); ?></div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu <?php if(!empty($isImport) || !empty($isTransaction) || !empty($isAnalytics)) echo "active pcoded-trigger"?>">
                                    <a href="javascript:void(0)" style="background-color: #154777">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                    <ul class="pcoded-submenu" style="background-color: #154777">
                                        <li class="<?php if (!empty($isImport)) echo "active"; ?>">
                                            <a href="<?php echo base_url("import"); ?>"><span class="pcoded-mtext">Import</span></a>
                                        </li>
                                        <li class="<?php if (!empty($isTransaction)) echo "active"; ?>">
                                            <a href="<?php echo base_url("Transaction") ?>"><span class="pcoded-mtext">Transaction</span></a>
                                        </li>
                                        <li class="<?php if (!empty($isAnalytics)) echo "active"; ?>">
                                            <a href="<?php echo base_url("Analytics") ?>"><span class="pcoded-mtext">Analytics</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <?php if ($this->session->userdata('id_tipe_user') == '1'): ?>
                                <li class="pcoded-hasmenu <?php if(!empty($isUserList) || !empty($isUserVerify)) echo "active pcoded-trigger"?>">
                                    <a href="javascript:void(0)" style="background-color: #154777">
                                        <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                        <span class="pcoded-mtext">User Management</span>
                                    </a>
                                    <ul class="pcoded-submenu" style="background-color: #154777">
                                        <li class="<?php if (!empty($isUserList)) echo "active"; ?>">
                                            <a href="<?php echo base_url("user/list") ?>"><span class="pcoded-mtext">Users list</span></a>
                                        </li>
                                        <li class="<?php if (!empty($isUserVerify)) echo "active"; ?>">
                                            <a href="<?php echo base_url("user/verify") ?>"><span class="pcoded-mtext">Verify</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </nav>
                    <!-- Sidebar end -->
