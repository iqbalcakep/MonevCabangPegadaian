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
    <title>Dashboard</title>
     <!-- Jquery JS-->
   

</head>
<body>
<section class="statistic-chart">
                <div style="padding:1%">
                    <div class="row" style="padding:1%;">
                    </div>
                    <div class="row">
                    <ul style="margin:auto;" class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#harian" role="tab" data-toggle="tab">Harian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#mingguan" role="tab" data-toggle="tab">Mingguan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#bulanan" role="tab" data-toggle="tab">Bulanan</a>
                    </li>
                    </ul>

                  
                        <div class="col-md-12 col-lg-12">
                            <!-- CHART-->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane in active" id="harian">
                                 <div class="statistic-chart-1">
                                        <center><h2 class="title-3 m-b-30">Grafik Penjualan Mulia pada Tgl <?= date("d M Y"); ?></h2></center>
                                        <div class="chart-wrap">
                                        
                                        <canvas id="myChart"></canvas>
                
                                        </div>
                                        <div class="statistic-chart-1-note">
                                        <input type="hidden" id="url" value="<?= site_url('Home/getdata');?>">
                                        <input type="hidden" id="url2" value="<?= site_url('Home/getdatamingguan');?>">
                                       
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="mingguan">
                                 <div class="statistic-chart-1">
                                        <center><h2 class="title-3 m-b-30">Grafik Penjualan Mulia pada Mingguan</h2></center>
                                        <div class="chart-wrap">
                                        
                                        <canvas id="myChart2"></canvas>
                
                                        </div>
                                        <div class="statistic-chart-1-note">
                                        
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane " id="bulanan">
                                 <div class="statistic-chart-1">
                                        <center><h2 class="title-3 m-b-30">Grafik Penjualan Mulia pada Bulanan</h2></center>
                                        <div class="chart-wrap">
                                        
                                        <canvas id="myChart3"></canvas>
                
                                        </div>
                                        <div class="statistic-chart-1-note">
                                        <input type="hidden" id="url3" value="<?= site_url('Home/getdatabulanan');?>">
                                        </div>
                                    </div>
                                </div>
                            
                            <!-- END CHART-->
                         </div>
                            <!-- END CHART PERCENT-->
                        </div>
                    
                </div>
            </div>
        </section>
        <!-- END STATISTIC CHART-->

        <!-- COPYRIGHT-->
        <section class="p-t-70 p-b-10">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-12" align="center">
                        <img style="max-width: 150px;"src="<?php echo base_url(''); ?>asset/images/icon/bumn.png" alt="CoolAdmin">
                    </div>
                    <div class="col-md-2 col-sm-12" align="center">
                        <img style="max-width: 150px" src="<?php echo base_url(''); ?>asset/images/icon/ojk.png" alt="CoolAdmin">
                    </div>
                    <div class="col-md-2 col-sm-12" align="center">
                        <img style="max-width: 150px" src="<?php echo base_url(''); ?>asset/images/icon/logologo.png" alt="CoolAdmin">
                    </div>
                    <div class="col-md-2 col-sm-12" align="center">
                        <img style="max-width: 150px" src="<?php echo base_url(''); ?>asset/images/icon/pegadaiansyariah.png" alt="CoolAdmin">
                    </div>
                    <div class="col-md-2 col-sm-12" align="center">
                        <img style="max-width: 150px" src="<?php echo base_url(''); ?>asset/images/icon/galeri24.png" alt="CoolAdmin">
                    </div>
                    <div class="col-md-2 col-sm-12" align="center">
                        <img style="max-width: 150px" src="<?php echo base_url(''); ?>asset/images/icon/thegade.png" alt="CoolAdmin">
                    </div>
                </div>
            </div>
            <hr>
            <div class="copyright">
                <p>Copyright © 2019 PT. Pegadaian - Persero. All Rights Reserved.</p>
            </div>
        </section>
        <!-- END COPYRIGHT-->
      
            

        </div>
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
        <script src="<?php echo base_url(''); ?>/asset/data.js"></script>
        
        </body>
        

    
        



</html>
<!-- end document-->