<div class="container" style="background-color: #DDDDDD;"><br>
    <div id="container"><br>
        <div id="body">
            <div id="chart" style="height: 450px;"></div><br>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url('/asset/jquery-1.7.2.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/asset/highcharts/highcharts.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/asset/highcharts/modules/exporting.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/asset/highcharts/themes/dark-blue.js'); ?>"></script>
    <script type="text/javascript">
    jQuery(function(){
        new Highcharts.Chart({
            chart: {
                renderTo: 'chart',
                type: 'bar',
            },
            title: {
                text: 'Kinerja Mekanik',
                x: -20
            },
            xAxis: {
                categories: <?php echo json_encode($nama);?>
            },
            yAxis: {
                min: 0, max:15,
                title: {
                    text: 'Frekuensi'
                }
            },
            series: [{
                name: 'Frekuensi',
                data: <?php echo json_encode($data); ?>
            }]
        });
    }); 
    </script>
</div>
