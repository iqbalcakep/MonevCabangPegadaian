<!DOCTYPE html>
<html lang="en">
   <?php function rupiah($angka)
      {
          $hasil_rupiah = number_format($angka,2,',','.');
          return $hasil_rupiah;
      } ?>
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
      <section class="statistic-chart" style="padding-left:1%;padding-right:1%;">
         <div class="row" ><!-- row start-->
            <div class="col-md-12 col-lg-12 judul" align="center">
               Data Penjualan Mulia
            </div>
            <br>
            
         </div><!-- row end-->

         <!-- konten -->
         <div style="padding-top: 1%" class="row">

            <!-- chart penjualan -->
            <div class="col-md-12 col-lg-8">

                <!-- 3 card view -->
                <div class="col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="overview-item overview-item--c4" style="margin:0;margin-bottom:10px">
                                <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="fa fa-arrow-circle-right" ></i>
                                    </div>
                                    <div class="text" style="padding-bottom: 2%">
                                        <h2><?php echo $transaksi[0]->total;?> Transaksi</h2>
                                        <span>Jumlah Transaksi Bulan <?php echo date('M') ?> Area Malang</span>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="overview-item overview-item--c2" style="margin:0;margin-bottom:10px">
                                <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-money-box"></i>
                                    </div>
                                    <div class="text" style="padding-bottom: 2%">
                                        <h2><?php echo "Rp ". rupiah($biaya[0]->total);?></h2>
                                        <span>Pembiayaan  Bulan <?php echo date('M') ?> Area Malang</span>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="overview-item overview-item--c5" style="margin:0;margin-bottom:10px">
                                <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="fa fa-th-large"></i>
                                    </div>
                                    <div style="padding-bottom: 2%" class="text">
                                        <h2><?php echo $emas[0]->total; ?> Gram</h2>
                                        <span>Pembiayaan Emas  Bulan <?php echo date('M') ?> Area Malang</span>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 3 card view -->
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
                           <p style="color:#cc9933;text-align: center;">Data Penjualan Hari <?php echo date('d M Y') ?></p>
                           <canvas id="myChart" ></canvas>
                           <input type="hidden" id="url" value="<?= site_url('Home/getdata');?>">           
                        </div>
                        <div role="tabpanel" class="tab-pane" id="mingguan">
                           <canvas id="myChart2"></canvas>
                           <input type="hidden" id="url2" value="<?= site_url('Home/getdatamingguan');?>">
                        </div>
                        <div role="tabpanel" class="tab-pane " id="bulanan">
                           <canvas id="myChart3"></canvas>
                           <input type="hidden" id="url3" value="<?= site_url('Home/getdatabulanan');?>">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- chart penjualan end -->
            
            <div class="col-md-12 col-lg-4">
                <!-- peringkat cabang -->
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
                                 <td>Pembiayaan</td>
                              </tr>
                           </thead>
                           <tbody id="show_data">
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!-- peringkay cabang end -->

               <!-- peringkat unit -->
               <div class="col-md-12 col-lg-12">
                  <div class="top-campaign" style="border-radius: 10px;border-width: 0; box-shadow: 0px 10px 20px 0px rgba(204, 153, 51, 0.5);padding: 5%">
                     <h3 class="title-3 m-b-30">Peringkat Unit Tgl <?php echo Date('d M Y'); ?></h3>
                     <div class="table-responsive">
                        <table class="table" style="color: #333333" id="tabCabang">
                           <thead>
                              <tr>
                                 <td>No</td>
                                 <td>Nama Cabang</td>
                                 <td>Transaksi</td>
                                 <td>Pembiayaan</td>
                              </tr>
                           </thead>
                           <tbody id="show_data2">
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!-- peringkat unit end -->

            </div>
         </div>
         <!-- konten end -->
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
      </script>
      <script src="<?php echo base_url(''); ?>/asset/vendor/jquery-3.2.1.min.js"></script>
      <!-- Bootstrap JS-->
      <script src="<?php echo base_url(''); ?>/asset/vendor/bootstrap-4.1/popper.min.js"></script>
      <script src="<?php echo base_url(''); ?>/asset/vendor/bootstrap-4.1/bootstrap.min.js"></script>
      <!-- Vendor JS       -->
      <script src="<?php echo base_url(''); ?>/asset/vendor/slick/slick.min.js"></script>
      <script src="<?php echo base_url(''); ?>/asset/vendor/wow/wow.min.js"></script>
      <script src="<?php echo base_url(''); ?>/asset/vendor/animsition/animsition.min.js"></script>
      <script src="<?php echo base_url(''); ?>/asset/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
      <script src="<?php echo base_url(''); ?>/asset/vendor/counter-up/jquery.waypoints.min.js"></script>
      <script src="<?php echo base_url(''); ?>/asset/vendor/counter-up/jquery.counterup.min.js"></script>
      <script src="<?php echo base_url(''); ?>/asset/vendor/circle-progress/circle-progress.min.js"></script>
      <script src="<?php echo base_url(''); ?>/asset/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
      <script src="<?php echo base_url(''); ?>/asset/vendor/chartjs/Chart.bundle.min.js"></script>
      <script src="<?php echo base_url(''); ?>/asset/vendor/select2/select2.min.js"></script>
      <!-- Main JS-->
      <script src="<?php echo base_url(''); ?>/asset/js/main.js"></script>
      <script src="<?php echo base_url(''); ?>/asset/data.js"></script>
      <script type="text/javascript"> 
        $(document).ready(function(){
          var loadDat=setInterval(function () {
                //$("#tabCabang").fadeIn("slow");
                tampil_data_barang();
            }, 5000);
          tampil_data_barang();         
             //pemanggilan fungsi tampil barang.
          function tampil_data_barang(){
              $.ajax({
                  type  : 'ajax',
                  url   : '<?php echo site_url('')?>/Home/getRank',
                  async : false,
                  dataType : 'json',
                  success : function(data){
                      var html = '';
                      var i;
                      for(i=0; i<data.length; i++){
                          html += '<tr>'+
                                '<td>'+(i+1)+'</td>'+
                                  '<td>'+data[i].nama_cabang+'</td>'+
                                  '<td>'+data[i].transaksi+'</td>'+
                                  '<td>'+new Intl.NumberFormat().format(data[i].biaya)+'</td>'+
                                  '</tr>';
                      }
                      $('#show_data').html(html);
                  }
              });
          }
        }
        );
      </script>
      <script type="text/javascript"> 
        $(document).ready(function(){
          var loadDat2=setInterval(function () {
                tampil_data_barang();
            }, 5000);
          tampil_data_barang2();         
             //pemanggilan fungsi tampil barang.
          function tampil_data_barang2(){
              $.ajax({
                  type  : 'ajax',
                  url   : '<?php echo site_url('')?>/Home/getUnit',
                  async : false,
                  dataType : 'json',
                  success : function(data){
                      var html = '';
                      var i;
                      for(i=0; i<data.length; i++){
                          html += '<tr>'+
                                '<td>'+(i+1)+'</td>'+
                                  '<td>'+data[i].nama+'</td>'+
                                  '<td>'+data[i].transaksi+'</td>'+
                                  '<td>'+new Intl.NumberFormat().format(data[i].biaya)+'</td>'+
                                  '</tr>';
                      }
                      $('#show_data2').html(html);
                  }
              });
          }
        }
        );

      </script>
<!-- end document-->