<!DOCTYPE html>
<html>
   <head>
      <title></title>
   </head>
   <body>
      <?php 
         $session_data = $this->session->userdata('sesslogin');
         $data['id_user'] = $session_data['id_user'];
         $data['username'] = $session_data['username'];
         $data['nama'] = $session_data['nama'];
         echo " ".$data['username'] ;
         echo " ".$data['id_user'] ;
         echo " ".$data['nama'] ;
         ?>
      <div class="col-lg-6">
         <div class="card">
            <div class="card-header">
               <strong>Company</strong>
               <small> Form</small>
            </div>
            <?php echo form_open('Transaksi/update/'.$this->uri->segment(3)); ?>
            <div class="card-body card-block">
               <div class="form-group">
                  <label for="company" class=" form-control-label">Nama Nasabah</label>
                  <input type="text" id="nama_nasabah" name="nama_nasabah" placeholder="Nama Nasabah" class="form-control" value="<?php echo $transaksi[0]->nama_nasabah ?>">
               </div>
               <div class="form-group">
                  <label for="vat" class=" form-control-label">Tanggal Closing</label>
                  <input type="date" id="tanggal_closing" name="tanggal_closing" placeholder="Tanggal Closing" class="form-control" value="<?php echo $transaksi[0]->tanggal_closing ?>">
               </div>
               <div class="form-group">
                  <label for="street" class=" form-control-label">Jumlah Keping</label>
                  <input type="number" id="jumlah_keping" min="1" name="jumlah_keping" placeholder="Jumlah Keping" class="form-control" value="<?php echo $transaksi[0]->jumlah_keping ?>">
               </div>
               <div class="row form-group">
                  <div class="col-8">
                     <div class="form-group">
                        <label for="city" class=" form-control-label">Jumlah Gram</label>
                        <select id="jumlah_gram" name="jumlah_gram" class="form-control">
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="5">5</option>
                           <option value="10">10</option>
                           <option value="25">25</option>
                           <option value="50">50</option>
                           <option value="100">100</option>
                           <option value="250">250</option>
                           <option value="1000">1000</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="country" class=" form-control-label">Niai Pembiayaan</label>
                  <input type="number" id="nilai_pembiayaan" name="nilai_pembiayaan" placeholder="Nilai Pembiayaan" class="form-control" value="<?php echo $transaksi[0]->nilai_pembiayaan ?>">
               </div>
               <div class="form-group">
                  <label for="country" class=" form-control-label">Jangka Waktu</label>
                  <input type="number" id="jangka_waktu" name="jangka_waktu" placeholder="Jangka Waktu" class="form-control" value="<?php echo $transaksi[0]->jangka_waktu ?>">
               </div>

               <input type="hidden" id="id_user" name="id_user" value="<?php echo " ".$data['id_user'] ; ?>">
               <button type="submit" class="btn btn-primary">Submit</button>
               <?php echo form_close(); ?>
            </div>
         </div>
      </div>

      <script type="text/javascript">
function findTotal(){
    var gram = document.getElementsById('jumlah_gram');
    var keping = document.getElementsById('jumlah_keping');
    var tot=gram*keping;
    document.getElementById('total').value = tot;
}

    </script>
   </body>
</html>