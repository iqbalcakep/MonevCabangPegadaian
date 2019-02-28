
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

        var densityCanvas = document.getElementById("myChart");

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

        var densityCanvas = document.getElementById("myChart2");

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
            labels.push(packet.inisial);
            dm.push(packet.total);
            
        });

        var densityCanvas = document.getElementById("myChart3");

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
