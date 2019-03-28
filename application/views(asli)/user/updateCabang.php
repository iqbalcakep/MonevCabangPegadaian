<title>Update Cabang</title>
<!-- MAIN CONTENT-->
<div class="main-content" style="padding-top:30px">
   <div class="section__content section__content--p30">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <!-- <center> -->
               <div class="col-lg-6" style="margin:0 auto;">
                  <div class="card" style="color:black">
                     <div class="card-header" style="background-color:#393939; color:#cc9933;">User Pegadaian</div>
                     <div class="card-body">
                        <div class="card-title">
                           <h3 class="text-center title-2">Update Data Cabang</h3>
                        </div>
                        <hr>
                        <?php echo form_open('user/update/'.$this->uri->segment(3)); ?>
                        <div class="form-group">
                           <label for="cc-cabang" class="control-label mb-1"><font color="black">Nama Cabang</font></label>
                           <input id="cc-pament" name="nama" type="text" class="form-control" aria-required="true" aria-invalid="false" required value="<?php echo $user[0]->nama ?>">
                        </div>
                        <div class="form-group has-success">
                           <label for="cc-name" class="control-label mb-1"><font color="black">Username</font></label>
                           <input id="cc-name" name="username" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                              autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" required value="<?php echo $user[0]->username ?>">
                           <!-- <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span> -->
                        </div>
                        <div class="form-group">
                           <label for="cc-number" class="control-label mb-1"><font color="black">Password</font></label>
                           <input id="cc-number" name="password" type="password" class="form-control cc-number identified visa" value="" data-val="true"
                              data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                              autocomplete="cc-number" value="<?php echo $user[0]->password ?>" required>
                           <!-- <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span> -->
                        </div>
                        <div align="center">
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info ">
                                <span id="payment-button-amount">Simpan</span>
                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                            </button>

                           <a href="<?php echo site_url('') ?>" class="btn btn-default btn-lg btn-danger">
                           Batal</a>
                        </div>
                        <?php echo form_close(); ?>
                     </div>
                  </div>
               </div>
               <!-- </center> -->
            </div>
         </div>
      </div>
   </div>
</div>