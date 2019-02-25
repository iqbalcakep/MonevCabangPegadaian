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
    <title>Dashboard</title>
</head>
<body>
            <section class="statistic-chart">
                <div style="padding:1%">
                    <div class="row" style="padding:1%;">
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <!-- CHART-->
                            <div class="statistic-chart-1">
                                <center><h2 class="title-3 m-b-30">Grafik Penjualan Mulia pada Tgl <?= date("d M Y"); ?></h2></center>
                                <div class="chart-wrap">
                                
                                 <canvas id="myChart" width="800" height="300"></canvas>
        
                                </div>
                                <div class="statistic-chart-1-note">
                                <input type="hidden" id="url" value="<?= site_url('Home/getdata');?>">
                                </div>
                            </div>
                            <!-- END CHART-->
                        </div>
                            <!-- END CHART PERCENT-->
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC CHART-->

      
            <!-- COPYRIGHT-->
            <section class="p-t-70 p-b-10">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2" align="center">
                            <img style="max-width: 200px" src="<?php echo base_url(''); ?>asset/images/icon/bumn.png" alt="CoolAdmin">
                        </div>
                        <div class="col-md-2" align="center">
                            <img style="max-width: 150px" src="<?php echo base_url(''); ?>asset/images/icon/ojk.png" alt="CoolAdmin">
                        </div>
                        <div class="col-md-2" align="center">
                            <img style="max-width: 200px" src="<?php echo base_url(''); ?>asset/images/icon/logologo.png" alt="CoolAdmin">
                        </div>
                        <div class="col-md-2" align="center">
                            <img style="max-width: 200px" src="<?php echo base_url(''); ?>asset/images/icon/pegadaiansyariah.png" alt="CoolAdmin">
                        </div>
                        <div class="col-md-2" align="center">
                            <img style="max-width: 150px" src="<?php echo base_url(''); ?>asset/images/icon/galeri24.png" alt="CoolAdmin">
                        </div>
                        <div class="col-md-2" align="center">
                            <img style="max-width: 150px" src="<?php echo base_url(''); ?>asset/images/icon/thegade.png" alt="CoolAdmin">
                        </div>
                    </div>
                    <hr>
                    <div class="copyright">
                        <p>Copyright © 2019 PT. Pegadaian - Persero. All Rights Reserved.</p>
                    </div>
            </section>
            <!-- END COPYRIGHT-->

        </div>
        </body>
        

    
        <script src="<?php echo base_url(''); ?>/asset/vendor/chartjs/Chart.bundle.min.js"></script>
            <script src="<?php echo base_url(''); ?>/asset/vendor/select2/select2.min.js">
            </script>

<script>

        function drawLineChart() {
            var url = $('#url').val();
            var jsonData = $.ajax({
            url: url,
            contentType: 'aplication/json; charset=utf-8',
            dataType: 'json',
        }).done(function (results) {

        // Split timestamp and data into separate arrays
        var labels = [], dm=[], dp=[];
            results.forEach(function(packet) {
            labels.push(packet.nama);
            dm.push(packet.gram);
            dp.push(packet.biaya);
        });

        var densityCanvas = document.getElementById("myChart");

        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 18;

        var dataBiaya = {
            label: 'Harga Pembiayaan (Rupiah)',
            data: dp,
            backgroundColor: 'rgba(7, 183, 6, 0.8)',
            borderWidth: 0,
            yAxisID: "y-axis-0"
        };

        var dataEmas = {
            label: 'Total Emas (gram)',
            data: dm,
            backgroundColor: 'rgb(218,165,32,0.8)',
            borderWidth: 0,
            yAxisID: "y-axis-1"
        };

        var userData = {
            labels: labels,
            datasets: [dataBiaya, dataEmas]
        };

        var chartOptions = {
            responsive:true,
            scales: {
            yAxes: [{
            ticks: {
            beginAtZero: true,
            d: "y-axis-1",
        }
        }, {
            position: 'right',
            ticks: {
            beginAtZero: true,
            d: "y-axis-0",

                }
            }],

            xAxes: [{
ticks: {
autoSkip: false
}
}]
            }
        };

        var barChart = new Chart(densityCanvas, {
            type: 'bar',
            data: userData,
            options: chartOptions
            });
        });
    }

        drawLineChart();

        $(document).ready(function() {
        setInterval(drawLineChart, 20000);
        });
</script>

</html>
<!-- end document-->