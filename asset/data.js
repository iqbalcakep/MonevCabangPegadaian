
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
            labels.push(packet.nama);
            dm.push(packet.gram);
            dp.push(packet.biaya);
        });

        var densityCanvas = document.getElementById("myChart2");

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

        var barChart = new Chart(densityCanvas, {
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
            labels.push(packet.nama);
            dm.push(packet.gram);
            dp.push(packet.biaya);
        });

        var densityCanvas = document.getElementById("myChart3");

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

        var barChart = new Chart(densityCanvas, {
            type: 'bar',
            data: userData,
            options: chartOptions
            });
        });
    }

       drawLineChart();
        drawLineChart2();
        drawLineChart3();

        $(document).ready(function() {
        setInterval(drawLineChart, 20000);
        setInterval(drawLineChart2, 20000);
        setInterval(drawLineChart3, 20000);
        });
