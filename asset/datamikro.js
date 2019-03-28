
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
            dm.push(packet.total);
            
        });

        var densityCanvas = $('#myChart').get(0).getContext("2d");
        densityCanvas.canvas.height = "125";
        densityCanvas.canvas.width = "420";

        Chart.defaults.global.defaultFontSize = 10;

        var dataEmas = {
            label: 'Total Pinjaman (rupiah)',
            data: dm,
            backgroundColor: 'rgb(218,165,32)',
            borderWidth: 0,
        };

        var userData = {
            labels: labels,
            datasets: [dataEmas]
        };

        var chartOptions = {
            responsive:true,
            scales: {
            yAxes: [{
            ticks: {
            beginAtZero: true
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
            dm.push(packet.total);
            
        });

        var densityCanvas2 = $('#myChart2').get(0).getContext("2d");
        densityCanvas2.canvas.height = "125";
        densityCanvas2.canvas.width = "420";

        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 18;

        var dataEmas = {
            label: 'Total Pinjaman (rupiah)',
            data: dm,
            backgroundColor: 'rgb(218,165,32)',
            borderWidth: 0,
        };

        var userData = {
            labels: labels,
            datasets: [dataEmas]
        };

        var chartOptions = {
            responsive:true,
            scales: {
            yAxes: [{
            ticks: {
            beginAtZero: true
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
            dm.push(packet.total);
            
        });

       var densityCanvas3 = $('#myChart3').get(0).getContext("2d");
        densityCanvas3.canvas.height = "125";
        densityCanvas3.canvas.width = "420";

        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 18;

        var dataEmas = {
            label: 'Total Pinjaman (rupiah)',
            data: dm,
            backgroundColor: 'rgb(218,165,32)',
            borderWidth: 0,
        };

        var userData = {
            labels: labels,
            datasets: [dataEmas]
        };

        var chartOptions = {
            responsive:true,
            scales: {
            yAxes: [{
            ticks: {
            beginAtZero: true
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
