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
   <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- LEFT BLOCK -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <font color="black">
                                        <strong>Transaksi Mulia </strong>
                                        <small>tiap Cabang
                                        </small>
                                        </font>
                                    </div>
                                    <div class="card-body">
                                        <button type="button" class="btn btn-warning btn-sm">Malang</button>
                                        <button type="button" class="btn btn-warning btn-sm">Blimbing</button>
                                        <button type="button" class="btn btn-warning btn-sm">Kotalama</button>
                                        <button type="button" class="btn btn-warning btn-sm">Rampal</button>
                                        <button type="button" class="btn btn-warning btn-sm">Turen</button>
                                        <button type="button" class="btn btn-warning btn-sm">Landungsari</button>
                                        <button type="button" class="btn btn-warning btn-sm">Tlogomas</button>
                                        <button type="button" class="btn btn-warning btn-sm">Singosari</button>
                                        <button type="button" class="btn btn-warning btn-sm">Kepanjen</button>
                                        <button type="button" class="btn btn-warning btn-sm">Blitar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
   </div>
    
               
           
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
          var loadDat=setInterval(function ()
            {
              tampil_data_barang();
              tampil_data_barang2();  
            },5000);
          tampil_data_barang();
          tampil_data_barang2();         
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
          function tampil_data_barang2(){
              $.ajax({
                  type  : 'ajax',
                  url   : '<?php echo site_url('')?>/Home/getUnit',
                  async : false,
                  dataType : 'json',
                  success : function(data){
                      var htmls = '';
                      var s;
                      for(s=0; s<data.length; s++){
                          htmls += '<tr>'+
                                '<td>'+(s+1)+'</td>'+
                                  '<td>'+data[s].nama+'</td>'+
                                  '<td>'+data[s].transaksi+'</td>'+
                                  '<td>'+new Intl.NumberFormat().format(data[s].biaya)+'</td>'+
                                  '</tr>';
                      }
                      $('#show_data2').html(htmls);
                  }
              });
          }
        });
      </script>
      <style>
        .nav-tabs{
    width: 100%;
}
      </style>
<!-- end document-->
</body>