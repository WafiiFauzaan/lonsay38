<table class="table table-striped">
	<thead class="thead-dark">
		<tr>
			<th>Nama Produk</th>
			<th>Total Biaya Produksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_laporan as $laporan):?>
		<tr>
			<td><?php echo $laporan['nama'];?></td>
			<td><?php echo $laporan['total_harga_produksi'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>

<a href="<?php echo site_url('laporan/total_biaya_produksi_export/xls');?>" class="btn btn-success">
<i class="fa fa-download"></i> Excel
</a>

<a href="<?php echo site_url('laporan/total_biaya_produksi_export/pdf');?>" class="btn btn-danger">
<i class="fa fa-download"></i> PDF
</a>