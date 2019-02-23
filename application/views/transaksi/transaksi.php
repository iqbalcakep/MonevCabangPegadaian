<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Transaksi</title>

    <!-- Fontfaces CSS-->
    <link href="<?php echo base_url(''); ?>/asset/main.css"css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(''); ?>/asset/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(''); ?>/asset/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(''); ?>/asset/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url(''); ?>/asset/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url(''); ?>/asset/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(''); ?>/asset/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(''); ?>/asset/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(''); ?>/asset/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(''); ?>/asset/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(''); ?>/asset/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(''); ?>/asset/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url(''); ?>/asset/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <?php 
        $session_data = $this->session->userdata('sesslogin');
        $data['id_user'] = $session_data['id_user'];
        $data['username'] = $session_data['username'];
        $data['nama'] = $session_data['nama'];
        echo " ".$data['username'] ;
        echo " ".$data['id_user'] ;
        echo " ".$data['nama'] ;
    ?>

    <a href="<?php echo site_url('Transaksi/create/') ?>" type="button" class="btn btn-sm btn-success">Create</a>
    <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID Transaksi</th>
                                                <th>Nama Nasabah</th>
                                                <th>Tanggal Closing</th>
                                                <th>Jumlah Keping</th>
                                                <th>Jumlah Gram</th>
                                                <th>Total</th>
                                                <th>Nilai Pembiayaan</th>
                                                <th>Jangka Waktu</th>
                                                <th>Nama Cabang</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($transaksi_list as $key) { ?>
                                                <tr>
                                                <td><?php echo $key->id_transaksi ?></td>
                                                <td><?php echo $key->nama_nasabah ?></td>
                                                <td><?php echo $key->tanggal_closing ?></td>
                                                <td><?php echo $key->jumlah_keping ?></td>
                                                <td><?php echo $key->jumlah_gram ?></td>
                                                <td><?php echo $key->total ?></td>
                                                <td><?php echo $key->nilai_pembiayaan ?></td>
                                                <td><?php echo $key->jangka_waktu ?></td>
                                                <td><?php echo " ".$data['nama'] ; ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('Transaksi/update/').$key->id_transaksi ?>" type="button" class="btn btn-sm btn-success">Update</a>
                                                    <a href="<?php echo site_url('Transaksi/delete/').$key->id_transaksi ?>" type="button" class="btn btn-sm btn-warning" onclick="return deletechecked();">Delete</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>

    <!-- Jquery JS-->
    <script src="<?php echo base_url(''); ?>/asset/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url(''); ?>/asset/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url(''); ?>/asset/vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/wow/wow.min.js"></script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/animsition/animsition.min.js"></script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url(''); ?>/asset/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?php echo base_url(''); ?>/asset/js/main.js"></script>

</body>

</html>
<!-- end document-->