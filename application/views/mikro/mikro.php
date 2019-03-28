<!DOCTYPE html>
<html lang="en">
  <?php function rupiah($angka)
    {
        $hasil_rupiah = number_format($angka,0,',','.');
        return $hasil_rupiah;
    } ?>
   <body class="animsition" style="color:#666">
   <script type="text/javascript">
        function timedMsg()
        {
            var t=setTimeout("document.getElementById('div-alert').style.display='none';",30000);
        }
    </script>

    <script language="JavaScript" type="text/javascript">
            function deletechecked()
            {
                if(confirm("Are you sure want to delete this item?"))
                {
                    return true;
                }
                else
                {
                    return false;  
                } 
            }
    </script>
      <?php 
         $session_data = $this->session->userdata('sesslogin');
         $data['id_user'] = $session_data['id_user'];
         $data['username'] = $session_data['username'];
         $data['nama'] = $session_data['nama'];
        //  echo " ".$data['username'] ;
        //  echo " ".$data['id_user'] ;
        //  echo " ".$data['nama'] ;
         ?>
      <!-- <a href="<?php echo site_url('Transaksi/create/') ?>" type="button" class="btn btn-sm btn-success">Create</a> -->
      
    <script language="JavaScript" type="text/javascript">timedMsg()</script>
      <div class="main-content" style="padding-top:30px">
         <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h2 style="text-align:center">Data Transaksi Mikro</h2>
                <hr class="line-seprate">
                <br>
               <div class="row">
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="col-xs-12 col-lg-8">
                          <h4>Cabang : <?php echo " ".$data['nama']; ?></h4>
                      </div>
                    </div>
                     <div class="row">
                     <div class="col-lg-12">
                     <?php 
                        if($this->session->flashdata('sukses') != "") {

                           echo '<div id="div-alert" class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Sukses</strong> Proses berhasil
                                 </div>';
                        }
                        ?>
                     <?php 
                        if($this->session->flashdata('failed') != "") {
                           echo '<div id="div-alert" class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Gagal</strong> Proses gagal
                                 </div>';
                        }
                        ?>
                        </div>
                        </div>
                     <!-- tabel -->
                     <div class="row">  
                      <div class="col-xs-12 col-lg-8">
                        <div class="row" class="pull-right" >

                          <div style="padding-top: 1%" class="col-xs-12 col-lg-3">
                            <a href="<?php echo site_url('Mikro/create/') ?>" class="btn btn-success btn-md btn-block">
                              <i class="fa  fa-plus-circle"></i> Tambah Transaksi
                            </a>
                          </div>
                          <!--<div style="padding-top: 1%" class="col-xs-12 col-lg-3 rs-select2--dark rs-select2--dark2">-->
                          <!--  <select class="js-select2" name="type">-->
                          <!--    <option selected="selected" disabled>Export</option>-->
                          <!--    <option value="">Harian</option>-->
                          <!--    <option value="">Mingguan &nbsp;</option>-->
                          <!--    <option value="">Bulanan</option>-->
                          <!--  </select>-->
                          <!--  <div class="dropDownSelect2"></div>-->
                          <!--</div>-->
                        </div>
                        <div class="table-responsive table--no-card m-t-10" style="box-shadow: none">
                        <table class="table table-borderless table-striped table-earning" id="example" style="width:100%">
                           <thead>
                              <tr class="text-center">
                                 <th>Id <br>Transaksi</th>
                                 <th>No <br>Rekening</th>
                                 <th>Nama <br>Nasabah</th>
                                 <th>Tgl <br>Transaksi</th>
                                 <th>Uang <br>Pinjaman</th>
                                 <th>Nama <br>Produk</th>
                                 <th>Jangka <br>Waktu</th>
                                 <th>Nama <br>Cabang</th>
                                 <th>Jenis <br> Pinjaman</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($mikro_list as $key) { ?>
                              <tr>
                                 <td><?php echo $key->id_mikro ?></td>
                                 <td><?php echo $key->rekening ?></td>
                                 <td><?php echo $key->nama_nasabah ?></td>
                                 <td><?php echo date("d-m-Y", strtotime($key->tanggal_transaksi)); ?></td>
                                 <td><?php echo $key->uang_pinjaman ?></td>
                                 <td><?php echo $key->nama_produk ?></td>
                                 <td><?php echo $key->jangka_waktu ?></td>
                                 <td><?php echo $key->nama ;  ?></td>
                                 <td><?php echo $key->jenis_pinjaman ?></td>
                                 <td>
                                    <div class="table-data-feature">
                                       <a href="<?php echo site_url('Mikro/update/').$key->id_mikro ?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                       <i class="zmdi zmdi-edit"></i>
                                       </a>
                                       <a href="<?php echo site_url('Mikro/delete/').$key->id_mikro ?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                       <i class="zmdi zmdi-delete"></i>
                                       </a>
                                    </div>
                                 </td>
                              </tr>
                              <?php } ?>
                           </tbody>
                        </table>
                     </div>
                      </div>
                      <div class="col-xs-12 col-lg-4">
                      <div class="top-campaign" style="border-radius: 10px;border-width: 0; box-shadow: 0px 10px 20px 0px rgba(204, 153, 51, 0.5);padding: 5%; margin-top:5%">
                        <div class="row"> 
                          <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <h3 class="title-3 m-b-30">Daftar Transaksi Tahun <?php echo $tahun ?></h3>
                          </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <?php echo form_open('transaksi');;  ?>  
                              <div class="input-group input-sm ">
                                  <input type="text" id="input3-group2" name="tahun" placeholder="Tahun" class="form-control">
                                  <div class="input-group-btn">
                                      <button class="btn btn-primary" type="submit" style="background-color: #cc9933; color: #111111;border-color: #cc9933">
                                          <i class="fa fa-search"></i>
                                      </button>
                                  </div>
                                  <?php echo form_close(); ?>
                              </div>
                            </div>  
                        </div>
                           <div class="table-responsive">
                              <table class="table" style="color: #333333">
                                 <thead>
                                    <tr>
                                       <td>No</td>
                                       <td>Bulan</td>
                                       <td>Transaksi</td>
                                       <td>Pembiayaan</td>
                                    </tr>
                                 </thead>
                                 <tbody>
                                  <?php $i=1; foreach ($transaksi_bulan as $key){?>
                                    <tr>
                                       <td><?php echo $i; ?></td>
                                       <td><?php echo $key->bulan; ?></td>
                                       <td><?php echo rupiah($key->transaksi); ?></td>
                                       <td><?php echo rupiah($key->biaya); ?></td>
                                    </tr>
                                  <?php $i++;} ?>
                                 </tbody>
                              </table>
                          </div>
                      </div>
                      </div>
                      </div>
                     
                     </div>
                     <br>
                     <!-- end tabel -->   
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
<!-- end document-->