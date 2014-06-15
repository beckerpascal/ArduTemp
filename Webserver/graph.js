<script>

$(function() {
    $('#container').highcharts('StockChart', {

        title: {
            text: 'Temperatur in der WG'
        },
        subtitle: {
            text: 'It\'s getting hot in here!'
        },
        legend: {
            enabled: true,
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom'
        },
        rangeSelector: {
            buttons: [{
                type: 'day',
                count: 1,
                text: '1 Tag',
            },{
                type: 'day',
                count: 3,
                text: '3 Tage'
            }, {
                type: 'week',
                count: 1,
                text: '1 Woche'
            }, {
                type: 'month',
                count: 1,
                text: '1 Monat'
            }, {
                type: 'month',
                count: 6,
                text: '6 Monate'
            }, {
                type: 'year',
                count: 1,
                text: '1 Jahr'
            }, {
                type: 'all',
                text: 'Alles'
            }],
            buttonTheme: { // styles for the buttons
                fill: 'none',
                stroke: 'none',
                style: {
                    color: '#039',
                    fontWeight: '400',
                    fontSize:'.8em'
                },
                states: {
                    hover: {
                        fill: 'white'
                    },
                    select: {
                        style: {
                            color: 'green'
                        }
                    }
                },
                width: null,
                padding: 2
            },
            inputStyle: {
                color: '#039',
                fontWeight: 'bold'
            },
            labelStyle: {
                color: 'silver',
                fontWeight: 'bold'
            },
            selected: 0
        },
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value} hPa',
                style: {
                    color: Highcharts.getOptions().colors[2]
                }
            },
            title: {
                text: 'Luftdruck',
                style: {
                    color: Highcharts.getOptions().colors[2]
                }
            },
            opposite: true//,
            // min: 800,
            // max: 1200
        }, { // Secondary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Temperatur',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value} C',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            }
        }],

        series: [{
            name: 'Temperatur',
            type: 'spline',
            yAxis: 1,
            pointInterval: 300 * 1000, // hourly data
            marker: {
                enabled: false
            },
            data: [<?php echo join($temp, ',') ?>],
            tooltip: {
                valueSuffix: ' °C'
            }
        },{
            name: 'Luftdruck',
            type: 'spline',
            data: [<?php echo join($pressure, ',') ?>],
            marker: {
                enabled: false
            },
            dashStyle: 'shortdot',
            tooltip: {
                valueSuffix: ' hPa'
            }
        }]
    });
});
</script>