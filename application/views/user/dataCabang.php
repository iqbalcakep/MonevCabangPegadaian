<title>Update Cabang</title>
<div class="main-content">
   <div class="section__content section__content--p30">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <!-- DATA TABLE -->
               <h3 class="title-5 m-b-35">data table</h3>
               <div class="table-data__tool">
                  <!-- <div class="table-data__tool-left">
                     <div class="rs-select2--light rs-select2--md">
                        <select class="js-select2" name="property">
                           <option selected="selected">All Properties</option>
                           <option value="">Option 1</option>
                           <option value="">Option 2</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                     </div>
                     <div class="rs-select2--light rs-select2--sm">
                        <select class="js-select2" name="time">
                           <option selected="selected">Today</option>
                           <option value="">3 Days</option>
                           <option value="">1 Week</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                     </div>
                     <button class="au-btn-filter">
                     <i class="zmdi zmdi-filter-list"></i>filters</button>
                  </div> -->
                  <!-- <div class="table-data__tool-right">
                     <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                     <i class="zmdi zmdi-plus"></i>add item</button>
                     <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                        <select class="js-select2" name="type">
                           <option selected="selected">Export</option>
                           <option value="">Option 1</option>
                           <option value="">Option 2</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                     </div>
                  </div> -->
               </div>
               <div class="table-responsive table-responsive-data2">
                  <table class="table table-data2">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Nama Cabang</th>
                           <th>Username</th>
                           <th>Password</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($user as $key): ?>
                         <!-- ini yg dipake -->
                        <tr class="tr-shadow">
                           <td>1</td>
                           <td><?php echo $key->id_user ?></td>
                           <td><?php echo $key->nama ?></td>
                           <td><?php echo $key->username ?></td>
                           <td>
                              <div class="table-data-feature">
                                 <!-- <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                 <i class="zmdi zmdi-mail-send"></i>
                                 </button> -->
                                 <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                 <i class="zmdi zmdi-edit"></i>
                                 </button>
                                 <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                 <i class="zmdi zmdi-delete"></i>
                                 </button>
                                 <!-- <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                 <i class="zmdi zmdi-more"></i>
                                 </button> -->
                              </div>
                           </td>
                        </tr>
                        <tr class="spacer"></tr>
                        <!-- ini end yg dipake -->
                        <?php endforeach ?>
                     </tbody>
                  </table>
               </div>
               <!-- END DATA TABLE -->
            </div>
         </div>
      </div>
   </div>
</div>