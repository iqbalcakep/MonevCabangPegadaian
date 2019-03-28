<?php function rupiah($angka)
    {
        $hasil_rupiah = number_format($angka,0,',','.');
        return $hasil_rupiah;
    } ?>

<div class="container-fluid" style="padding-top: 1%">
    <div align="center" class="col-xs-12 col-lg-12">
        <H3>Transaksi Mikro</H3>
    </div>
	<div class="row">
		<div class="col-xs-12 col-lg-4">
	      	<div class="card" style="margin-top: 3%">
	            <div class="card-header">
	            	<font color="black">
                    <small>Transaksi</small>
                    <strong>Mikro <?php echo $activecabang ?> Tahun <?php echo $tahun ?></strong>
                    </font>
	            </div>
	            <div class="card-body">
			           <div class="table-responsive">
			              <table class="table" style="color: #333333;">
			                    <tr style="border-width: 0">
			                       <td>No</td>
			                       <td>Bulan</td>
			                       <td>Transaksi</td>
			                       <td>Pembiayaan</td>
			                    </tr>
			                 <tbody>
			                   <?php $i=1; foreach ($areamalang as $key){?>
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
		<div class="col-xs-12 col-lg-8 ">

		    <div class="card" style="margin-top: 2%">
                <div class="card-header">
                	<?php echo form_open('mikro/admin'); ?>
					<div class="row">
						<div class="col-xs-12 col-lg-4">
	                		<font color="black">
                            <small>Transaksi</small>
                            <strong>Mikro <?php echo $activecabang ?> Tahun <?php echo $tahun ?></strong>
                            </font>	
	                	</div>
						<div class="col-xs-12 col-lg-2">
		                    <select style="margin: 1%" name="inCabang" id="SelectLm" class="form-control-sm form-control" required>
		                        <?php foreach ($dataCabang as $key){ ?>
		                        <option value="<?php echo $key->id_cabang ?>"><?php echo $key->nama ?></option>
		                    	<?php } ?>
		                    </select>
	                	</div>
	                	<div class="col-xs-12 col-lg-2">
		                    <select style="margin: 1%" name="bulan" id="SelectLm" class="form-control-sm form-control" required>
		                        <?php foreach ($dataBulan as $key){ ?>
		                        <option value="<?php echo $key->id_bulan ?>"><?php echo $key->bulan ?></option>
		                    	<?php } ?>
		                    </select>
	                	</div>
	                	<div class="col-xs-12 col-lg-2">
		                    <select style="margin: 1%" name="tahun" id="tahun" class="form-control-sm form-control" required>
                                <?php $i=date('Y'); for ($i;$i>=date('Y')-4;$i--){ ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                             </select>
	                	</div>
                        <div class="col-xs-12 col-lg-2">
                            <button style="margin: 1%" type="submit" class="btn btn-primary btn-sm btn-block">
                            <i class="fa fa-dot-circle-o"></i> Tampilkan
                            </button>
                         </div>
	                	<?php echo form_close(); ?>
					</div>
                </div>
                <div class="card-body" align="center">
                	<font color="black">
                    <strong>Grafik Pinjaman Tahun </strong>
                    <small><?php echo $tahun;?></small>
                    </font>	
                    <div id="myc"></div>      
                </div>
            </div>
            <div class="row">
            	<div class="col-lg-12 col-xs-12">
            		<!--row judul dan export-->
                <div class="row">
                    <div class="col-lg-5 col-xs-12">
                        <font color="black" size="5pt">
                        <small>Daftar Transaksi Mikro Bulan</small>
                        <strong><?php echo $bulanAct ?></strong>
                        </font>
                    </div>     
                    <div class="col-lg-7 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="row">
                                <!--btn EXPORT-->
                                   <div style="padding-top: 1%" class="col-xs-12 col-lg-3 rs-select2--dark rs-select2--dark2">
                                       <select class="form-control-sm form-control" id="typeexport" onchange="aktif(this.value)" name="type">
                                          <option selected="selected" disabled>Export</option>
                                          <option value="harian">Harian</option>
                                          <option value="mingguan">Mingguan &nbsp;</option>
                                          <option value="bulanan">Bulanan</option>
                                       </select>
                                       <div class="dropDownSelect2"></div>
                                    </div>
                                    <div style="padding-top: 1%; display: none;" id="frmtambah" class="col-xs-12 col-lg-9 rs-select2--dark rs-select2--dark2">
                                       <div class="row">
                                          <div class="col-lg-4 col-xs-12">
                                             <select style="float:left;" class="form-control-sm form-control" name="isibulan" id="pilihbulan">
                                                <option selected="selected" disabled>Pilih Bulan</option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                             </select>
                                             <div class="dropDownSelect2"></div>
                                          </div>
                                          <div class="col-lg-3 col-xs-12">
                                             <select name="isitahun" id="tahunan" class="form-control-sm form-control" style="font-size:14px;"></select>
                                          </div>
                                          <div class="col-lg-4 col-xs-12">
                                             <button style="float:rifgt;" name="btn" onclick="window.location = '<?= site_url();?>/Home/exportmuliabulanan/'+document.getElementById('pilihbulan').value+'/'+document.getElementById('tahun').value" class="btn btn-success btn-sm">EXPORT</button>  
                                          </div>
                                       </div>       
                                    </div>
                                <!--btn EXPORTend-->
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!--row judul dan export end-->
                	<div class="table-responsive table--no-card m-b-30"   >
                        <table class="table table-borderless table-striped table-earning" id="example" style="width:100%">
                           <thead>
                              <tr >
                                 <th>No</th>
                                 <th>No Kredit</th>
                                 <th>Nasabah</th>
                                 <th>Tgl Transaksi</th>
                                 <th>Total Pinjaman</th>
                                 <th>Jenis</th>
                                 <th>Nama Cabang</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $i=1;foreach ($cabang as $key) { ?>
                              <tr>
                                 <td><?php echo $i ?></td>
                                 <td><?php echo $key->rekening ?></td>
                                 <td><?php echo $key->nama_nasabah ?></td>
                                 <td><?php echo date("d-m-Y", strtotime($key->tanggal_transaksi)); ?></td>
                                 <td><?php echo rupiah($key->uang_pinjaman) ?></td>
                                 <td><?php echo $key->jenis_pinjaman ?></td>
                                 <td><?php echo $key->nama ?></td>
                              </tr>
                              <?php $i++;} ?>
                           </tbody>
                        </table>
                     </div>
	            </div>
            </div>
            

        </div>
    </div>
</div>

<script>
	new Morris.Bar({
  // ID of the element in which to draw the chart.
	  element: 'myc',
	  resize:true,
	  // Chart data records -- each entry in this array corresponds to a point on
	  // the chart.
	  data: [<?php echo $chart ?>],
	  // The name of the data record attribute that contains x-values.
	  xkey: 'bulan',
	  // A list of names of data record attributes that contain y-values.
	  ykeys: ['pinjaman'],
	  // Labels for the ykeys -- will be displayed when you hover over the
	  // chart.
	  labels: ['pinjaman'],
	  parseTime:false,
	});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script>
         function aktif(val){
            if(val=='harian'){
               $("#frmtambah").hide(1000);
               window.location = '<?= site_url();?>/Home/exportmuliaharian';
            }else if(val=='mingguan'){
               $("#frmtambah").hide(1000);
               window.location = '<?= site_url();?>/Home/exportmuliamingguan';
            }else if(val=='bulanan'){
               $("#frmtambah").show(1000);
            }
         }
         
         $('#tahunan').each(function() {
         
         var year = (new Date()).getFullYear();
         var current = year;
         year -= 3;
         for (var i = 0; i < 6; i++) {
         if ((year+i) == current)
            $(this).append('<option selected value="' + (year + i) + '">' + (year + i) + '</option>');
         else
            $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
         }
         
            }) 
      </script> 
