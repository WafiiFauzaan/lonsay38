<table class="table table-striped">
	<thead class="thead-dark">
		<tr>
			<th>Nama Produk</th>
			<th>Jumlah Terjual</th>
			<th>Jumlah Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_laporan as $laporan):?>
		<tr>
			<td><?php echo $laporan['nama'];?></td>
			<td><?php echo $laporan['jumlah_produk'];?></td>
			<td><?php echo $laporan['sub_total'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>

<a href="<?php echo site_url('laporan/produk_terlaris_export/xls');?>" class="btn btn-success">
<i class="fa fa-download"></i> Excel
</a>

<a href="<?php echo site_url('laporan/produk_terlaris_export/pdf');?>" class="btn btn-danger">
<i class="fa fa-download"></i> PDF
</a>