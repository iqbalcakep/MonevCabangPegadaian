
    
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
            labels.push(packet.inisial);
            dm.push(packet.gram);
            dp.push(packet.biaya);
        });

        var densityCanvas = $('#myChart').get(0).getContext("2d");
        densityCanvas.canvas.height = "125";
        densityCanvas.canvas.width = "420";



        var dataBiaya = {
            label: 'Harga Pembiayaan (Rupiah)',
            data: dp,
            backgroundColor: 'rgba(0, 99, 132, 0.6)',
            borderWidth: 0,
            yAxisID: "y-axis-0"
        };

        var dataEmas = {
            label: 'Total Emas (gram)',
            data: dm,
            backgroundColor: 'rgb(218,165,32)',
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

        function drawLineChart2() {
            var url = $('#url2').val();
            var jsonData = $.ajax({
            url: url,
            contentType: 'aplication/json; charset=utf-8',
            dataType: 'json',
        }).done(function (results) {

        // Split timestamp and data into separate arrays
        var labels = [], dm=[], dp=[];
            results.forEach(function(packet) {
            labels.push(packet.inisial);
            dm.push(packet.gram);
            dp.push(packet.biaya);
        });

        var densityCanvas2 = $('#myChart2').get(0).getContext("2d");
        densityCanvas2.canvas.height = "125";
        densityCanvas2.canvas.width = "420";

        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 18;

        var dataBiaya = {
            label: 'Harga Pembiayaan (Rupiah)',
            data: dp,
            backgroundColor: 'rgba(0, 99, 132, 0.6)',
            borderWidth: 0,
            yAxisID: "y-axis-0"
        };

        var dataEmas = {
            label: 'Total Emas (gram)',
            data: dm,
            backgroundColor: 'rgb(218,165,32)',
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

        var barChart = new Chart(densityCanvas2, {
            type: 'bar',
            data: userData,
            options: chartOptions
            });
        });
    }


        function drawLineChart3() {
            var url = $('#url3').val();
            var jsonData = $.ajax({
            url: url,
            contentType: 'aplication/json; charset=utf-8',
            dataType: 'json',
        }).done(function (results) {

        // Split timestamp and data into separate arrays
        var labels = [], dm=[], dp=[];
            results.forEach(function(packet) {
            labels.push(packet.inisial);
            dm.push(packet.gram);
            dp.push(packet.biaya);
        });

        var densityCanvas3 = $('#myChart3').get(0).getContext("2d");

        densityCanvas3.canvas.height = "125";
        densityCanvas3.canvas.width = "420";
        var dataBiaya = {
            label: 'Harga Pembiayaan (Rupiah)',
            data: dp,
            backgroundColor: 'rgba(0, 99, 132, 0.6)',
            borderWidth: 0,
            yAxisID: "y-axis-0"
        };

        var dataEmas = {
            label: 'Total Emas (gram)',
            data: dm,
            backgroundColor: 'rgb(218,165,32)',
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

        var barChart = new Chart(densityCanvas3, {
            type: 'bar',
            data: userData,
            options: chartOptions
            });
        });
    }

      
    $(document).ready(function(){
          
        drawLineChart();
        drawLineChart2();
        drawLineChart3();
        var loadDat=setInterval(function ()
          {
            $('canvas#myChart').remove();
            $('canvas#myChart2').remove();
            $('canvas#myChart3').remove();
            $("#harian").append('<canvas id="myChart"></canvas>');
            $("#mingguan").append('<canvas id="myChart2"></canvas>');
            $("#bulanan").append('<canvas id="myChart3"></canvas>');
            drawLineChart();
            drawLineChart2();
            drawLineChart3(); 
          },5000);         
      });