<!--dashboard summary-->
<div class="row">

	<!-- Total Peminjaman -->
	<div class="col-xl-4 col-md-4 mb-4">
	  <div class="card border-left-primary shadow h-100 py-2">
	    <div class="card-body">
	      <div class="row no-gutters align-items-center">
	        <div class="col mr-2">
	          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Transaksi</div>
	          <div class="h5 mb-0 font-weight-bold text-gray-800">
	           <?php echo $data_penjualan['total_transaksi'];?> Transaksi
	       	  </div>
	        </div>
	        <div class="col-auto">
	          <i class="fas fa-upload fa-2x text-primary"></i>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Total Pengembalian -->
	<div class="col-xl-4 col-md-4 mb-4">
	  <div class="card border-left-success shadow h-100 py-2">
	    <div class="card-body">
	      <div class="row no-gutters align-items-center">
	        <div class="col mr-2">
	          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan Hari Ini</div>
	          <div class="h5 mb-0 font-weight-bold text-gray-800">
	          	Rp. <?php echo number_format($data_produk_penjualan['sub_total']);?>
	          </div>
	        </div>
	        <div class="col-auto">
	          <i class="fas fa-download fa-2x text-success"></i>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Menunggu Pengembalian -->
	<div class="col-xl-4 col-md-4 mb-4">
	  <div class="card border-left-danger shadow h-100 py-2">
	    <div class="card-body">
	      <div class="row no-gutters align-items-center">
	        <div class="col mr-2">
	          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Modal Produksi Hari Ini</div>
	          <div class="h5 mb-0 font-weight-bold text-gray-800">
	          	Rp. <?php echo number_format($data_produk_penjualan['total_harga_produksi']);?>
	          </div>
	        </div>
	        <div class="col-auto">
	          <i class="fas fa-question fa-2x text-danger"></i>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>

</div>
<!--dashboard summary-->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-8">
      <div class="card shadow mb-4">

        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Riwayat Pendapatan</h6>
        </div>

        <!-- Card Body -->
        <div class="card-body">
          
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


        </div>
      </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-4">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Stok Bahan Baku</h6>
        </div>

        <!-- Card Body -->
        <div class="card-body">
        	
        	<table class="table table-striped table-hover">
				<thead class="thead-dark">
					<tr>
						<th>Bahan Baku</th>
						<th>Stok</th>
						<th>Satuan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data_grafik as $grafik):?>
					<tr>
						<td><?php echo $grafik['nama'];?></td>
						<td><?php echo $grafik['stok'];?></td>
						<td><?php echo $grafik['satuan'];?></td>

					</tr>
					<?php endforeach;?>
				</tbody>
			</table>

        </div>
      </div>
    </div>
</div>