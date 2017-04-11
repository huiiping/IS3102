<style>
a {
	color: #0275d8;
}
</style>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://rawgit.com/klazutin/highcharts-singleseries/master/singleseries.js"></script>

<script src="https://code.highcharts.com/modules/exporting.js"></script>




<div style="height:30px;">
</div>

<div id="userstats" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto; border-radius:10px">
    
</div>
<div  style="min-width: 310px;  max-width: 600px; margin: 0 auto; border-radius:10px">
<a href="/IS3102_Final/reports/other" class="btn btn-md btn-block btn-primary pull-right" style="border-radius: 8px; margin:5px;">Generate Other Reports</a>
</div>


<script>
$(document).ready(function () {

    // Build the chart
    Highcharts.chart('userstats', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Number of Employees/Customers/Suppliers as of <br><?= $date?>'
        },
        tooltip: {
            pointFormat: '<b>{point.name}</b>: {point.y:f} users'
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
            name: 'Users',
            colorByPoint: true,
            data: [{
                name: 'Employees',
                y: <?= $employees?>
            }, {
                name: 'Suppliers',
                y: <?= $suppliers?>
                
            }, {
                name: 'Customers',
                y: <?= $customers?>
            }]
        }]
    });
});


</script>