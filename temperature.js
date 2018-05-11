$(function () {

    $('#demo-T').highcharts({
        chart: {
            type: 'line'
        },
        time: {
          timezone: 'America/New_York'
        },
        title: {
            text: 'Temperature vs Time'
        },
        xAxis: {
            title: {
                text: 'Time'
                },
             type: 'datetime',
        },
       yAxis: {
            title: {
                text: 'Temperature'
            }
        },
        series: [{
            name: 'Celcius',
            data: numbersTemperature
        }]
    });

});
