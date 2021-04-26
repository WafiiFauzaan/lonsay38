<div id="grafik_pendapatan_perhari"></div>

<script src="<?php echo base_url('assets/vendor/highcharts/highcharts.js');?>"></script>
<script src="<?php echo base_url('assets/vendor/highcharts/modules/exporting.js');?>"></script>
<script src="<?php echo base_url('assets/vendor/highcharts/modules/export-data.js');?>"></script>
<script type="text/javascript">
    // Build the chart
    Highcharts.chart('grafik_pendapatan_perhari', {
        chart: {
            type: 'column'
        },
        title: {
            text: '<?php echo $judul;?>'
        },
        xAxis: {
            //categories: [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul']
            categories: [
                            <?php foreach($data_grafik as $grafik):?>
                                '<?php echo $grafik['waktu_transaksi'];?>',
                            <?php endforeach?>
                        ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Subtotal'
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },

        series: [
                    {
                        name: 'Subtotal', 
                        data: [
                                <?php foreach($data_grafik as $grafik):?>
                                    <?php echo $grafik['sub_total'];?>,
                                <?php endforeach?>
                            ]
                    }
                ]
        /*
        series: [
                    {
                        name: 'Temperature',
                        data: [49, 53, 70, 73, 45, 90, 105]
                    },
                ]
        */

    });
</script>
