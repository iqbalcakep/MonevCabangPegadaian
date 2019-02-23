<!DOCTYPE html>
<html lang="en">
   <body class="animsition">
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
      <div class="main-content" style="padding-top:30px">
         <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h2 style="text-align:center">Data Transaksi</h2>
                <hr class="line-seprate">
                <br>
               <div class="row">
                  <div class="col-lg-12">
                      <!-- button atas -->
                     <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <h4>Cabang : <?php echo " ".$data['nama']; ?></h4>
                        </div>
                        <div class="table-data__tool-right">
                           <a href="<?php echo site_url('Transaksi/create/') ?>" class="au-btn au-btn-icon au-btn--green au-btn--small">
                           <i class="zmdi zmdi-plus"></i>add item</a>
                        </div>
                     </div>
                     <!-- button atas end -->

                     <!-- tabel -->
                     <div class="table-responsive table--no-card m-t-10">
                        <table class="table table-borderless table-striped table-earning">
                           <thead>
                              <tr class="text-center">
                                 <th>Id <br>Transaksi</th>
                                 <th>Nama <br>Nasabah</th>
                                 <th>Tgl <br>Closing</th>
                                 <th>Jumlah <br>Keping</th>
                                 <th>Jumlah <br>Gram</th>
                                 <th>Total</th>
                                 <th>Nilai <br> Pembiayaan</th>
                                 <th>Jangka <br>Waktu</th>
                                 <th>Nama <br>Cabang</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($transaksi_list as $key) { ?>
                              <tr>
                                 <td><?php echo $key->id_transaksi ?></td>
                                 <td><?php echo $key->nama_nasabah ?></td>
                                 <td><?php echo $key->tanggal_closing ?></td>
                                 <td><?php echo $key->jumlah_keping ?></td>
                                 <td><?php echo $key->jumlah_gram ?></td>
                                 <td><?php echo $key->total ?></td>
                                 <td><?php echo $key->nilai_pembiayaan ?></td>
                                 <td><?php echo $key->jangka_waktu ?></td>
                                 <td><?php echo " ".$data['nama'] ; ?></td>
                                 <td>
                                    <div class="table-data-feature">
                                       <a href="<?php echo site_url('Transaksi/update/').$key->id_transaksi ?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                       <i class="zmdi zmdi-edit"></i>
                                       </a>
                                       <a href="<?php echo site_url('Transaksi/delete/').$key->id_transaksi ?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                       <i class="zmdi zmdi-delete"></i>
                                       </a>
                                    </div>
                                 </td>
                              </tr>
                              <?php } ?>
                           </tbody>
                        </table>
                     </div><br>
                     <!-- end tabel -->

                     <!-- button detail -->
                     <!-- <div class="table-data__tool"> -->
                        <center>
                           <a href="<?php echo site_url('Transaksi/create/') ?>" class="btn btn-default btn-lg" style="background-color:#393939; color:#cc9933">
                           <i class="zmdi zmdi-download"></i> More</a>
                        </center>
                     <!-- </div> -->
                     <!-- button detail end -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
<!-- end document-->