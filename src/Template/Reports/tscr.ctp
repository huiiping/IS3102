<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<div class="text-center">
<a href="/IS3102_Final/reports/other" class="btn btn-md btn-primary center" style="border-radius: 8px; margin:5px; padding: 10px 20em">Generate Other Reports</a>
</div>
<script>
Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Cumulative Number of transactions <br> <?=date('M-Y', strtotime("- 11 months"))?> <?=date("M-Y")?>'
    },
    subtitle: {
       /* text: 'Source: WorldClimate.com'*/
    },
    xAxis: {
        categories: [
        
        '<?= $timeInterval[11]?>', '<?= $timeInterval[10]?>', '<?= $timeInterval[9]?>', '<?= $timeInterval[8]?>', '<?= $timeInterval[7]?>', '<?= $timeInterval[6]?>', '<?= $timeInterval[5]?>', '<?= $timeInterval[4]?>', '<?= $timeInterval[3]?>', '<?= $timeInterval[2]?>', '<?= $timeInterval[1]?>', '<?= $timeInterval[0]?>']

    },
    yAxis: {
        title: {
            text: 'Number of Users Joined'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: true
        }
    },
    series: [{
        name: 'Transactions',
        data:  [<?php echo join($transarray, ',') ?>]
    }]
});
</script>