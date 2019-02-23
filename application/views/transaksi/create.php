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
                <div class="col-lg-5">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <td><?php echo " ".$data['username'];?></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td><?php echo " ".$data['nama'];?></td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>
        <div class="row">
            <!-- left col -->
            <div class="col-lg-6">
                <div class="card">
                <div class="card-header" style="background-color:#393939; color:#cc9933;">Kredit Emas</div>
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Tambah Data Transaksi</h3>
                    </div>
                    <hr>
                    <?php echo form_open('Transaksi/create/'); ?> 
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1" >Nama Nasabah</label>
                        <input id="nama_nasabah" name="nama_nasabah" type="text" class="form-control" aria-required="true" aria-invalid="false">
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1" >Tanggal Closing</label>
                        <input type="date" id="tanggal_closing" name="tanggal_closing" class="form-control cc-name valid" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                        <!-- <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span> -->
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="city" class=" form-control-label" >Jumlah Gram</label>
                            <select id="jumlah_gram" name="jumlah_gram" class="form-control">
                            <option value="1">1 Gram</option>
                            <option value="2">2 Gram</option>
                            <option value="5">5 Gram</option>
                            <option value="10">10 Gram</option>
                            <option value="25">25 Gram</option>
                            <option value="50">50 Gram</option>
                            <option value="100">100 Gram</option>
                            <option value="250">250 Gram</option>
                            <option value="1000">1000 Gram</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="x_card_code" class="control-label mb-1" style="color:white">Security code</label>
                            <div class="input-group">
                            <input type="number" id="jumlah_keping" name="jumlah_keping" class="form-control">
                            <div class="input-group-addon">keping</div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="country" class=" form-control-label" >Jangka Waktu</label>
                        <div class="input-group">
                            <div class="input-group-addon">Rp.
                            </div>
                            <input type="number" id="jangka_waktu" name="jangka_waktu" class="form-control">
                            <div class="input-group-addon">.00</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country" class=" form-control-label" >Nilai Pembiayaan</label>
                        <div class="input-group">
                            <input type="number" id="nilai_pembiayaan" name="nilai_pembiayaan" class="form-control">
                            <div class="input-group-addon">Hari</div>
                        </div>
                    </div>
                    <input type="hidden" id="id_user" name="id_user" value="<?php echo " ".$data['id_user'] ; ?>">
                    <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block">
                    <span id="payment-button-amount">Submit</span>
                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                    </button>
                </div>
                <?php echo form_close(); ?>
                </div>
            </div>
            <!-- left col -->
            <!-- untuk drop folder -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="col-md-12">
                        <form method="post" action="#" id="#">
                            <div class="form-group files color">
                                <label>Upload Your File </label>
                                <input type="file" class="form-control" multiple="">
                            </div>
                        </form>
                        <button type="button" class="btn btn-large btn-block btn-primary">Upload</button>
                    </div>
                </div>
            </div>
            <!-- end drop folder -->
        </div>
   </div>
</div>
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