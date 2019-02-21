<?php 
   $session_data = $this->session->userdata('sesslogin');
   $data['id_user'] = $session_data['id_user'];
   $data['username'] = $session_data['username'];
   $data['nama'] = $session_data['nama'];
   echo " ".$data['username'] ;
   echo " ".$data['id_user'] ;
   echo " ".$data['nama'] ;
   ?>
<style>
</style>
<div class="main-content">
   <div class="section__content section__content--p30">
      <div class="container-fluid">
            <div class="row">
                <!-- left col -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header" style="color:black;">Kredit Emas</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Tambah Data Transaksi</h3>
                            </div>
                            <hr>
                            <?php echo form_open('Transaksi/create/'); ?> 
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1" style="color:black;">Nama Nasabah</label>
                                <input id="nama_nasabah" name="nama_nasabah" type="text" class="form-control" aria-required="true" aria-invalid="false">
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1" style="color:black;">Tanggal Closing</label>
                                <input type="date" id="tanggal_closing" name="tanggal_closing" class="form-control cc-name valid" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                <!-- <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span> -->
                            </div>
                            <div class="row">
                                <div class="col-3">
                                <label for="city" class=" form-control-label" style="color:black;">Jumlah Gram</label>
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
                                <label for="x_card_code" class="control-label mb-1">Security code</label>
                                <div class="input-group">
                                    <input type="number" id="jumlah_keping" name="jumlah_keping" class="form-control">
                                    <div class="input-group-addon">keping</div>
                                </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="country" class=" form-control-label" style="color:black;">Jangka Waktu</label>
                                <div class="input-group">
                                <div class="input-group-addon">Rp.
                                </div>
                                <input type="number" id="jangka_waktu" name="jangka_waktu" class="form-control">
                                <div class="input-group-addon">.00</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country" class=" form-control-label" style="color:black;">Nilai Pembiayaan</label>
                                <div class="input-group">
                                <input type="number" id="nilai_pembiayaan" name="nilai_pembiayaan" class="form-control">
                                <div class="input-group-addon">Hari</div>
                                </div>
                            </div>
                            <input type="hidden" id="id_user" name="id_user" value="<?php echo " ".$data['id_user'] ; ?>">
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
                <div class="col-lg-6">
                    <div class="card">
                    <div class="card-header">Credit Card</div>
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Pay Invoice</h3>
                        </div>
                        <hr>
                        <form action="" method="post" novalidate="novalidate">
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Payment amount</label>
                                <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="100.00">
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">Name on card</label>
                                <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="cc-number" class="control-label mb-1">Card number</label>
                                <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                                data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                autocomplete="cc-number">
                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">Expiration</label>
                                    <input id="cc-exp" name="cc-exp" type="tel" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration"
                                        data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY"
                                        autocomplete="cc-exp">
                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                </div>
                                </div>
                                <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Security code</label>
                                <div class="input-group">
                                    <input id="x_card_code" name="x_card_code" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
                                        data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                </div>
                                </div>
                            </div>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                <span id="payment-button-amount">Pay $100.00</span>
                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                <!-- end drop folder -->
      </div>
   </div>
</div>
</div>