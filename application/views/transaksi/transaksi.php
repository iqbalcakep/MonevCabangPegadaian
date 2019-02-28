<!DOCTYPE html>
<html lang="en">
  <?php function rupiah($angka)
    {
        $hasil_rupiah = number_format($angka,2,',','.');
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
                <h2 style="text-align:center">Data Transaksi Mulia</h2>
                <hr class="line-seprate">
                <br>
               <div class="row">
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="col-xs-12 col-lg-8">
                          <h4>Cabang : <?php echo " ".$data['nama']; ?></h4>
                      </div>
                      <div style="padding-top: 1%" class="col-xs-12 col-lg-2">
                        <a href="<?php echo site_url('Transaksi/create/') ?>" class="btn btn-success btn-md btn-block">
                          <i class="fa  fa-plus-circle"></i> Tambah Transaksi
                        </a>
                      </div>
                      <div style="padding-top: 1%" class="col-xs-12 col-lg-2 rs-select2--dark rs-select2--dark2">
                        <select class="js-select2" name="type">
                          <option selected="selected" disabled>Export</option>
                          <option value="">Harian</option>
                          <option value="">Mingguan &nbsp;</option>
                          <option value="">Bulanan</option>
                        </select>
                        <div class="dropDownSelect2"></div>
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
                     <div class="table-responsive table--no-card m-t-10" style="box-shadow: none" >
                        <table class="table table-borderless table-striped table-earning" id="example">
                           <thead>
                              <tr class="text-center">
                                 <th>Id <br>Transaksi</th>
                                 <th>No <br>Rekening</th>
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
                                 <td><?php echo $key->rekening ?></td>
                                 <td><?php echo $key->nama_nasabah ?></td>
                                 <td><?php echo $key->tanggal_closing ?></td>
                                 <td><?php echo $key->jumlah_keping ?></td>
                                 <td><?php echo $key->jumlah_gram ?></td>
                                 <td><?php echo $key->total ?></td>
                                 <td><?php echo rupiah($key->nilai_pembiayaan) ?></td>
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
                        <!-- <center>
                           <a href="<?php echo site_url('Transaksi/create/') ?>" class="btn btn-default btn-lg" style="background-color:#393939; color:#cc9933">
                           <i class="zmdi zmdi-download"></i> More</a>
                        </center> -->
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