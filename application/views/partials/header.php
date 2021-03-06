<!DOCTYPE html>
<html lang="en">
<?php $session_data = $this->session->userdata('sesslogin'); ?>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <title>Pegadaian Area Malang</title>
    <!-- Fontfaces CSS-->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(''); ?>asset/images/icon/icon.ico" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
     <!--<link rel="stylesheet" href="<?php echo base_url('') ?>asset/datatables.min.css"> -->
    <!-- <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css"> -->
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" rel="stylesheet">-->
    <!--<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">-->

    <script src="<?php echo base_url(); ?>asset/js/jquery/dist/jquery.min.js"></script>
    <!-- morris.js -->
    <script src="<?php echo base_url(); ?>asset/js/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/morris.js/morris.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/js/morris.js/morris.css">
    <link href="<?php echo base_url(''); ?>/asset/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(''); ?>/asset/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url(''); ?>/asset/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url(''); ?>/asset/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(''); ?>/asset/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(''); ?>/asset/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(''); ?>/asset/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(''); ?>/asset/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(''); ?>/asset/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(''); ?>/asset/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <!--<link href="<?php echo base_url(''); ?>/asset/css/theme.css" rel="stylesheet" media="all">-->
    <link href="<?php echo base_url(''); ?>/asset/css/themes.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(''); ?>/asset/css/img.css" rel="stylesheet" media="all">

</head>
<body class="animsition">
    <?php 
    $sessData = $this->session->userdata('sesslogin');
    $level = $sessData['akses'];
    ?>
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="">
                            <img src="<?php echo base_url(''); ?>asset/images/icon/logold.png" style="max-height:52px;" alt="CoolAdmin" />
                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled" style="float:left;padding-left:25%;">
                            <li>
                                <a style="color:#cc9933" href="<?php echo site_url('') ?>">
                                    <i class="fas fa-tachometer-alt"></i>Rekap Mulia
                                    <span class="bot-line"></span>
                                </a>
                            </li>
                            <li>
                                <a style="color:#cc9933" href="<?php echo site_url('Homemikro') ?>">
                                    <i class="fas fa-tachometer-alt"></i>Rekap Mikro
                                    <span class="bot-line"></span>
                                </a>
                            </li>
                             <li>
                                <a style="color:#cc9933" href="<?php echo site_url('Homeamanah') ?>">
                                    <i class="fas fa-tachometer-alt"></i>Rekap Amanah
                                    <span class="bot-line"></span>
                                </a>
                            </li>
                            <li class="has-sub">
                                <a href="#" style="color: #cc9933">
                                    <i class="fas fa-money-bill-alt"></i>Transaksi
                                    <span class="bot-line"></span>
                                </a>
                                 <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="<?php if ($session_data['akses']=='admin')
                                        {
                                            echo site_url('Transaksi/admin'); 
                                        }
                                        else
                                        {
                                            echo site_url('Transaksi');
                                        } ?>">Mulia</a>
                                    </li>
                                    <li>
                                        <a href="<?php if ($session_data['akses']=='admin')
                                        {
                                            echo site_url('Mikro/admin'); 
                                        }
                                        else
                                        {
                                            echo site_url('Mikro');
                                        } ?>">Mikro</a>
                                    </li>
                                    <li>
                                        <a href="<?php if ($session_data['akses']=='admin')
                                        {
                                            echo site_url('Amanah/admin'); 
                                        }
                                        else
                                        {
                                            echo site_url('Amanah');
                                        } ?>">Amanah</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <?php if ($session_data['akses']=='admin' || $session_data['akses']=='cabang')
                            {?>
                            <li>
                                <a style="color:#cc9933" href="<?php echo site_url('user') ?>">
                                    <i class="far fa-building"></i>Cabang
                                    <span class="bot-line"></span>
                                </a>
                            </li>
                            <?php } ?>
                            
                        </ul>
                    </div>
                    <div class="header__tool">
                        
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="content">
                                    <a style="color:#cc9933" class="js-acc-btn" href="#"><?php echo $session_data['nama'] ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src=" <?php echo base_url('/asset/')?>images/icon/squ.png" alt="Pegadaian" style=""/>
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#" style="color:#cc9933"><?php echo $session_data['nama'] ?></a>
                                            </h5>
                                            <span class="email"><?php echo $session_data['username'] ?></span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="<?php echo site_url('user/updateForm/').$session_data['id_user'] ?>">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="<?php echo site_url('login/logout')?>">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="<?php echo site_url('') ?>">
                        <img src="<?php echo base_url(''); ?>asset/images/icon/logold.png" style="max-height:50px;" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a style="color:#cc9933" href="<?php echo site_url('')?>">
                                    <i class="fas fa-tachometer-alt"></i>Rekap Mulia
                                </a>
                            </li>
                        </li>
                        <li>
                            <a style="color:#cc9933" href="<?php echo site_url('Homemikro') ?>">
                                    <i class="fas fa-tachometer-alt"></i>Rekap Mikro
                                </a>
                            </li>
                        </li>
                        <li>
                            <a style="color:#cc9933" href="<?php echo site_url('Homeamanah') ?>">
                                    <i class="fas fa-tachometer-alt"></i>Rekap Amanah
                                </a>
                            </li>
                        </li>
                        <li>
                            <a style="color:#cc9933" href="<?php if ($session_data['akses']=='admin')
                            {
                                echo site_url('Transaksi/admin'); 
                            }
                            else
                            {
                                echo site_url('Transaksi');
                            } ?>">
                                <i class="fas fa-money-bill-alt"></i>Transaksi Mulia
                                <span class="bot-line"></span>
                            </a>
                        </li>
                        <li>
                            <a style="color:#cc9933" href="<?php if ($session_data['akses']=='admin')
                            {
                                echo site_url('Mikro/admin'); 
                            }
                            else
                            {
                                echo site_url('Mikro');
                            } ?>">
                                <i class="fas fa-money-bill-alt"></i>Transaksi Mikro
                                <span class="bot-line"></span>
                            </a>
                        </li>
                        <li>
                            <a style="color:#cc9933" href="<?php if ($session_data['akses']=='admin')
                            {
                                echo site_url('Amanah/admin'); 
                            }
                            else
                            {
                                echo site_url('Amanah');
                            } ?>">
                                <i class="fas fa-money-bill-alt"></i>Transaksi Amanah
                                <span class="bot-line"></span>
                            </a>
                        </li>
                        </li>
                        <li>
                            <a style="color:#cc9933" href="<?php echo site_url('user') ?>">
                                <i class="far fa-building"></i>Cabang
                                <span class="bot-line"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="sub-header-mobile-2 d-block d-lg-none">
            <div class="header__tool">
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <!-- <div class="image">
                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                        </div> -->
                        <div class="content">
                        <a style="color:#cc9933" class="js-acc-btn" href="#"><?php echo $session_data['nama'] ?></a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                    <img src=" <?php echo base_url('/asset/')?>images/icon/squ.png" alt="Pegadaian" style=""/>
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="#" style="color:#cc9933"><?php echo $session_data['nama'] ?></a>
                                    </h5>
                                    <span class="email"><?php echo $session_data['username'] ?></span>
                                </div>
                            </div>
                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                    <a href="<?php echo site_url('user/updateForm/').$session_data['id_user'] ?>">
                                        <i class="zmdi zmdi-account"></i>Account</a>
                                </div>
                            </div>
                            <div class="account-dropdown__footer">
                                <a href="<?php echo site_url('login/logout')?>">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
</html>