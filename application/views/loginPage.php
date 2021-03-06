<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Pegadaian Area Malang</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(''); ?>asset/images/icon/icon.ico" />

    <!-- Fontfaces CSS-->
    <link href="<?php echo base_url(''); ?>/asset/main.css"css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(''); ?>/asset/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
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
    <link href="<?php echo base_url(''); ?>/asset/css/themes.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div  class="page-wrapper">
        <div class="page-content--bge5"  style="background-image: url('<?php echo base_url("");?>/asset/images/bgg.jpg'); background-size: 100%; background-attachment: fixed; background-position: center;" >
            <div class="container" style="padding-top: 0;margin-top: 0" >
                <div class="login-wrap">
                    <div  class="login-content" style="background-color:rgba(255,255,255,0.95)">
                        <div class="login-logo">
                            <a href="#">
                                <img style="max-width: 300px" src="<?php echo base_url(''); ?>asset/images/logold.png" alt="CoolAdmin">
                            </a>
                            <H3 style="padding-top: 10px;color:#cc9933" >MONITORING EVALUASI</H3>
                            <H6 style="color:#cc9933">PEGADAIAN AREA MALANG</H6>
                        </div>
                        <div class="login-form">
                        <?php echo form_open('Login/cekLogin'); ?>
                                <div class="form-group">
                                    <!-- <label>Username</label> -->
                                    <input class="au-input au-input--full" type="username" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <!-- <label>Password</label> -->
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" style="background-color:#cc9933" type="submit">sign in</button>
                       <?= form_close(); ?>

                            <div class="register-link">
                                <p style="color:#5f5f5f">
                                    Copyright <i class="fa fa-arrow-circle-o-up"></i> Pegadaian 2019
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Jquery JS-->
    <script src="<?php echo base_url(''); ?>/asset/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url(''); ?>/asset/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url(''); ?>/asset/vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/wow/wow.min.js"></script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/animsition/animsition.min.js"></script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?php echo base_url(''); ?>/asset/js/main.js"></script>

</body>

</html>
<!-- end document-->