
<?php 
   $session_data = $this->session->userdata('sesslogin');
   $data['id_user'] = $session_data['id_user'];
   $data['username'] = $session_data['username'];
   $data['nama'] = $session_data['nama'];

//    echo " ".$data['username'] ;
//    echo " ".$data['id_user'] ;
//    echo " ".$data['nama'] ;
?>
<div class="main-content" style="padding-top:30px">
<div class="section__content section__content--p30">
   <div class="container-fluid">
       
        <section>
            <div class="row">
                <div class="col-lg-5" style="margin:0 auto;">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama Cabang</th>
                                <td><?php 
                                foreach ($cabang as $key) { echo $key->nama; } ?></td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td><?php echo " ".$data['username'];?></td>
                            </tr>
                            <tr>
                                <th>Nama UPC</th>
                                <td><?php echo " ".$data['nama'];?></td>
                            </tr>
                            
                        </thead>
                    </table>
                </div>
            </div>
        </section>
        <div class="row">
            
            <!-- left col -->
            <div class="col-lg-6" style="margin:0 auto;">
                <div class="card">
                <div class="card-header" style="background-color:#393939; color:#cc9933;">Mikro</div>
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Edit Data Mikro</h3>
                    </div>
                    <hr>
                    <?php echo form_open('Mikro/update/'.$this->uri->segment(3)); ?>
                    <?php echo validation_errors(); ?>
                  <div class="form-group">
                     <label for="cc-payment" maxlength="16" minlength="16" class="control-label mb-1" style="color:black;">No. Kredit</label>
                     <input required value="<?php echo $mikro[0]->rekening ?>" id="rekening" name="rekening" type="text" class="form-control" aria-required="true" aria-invalid="false" readonly>
                  </div>
                  <div class="form-group">
                     <label for="cc-payment" class="control-label mb-1" style="color:black;">Nama Nasabah</label>
                     <input required value="<?php echo $mikro[0]->nama_nasabah ?>" id="nama_nasabah" name="nama_nasabah" type="text" class="form-control" aria-required="true" aria-invalid="false">
                  </div>
                  <div class="form-group">
                     <label for="cc-payment" class="control-label mb-1" style="color:black;">Tanggal Transaksi</label>
                     <input required value="<?php echo $mikro[0]->tanggal_transaksi ?>" id="tanggal_transaksi" name="tanggal_transaksi" type="date" class="form-control" aria-required="true" aria-invalid="false">
                  </div>
                  <div class="form-group">
                     <label for="country" class=" form-control-label" style="color:black;">Uang Pinjaman</label>
                     <div class="input-group">
                        <div class="input-group-addon">Rp.
                        </div>
                        <input type="text" class="form-control" name="uang_pinjaman" id="currency-field" pattern="^\Rp\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency"  value="<?php echo $mikro[0]->uang_pinjaman ?>" required>
                        <div class="input-group-addon">.00</div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <label for="city" class=" form-control-label" style="color:black;">Nama Produk</label>
                        <select id="nama_produk" name="nama_produk" class="form-control" required value="<?php echo $mikro[0]->nama_produk ?>">
                        <option value="Kreasi" 
                              <?php 
                                 if($mikro[0]->nama_produk == "Kreasi")
                                    {echo 'selected';} 
                              ?>
                           >
                              Kreasi
                           </option>
                           <option value="Kreasi Fleksi" 
                              <?php 
                                 if($mikro[0]->nama_produk == "Kreasi Fleksi")
                                    {echo 'selected';} 
                              ?>
                           >
                              Kreasi Fleksi
                           </option>
                           <option value="Kreasi Multiguna" 
                              <?php 
                                 if($mikro[0]->nama_produk == "Kreasi Multiguna")
                                    {echo 'selected';} 
                              ?>
                           >
                              Kreasi Multiguna
                           </option>
                           <option value="Arrum BPKB" 
                              <?php 
                                 if($mikro[0]->nama_produk == "Arrum BPKB")
                                    {echo 'selected';} 
                              ?>
                           >
                              Arrum BPKB
                           </option>
                           
                        </select>
                     </div>
                  </div>
                  <br>
                  
                  <div class="form-group">
                     <label for="country" class=" form-control-label" style="color:black;">Jangka Waktu</label>
                     <div class="input-group">
                        <input type="number" value="<?php echo $mikro[0]->jangka_waktu ?>" min="3" max="60" id="jangka_waktu" name="jangka_waktu" class="form-control" required>
                        <div class="input-group-addon">Bulan</div>
                     </div>
                  </div>
                  <input type="hidden" id="id_user" name="id_user" value="<?php echo " ".$data['id_user'] ; ?>" required>
                  <div class="row">
                     <div class="col-12">
                        <label for="city" class=" form-control-label" style="color:black;">Jenis Pinjaman</label>
                        <select id="jenis_pinjaman" name="jenis_pinjaman" class="form-control" required value="<?php echo $mikro[0]->jenis_pinjaman ?>">
                        <option value="Baru" 
                              <?php 
                                 if($mikro[0]->jenis_pinjaman == "Baru")
                                    {echo 'selected';} 
                              ?>
                           >
                              Baru
                           </option>
                           <option value="Rollover" 
                              <?php 
                                 if($mikro[0]->jenis_pinjaman == "Rollover")
                                    {echo 'selected';} 
                              ?>
                           >
                              Rollover
                           </option>
                        </select>
                     </div>
                  </div>
                  <br>
                  <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                  <span id="payment-button-amount">Submit</span>
                  <span id="payment-button-sending" style="display:none;">Sending…</span>
                  </button>
               </div>
               <?php echo form_close(); ?>
                </div>
            </div>
            <!-- left col -->
            
            
            <!-- untuk drop folder -->
            <!-- <div class="col-lg-6">
                <div class="card">
                    <div class="col-md-12">
                        <form method="post" action="#" id="#">
                            <div class="form-group files color">
                                <label>Upload Your File </label>
                                <input type="file" class="form-control" multiple="">
                            </div>
                        </form>
                        <button type="button" class="btn btn-large btn-block btn-primary">Upload</button>
                        <br>
                    </div>
                </div>
            </div> -->
            <!-- end drop folder -->
        </div>
   </div>
</div>
<script src="<?php echo base_url(''); ?>/asset/vendor/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(''); ?>/asset/money.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
   .files input {
   outline: 2px dashed #92b0b3;
   outline-offset: -10px;
   -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
   transition: outline-offset .15s ease-in-out, background-color .15s linear;
   padding: 120px 0px 85px 35%;
   text-align: center !important;
   margin: 0;
   width: 100% !important;
   }
   .files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
   -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
   transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
   }
   .files{ position:relative}
   .files:after {  pointer-events: none;
   position: absolute;
   top: 60px;
   left: 0;
   width: 50px;
   right: 0;
   height: 56px;
   content: "";
   background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
   display: block;
   margin: 0 auto;
   background-size: 100%;
   background-repeat: no-repeat;
   }
   .color input{ background-color:#f1f1f1;}
   .files:before {
   position: absolute;
   bottom: 10px;
   left: 0;  pointer-events: none;
   width: 100%;
   right: 0;
   height: 57px;
   content: " or drag it here. ";
   display: block;
   margin: 0 auto;
   color: #cc9933;
   font-weight: 600;
   text-transform: capitalize;
   text-align: center;
   }
</style>