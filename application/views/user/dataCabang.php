<title>Update Cabang</title>
<div class="main-content" style="padding-top:30px">
   <div class="section__content section__content--p30">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <!-- DATA TABLE -->
               <div class="table-data__tool">
                  <div class="table-data__tool-left">
                    <h1 class="title-5 m-b-35">Data User</h1>
                  </div>
                  <div class="table-data__tool-right">
                     <a  href="<?php echo site_url('UserModel/createUser/') ?>" class="au-btn au-btn-icon au-btn--green au-btn--small">
                     <i class="zmdi zmdi-plus"></i>add user</a>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
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
                              <?php $i=1; foreach ($user as $key): ?>
                              <!-- ini yg dipake -->
                              <tr class="tr-shadow">
                                 <td><?php echo $i ?></td>
                                 <td><?php echo $key->nama ?></td>
                                 <td><?php echo $key->username ?></td>
                                 <td><?php echo $key->password ?></td>
                                 <td>
                                    <div class="table-data-feature">
                                        <a href="<?php echo site_url('User/updateform1/').$key->id_user ?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                             <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a href="<?php echo site_url('User/delete/').$key->id_user ?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
                                        </a>
                                    </div>
                                 </td>
                              </tr>
                              <tr class="spacer"></tr>
                              <!-- ini end yg dipake -->
                              <?php $i++; ?>
                              <?php endforeach ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!-- END DATA TABLE -->
            </div>
         </div>
      </div>
   </div>
</div>