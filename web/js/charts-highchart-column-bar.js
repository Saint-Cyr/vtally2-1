$(function () {

     /* Column bar */
    $('#basic-bar').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: ['NPP', 'NDC', 'UFP', 'CPP']
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total Presidential Vote Cast'
            }
        },
        legend: {
            backgroundColor: '#FFFFFF',
            reversed: true
        },
        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },
        series: [{
            name: 'Presidential',
            data: [5, 3, 4, 7]
        }]
    });
    
    
    //Pie Chart
    $(function () {
    $(document).ready(function () {

        // Build the chart
        $('#stacked-bar').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Parliamentary',
                colorByPoint: true,
                data: [{
                    name: 'NPP',
                    y: 56.33
                }, {
                    name: 'NDC',
                    y:12
                }, {
                    name: 'UFP',
                    y: 33
                }, {
                    name: 'CPP',
                    y: 14
                }]
            }]
        });
    });
});

});
