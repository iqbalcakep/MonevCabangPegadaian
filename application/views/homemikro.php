<!DOCTYPE html>
<html lang="en">
<?php function rupiah($angka)
    {
        $hasil_rupiah = number_format($angka,2,',','.');
        return $hasil_rupiah;
    } ?>
<body>
    <section class="statistic-chart" style="padding-left:1%;padding-right:1%;">
        <br>
        <div class="row">
                <div class="col-md-12 col-lg-12 judul" align="center">
                    Data Transaksi Mikro
                </div>    
                <br>
                
            </div>
        <div style="padding-top: 1%" class="row">
            <div class="col-md-12 col-lg-8">
                <!-- 2 card -->
                <div class="col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="overview-item overview-item--c4" style="margin:0;margin-bottom:10px">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </div>
                                        <div class="text" style="padding-bottom: 2%">
                                            <h2><?php echo $transaksi[0]->total;?> Transaksi</h2>
                                            <span>Jumlah Transaksi Area Malang</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="overview-item overview-item--c2" style="margin:0;margin-bottom:10px">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="zmdi zmdi-money-box"></i>
                                        </div>
                                        <div class="text" style="padding-bottom: 2%">
                                            <h2><?php echo "Rp ". rupiah($biaya[0]->total);?></h2>
                                            <span>Peminjaman Area Malang</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 2 card end -->
                <br>

                <!-- chart -->
                <div class="card" style="border-radius: 10px;border-width: 0; box-shadow: 0px 10px 20px 0px rgba(204, 153, 51, 0.5); color: ">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" >
                                <a style="color: #cc9933" class="nav-link active" href="#harian" role="tab" data-toggle="tab">Harian</a>
                            </li>
                            <li class="nav-item">
                                <a style="color: #cc9933" class="nav-link" href="#mingguan" role="tab" data-toggle="tab">Mingguan</a>
                            </li>
                            <li class="nav-item">
                                <a style="color: #cc9933" class="nav-link" href="#bulanan" role="tab" data-toggle="tab">Bulanan</a>
                            </li>
                        </ul>
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <div role="tabpanel" class="tab-pane in active" id="harian">
                                <p style="color:#cc9933;text-align: center;">Data Transaksi Hari <?php echo date('d M Y') ?></p>
                                <canvas id="myChart" ></canvas>
                                <input type="hidden" id="url" value="<?= site_url('Homemikro/getdata');?>">           
                            </div>
                            <div role="tabpanel" class="tab-pane" id="mingguan">
                                <canvas id="myChart2"></canvas>
                                <input type="hidden" id="url2" value="<?= site_url('Homemikro/getdatamingguan');?>">
                            </div>
                            <div role="tabpanel" class="tab-pane " id="bulanan">
                                <canvas id="myChart3"></canvas>
                                <input type="hidden" id="url3" value="<?= site_url('Homemikro/getdatabulanan');?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- chart end -->
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">    
                    <div class="top-campaign" style="border-radius: 10px;border-width: 0; box-shadow: 0px 10px 20px 0px rgba(204, 153, 51, 0.5);padding: 5%">
                        <h3 class="title-3 m-b-30">Peringkat Cabang Tgl <?php echo Date('d M Y'); ?></h3>
                        <div class="table-responsive">
                            <table class="table" style="color: #333333">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Cabang</td>
                                        <td>Transaksi</td>
                                        <td>Peminjaman</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($rankCabang as $key){ ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $key->nama_cabang ?></td>
                                        <td><?php echo $key->transaksi?></td>
                                        <td><?php echo rupiah($key->biaya) ?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="top-campaign" style="border-radius: 10px;border-width: 0; box-shadow: 0px 10px 20px 0px rgba(204, 153, 51, 0.5);padding: 5%">
                    <h3 class="title-3 m-b-30">Peringkat Unit Tgl <?php echo Date('d M Y'); ?></h3>
                    <div class="table-responsive">
                        <table class="table" style="color: #333333">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama Cabang</td>
                                    <td>Transaksi</td>
                                    <td>Peminjaman</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($rankUnit as $key){ ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $key->nama ?></td>
                                    <td><?php echo $key->transaksi?></td>
                                    <td><?php echo rupiah($key->biaya) ?></td>
                                </tr>
                                <?php $i++;} ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>                  
            </div>
            </div>
            
    </section>
    <!-- END STATISTIC CHART-->
    <!-- COPYRIGHT-->
    <section >
        <div class="container">
             <div class="row">
                <div class="col-xs-12 col-lg-6" align="right">
                      <img class="img-responsive" src="<?php echo base_url(''); ?>asset/images/icon/1.png" >  
                </div>
                <div class="col-xs-12 col-lg-6">    
                    <img class="img-responsive" src="<?php echo base_url(''); ?>asset/images/icon/2.png">
                </div>
            </div>     
        </div> 
         <hr>
         <div align="center">
            <p class="copyr" style="color: black">Copyright © 2019 PT. Pegadaian - Persero. All Rights Reserved.</p>
         </div>
      </section>
    <!-- END COPYRIGHT-->

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
<script src="<?php echo base_url(''); ?>/asset/datamikro.js"></script>

</body>
</html>
<!-- end document-->