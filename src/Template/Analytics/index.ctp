<style>
a {
	color: #0275d8;
}
</style>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://rawgit.com/klazutin/highcharts-singleseries/master/singleseries.js"></script>

<div class="row">
<div class = "col-md-10">
<div id="container" style="height: 400px"></div>
</div>
</div>




<script>
Highcharts.chart('container', {

    legend: {
   		singleSeriesEnabled: true,
   		useHTML: true,
    },

    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },

    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },

    series: [{
        data: [121, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
    }, {
        data: [95.6, 54.4, 29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1]
    }, {
        data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1]
    }]
});
</script>