<style>
a {
	color: #0275d8;
}
</style>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://rawgit.com/klazutin/highcharts-singleseries/master/singleseries.js"></script>

<script src="https://code.highcharts.com/modules/exporting.js"></script>





<div class="row">
<div class = "col-md-10">
<div id="userstats" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
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