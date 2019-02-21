<title>Update Cabang</title>
<!-- MAIN CONTENT-->
<div class="main-content">
   <div class="section__content section__content--p30">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <!-- <center> -->
               <div class="col-lg-6" style="margin:0 auto;">
                  <div class="card">
                     <div class="card-header">User Pegadaian</div>
                     <div class="card-body">
                        <div class="card-title">
                           <h3 class="text-center title-2">Update Data Cabang</h3>
                        </div>
                        <hr>
                        <?php echo form_open('user/update/'.$this->uri->segment(3)); ?>
                        <div class="form-group">
                           <label for="cc-cabang" class="control-label mb-1">Nama Cabang</label>
                           <input id="cc-pament" name="nama" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $user[0]->nama ?>">
                        </div>
                        <div class="form-group has-success">
                           <label for="cc-name" class="control-label mb-1">Username</label>
                           <input id="cc-name" name="username" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                              autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo $user[0]->username ?>">
                           <!-- <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span> -->
                        </div>
                        <div class="form-group">
                           <label for="cc-number" class="control-label mb-1">Password</label>
                           <input id="cc-number" name="password" type="password" class="form-control cc-number identified visa" value="" data-val="true"
                              data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                              autocomplete="cc-number" value="<?php echo $user[0]->password ?>">
                           <!-- <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span> -->
                        </div>
                        <!-- <div class="row">
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
                           </div> -->
                        <div>
                           <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Simpan</span>
                           <span id="payment-button-sending" style="display:none;">Sending…</span>
                           </button>
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