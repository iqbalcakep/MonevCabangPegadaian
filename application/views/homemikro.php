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
            
         </div>
         <div style="padding-top: 1%" class="row">
            <div class="col-md-12 col-lg-8">
               <!-- 2 card -->
               <div class="col-md-12 col-lg-12">
                  <div class="row">
                     <div class="col-md-6 ">
                        <div class="overview-item overview-item--c8" style="margin:0;margin-bottom:10px">
                           <div class="overview__inner">
                              <div class="overview-box clearfix">
                                 <div class="icon">
                                    <i class="fa fa-arrow-circle-right"></i>
                                 </div>
                                 <div class="text" style="padding-bottom: 2%">
                                    <h2>
                                       <div id="jmltrans" style="float:left">0</div>
                                       Transaksi
                                    </h2>
                                    <input type="hidden" id="urltrans" value="<?= site_url('Homemikro/gettrans/0');?>">
                                    <span>Jumlah Transaksi Bulan
                                    <?php 
                                       $eng = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'desember');
                                       $indo = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'); 
                                       $month = strftime('%B'); 
                                       $dt=str_ireplace($eng, $indo, $month); echo $dt; 
                                       ?>
                                    Area Malang</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 ">
                        <div class="overview-item overview-item--c9" style="margin:0;margin-bottom:10px">
                           <div class="overview__inner">
                              <div class="overview-box clearfix">
                                 <div class="icon">
                                    <i class="zmdi zmdi-money-box"></i>
                                 </div>
                                 <div class="text" style="padding-bottom: 2%">
                                    <h2>
                                       <div id="jmlbiaya">RP. 0</div>
                                    </h2>
                                    <input type="hidden" id="urlbiaya" value="<?= site_url('Homemikro/getbiaya/0');?>">
                                    <span>Pembiayaan  Bulan
                                    <?php 
                                       $eng = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'desember');
                                       $indo = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'); 
                                       $month = strftime('%B'); 
                                       $dt=str_ireplace($eng, $indo, $month); echo $dt; 
                                       ?>
                                    Area Malang</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- 2 card end -->

               <!-- 2 card -->
               <div class="col-md-12 col-lg-12">
                  <div class="row">
                     <div class="col-md-6 ">
                        <div class="overview-item overview-item--c10" style="margin:0;margin-bottom:10px">
                           <div class="overview__inner">
                              <div class="overview-box clearfix">
                                 <div class="icon">
                                    <i class="zmdi zmdi-file-plus"></i>
                                 </div>
                                 <div class="text" style="padding-bottom: 2%">
                                    <h2>
                                       <div id="jmltrans" style="float:left">0</div>
                                       Transaksi
                                    </h2>
                                    <input type="hidden" id="urltrans" value="<?= site_url('Homemikro/gettrans/0');?>">
                                    <span>Jumlah Transaksi Baru Bulan
                                    <?php 
                                       $eng = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'desember');
                                       $indo = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'); 
                                       $month = strftime('%B'); 
                                       $dt=str_ireplace($eng, $indo, $month); echo $dt; 
                                       ?>
                                    Area Malang</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 ">
                        <div class="overview-item overview-item--c11" style="margin:0;margin-bottom:10px">
                           <div class="overview__inner">
                              <div class="overview-box clearfix">
                                 <div class="icon">
                                    <i class="zmdi zmdi-refresh"></i>
                                 </div>
                                 <div class="text" style="padding-bottom: 2%">
                                    <h2>
                                       <div id="jmlbiaya">RP. 0</div>
                                    </h2>
                                    <input type="hidden" id="urlbiaya" value="<?= site_url('Homemikro/getbiaya/0');?>">
                                    <span>Rollover  Bulan
                                    <?php 
                                       $eng = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'desember');
                                       $indo = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'); 
                                       $month = strftime('%B'); 
                                       $dt=str_ireplace($eng, $indo, $month); echo $dt; 
                                       ?>
                                    Area Malang</span>
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
                           <input type="hidden" id="url3" value="<?= site_url('Homemikro/getdatabulanan/0');?>">
                        </div>
                     </div>
                  </div>
               </div>
               <!-- chart end -->
            </div>
            <div class="col-md-12 col-lg-4">
               <input type="hidden" id="urlrank" value="<?= site_url('Homemikro/getrank/0');?>">   
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="top-campaign" style="border-radius: 10px;border-width: 0; box-shadow: 0px 10px 20px 0px rgba(204, 153, 51, 0.5);padding: 5%">
                     <div class="row">
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <h3 class="title-3 m-b-30">Peringkat Bulan
                                <?php 
                                   $eng = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'desember');
                                   $indo = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'); 
                                   $month = strftime('%B'); 
                                   $dt=str_ireplace($eng, $indo, $month); echo $dt; 
                                   ?>
                             </h3>        
                         </div>
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                             <div style="padding-top: 1%" class="col-xs-12 col-lg-2 rs-select2--dark rs-select2--dark2">
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
                         </div>
                     </div>
                     
                     <div class="table-responsive">
                        <table class="table" style="color: #333333">
                           <thead>
                              <tr style="text-align:center">
                                 <th>No</th>
                                 <th>Nama Cabang</th>
                                 <th>Transaksi</th>
                                 <th>Peminjaman</th>
                              </tr>
                           </thead>
                           <tbody id="show_data">
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 col-lg-12">
                  <input type="hidden" id="urlunit" value="<?php echo site_url('')?>/Homemikro/getunit/0">
                  <div class="top-campaign" style="border-radius: 10px;border-width: 0; box-shadow: 0px 10px 20px 0px rgba(204, 153, 51, 0.5);padding: 5%">
                     <h3 class="title-3 m-b-30">Peringkat Unit Bulan <?php echo Date('F'); ?></h3>
                     <div class="table-responsive">
                        <table class="table" style="color: #333333">
                           <thead>
                              <tr style="text-align:center">
                                 <th>No</th>
                                 <th>Nama Cabang</th>
                                 <th>Transaksi</th>
                                 <th>Peminjaman</th>
                              </tr>
                           </thead>
                           <tbody id="show_data2">
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
      <script type="text/javascript">
    
         gantibiaya();
         gantitrans();
         function gantibulan(val){
         document.getElementById('url3').value = "<?= site_url('Homemikro/getdatabulanan/"+val+"');?>";
         document.getElementById('urlbiaya').value = "<?= site_url('Homemikro/getbiaya/"+val+"');?>";
         document.getElementById('urltrans').value = "<?= site_url('Homemikro/gettrans/"+val+"');?>";
         document.getElementById('urlrank').value = "<?= site_url('Homemikro/getrank/"+val+"');?>";
         document.getElementById('urlunit').value = "<?= site_url('Homemikro/getunit/"+val+"');?>";
         window.drawLineChart3();
         
         gantibiaya();
         gantitrans();
         tampil_data_barang();
         tampil_data_barang2()
         }
         
         function gantitrans(){
         var url = $('#urltrans').val();
         return $.ajax({
         contentType: 'aplication/json; charset=utf-8',
         dataType: "json",
         url: url,
         success: function(data) {
           var bilangan = data[0].total;
           if(bilangan==null){
           $('#jmltrans').html("0");
           }else{
           $('#jmltrans').html(data[0].total);
           }
         }
         });
         }
         
         function gantibiaya(){
         var url = $('#urlbiaya').val();
         return $.ajax({
         contentType: 'aplication/json; charset=utf-8',
         dataType: "json",
         url: url,
         success: function(data) {
           var bilangan = data[0].total;
           if(bilangan==null){
           $('#jmlbiaya').html("Rp. 0");
           }else{
           var	reverse = bilangan.toString().split('').reverse().join(''),
           ribuan 	= reverse.match(/\d{1,3}/g);
           ribuan	= ribuan.join('.').split('').reverse().join('');
           $('#jmlbiaya').html("Rp."+ribuan);
           }
         }
         });
         }
      </script>
      <script src="<?php echo base_url(''); ?>/asset/datamikro.js"></script>
      <script type="text/javascript"> 
         function tampil_data_barang(){
            var url = $('#urlrank').val();
          $.ajax({
              url   : url,
              async : false,
                dataType : 'json',
              success : function(data){
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){
                     if(i==0){
                        html += '<tr>'+
                            '<td style="color:#014441;text-align:center;"><img src="http://thegadeareamalang.com/asset/images/icon/gold-medal.png" ></td>'+
                              '<th style="color:#014441;">'+data[i].nama_cabang+'</th>'+
                              '<th style="color:#014441;">'+new Intl.NumberFormat().format(data[i].transaksi)+'</th>'+
                              '<th style="color:#014441;">'+new Intl.NumberFormat().format(data[i].biaya)+'</th>'+
                              '</tr>';
                     }else if(i==1){
                        html += '<tr>'+
                            '<td style="color:#014441;text-align:center;"><img src="http://thegadeareamalang.com/asset/images/icon/second.png"></td>'+
                              '<th style="color:#014441;">'+data[i].nama_cabang+'</th>'+
                              '<th style="color:#014441;">'+new Intl.NumberFormat().format(data[i].transaksi)+'</th>'+
                              '<th style="color:#014441;">'+new Intl.NumberFormat().format(data[i].biaya)+'</th>'+
                              '</tr>';
                     }else if(i==2){
                        html += '<tr>'+
                            '<td style="color:#014441;text-align:center;"><img src="http://thegadeareamalang.com/asset/images/icon/third.png"></td>'+
                              '<th style="color:#014441;">'+data[i].nama_cabang+'</th>'+
                              '<th style="color:#014441;">'+new Intl.NumberFormat().format(data[i].transaksi)+'</th>'+
                              '<th style="color:#014441;">'+new Intl.NumberFormat().format(data[i].biaya)+'</th>'+
                              '</tr>';
                     }else{
                      html += '<tr>'+
                            '<td style="text-align:center;">'+(i+1)+'</td>'+
                              '<td>'+data[i].nama_cabang+'</td>'+
                              '<td>'+new Intl.NumberFormat().format(data[i].transaksi)+'</td>'+
                              '<td>'+new Intl.NumberFormat().format(data[i].biaya)+'</td>'+
                              '</tr>';
                  }
               }
                  $('#show_data').html(html);
              }
          });
         }
         function tampil_data_barang2(){
          var url = $('#urlunit').val();
            $.ajax({
                url   : url,
                async : false,
                dataType : 'json',
                success : function(data){
                    var htmls = '';
                    var s;
                    for(s=0; s<data.length; s++){
                        htmls += '<tr>'+
                              '<td>'+(s+1)+'</td>'+
                                '<td>'+data[s].nama+'</td>'+
                                '<td>'+new Intl.NumberFormat().format(data[s].transaksi)+'</td>'+
                                '<td>'+new Intl.NumberFormat().format(data[s].biaya)+'</td>'+
                                '</tr>';
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
   </body>
</html>
<!-- end document-->