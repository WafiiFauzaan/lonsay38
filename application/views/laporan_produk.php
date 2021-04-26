<table class="table table-striped">
	<thead class="thead-dark">
		<tr>
			<th>Nama Produk</th>
			<th>Harga Produk</th>
			<th>Tipe Produk</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data_laporan as $laporan):?>
		<tr>
			<td><?php echo $laporan['nama'];?></td>
			<td><?php echo $laporan['harga_produk'];?></td>
			<td><?php echo $laporan['nama_tipe_produk'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>

<a href="<?php echo site_url('laporan/produk_export/xls');?>" class="btn btn-success">
<i class="fa fa-download"></i> Excel
</a>

<a href="<?php echo site_url('laporan/produk_export/pdf');?>" class="btn btn-danger">
<i class="fa fa-download"></i> PDF
</a>