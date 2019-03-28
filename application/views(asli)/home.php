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
         <div class="row" >
            <!-- row start-->
            <div class="col-md-12 col-lg-12 judul" align="center">
               Data Penjualan Mulia
            </div>
            <br>
         </div>
         <!-- row end-->
         
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
                                    <h2>
                                       <div id="jmltrans" style="float:left">0</div>
                                       Transaksi
                                    </h2>
                                    <input type="hidden" id="urltrans" value="<?= site_url('Home/gettrans/0');?>">
                                    Jumlah Transaksi Bulan <span class="bulaan">-</span> Area Malang
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
                                    <h2>
                                       <div id="jmlbiaya">RP. 0</div>
                                    </h2>
                                    <input type="hidden" id="urlbiaya" value="<?= site_url('Home/getbiaya/0');?>">
                                    Pembiayaan Bulan <span class="bulaan">-</span> Area Malang
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
                                    <h2>
                                       <div id="jmlemas" style="float:left">0</div>
                                       Gram
                                    </h2>
                                    <input type="hidden" id="urlemas" value="<?= site_url('Home/getemas/0');?>">
                                    Pembiayaan Emas Bulan <span class="bulaan">-</span> Area Malang
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- 3 card view -->
               <!-- start -->
               <div class="card d-none d-lg-block" style="border-radius: 10px;border-width: 0; box-shadow: 0px 10px 20px 0px rgba(204, 153, 51, 0.5); color: ">
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
                           <p style="color:#cc9933;text-align: center;">Data Penjualan Bulan <?php echo date('F') ?></p>
                           <canvas id="myChart" ></canvas>
                           <input type="hidden" id="url" value="<?= site_url('Home/getdata');?>">   
                        </div>
                        <div role="tabpanel" class="tab-pane" id="mingguan">
                           <canvas id="myChart2"></canvas>
                           <input type="hidden" id="url2" value="<?= site_url('Home/getdatamingguan');?>">
                        </div>
                        <div role="tabpanel" class="tab-pane " id="bulanan">
                           <canvas id="myChart3"></canvas>
                           <input type="hidden" id="url3" value="<?= site_url('Home/getdatabulanan/0');?>">
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end -->
            </div>
            
            <!-- chart penjualan end -->
            <div class="col-md-12 col-lg-4">
               <input type="hidden" id="urlrank" value="<?= site_url('Home/getrank/0');?>">   
               <!-- peringkat cabang -->
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="top-campaign" style="border-radius: 10px;border-width: 0; box-shadow: 0px 10px 20px 0px rgba(204, 153, 51, 0.5);padding: 5%">
                     <div class="row">
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <h3 class="title-3 m-b-30">Peringkat Unit Bulan <span class="bulaan">-</span>
                         </h3>
                         </div>
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <!--bulanan-->
                             <div style="padding-top: 1%"  class="col-xs-12 col-lg-2 rs-select2--dark rs-select2--dark2">
                                <select class="btn btn-default" name="type" id="pilihbulan" onchange="gantibulan(this.value)">
                                   <option selected="selected" disabled>Pilih Bulan</option>
                                   <option value="01">Januari</option>
                                   <option value="02">Februari</option>
                                   <option value="03">Maret</option>
                                   <option value="04">April</option>
                                   <option value="05">Mei</option>
                                   <option value="06">Juni</option>
                                   <option value="07">Juli</option>
                                   <option value="08">Agustus</option>
                                   <option value="09">September</option>
                                   <option value="10">Oktober</option>
                                   <option value="11">November</option>
                                   <option value="12">Desember</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                             </div>
                            <!--end bulan-->    
                         </div>
                     </div>
                     
                     <div class="table-responsive">
                        <table class="table" style="color: #333333">
                           <thead>
                              <tr style="text-align:center;">
                                 <th>No</th>
                                 <th>Nama Cabang</th>
                                 <th>Transaksi</th>
                                 <th>Pembiayaan</th>
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
                  <input type="hidden" id="urlunit" value="<?php echo site_url('')?>/Home/getunit/0">
                  <div class="top-campaign" style="border-radius: 10px;border-width: 0; box-shadow: 0px 10px 20px 0px rgba(204, 153, 51, 0.5);padding: 5%">
                     <h3 class="title-3 m-b-30">Peringkat Bulan <span class="bulaan">-</span></h3>
                     <div class="table-responsive">
                        <table class="table" style="color: #333333" id="tabCabang">
                           <thead>
                              <tr style="text-align:center;">
                                 <th>No</th>
                                 <th>Nama Cabang</th>
                                 <th>Transaksi</th>
                                 <th>Pembiayaan</th>
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
        <script>
         function gantibulan(val) {
            document.getElementById('url3').value = "<?= site_url('Home/getdatabulanan/"+val+"');?>";
            var jad = document.getElementById('url3').value;
            window.drawLineChart3();
         }
         </script>
      <script src="<?php echo base_url(''); ?>/asset/data.js"></script>
      <script type="text/javascript"> 
         function tampil_data_barang(){
          $.ajax({
              url   : '<?php echo site_url('')?>/Home/getrank',
              async : false,
                dataType : 'json',
              success : function(data){
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){
                      html += '<tr>'+
                            '<td>'+(i+1)+'</td>'+
                              '<td>'+data[i].nama_cabang+'</td>'+
                              '<td>'+new Intl.NumberFormat().format(data[i].transaksi)+'</td>'+
                              '<td>'+new Intl.NumberFormat().format(data[i].biaya)+'</td>'+
                              '</tr>';
                  }
                  $('#show_data').html(html);
              }
          });
        }
        function tampil_data_barang2(){
            $.ajax({
                url   : '<?php echo site_url('')?>/Home/getunit',
                async : false,
                dataType : 'json',
                success : function(data){
                    var htmls = '';
                    var s;
                    for(s=0; s<data.length; s++){
                        if (s==0) {
                           htmls += '<tr>'+
                           '<td bgcolor="#a3816a" style="color:#0a065d;">'+(s+1)+'</td>'+
                           '<td bgcolor="#a3816a" style="color:#0a065d;">'+data[s].nama+'</td>'+
                           '<td bgcolor="#a3816a" style="color:#0a065d;">'+data[s].transaksi+'</td>'+
                           '<td bgcolor="#a3816a" style="color:#0a065d;">'+new Intl.NumberFormat().format(data[s].biaya)+'</td>'+
                           '</tr>';
                           } else if (s==1) {
                              htmls += '<tr>'+
                           '<td bgcolor="blue">'+(s+1)+'</td>'+
                           '<td bgcolor="blue">'+data[s].nama+'</td>'+
                           '<td bgcolor="blue">'+data[s].transaksi+'</td>'+
                           '<td bgcolor="blue">'+new Intl.NumberFormat().format(data[s].biaya)+'</td>'+
                           '</tr>';
                           }
                           else if (s==2) {
                              htmls += '<tr>'+
                           '<td bgcolor="orange">'+(s+1)+'</td>'+
                           '<td bgcolor="orange">'+data[s].nama+'</td>'+
                           '<td bgcolor="orange">'+data[s].transaksi+'</td>'+
                           '<td bgcolor="orange">'+new Intl.NumberFormat().format(data[s].biaya)+'</td>'+
                           '</tr>';
                           } else {
                              htmls += '<tr>'+
                           '<td>'+(s+1)+'</td>'+
                           '<td>'+data[s].nama+'</td>'+
                           '<td>'+data[s].transaksi+'</td>'+
                           '<td>'+new Intl.NumberFormat().format(data[s].biaya)+'</td>'+
                           '</tr>';
                           }
                    }
                    $('#show_data2').html(htmls);
                }
            });
        } 
        $(document).ready(function(){
          
          tampil_data_barang();
          tampil_data_barang2();
          var loadDat=setInterval(function ()
            {
              tampil_data_barang();
              tampil_data_barang2();  
            },5000);         
        });
      </script>
<!-- end document-->